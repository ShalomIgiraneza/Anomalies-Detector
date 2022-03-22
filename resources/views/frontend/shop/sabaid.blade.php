<!doctype html>
<html lang="zxx">
@include('frontend.layouts.head')
<body>
@include('frontend.layouts.header')
<main>

    <div class="col-lg-12 col-md-12 col-xs-12 space-he">
        <div class="content-wrapper container">
            <div class="breadcrumbs mt-4">
                <a href="/">Ahabanza</a> / Gusaba Indangamuntu
            </div>
            
            <div class="service-header d-flex pt-4">
                <h4 class="service-preview-title mb-4"> Gusaba Indangamuntu </h4>
            </div>
            
            <div class="imt mb-3">
                <img src="{{asset('front/assets/img/cc.PNG')}}" alt="inty" class="d-block w-100 img-fluid" />
            </div>

        <div class="">
            @error('minaloc_ariho')<p class="alert alert-danger d-flex align-items-center font-weight-bold" role="alert">
                <i class="fal fa-exclamation-circle fa-2x"></i>
                     {{$message}}
                </p>
            @enderror
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
                        <form id="sabaform" action="{{ route('sabaid.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="service_name" value="Gusaba Indangamuntu">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="sub-label"> Umurenge wo kwifotoreza <span class="text-danger">*</span></label>       
                                    <select name="umurenge" class="custom-select" style="width: 210px;">
                                        <option selected>BUGESERA-GASHORA</option>
                                        <option value="1">BUGESERA-JURU</option>
                                        <option>BUGESERA-NYAMATA</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="sub-label font-weight-bold"> Aho uzayifatira <span class="text-danger">*</span></label>       
                                    <select name="kuyifatira" class="custom-select" style="width: 160px;">
                                        <option selected>Bugesera</option>
                                        <option value="Burera">Burera</option>
                                        <option value="Gakenke">Gakenke</option>
                                        <option value="Gasabo">Gasabo</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="sub-label"> Itariki yo kwifotorezaho <span class="text-danger">*</span></label>       
                                    <input name="itariki" placeholder="Select date" type="date" id="example" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="sub-label font-weight-bold"> Nimero y'ifishi yamavuko <span class="text-danger">*</span></label>       
                                    <input name="ifishi_num" placeholder="amazina yawe" type="text" id="ifishi_num" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
            <div class="mb-3 float-right">
                <div class="col mt-3">
                    <button type="button" class="btn btn-info">Hagarika</button>
                    <button type="submit" class="btn btn-primary">Ibikurikira</button>
                </div>
            </div>
        </div>
    </div>
</div><br><br>



</main>
@include('frontend.layouts.footer')    
@include('frontend.layouts.foot')
{{-- <script>
    function Savesaba() {
        fetch("{{route('sabaid.post')}}", {
          headers: {
            "X-CSRF-Token": $('input[name="_token"]').val()
          },
          method: "post",
          credentials: "same-origin",
          body: new FormData(document.getElementById('sabaform'))
        }).then(response=>response.json()).then(function(data){
            console.log(data);
        })
    }
</script> --}}

</body>
</html>
