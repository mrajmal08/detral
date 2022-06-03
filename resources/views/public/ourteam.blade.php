@extends('public.layout.app')

@section('content')
    <div class="text-center carousel-item d-block" style="min-height: 450px;background: url('images/our-team.jpg')">
        <div style="background-color: rgba(0,0,0,.7);">
            <h1 class="text-white p-5 " style="padding-top:  15rem!important;padding-bottom:  15rem!important;font-size: 80px;
          font-weight: 400;"><b>Meet Our Team</b>
            </h1>
        </div>
    </div>

    <div class="p-4">
        <div class="text-center">
            <p>
            <h5 style="color:#64709F;"> Here you will find people who are the reason behind our success and <br> who have
                transformed countless ideas into realities </h5>
            </p>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="tabbable-panel">
                    <div class="tabbable-line nav-center">
                        <ul class="nav nav-tabs nav-pills  ">
                            <li>
                                <a href="#tab_default_1" class="p-3 active" data-toggle="tab">
                                    Tech & Developers </a>
                            </li>
                            <li>
                                <a href="#tab_default_2" class="p-3" data-toggle="tab">
                                    Sales & Marketing </a>
                            </li>
                            <li>
                                <a href="#tab_default_3" class="p-3 " data-toggle="tab">
                                    Product & Design </a>
                            </li>
                        </ul>
                        <div class="tab-content pt-3">
                            <div class="tab-pane active" id="tab_default_1">
                                <p class="m-4">
                                <h4 class="text-primary">Tech & Developers</h4>
                                </p>
                                <p style="color: #7A7A7A">
                                    These folks make the designs come to real life they’re real tech-savvy and <br> always
                                    looking for the best possible solutions
                                </p>
                                <div class="row mt-4">

                                    @foreach ($developers as $item)
                                    <div class="col-md-4 mb-5">
                                        <img src="{{ asset('Admin/ourteam')."/".$item->image }}" alt=""
                                            style="width: 100%; height:365px">
                                        <h3 class="m-2 text-primary ">{{ $item->name }}</h3>
                                        <small>{{ $item->designation }}</small>
                                        <h4 class="m-1">{{ $item->university }}</h4>
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                            <div class="tab-pane" id="tab_default_2">
                                <p class="m-4">
                                <h4 class="text-primary">Sales & Marketing</h4>
                                </p>
                                <p style="color: #7A7A7A">
                                    These folks make the designs come to real life they’re real tech-savvy and <br> always
                                    looking for the best possible solutions
                                </p>
                                <div class="row mt-4">

                                    @foreach ($marketers as $item)
                                    <div class="col-md-4 mb-5">
                                        <img src="{{ asset('Admin/ourteam')."/".$item->image }}" alt=""
                                            style="width: 100%; height:365px">
                                        <h3 class="m-2 text-primary ">{{ $item->name }}</h3>
                                        <small>{{ $item->designation }}</small>
                                        <h4 class="m-1">{{ $item->university }}</h4>
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                            <div class="tab-pane" id="tab_default_3">
                                <p class="m-4">
                                <h4 class="text-primary">Product & Design</h4>
                                </p>
                                <p style="color: #7A7A7A">
                                    These folks make the designs come to real life they’re real tech-savvy and <br> always
                                    looking for the best possible solutions
                                </p>
                                <div class="row mt-4">

                                    @foreach ($designers as $item)
                                    <div class="col-md-4 mb-5">
                                        <img src="{{ asset('Admin/ourteam')."/".$item->image }}" alt=""
                                            style="width: 100%; height:365px">
                                        <h3 class="m-2 text-primary ">{{ $item->name }}</h3>
                                        <small>{{ $item->designation }}</small>
                                        <h4 class="m-1">{{ $item->university }}</h4>
                                    </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
