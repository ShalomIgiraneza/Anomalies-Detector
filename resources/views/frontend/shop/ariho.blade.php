<!doctype html>
<html lang="zxx">
@include('frontend.layouts.head')

<body>
@include('frontend.layouts.header')
<main>

    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="content-wrapper container">
            <div class="breadcrumbs mt-4">
                <a href="/">Ahabanza</a> / Icyangombwa cyuko uriho
            </div>
            
            <div class="service-header d-flex pt-4">
                <h4 class="service-preview-title mb-4"> Icyangombwa cyuko uriho </h4>
            </div>
            
            <div class="imt mb-3">
                <img src="{{asset('front/assets/img/cc.PNG')}}" alt="inty" class="d-block w-100 img-fluid" />
            </div>

          <div class="">
            <div class="card service-card">
                <div class="card-header incard"><i class="fal fa-file-word fa-2x"></i>
                Umwirondoro w'usaba serivisi
                </div>
        
                <div class="card-body">
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <i class="fal fa-exclamation-triangle fa-2x"></i>
                        <div class="font-weight-bold">
                            Iyi serivisi ihabwa abanyarwanda gusa
                        </div>
                    </div>
                    <div class="row">
                        
                    <form id="arihoform" action="" method="post">
                        <div class="col-sm-4">
                            <label class="main-label mb-3 font-weight-bold"> Umwirondoro w'usaba serivisi </label>
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <span class="sub-label"> Ubwenegihugu bw'usaba serivisi <span class="text-danger">*</span></label>       
                                    <select name="nationality" class="custom-select" placeholder="Igihe ubwishingizi" style="width: 190px;">
                                        <option selected>Umunyarwanda</option>
                                        <option value="1">Umunyamahanga</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-8">
                                    <label class="sub-label"> Nomero y'indangamuntu <span class="text-danger">*</span></label>
                                    <input name="idnum" type="text" class="form-control" placeholder="Andika nomero y'indangamuntu" formcontrolname="periodFormControl">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="mt-3">
                    <div class="card service-card">
                        <div class="card-header incard"><i class="fal fa-file-word fa-2x"></i>
                        Ibijyanye no gutunganya dosiye
                        </div>
                
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="main-label mb-3 font-weight-bold"> Ibiro bitunganya dosiye <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <label class="sub-label"> Akarere <span class="text-danger">*</span></label>       
                                            <select name="akarere" class="custom-select" placeholder="Hitamo Akarere" style="width: 190px;">
                                                <option selected>Kicukiro</option>
                                                <option value="1">Gasabo</option>
                                                <option value="1">Nyarugenge</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label class="sub-label"> Impamvu usaba serivisi <span class="text-danger">*</span></label>
                                            <input name="impamvu" type="text" class="form-control" placeholder="Andika impamvu" formcontrolname="periodFormControl">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
        <div class="mat-c mb-3" style="align:right";>
        <div class="buu col mt-3">
            <button type="submit" class="btn btn-info">Hagarika</button>
            <button type="submit" class="btn btn-primary" onclick="Saveariho()">Emeza</button>
        </div>
        </div>
        </div>
    </div>


</main>
@include('frontend.layouts.footer')    
@include('frontend.layouts.foot')

<script>
function Saveariho() {
    fetch("{{route('ariho.post')}}", {
      headers: {
        "X-CSRF-Token": $('input[name="_token"]').val()
      },
      method: "post",
      credentials: "same-origin",
      body: new FormData(document.getElementById('arihoform'))
    }).then(response=>response.json()).then(function(data){
        console.log(data);
    })
}
</script>
</body>
</html>
