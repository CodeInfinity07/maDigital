@extends('admin.includes.master-new')
@section('title', 'Dashboard')
@yield('stylesheet')
<meta name="_token" content="{{ csrf_token() }}">
<style>

  .myUL {
  /* Remove default list styling */
  list-style-type: none;
  padding: 0;
  margin: 0;
  }

  .myUL li a {
  border: 1px solid #ddd; /* Add a border to all links */
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6; /* Grey background color */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove default text underline */
  font-size: 18px; /* Increase the font-size */
  color: black; /* Add a black text color */
  display: block; /* Make it into a block element to fill the whole list */
  }

  .myUL li a:hover:not(.header) {
  background-color: #eee; /* Add a hover effect to all links, except for headers */
  }
</style>
@section('content')
<div class="main-content">
   @include('admin/includes/header-new')
   <div class="home-section-four pt-5">
      <div class="m-md-4">
         <div class="container-fluid custom-tabs">
            <div class="row pt-4">
               <div class="col-lg-12">
                  <div class="card bg-light" style="border-radius: 10px !important;">
                     <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-center align-items-center fw-bolder">
                           <div style="font-size: 20px;color: rgba(68,68,68,0.98)">Release Settings</div>
                        </div>
                        <button type="button" class="btn" data-toggle="tooltip" data-placement="top"
                           title="Tooltip on top">
                           <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                              style="width: 30px;height: 30px"><i class="fa fa-question text-white"></i></div>
                        </button>
                     </div>
                  </div>
                  <div class="row justify-content-center m-auto mb-4">
                    @if(!isset($array_ids))
                     <div class="col-lg-8 col-md-8">
                        <form action="/release-setting/{{$id}}" method="post">
                           @csrf
                           <div class="row mt-4">
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for=""> Record Label Name <span
                                       class="text-danger">*</span></label>
                                    <div class="text-muted mb-4" style="font-size: 16px">
                                       If you don’t have a formality agreed level, your artist name or
                                       barand name will be sufficient. description such as “indie” ,
                                       “independent”, “non” will not be accepted.
                                    </div>
                                    <input type="text" name="record" id="input-rate"
                                       class="form-control @error('record') is-invalid @enderror"
                                       placeholder=" Record Label Name" value=""
                                       required>
                                 </div>

                              </div>
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="">Composition copyright © <span
                                       class="text-danger">*</span></label>
                                    <div class="row">
                                      <div class="col-lg-3">
                                         <input type="year" name="c_year" id="input-rate"
                                            class="form-control @error('c_year') is-invalid @enderror px-4"
                                            value=""
                                            required>
                                      </div>

                                       <div class="col-lg-9">
                                          <input type="text" name="c_license" id="input-rate"
                                             class="form-control @error('c_license') is-invalid @enderror px-4"
                                             value="" required>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 col-lg-12 my-3">
                                 <div class="form-group focused">
                                    <label class="form-control-label" for="">Sound Recording Copyright © <span
                                       class="text-danger">*</span></label>
                                    <div class="row">
                                      <div class="col-lg-3">
                                         <input type="year" name="r_year" id="input-rate"
                                            class="form-control @error('r_year') is-invalid @enderror px-4"
                                            value=""
                                            required>
                                      </div>
                                       <div class="col-lg-9">
                                          <input type="text" name="r_license" id="input-rate"
                                             class="form-control @error('r_license') is-invalid @enderror px-4"
                                             value="" required >
                                       </div>
                                    </div>
                                 </div>
                              </div>


                           </div>
                           <div class="card mt-5" style="border-radius: 10px !important;">
                              <div class="card-body d-flex justify-content-between align-items-center text-center">
                                 <div class="col-md-4 d-flex justify-content-center">
                                    <a href="" class="d-flex justify-content-center align-items-center"
                                       style="font-size: 1.625em;color: rgba(68,68,68,0.98);border-radius: 50% ;border: 2px #3858f9 solid;width:3.125em;height: 3.125em">
                                    <i class="fa fa-chevron-left text-primary "></i>
                                    </a>
                                 </div>
                                 <div class="col-md-6">
                                    <button class="btn btn-primary btn-lg  py-3 col-md-4" type="submit"
                                       style="font-size:20px;border-radius: 15px">Save</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                    @else
                    <div class="col-lg-8 col-md-8">
                       <form action="/multi-release-settings" method="post">
                          @csrf
                          <input type="text" style="display:none" name="array_id" value="{{$array_ids}}">
                          <div class="row mt-4">
                             <div class="col-md-12 col-lg-12 my-3">
                                <div class="form-group focused">
                                   <label class="form-control-label" for=""> Record Label Name <span
                                      class="text-danger">*</span></label>
                                   <div class="text-muted mb-4" style="font-size: 16px">
                                      If you don’t have a formality agreed level, your artist name or
                                      barand name will be sufficient. description such as “indie” ,
                                      “independent”, “non” will not be accepted.
                                   </div>
                                   <input type="text" name="record" id="input-rate"
                                      class="form-control @error('record') is-invalid @enderror"
                                      placeholder=" Record Label Name" value=""
                                      required>
                                </div>

                             </div>
                             <div class="col-md-12 col-lg-12 my-3">
                                <div class="form-group focused">
                                   <label class="form-control-label" for="">Composition copyright © <span
                                      class="text-danger">*</span></label>
                                   <div class="row">
                                     <div class="col-lg-3">
                                        <input type="year" name="c_year" id="input-rate"
                                           class="form-control @error('c_year') is-invalid @enderror px-4"
                                           value=""
                                           required>
                                     </div>

                                      <div class="col-lg-9">
                                         <input type="text" name="c_license" id="input-rate"
                                            class="form-control @error('c_license') is-invalid @enderror px-4"
                                            value="" required>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div class="col-md-12 col-lg-12 my-3">
                                <div class="form-group focused">
                                   <label class="form-control-label" for="">Sound Recording Copyright © <span
                                      class="text-danger">*</span></label>
                                   <div class="row">
                                     <div class="col-lg-3">
                                        <input type="year" name="r_year" id="input-rate"
                                           class="form-control @error('r_year') is-invalid @enderror px-4"
                                           value=""
                                           required>
                                     </div>
                                      <div class="col-lg-9">
                                         <input type="text" name="r_license" id="input-rate"
                                            class="form-control @error('r_license') is-invalid @enderror px-4"
                                            value="" required >
                                      </div>
                                   </div>
                                </div>
                             </div>


                          </div>
                          <div class="card mt-5" style="border-radius: 10px !important;">
                             <div class="card-body d-flex justify-content-between align-items-center text-center">
                                <div class="col-md-4 d-flex justify-content-center">
                                   <a href="" class="d-flex justify-content-center align-items-center"
                                      style="font-size: 1.625em;color: rgba(68,68,68,0.98);border-radius: 50% ;border: 2px #3858f9 solid;width:3.125em;height: 3.125em">
                                   <i class="fa fa-chevron-left text-primary "></i>
                                   </a>
                                </div>
                                <div class="col-md-6">
                                   <button class="btn btn-primary btn-lg  py-3 col-md-4" type="submit"
                                      style="font-size:20px;border-radius: 15px">Save</button>
                                </div>
                             </div>
                          </div>
                       </form>
                    </div>
                    @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
