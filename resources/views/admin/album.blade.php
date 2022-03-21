@extends('admin.includes.master-new')
@section('title', 'Dashboard')
@section('stylesheet')
    <link rel="stylesheet" href="{{asset('assets/css/test-album.css')}}" type="text/css">
@endsection

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
                                <div style="font-size: 20px;color: rgba(68,68,68,0.98)">Album</div>
                            </div>
                            <button type="button" class="btn" data-toggle="tooltip" data-placement="top"
                                title="Create new album">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 30px;height: 30px"><i class="fa fa-question text-white"></i></div>
                            </button>
                        </div>
                    </div>

                    <div class="steps">
                        <a href="{{route('release',$album->id)}}" class="steps__step text-dark">
                            @if($album->release)
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653"><i class=" fal fa-check"></i>
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Release</span>
                                <span>Completed</span>
                            </div>
                            @else
                                <div class="rounded-circle d-flex justify-content-center align-items-center"
                                     style="width: 40px;height: 40px; background-color: #f2d0d0"><i class=" fal fa-times"></i>
                                </div>
                                <div class="istatus">
                                    <span style="font-size: 20px">Release</span>
                                    <span>Incompleted</span>
                                </div>
                            @endif
                        </a>
                        <a href="{{route('audio',$album->id)}}" class="steps__step text-dark">
                            @if($album->audio)
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653"><i class=" fal fa-check"></i>
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Audio</span>
                                <span>Completed</span>
                            </div>
                            @else
                                <div class="rounded-circle d-flex justify-content-center align-items-center"
                                     style="width: 40px;height: 40px; background-color: #f2d0d0"><i class=" fal fa-times"></i>
                                </div>
                                <div class="istatus">
                                    <span style="font-size: 20px">Audio</span>
                                    <span>Incompleted</span>
                                </div>
                            @endif
                        </a>
                        <a href="{{route('artwork',$album->id)}}" class="steps__step text-dark">
                            @if($album->artwork)
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653"><i class=" fal fa-check"></i>
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Artwork</span>
                                <span>Completed</span>
                            </div>
                            @else
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                 style="width: 40px;height: 40px; background-color: #f2d0d0"><i class=" fal fa-times"></i>
                            </div>
                            <div class="istatus">
                                <span style="font-size: 20px">Artwork</span>
                                <span>Incompleted</span>
                            </div>
                            @endif
                        </a>
                        <a href="{{route('store',$album->id)}}" class="steps__step text-dark">
                            @if($album->store)
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                style="width: 40px;height: 40px; background-color: #219653"><i class=" fal fa-check"></i>
                            </div>
                            <div class="status">
                                <span style="font-size: 20px">Store</span>
                                <span>Completed</span>
                            </div>
                            @else
                            <div class="rounded-circle d-flex justify-content-center align-items-center"
                                 style="width: 40px;height: 40px; background-color: #f2d0d0"><i class=" fal fa-times"></i>
                            </div>
                            <div class="istatus">
                                <span style="font-size: 20px">Store</span>
                                <span>Incompleted</span>
                            </div>
                            @endif
                        </a>
                    </div>

                    <div class="album-details">
                        <div class="album-details__title">
                            <h6>Album Details</h6>
                            <div class="album-details__edit">
                                <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center"
                                    style="width: 25px;height: 25px"><i class="fas fa-pen"></i></div>
                                <span>Edit</span>
                            </div>
                        </div>
                        <div class="album-details__details">
                            <div class="left-part">
                                @if($album->artwork && $album->release && $album->store && $album->store)
                                @isset($release)
                                    <a class="img-containner" href="{{route('artwork',$album->id)}}">
                                      @isset($artwork)
                                        <img src="{{asset('storage/'.$artwork->image)}}" alt="song">
                                      @endisset
                                    </a>
                                    <div class="boxes-containner">
                                        <p>UPC: </p>
                                        <p>Title: {{$release->title}}</p>
                                        <p>Primary Genre: {{$release->p_genre}}</p>
                                        <p>Record Label: {{$release->record}}</p>
                                    </div>
                                @endisset
                                @endif
                            </div>
                            @isset($release)
                            <div class="right-part">
                                <div class="boxes-containner">
                                    <div class="py-2">© C Line: {{$release->c_year}} {{$release->c_license}}</div>
                                    <div class="py-2">℗ P Line: {{$release->r_year}} {{$release->r_license}}</div>
                                    <div class="py-2">Release Date: {{$release->original_release}}</div>
                                    <div class="py-2">Uploaded: {{$release->created_at}}</div>

                            </div>
                            @endisset
                        </div>
                    </div>

                    @if($album->release)

                    <div class="pricing">
                        <div class="pricing__free">
                            <p> <span class="red">Free</span> distribution model allows artists to upload their
                                music to The
                                World's
                                largest music
                                stores without having to pay upfront.
                            </p>
                            <p>Artists keep 85% of the royalties.</p>
                            <a href="/export_release/{{$album->id}}"><span>DISTRIBUTE FREE</span></a>
                        </div>
                        <div class="pricing__premium">
                            <p>Our <a href="#">Premium</a> Distribution model allows the artists to pay a
                                small fee upfront but <a href="#">keep 100% of
                                    the royalties.</a> </p>
                            <p>$37<span>/Year</span></p>
                            <a href="/payment_transaction/{{$album->user_id}}" class="btn" ><span>GO PREMIUM NOW</span></a>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>



@endsection
