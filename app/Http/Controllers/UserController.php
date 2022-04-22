<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    // public function userStatus(Request $request)
    // {
    //     if ($request->mode == 'true') {
    //         DB::table('users')->where('id', $request->id)->update(['status' => 'active']);
    //     } else {
    //         DB::table('users')->where('id', $request->id)->update(['status' => 'inactive']);
    //     }
    //     return response()->json(['message' => 'Successfully updated status', 'status' => true]);
    // }

    public function create()
    {
        return view('admin.user.create');
    }


    public function store(Request $request)

    {
        //     dd($data);
        $data = $request->validate([
            'idnum' => 'required|max:16|unique:users,national_id',
            'phone' => 'required', 'string', 'max:10', 'unique:users,phone',
            'password' => 'required',
            'role' => 'required',
        ]);
        // dd($data);
        $nid = request('idnum');
        $client = new \GuzzleHttp\Client();
        $req = $client->get('http://localhost:9000/api/nida/citizen/' . $nid);
        $response = json_decode($req->getBody());
        // dd($response);
        if (isset($response) && !empty($response)) {
            $citizen = $response[0];
            $role = Role::where('name', request('role'))->first();
            // dd($role->id);
            $user = User::create([
                'role_id' => $role->id,
                'name' => $citizen->name,
                'national_id' => $data['idnum'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ]);

            return back()->with('message', 'succesfully added user');
        } else {
            $errors['idnum'] = 'invalid national id number';
            return back()->withErrors($errors);
        }
    }
    // protected function createa(array $data)
    // {
    //     // dd('ok');
    //     $nid = request('idnum');
    //     $client = new \GuzzleHttp\Client();
    //     $req = $client->get('http://localhost:9000/api/nida/citizen/' . $nid);
    //     $response = json_decode($req->getBody());
    //     $citizen = $response[0];
    //     return User::create([
    //         'name' => $citizen->name,
    //         'role_id' => $data['role'],
    //         'national_id' => $data['idnum'],
    //         'phone' => $data['phone'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'national_id' => 'required',
            'role_id' => 'required',
            'phone' => 'required|max:10',
            'password' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        $user = User::find($id);
        if ($request->password) {
            $password = $request->password;
        } else {
            $password = $user->password;
        }
        $data['password'] = bcrypt($password);
        $user->update($data);
        return redirect()->back()->with('message', 'User updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('message', 'User deleted Successfully');
    }
}
