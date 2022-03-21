@extends('admin.includes.master-new')
@section('title', 'Dashboard')
@section('stylesheet')
    <link rel="stylesheet" href="{{asset('assets/css/test-album.css')}}" type="text/css">
@endsection

@section('myScripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
@endsection

@if(!isset($array_id))

@section('content')
    <div class="main-content" style="background-color: #f8f7ff">


        @include('admin/includes/header-new')
        <div class="home-section-four pt-5">
            <div class="m-md-4">
                <div class="test-album-containner">
                    <div class="card"
                        style="border-radius: 10px !important; width: 100%; margin: 1em 0 2em 0; background-color: white; box-shadow: none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-center align-items-center fw-bolder">
                                <div style="font-size: 20px;color: rgba(68,68,68,0.98)">Users Settings</div>
                            </div>
                            <button type="button" class="btn" data-toggle="tooltip" data-placement="top"
                                title="Create new album">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fa fa-question text-white"></i></div>
                            </button>
                        </div>
                    </div>

                    <div class="steps">
                        <a href="/release-setting/{{$id}}" class="steps__step text-dark">
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653">
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Release</span>
                            </div>
                        </a>
                        <a href="" class="steps__step text-dark">
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653">
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Audio</span>
                            </div>
                        </a>
                        <a href="" class="steps__step text-dark">
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653">
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Artwork</span>
                            </div>
                        </a>
                        <a href="/stores-setting/{{$id}}" class="steps__step text-dark">
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653">
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Store</span>
                            </div>

                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

@else

@section('content')
    <div class="main-content" style="background-color: #f8f7ff">


        @include('admin/includes/header-new')
        <div class="home-section-four pt-5">
            <div class="m-md-4">
                <div class="test-album-containner">
                    <div class="card"
                        style="border-radius: 10px !important; width: 100%; margin: 1em 0 2em 0; background-color: white; box-shadow: none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-center align-items-center fw-bolder">
                                <div style="font-size: 20px;color: rgba(68,68,68,0.98)">Users Settings</div>
                            </div>
                            <button type="button" class="btn" data-toggle="tooltip" data-placement="top"
                                title="Create new album">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fa fa-question text-white"></i></div>
                            </button>
                        </div>
                    </div>

                    <div class="steps">
                      <form action="multi_release_page" id="multi_release_page" method="POST">
                        @csrf
                        <a href="javascript:$('#multi_release_page').submit();" class="steps__step text-dark">
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653">
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Release</span>
                            </div>
                        </a>
                        <input type="text" style="display:none" name="array_id" value="{{$array_id}}">
                      </form>
                        <a href="" class="steps__step text-dark">
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653">
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Audio</span>
                            </div>
                        </a>
                        <a href="" class="steps__step text-dark">
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653">
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Artwork</span>
                            </div>
                        </a>
                        <form action="/multi_store_page" id="multi_store_page" method="POST">
                          @csrf
                        <a href="javascript:$('#multi_store_page').submit();" class="steps__step text-dark">
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653">
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Store</span>
                            </div>

                        </a>
                        <input type="text" style="display:none" name="array_id" value="{{$array_id}}">
                      </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

@endif
