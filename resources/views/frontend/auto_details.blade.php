@extends('frontend.website.layout.app')
@php
$custom_title =
$inventory->title . ' For Sale $' . number_format(floatval($inventory->price)) . ' | bestdreamcar.com';

$custom_description =
'Used ' .
$inventory->title .
' for sale at ' .
$inventory->dealer_city .
' in' .
$inventory->dealer_state .
' for $ ' .
number_format(floatval($inventory->price)) .
' View now on bestdreamcar.com';
$custom_keyword =
$inventory->make . ', ' . $inventory->model . ', ' . $inventory->trim . ', ' . $inventory->body_formated;

$image_obj = $inventory->local_img_url;
$image_str = str_replace(['[', ' ', "'", ']'], '', $image_obj);
$images = explode(',', $image_str);
$image_src = asset('frontend/' . $images[0]);
$url_id =
route('home').
'/best-used-cars-for-sale'.
'/'.
'listing'.
'/'.
$inventory->vin.
'/'.
$inventory->year.
'-'.
$inventory->make.
'-'.
$inventory->model.
'-in-'.
$inventory->dealer->city.
'-'.
strtoupper($inventory->dealer->state);

// dd($url_id);
@endphp

@section('meta_description', $custom_description ?? app('globalSeo')['description'])
@section('meta_keyword', $custom_keyword ?? app('globalSeo')['keyword'])
@section('gtm')
{!! app('globalSeo')['gtm'] !!}
@endsection
@section('app_id', app('globalSeo')['app_id'])
@section('og_title', $custom_title)
@section('og_description', $custom_description)
@section('og_type', app('globalSeo')['og_type'])
@section('og_url', $url_id)
@section('og_site_name', app('globalSeo')['og_site_name'])
@section('og_locale', app('globalSeo')['og_locale'])
@section('twitter_card', app('globalSeo')['twitter_card'])
@section('twitter_title', $custom_title)
@section('twitter_description', $custom_description)
@section('twitter_site', app('globalSeo')['twitter_site'])
@section('twitter_creator', app('globalSeo')['twitter_creator'])
@section('twitter_image', $image_src)
{{-- @section('og_img', $image_src) --}}
@section('og_img', '')
@section('title', $custom_title)

@section('content')

<style>
    .swiper-bottom-img {

        width: 140px !important;
        height: 80px;
    }

    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-bottom-left-radius: 2px;
        border-bottom-right-radius: 2px;
    }



    .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-slide {
        background-size: cover;
        background-position: center;
    }

    .mySwiper2 {
        height: 80%;
        width: 100%;
    }

    .mySwiper {
        height: 20%;
        box-sizing: border-box;

    }

    .mySwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;

    }

    .deatailSwiper2 {
        height: 80%;
        width: 100%;
    }

    .deatailSwiper {
        height: 100%;
        box-sizing: border-box;
        padding: 5px 0;
    }

    .deatailSwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
    }

    .deatailSwiper .swiper-slide-thumb-active {
        opacity: 1;
    }

    /* .swiper-slide img {
                                  display: block;
                                  width: 100%;
                                  height: 100%;
                                  object-fit: cover;
                                } */
    .details-slider-top {
        display: block;
        width: 100%;
        height: 500px !important;
        object-fit: cover;
    }

    .swipter-top-img {
        display: block;
        width: 100%;
        object-fit: cover;
    }

    .swipter-top-img:hover .figer {
        color: red
    }

    /* @media (max-width: 1279px) {
        .swipter-top-img {
            height: 100% !important;
        }
    } */




    #social-links ul li {
        float: left;
        padding: 5px;

    }

    #social-links ul li a:hover {

        color: rgb(41, 34, 34)
    }

    #social-links ul li a {
        font-size: 15px;

    }

    #social-links ul li a:first-child {
        margin-left: 2px
    }

    .input-container {
        position: relative;
        display: inline-block;
    }

    .dollar-sign {
        position: absolute;
        left: 10px;
        top: 42%;
        transform: translateY(-38%);
        color: #8b8a8a;
        font-size: 15px;
    }

    .dollar-sign-price {
        position: absolute;
        left: 10px;
        top: 35.3%;
        transform: translateY(-38%);
        color: #8b8a8a;
        font-size: 15px;
    }

    .common_calculate {

        font-size: 13px;
        padding-left: 23px;


    }

    .calculate_month {
        width: 50px;
        height: 40px;
        text-align: center;
        border-radius: 5px;
        border: 1px solid gray;
    }

    .calculate_month:focus,
    .calculate_month.active {
        border: none;
        background-color: #222224;
        color: white;
        /* Light blue background when active */
    }

    .wishlist {
        background: #080e1b;
    }
</style>





<!--Breadcrumb-->
<div>
    <div style="height:10px !important;" class="bannerimg  deatails-breadcrumb">
        <div class="header-text mb-0">
            <div class="container">
                <div class="">

                    <ol class="breadcrumb">
                        <li style="color:black !important" class="breadcrumb-item brd"><a href="{{ route('home') }}"
                                style="color:black !important">Home</a></li>
                        <li class="breadcrumb-item brd"><a style="color:black !important"
                                href="{{ route('auto') }}">Cars
                                for Sale </a></li>
                        <li class="breadcrumb-item brd"><a style="color:black !important" href="javascript:void(0);">{{
                                $inventory->make }} </a></li>
                        <li class="breadcrumb-item brd"><a style="color:black !important" href="javascript:void(0);">{{
                                $inventory->model }} </a></li>
                        <li class="breadcrumb-item brd"><a style="color:black !important" href="javascript:void(0);">{{
                                $inventory->vin }} </a></li>
                    </ol>

                </div>
            </div>
        </div>
    </div>
</div>
<!--/Breadcrumb-->


<!--listing-->
<section style="margin-top:0; margin-bottom:45px;" class="deatails-card">
    <div class="container">
        <div class="item-det mb-4">

                <h3 style="font-weight:600" class="details-title mt-4">{{ $inventory->title }} - {{ $inventory->price_formate }}</h3>


            <div class=" details-extra-item">

                <p><i class="fa fa-car text-muted me-1 " title="Transmission"></i>{{ $inventory->formatted_transmission
                    ?? 'No transmission' }}
                    <img style="width:20px; height:20px; margin-top:-2px" class="ms-2 me-1" src="{{ asset('/frontend/assets/images/miles.png') }}" alt="miles" />{{ number_format($inventory->miles) .
                    ' miles' }}
                </p>

            </div>



        </div>
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12">


                <!--Classified Description-->
                <div class="card overflow-hidden">
                    <div style="background: rgb(255, 255, 255);" class="card-header w-100">
                        <div class="row  w-100 h-50 p-0 m-0 justify-content-between">
                            @php
                            $image_obj = $inventory->local_img_url;
                            $image_str = str_replace(['[', ' ', "'", ']'], '', $image_obj);
                            $images = explode(',', $image_str);
                            $count = count($images);

                            @endphp
                            <div class="col-xl-8 col-lg-7 col-md-8 col-sm-0 photo-collection">
                                <span class="photos mt-3"><i class="fa fa-image  icon-icon-photos me-2"></i>Photos({{
                                    $count }})</span>
                            </div>
                            <div style="text-align:center;" class="col-xl-4 col-lg-5 col-md-4 col-sm-12">

                                <a title="share" style="margin-right:40px ; font-size:15px; font-weight:500" href="#"
                                    class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><i class="fa fa-share-alt ms-3"></i></a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    {!! $shareButtons !!}

                                </div>




                                <a style="margin-right:40px; font-size:15px; font-weight:500" href="#" class="cpy"
                                    title="Copy Link" id="copyUrlButton"><i class="fa fa-copy icon-icon"></i>
                                </a>
                                @php
                                $countWishList = 0;
                                $favourites = session()->get('favourite', []); // Ensure default is an empty array

                                foreach ($favourites as $favorite) {
                                if (isset($favorite['id']) && $favorite['id'] == $inventory->id) {
                                $countWishList = 1;
                                break;
                                }
                                }
                                @endphp
                                <a title="favorite" style="background:none !important; margin-right:0px"
                                    href="javascript:void(0);" class="item-card9-icons1 wishlist"
                                    data-productid="{{ $inventory->id }}">
                                    @if ($countWishList > 0)
                                    <i class="fa fa-heart" style="color: red"></i>
                                    @else
                                    <i style="font-size:16px" title="favorite" class="fa fa fa-heart-o"></i>
                                    @endif

                                </a>

                            </div>
                        </div>
                    </div>




                    <div style="padding:0 !important" class="card-body">

                        <div class="product-slider">
                            <!-- Swiper for main slider -->
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                                class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    @php
                                    $image_obj = $inventory->local_img_url;
                                    $image_str = str_replace(['[', ' ', "'", ']'], '', $image_obj);
                                    $images = explode(',', $image_str);
                                    @endphp
                                    @foreach ($images as $image)
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#imageOpenModal" style="cursor:pointer">
                                            @if ($image_obj != '' && $image_obj != '[]')
                                            <img style="width:674px !important; margin:0 !important; height:500px"
                                                src="{{ asset('frontend/') }}/{{ $image }}"
                                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ $inventory->dealer->state }}, dealer name is {{ $inventory->dealer_name }} Best Dream car image"
                                                class="swipter-top-img" loading="lazy"
                                                onerror="this.onerror=null; this.src='{{ asset('frontend/NotFound.png') }}';">
                                            @elseif($image_obj == '[]')
                                            <img width="100%" src="{{ asset('frontend/NotFound.png') }}"
                                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ $inventory->dealer->state }}, dealer name is {{ $inventory->dealer_name }} Best Dream car image"
                                                class="">
                                            @else
                                            <img width="100%" src="{{ asset('frontend/NotFound.png') }}"
                                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ $inventory->dealer->state }}, dealer name is {{ $inventory->dealer_name }} Best Dream car image"
                                                class="">
                                            @endif
                                        </a>

                                    </div>
                                    @endforeach
                                </div>
                                <!-- Navigation buttons for the main slider -->

                                <div style="background:none" class="swiper-button-next"><i
                                        style="font-size:22px; font-weight:700" class="fa fa-angle-right "></i></div>
                                <div style="color:black" class="swiper-button-prev"><i
                                        style="font-size:22px; font-weight:700" class="fa fa-angle-left"></i></div>
                            </div>

                            <!-- Swiper for thumbnails -->
                            <div style="width:97%; margin:0 auto" class="row mt-2 mb-3">
                                <div style="" thumbsSlider="" class="swiper mySwiper">
                                    <div style="" class="swiper-wrapper">
                                        @php
                                        $image_obj = $inventory->local_img_url;
                                        $image_str = str_replace(['[', ' ', "'", ']'], '', $image_obj);
                                        $images = explode(',', $image_str);

                                        @endphp
                                        @foreach ($images as $image)
                                        <div class="swiper-slide">
                                            @if ($image_obj != '' && $image_obj != '[]')
                                            <img  class="me-2 br-3 swipper-bottom-image" src="{{ asset('frontend/') }}/{{ $image }}"
                                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ strtoupper($inventory->dealer->state) }}, dealer name is {{ $inventory->dealer->name }} Best Dream car image "
                                                loading="lazy"
                                                onerror="this.onerror=null; this.src='{{ asset('frontend/NotFound.png') }}';">
                                            @elseif ($image_obj == '[]')
                                            <img class="auto-ajax-photo" width="100%"
                                                src="{{ asset('frontend/NotFound.png') }}"
                                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ strtoupper($inventory->dealer->state) }}, dealer name is {{ $inventory->dealer->name }} Best Dream car image ">
                                            @else
                                            <img class="auto-ajax-photo" width="100%"
                                                src="{{ asset('frontend/NotFound.png') }}"
                                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ strtoupper($inventory->dealer->state) }}, dealer name is {{ $inventory->dealer->name }} Best Dream car image ">
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- Navigation buttons for the thumbnails -->

                                </div>
                            </div>

                        </div>





                    </div>

                </div>
                <div class="container mobile-price">
                    <div style=" margin-top: -10px;" class="row mb-2 ">



                        <div style=" border-top-left-radius: 7px !important; border-bottom-left-radius: 7px !important; background: white; border-right:1px solid gray; border-left:1px solid gray"
                            class="col-6">
                            <h4
                                style="margin-top: 15px; margin-left:25px; color:rgb(0, 0, 0); font-size:20px; font-weight:bold">
                                {{ $inventory->PriceFormate }}</h4>
                        </div>
                        <div style="border-left:1px solid gray;  border-right:1px solid gray; border-top-right-radius: 7px !important; border-bottom-right-radius: 7px !important; background: white; height:55px"
                            class="col-6">
                            <h4
                                style="margin-top: 15px; margin-left:25px; color:rgb(0, 0, 0); font-size:20px; font-weight:bold">
                                $370/ <span style="font-size:20px">{{ 'mo*' }}</h4>
                        </div>
                    </div>
                </div>









                <div class="details-info-card">
                    <div class="">
                        <div class="border-0">
                            <div class="wideget-user-tab wideget-user-tab3">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav">
                                            <li class=""><a href="#tab-1" class="active overview-btn"
                                                    data-bs-toggle="tab">Overview</a></li>

                                            <li><a href="#tab-4" data-bs-toggle="tab" class="v-info">More
                                                    Information</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content border br-ts-0 br-3 p-5 bg-white mb-4 over-view-card">
                                <div class="tab-pane active" id="tab-1">
                                    <h3 class="card-title mb-3 font-weight-semibold">Overview</h3>
                                    <div class="mb-4">
                                        <p>For an overview of the best cars and a comprehensive review, you might find
                                            bestdreamcar reviews particularly insightful. They offer a detailed look
                                            at the used vehicles, including first drive impressions, instrumented tests,
                                            comparison tests, and long-term evaluations. This ensures you get a
                                            well-rounded view of each vehicle's performance, comfort, and reliability.
                                        </p>

                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="row p-2">

                                                <div style="margin-left:-12px !important"
                                                    class="col-xs-12 col-md-6 col-sm-6">

                                                    <div style="display: flex; margin-bottom:6px" class="boxicons"
                                                        title="Vehicle Type">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/used.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Condition : {{ $inventory->type }}
                                                        </p>
                                                    </div>

                                                    <div style="display: flex; margin-bottom:6px" class="boxicons "
                                                        title="Fuel">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/g.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Fuel Type : {{ $inventory->fuel }}
                                                        </p>
                                                    </div>
                                                    <div style="display: flex; margin-bottom:6px" class="boxicons"
                                                        title="Mileage">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/miles.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Mileage :
                                                            {{ number_format($inventory->miles) }} miles
                                                        </p>
                                                    </div>
                                                    <div style="display: flex; margin-bottom:6px " class="boxicons"
                                                        title="Drive Train ">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/drive.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Drive Train :
                                                            {{ $inventory->drive_info }}</p>
                                                    </div>

                                                    <div style="display: flex; margin-bottom:6px" class="boxicons"
                                                        title="Year">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/calendar.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Year : {{ $inventory->year }}</p>
                                                    </div>


                                                </div>

                                                <div style="margin-left:-12px" class="col-xs-12 col-md-6  col-sm-6 ">
                                                    <div style="display: flex; margin-bottom:6px" class="boxicons"
                                                        title="Model">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/model.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Model : {{ $inventory->model }}</p>
                                                    </div>
                                                    <div style="display: flex; margin-bottom:6px" class="boxicons"
                                                        title="Exterior Color ">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/art.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Exterior-color :
                                                            {{ $inventory->exterior_color }}</p>
                                                    </div>
                                                    <div style="display: flex; margin-bottom:6px" class="boxicons"
                                                        title="Transmission">
                                                        <i style="color:rgb(212, 9, 185); font-size:25px; font-weight:500"
                                                            class="flaticon-gearshift transmission icon-auto"></i>
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/transmission.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Transmission :
                                                            {{ $inventory->formatted_transmission }}</p>
                                                    </div>

                                                    <div style="display: flex; margin-bottom:6px" class="boxicons"
                                                        title="Engine">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/engine.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Engine
                                                            : {{ $inventory->engine_details }}
                                                        </p>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab-4">
                                    <h3 class="card-title mb-3 font-weight-semibold">Vehicle Information</h3>
                                    <div class="mb-4">
                                        <p>The {{ $inventory->title }} led the premium cars category, while the Ford
                                            Mustang Dark Horse was celebrated for its thrilling performance and
                                            handling​. These vehicles exemplify the advancements and variety available
                                            in the automotive market this year.</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="row p-2">

                                                <div style="margin-left:-12px !important"
                                                    class="col-xs-12 col-md-6 col-sm-6">

                                                    <div style="display: flex; margin-bottom:6px" class="boxicons"
                                                        title="Vehicle Type">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/b.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Body : {{ $inventory->body_formated
                                                            }}
                                                        </p>
                                                    </div>

                                                    <div style="display: flex; margin-bottom:6px" class="boxicons "
                                                        title="Fuel">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/t.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Trim : {{ $inventory->trim }}
                                                        </p>
                                                    </div>



                                                </div>

                                                <div style="margin-left:-12px" class="col-xs-12 col-md-6  col-sm-6 ">
                                                    <div style="display: flex; margin-bottom:6px" class="boxicons"
                                                        title="Model">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/model.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Make : {{ $inventory->make }}</p>
                                                    </div>
                                                    <div style="display: flex; margin-bottom:6px" class="boxicons"
                                                        title="Exterior Color ">
                                                        <img style="width:40px; height:40px; border:0.5px solid gray; border-radius:50%; padding:6px"
                                                            src="{{ asset('/frontend/assets/images/gas.png') }}" />
                                                        <p style="color:black; margin-left:10px; font-weight:600; margin-top:11px"
                                                            class="auto-icon-para">Mpg City :
                                                            {{ $inventory->mpg_city }}</p>
                                                    </div>


                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-lg-6">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-top">
                                                    <tbody>
                                                        <tr>
                                                            <td>Make</td>
                                                            <td>{{ $inventory->make }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td>Body</td>
                                                            <td>{{ $inventory->body_formated }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Trim</td>
                                                            <td>{{ $inventory->trim }}</td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="table-responsive">
                                                <table class="table table-bordered border-top mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>MPG City</td>
                                                            <td>{{ $inventory->mpg_city }} Miles</td>
                                                        </tr>
                                                        <tr>
                                                            <td>MPG Highway</td>
                                                            <td>{{ $inventory->mpg_highway }} Miles</td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="tab-pane" id="tab-5">
                                    <ul class="list-unstyled video-list-thumbs row ">
                                        <li class="mb-0">
                                            <a data-bs-toggle="modal" data-bs-target="#homeVideo">
                                                <img src="{{ 'frontend' }}/assets/images/products/cars/v1.jpg"
                                                    alt="Barca" class="img-responsive w-100 br-3">
                                                <span class="mdi mdi-arrow-right-drop-circle-outline text-white"></span>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Classified Description-->



                <div style="background:#e0f8f3 " class="card mt-2">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 p-2">

                                <h4 style="margin-top:-7px; margin-bottom:29px; font-size:20px">Get access to more
                                    features</h4>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <p style="font-size:15px"><i style="color:#313131; font-size:18px"
                                                class="fa fa-unlock me-2"></i>Unlock dealer pricing</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <p style="font-size:15px"><i style="color:#313131; font-size:18px"
                                                class="fa fa-percent me-2"></i>Calculate taxes and fees</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <p style="font-size:15px"><i style="color:#313131; font-size:18px"
                                                class="fa fa-calculator me-2"></i>Customize your payments</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <p style="font-size:15px"><i style="color:#313131; font-size:18px"
                                                class="fa fa-car me-2"></i>See more feature</p>
                                    </div>

                                    <h4 style="margin-top: 19px; margin-bottom:7px; font-size:20px">
                                        {{ $inventory->price_formate }}</h4>
                                    <p class="mb-5">List price w/o taxes & fees</p>


                                </div>
                                @if (!auth()->user())
                                <!-- <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            style="background: black; border:1px solid black; padding: 9px 40px; border-radius:22px; color:white">Sign
                                            in or register</button> -->
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">



                    </div>
                </div>
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 p-2">



                                <h4 style="margin-bottom: 12px; margin-top:-8px">Seller description</h4>

                                @php
                                $description_data = substr($inventory->dealer_comment, 0, 520);
                                $lest_data = substr($inventory->dealer_comment, 520);

                                @endphp

                                @if($inventory->dealer_comment)
                                <p>{{ $description_data }} <span id="text_data" style="display: none;">{{ $lest_data
                                        }}</span></p>
                                <a id="show-more-button" onclick="truncateText()"
                                    style="float:right; color:rgb(14, 87, 223)"><u>Show more</u></a>
                                @else
                                <p style="text-align:center; margin-top:65px; font-size:17px; margin-bottom:65px">No
                                    Seller Description</p>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">



                    </div>
                </div>

                @if($relateds->count() > 1)
                <h3 class="mb-5 mt-6">Recommended For You</h3>
                @endif
               

                <!--Related Posts-->
                <div id="myCarousel5" class="owl-carousel owl-carousel-icons3">
                    @forelse ($relateds as $item)
                    <div class="item">
                        <div style="background: rgb(255, 255, 255);
                            background: linear-gradient(0deg, rgb(232, 245, 243) 0%, rgb(255, 255, 255) 100%);"
                            class="card mb-0">
                            <div class="power-ribbon power-ribbon-top-left text-warning">
                                <span class="bg-warning"><i class="fa fa-bolt"></i></span>
                            </div>

                            @php
                            $image_obj = $item->local_img_url;
                            $images = explode(',', $item->local_img_url);
                            $image = trim(str_replace(['[', "'"], '', $images[0]));
                            $vin_string_replace = str_replace(' ', '', $item->vin);
                            $route_string = str_replace(
                            ' ',
                            '',
                            $item->year .
                            '-' .
                            $item->make .
                            '-' .
                            $item->model .
                            '-in-' .
                            $item->dealer->city .
                            '-' .
                            $item->dealer->state,
                            );
                            @endphp

                            <div class="item-card2-img">

                                @if ($image_obj != '' && $image_obj != '[]')
                                <a class="link"
                                    href="{{ route('auto.details', ['vin' => $vin_string_replace, 'param' => $route_string]) }}"></a>
                                <img src="{{ asset('frontend/' . $image) }}" alt="img"
                                    style="" class="auto-ajax-photo-details" loading="lazy"
                                    onerror="this.onerror=null; this.src='{{ asset('frontend/NotFound.png') }}';">
                                @else
                                <img src="{{ asset('frontend/found/NotFound.png') }}" width="100%" alt="img"
                                    style="" class="auto-ajax-photo-details-not-found">
                                @endif
                            </div>

                            <div class="item-card2-icons">
                                @php
                                $countWishList = 0;
                                $favourites = session()->get('favourite', []); // Ensure default is an empty array

                                foreach ($favourites as $favorite) {
                                if (isset($favorite['id']) && $favorite['id'] == $item->id) {
                                $countWishList = 1;
                                break;
                                }
                                }
                                @endphp
                                <div style="margin-top:-20px; margin-left:28px" class="item-card9-icons">
                                    <a href="javascript:void(0);" class="item-card9-icons1 wishlist"
                                        data-productid="{{ $item->id }}">
                                        @if ($countWishList > 0)
                                        <i class="fa fa-heart" style="color: red"></i>
                                        @else
                                        <i class="fa fa-heart-o"></i>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="card-body pb-4">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <div class="item-card2-text">
                                            @php
                                            $title = Str::limit($item->title, 25, '...');
                                            @endphp
                                            <a href="{{ route('auto.details', ['vin' => $vin_string_replace, 'param' => $route_string]) }}"
                                                class="text-dark">
                                                <h4 style="font-weight:600" class="mb-0" title="{{ $item->title }}">
                                                    {{ $title }}</h4>
                                            </a>
                                        </div>
                                        <div class="item-card9-desc mb-0 mt-1">
                                            @php
                                            $transmission = substr($item->formatted_transmission, 0, 25);
                                            @endphp
                                            <p href="javascript:void(0);" class="me-4 d-inline-block mb-0"><span class=""> {{
                                                    $transmission }}</span></p>
                                            <p class="mb-1" style="margin:0">
                                                @if (in_array($item->type, ['Preowned', 'Certified Preowned']))
                                                Used
                                                @else
                                                {{ $item->type }}
                                                @endif
                                            </p>
                                            {{-- <a href="javascript:void(0);" class="me-4 d-inline-block"><span
                                                    class=""><i class="fa fa-calendar-o text-muted me-1"></i>
                                                    {{($inventory->created_at)->diffForHumans()}}</span></a> --}}
                                        </div>
                                        <div style="height: 25px" class="d-flex mb-1">
                                            <h4 class="me-3" style="font-weight:600">
                                                {{ $item->price_formate }}</h4>
                                            <p style="color:black; font-weight:600; font-size:12px; margin-top:2px">
                                                ${{ number_format($item->payment_price) }}/mo*</p>
                                        </div>
                                        <div>
                                            <p  class="d-flex mb-1">
                                                <img class="me-1" style="width:21px; height:21px; margin-top:0px"
                                        src="{{ asset('/frontend/assets/images/miles.png') }}" />
                                        {{ number_format($item->miles) . ' miles'
                                                    }}
                                            </p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="card-footer pe-4 ps-4 pt-4 pb-4">


                                <div class="item-card9-footer d-flex">
                                    <i style="color:black !important" class="fa fa-map-marker text-muted me-1"></i>
                                    @php
                                    $cus_dealer = explode(' in ', $item->dealer->name)[0];
                                    $nameLength = strlen($cus_dealer);
                                    $name = Str::substr($cus_dealer, 0, 25);
                                    @endphp

                                    @if ($nameLength <= '25' ) <h5 class="dealer-add" style="color:black">{{ $cus_dealer
                                        }}
                                        <br>
                                        <span style="font-size:14px">{{ $inventory->dealer->city }},
                                            {{ strtoupper($inventory->dealer->state) }}
                                            {{ $item->zip_code }}

                                            @if (isset($item->distance) && $item->distance > 0.9)
                                            <span>
                                                ({{ round($item->distance, 0) }} mi. away)
                                            </span>
                                            @endif
                                        </span>
                                        </h5>
                                        @else
                                        <h5 title="{{ $cus_dealer }}" class="dealer-add" style="color:black">
                                            {{ $name }}...
                                            <br>
                                            <span style="font-size:14px">{{ $inventory->dealer->city }},
                                                {{ strtoupper($inventory->dealer->state) }}
                                                {{ $item->zip_code }}

                                                @if (isset($item->distance) && $item->distance > 0.9)
                                                <span>
                                                    ({{ round($item->distance, 0) }} mi. away)
                                                </span>
                                                @endif
                                            </span>
                                        </h5>
                                        @endif




                                </div>

                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>


                <!--/Related Posts-->
            </div>




            <!--Right Side Content-->
            <div class="col-xl-5 col-lg-5 col-md-12">
                <div class="card">

                    <div style="background: rgb(139, 99, 146); border-radius-top-left:3px;border-radius-top-right:3px; "
                        class="card-body dealer-details">
                        <div class="profile-pic mb-0">
                            {{-- <img src="{{ asset('frontend/assets/images/ex.png') }}" class="brround avatar-xxl"
                                alt="user"> --}}
                            <div>
                                <a href="#" class="text-dark">
                                    <h4 style="color:#f8f3f3" class="mt-3 mb-1  font-weight-semibold">
                                        {{ explode(' in ', $inventory->dealer->name)[0] }}</h4>
                                </a>

                                <span style="color:#e9e6e6" class=" ">{{ $inventory->dealer->city }},
                                    {{ strtoupper($inventory->dealer->state) }}
                                    {{ $inventory->zip_code }}</span>

                            </div>
                        </div>
                    </div>
                    <div style="background: rgb(228, 228, 235);"
                        class="card-body item-user auto-deatails-message-option">
                        <h4 class="mb-4">Message Seller</h4>
                        <div class="row p-1">
                            <div style="border-radius:6px; box-shadow: rgba(100, 100, 111, 0.2) 0px 4px 7px 0px;"
                                class="col-md-12 p-2 bg-white">
                                <form id="SendLeaddetails" style=" border-radius:5px">
                                    @csrf
                                    <input type="hidden" id="inventory_id" name="inventories_id"
                                        value="{{ $inventory->id }}">
                                    <input type="hidden" id="dealer_id" name="dealer_id"
                                        value="{{ $inventory->user_id }}">

                                    <div class="">


                                        <div class="row p-2">
                                            <div class="col-md-6 col-sm-6 col-xs-12 " style="margin-top:20px">
                                                <div class="form-group ">

                                                    <input
                                                        style="border-radius:5px; border:1px solid rgb(189, 188, 188)"
                                                        placeholder="First Name*" class="form-control fname" type="text"
                                                        id="first_name" name="first_name"
                                                        value="{{Auth()->check() ? Auth()->user()->fname : ''}}">
                                                    <span id="first_name_error" class="text-danger" role="alert"></span>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 " style="margin-top:20px">
                                                <div class="form-group ">

                                                    <input
                                                        style="border-radius:5px; border:1px solid rgb(189, 188, 188)"
                                                        placeholder="Last Name*" class="form-control lname" type="text"
                                                        id="last_name" name="last_name"
                                                        value="{{Auth()->check() ? Auth()->user()->lname : ''}}">

                                                    <span id="last_name_error" class="text-danger" role="alert"></span>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                <div class="form-group ">

                                                    <input
                                                        style="border-radius:5px; border:1px solid rgb(189, 188, 188)"
                                                        placeholder="E-mail*" class="form-control email" type="text"
                                                        id="email" name="email"
                                                        value="{{Auth()->check() ? Auth()->user()->email : ''}}">

                                                    <span id="email_error" class="text-danger" role="alert"></span>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                <div class="form-group ">

                                                    <input
                                                        style="border-radius:5px; border:1px solid rgb(189, 188, 188)"
                                                        class="form-control phone telephoneInput" type="text"
                                                        placeholder="cell" id="phone" name="phone"
                                                        value="{{Auth()->check() ? Auth()->user()->phone : ''}}">

                                                    <span id="phone_error" class="text-danger" role="alert"></span>

                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                <div class="form-group ">
                                                    <textarea
                                                        style="border-radius:5px; border:1px solid rgb(189, 188, 188)"
                                                        id="w3review" class="form-control description"
                                                        name="description" rows="6" cols="55">I am interested and want to know more about the {{ $inventory->title }}, you have listed for {{ $inventory->price_formate }}  on Best Dream car.
                                                                                </textarea>

                                                    <span id="description_error" class="text-danger"
                                                        role="alert"></span>

                                                </div>

                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                <div class="form-group ">
                                                    <p
                                                        style="color:rgb(67, 68, 68); font-weight:600; margin-bottom:15px; margin-top:10px">
                                                        <span class="text-black">*</span> Security Question (Enter the
                                                        Correct answer)
                                                    </p>

                                                    <div style="display: flex">
                                                        <div id="captchaLabel"
                                                            style="background-color:white; width:50%;  margin-right:10px; text-align:center; padding-top:7px; font-weight:600;  margin-top:2px; margin-left:3px; height:35px; border-radius:5px; border:1px solid rgb(189, 188, 188)">
                                                            {{ app('mathcaptcha')->label() }}
                                                        </div>
                                                        <div>
                                                            <input
                                                                class="form-control @error('mathcaptcha') is-invalid @enderror"
                                                                type="text" name="mathcaptcha"
                                                                placeholder="Enter your result">
                                                            <span id="Wmathcaptcha" class="text-danger" role="alert">
                                                                @error('mathcaptcha')
                                                                {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>




                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                <div class="form-group ">
                                                    <p style="color: rgb(27, 26, 26)"><input type="checkbox"
                                                            name="ask_trade" id="tradeChecked" style="cursor: pointer">
                                                        <label for="tradeChecked" style="cursor: pointer">Do you have a
                                                            trade-in?</label>
                                                    </p>

                                                </div>

                                            </div>



                                            <div class="row p-0 m-0"
                                                style="margin-left: 0px; margin-right:0px; display:none;"
                                                id="Mobile_Trade_block_content">


                                                <div class="row p-0 m-0">

                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group ">

                                                            <input style="border-radius:5px" placeholder="Year*"
                                                                class="form-control year_trade" type="text" name="year"
                                                                value="">



                                                            </span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                        <div class="form-group ">

                                                            <input style="border-radius:5px" placeholder="Make*"
                                                                class="form-control make_trade" type="text" name="make"
                                                                value="">

                                                            <span class="invalid-feedback7 text-danger" role="alert">

                                                            </span>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                        <div class="form-group ">

                                                            <input style="border-radius:5px" placeholder="Model*"
                                                                class="form-control model_trade" type="text"
                                                                name="model" value="">

                                                            <span class="invalid-feedback8 text-danger"
                                                                role="alert"></span>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                        <div class="form-group ">

                                                            <input style="border-radius:5px" placeholder="Mileage*"
                                                                class="form-control mileage" type="text" name="mileage"
                                                                value="">

                                                            <span class="invalid-feedback9 text-danger" role="alert">

                                                            </span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                        <div class="form-group ">

                                                            <input style="border-radius:5px" placeholder="Color*"
                                                                class="form-control color" type="text" name="color"
                                                                value="">

                                                            <span class="invalid-feedback10 text-danger" role="alert">
                                                            </span>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                        <div class="form-group ">
                                                            <input style="border-radius:5px"
                                                                placeholder="VIN (optional)" class="form-control vin"
                                                                type="text" name="vin" value="">

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                                <div class="form-group ">
                                                    <p style="color: rgb(77, 74, 74)"><input type="checkbox"
                                                            class="isEmailSend" name="isEmailSend"
                                                            style="cursor: pointer" checked> Email
                                                        me
                                                        price
                                                        drops for this vehicle </p>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                                            <div class="form-group">

                                                <button
                                                    style="background: darkcyan; width:100%; margin-bottom:15px; color:white; font-size:16px;"
                                                    type="submit" class="btn loading" id="submitBtn">Send
                                                    Message</button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Form -->
                                <p
                                    style="font-size: 12px; line-height: 11px; color: #999; margin-top: 5px;text-align:justify">
                                    By clicking "SEND EMAIL", I
                                    consent to be contacted by Best Dream car.com and the dealer selling
                                    this car at any telephone number I provide, including, without
                                    limitation, communications sent via text message to my cell
                                    phone or communications sent using an autodialer or prerecorded
                                    message. This acknowledgment constitutes my written consent to
                                    receive such communications. I have read and agree to the Terms
                                    and Conditions of Use and Privacy Policy of dbc.com. This
                                    site is protected by reCAPTCHA and the Google Privacy Policy and
                                    Terms of Service apply.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div style="background: rgb(228, 228, 235);" class="card-body item-user">
                        <h4 class="mb-4">Financing Calculator</h4>
                        <div class="row p-0">
                            <div style="border-radius:6px; box-shadow: rgba(100, 100, 111, 0.2) 0px 4px 7px 0px;"
                                class="col-md-12 p-0 bg-white">

                                <div style="background: white; height:auto;" class="widget">

                                    <div
                                        style="border:1px solid rgb(43, 69, 73); border-radius: 5px 5px 0 0; width:100%; background: rgb(126, 87, 133); padding:0">
                                        @php
                                        $down_paym = ($inventory->price * 10) / 100;
                                        $loan_amount = $inventory->price - ($inventory->price * 10) / 100;
                                        @endphp
                                        <p
                                            style="font-size:19px; display:block; text-align:center; color:rgb(241, 240, 240); margin-top:8px">
                                            <small>Estimated Monthly Payment</small>
                                        </p>
                                        <h2 style="display:block; text-align:center; color:white; font-weight:500">
                                            $<span class="ms-1" id="monthly_pay">{{
                                                number_format($inventory->payment_price) }}</span>
                                        </h2>
                                        <p class="p-0 m-0"
                                            style="font-size:16px; display:block; text-align:center; color:rgb(235, 231, 231)"
                                            id="loan_amount"><small>Total Loan Amount:
                                                ${{ number_format($loan_amount) }}
                                            </small></p>
                                        <p
                                            style="font-size:15px; display:block; text-align:center; color:rgb(235, 231, 231)">
                                            <small>*Est. on 10% down & good credit </small>
                                        </p>
                                    </div>
                                    <div class="widget-content ">
                                        <div class="finance-calculator">
                                            <ul>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                    <div class="row">

                                                        <div class=" col-lg-6 col-sm-6 col-md-6">
                                                            <label style="margin-top:15px">Credit Score</label>
                                                            <select class="common_calculate form-control mb-2"
                                                                id="credit_calculate">
                                                                <option value="rebuild">Rebuilding (0-620)</option>
                                                                <option value="fair">Fair (621-699)</option>
                                                                <option value="good" selected>Good (700-759)</option>
                                                                <option value="excellent">Excellent (760+)</option>
                                                            </select>
                                                        </div>
                                                        <div class=" col-lg-6 col-sm-6 col-md-6">
                                                            <label style="margin-top:15px">Vehicle Price</label>
                                                            <div style="width:100%" class="input-container">
                                                                <span class="dollar-sign-price">$</span>
                                                                <input type="text"
                                                                    class="form-control common_calculate  mb-2"
                                                                    placeholder="Enter a vehicle price"
                                                                    value="{{ $inventory->price }}"
                                                                    id="price_calculate">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                    <div class="row">
                                                        <div class=" col-lg-6 col-sm-6 col-md-6">
                                                            <label style="margin-top:15px">Interest Rate (APR)
                                                                %</label>
                                                            <input type="text"
                                                                class="form-control common_calculate mb-2"
                                                                placeholder="Enter an interest rate" value="5.82"
                                                                id="calculate_interest">
                                                        </div>

                                                        <div class=" col-lg-6 col-sm-6 col-md-6">
                                                            <label style="margin-top:15px">Down Payment</label>
                                                            <div style="width:100%" class="input-container">
                                                                <span class="dollar-sign">$</span>
                                                                <input type="text" class="form-control common_calculate"
                                                                    placeholder="Enter a down payment"
                                                                    id="calculate_downpayment" value="{{ $down_paym }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>


                                                <ul class="finance-radio-list">
                                                    <label style="margin-top: 20px; margin-left:15px">Period
                                                        month:</label>
                                                    <div class="d-flex flex-wrap mt-3 ms-2">
                                                        <div class="p-2 monthly-package">
                                                            <li>
                                                                <input
                                                                    style="width:69px; height:45px; text-align:center; border-radius:5px; border:1px solid gray; cursor:pointer"
                                                                    type="text" value="36" class="calculate_month"
                                                                    id="36" readonly />
                                                            </li>
                                                        </div>
                                                        <div class="p-2 monthly-package">
                                                            <li>
                                                                <input
                                                                    style="width:69px; height:45px; text-align:center; border-radius:5px; border:1px solid gray; cursor:pointer"
                                                                    type="text" value="48" class="calculate_month"
                                                                    id="48" readonly />
                                                            </li>
                                                        </div>
                                                        <div class="p-2 monthly-package">
                                                            <li>
                                                                <input
                                                                    style="width:69px; height:45px; text-align:center; border-radius:5px; border:1px solid gray; cursor:pointer"
                                                                    type="text" value="60" class="calculate_month"
                                                                    id="60" readonly />
                                                            </li>
                                                        </div>
                                                        <div class="p-2 monthly-package">
                                                            <li>
                                                                <input
                                                                    style="width:69px; height:45px; text-align:center; border-radius:5px; border:1px solid gray; cursor:pointer"
                                                                    type="text" value="72"
                                                                    class="calculate_month active" id="72" readonly />
                                                            </li>
                                                        </div>
                                                        <div class="p-2 monthly-package">
                                                            <li>
                                                                <input
                                                                    style="width:69px; height:45px; text-align:center; border-radius:5px; border:1px solid gray; cursor:pointer"
                                                                    type="text" value="84" class="calculate_month"
                                                                    id="84" readonly />
                                                            </li>
                                                        </div>
                                                    </div>
                                                </ul>

                                                {{-- <li style="height:auto;"
                                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="auto-field">
                                                        <button
                                                            style="background:rgb(68, 29, 70); width:100%; margin-bottom:15px; color:white; font-size:15px; margin-top:15px; padding-top:8px; padding-bottom:8px;"
                                                            class="btn btn-theme btn-sm margin-bottom-20 common_calculate"
                                                            type="submit" value="Calculate">Calculate</button>
                                                    </div>
                                                </li> --}}
                                                <p
                                                    style="padding:14px; text-align:justify; font-size:12px; margin-top:12px">
                                                    *This calculation is an estimate only. We’ve estimated your taxes
                                                    based on your provided ZIP code. Title, other fees, and incentives
                                                    are not included. Monthly payment estimates are for informational
                                                    purposes and do not represent a financing offer from the seller of
                                                    this vehicle. Other taxes may apply.</p>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Other vehicles from this seller</h3>
                    </div>
                    <div class="card-body">
                        <div class="rated-products">
                            <ul class="vertical-scroll">
                                @forelse ($relateds as $latest)
                                <li class="item">
                                    <div class="media m-0 mt-0 p-1">
                                        @php
                                        $imageArray = explode(',', $latest->local_img_url);
                                        $image = str_replace(['[', ' ', "'", ']'], '', $imageArray[0]);

                                        @endphp
                                        @php
                                        $image_obj = $latest->local_img_url;
                                        $image_splice = explode(',', $image_obj);
                                        $image = str_replace(['[', ' ', "'", ']'], '', $image_splice[0]);

                                        $vin_string_replace = str_replace(' ', '', $latest->vin);
                                        $route_string = str_replace(
                                        ' ',
                                        '',
                                        $latest->year .
                                        '-' .
                                        $latest->make .
                                        '-' .
                                        $latest->model .
                                        '-in-' .
                                        $latest->dealer->city .
                                        '-' .
                                        strtoupper($latest->dealer->state),
                                        );
                                        @endphp

                                        <a
                                            href="{{ route('auto.details', ['vin' => $vin_string_replace, 'param' => $route_string]) }}">

                                            @if ($image_obj != '' && $image_obj != '[]')
                                            <img class="me-2 br-3 tending-img"
                                                src="{{ asset('frontend/') }}/{{ $image }}"
                                                alt="Used cars for sale {{ $latest->title }}, price is {{ $latest->price }}, vin {{ $latest->vin }} in {{ $latest->dealer->city }},{{ $latest->dealer->state }}, dealer name is {{ $latest->dealer_name }} Best Dream car image "
                                                loading="lazy"
                                                onerror="this.onerror=null; this.src='{{ asset('frontend/NotFound.png') }}';">
                                            @elseif ($image_obj == '[]')
                                            <img class="auto-ajax-photo" width="100%"
                                                src="{{ asset('frontend/NotFound.png') }}"
                                                alt="Used cars for sale {{ $latest->title }}, price is {{ $latest->price }}, vin {{ $latest->vin }} in {{ $latest->dealer->city }},{{ $latest->dealer->state }}, dealer name is {{ $latest->dealer_name }} Best Dream car image ">
                                            @else
                                            <img class="auto-ajax-photo" width="100%"
                                                src="{{ asset('frontend/NotFound.png') }}"
                                                alt="Used cars for sale {{ $latest->title }}, price is {{ $latest->price }}, vin {{ $latest->vin }} in {{ $latest->dealer->city }},{{ $latest->dealer->state }}, dealer name is {{ $latest->dealer_name }} Best Dream car image ">
                                            @endif

                                        </a>
                                        @php
                                            $title = Str::limit($latest->title, 18, '...')
                                        @endphp
                                        <div class="media-body">

                                            <a
                                                href="{{ route('auto.details', ['vin' => $vin_string_replace, 'param' => $route_string]) }}">
                                                <h4 style="font-weight:600" class="mt-2 mb-1 related-listing-title fs-16">{{ $title }}
                                                </h4>
                                            </a>
                                            <p style="margin:0">
                                                @if (in_array($latest->type, ['Preowned', 'Certified Preowned']))
                                                Used
                                                @else
                                                {{ $latest->type }}
                                                @endif
                                            </p>

                                            <div style="height: 25px" class="d-flex">
                                                <h5 class="me-3 mt-2" style="font-weight:600">
                                                    {{ $latest->price_formate }}
                                                </h5>
                                                <p style="color:black; font-weight:600; font-size:11px; margin-top:9px">
                                                    ${{ number_format($latest->payment_price) }}/mo*</p>
                                            </div>

                                            {{-- <div class="h4 mb-0 font-weight-semibold mt-2 related-car-price">
                                                {{ $latest->price_formate }}</div> --}}
                                            <div class=" mb-0 font-weight-semibold mt-2">
                                                {{ number_format($latest->miles) . ' miles' }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <p style="text-align:center">No Related Seller Ads</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/Right Side Content-->
            </div>
        </div>
</section>

{{-- mobile filter modal start --}}

<div class="modal fade" id="MobileFilterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Message Seller</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @php
                $user = auth()->user();
                @endphp
                <div class="row">
                    <div class="col-md-12 p-2">
                        <form id="SendLeadweb" style="background-color: #d6d6d6">
                            @csrf
                            <div class="">
                                <div class="row p-2">
                                    <div class="col-md-6 col-sm-6 col-xs-12 " style="margin-top:20px">
                                        <div class="form-group ">
                                            <input type="hidden" id="inventory_id" name="inventories_id"
                                                value="{{ $inventory->id }}">

                                            <input style="border-radius:5px; color:black" placeholder="First Name*"
                                                class="form-control fname" type="text" name="first_name"
                                                value="{{ $user ? $user->fname : old('first_name') }}">
                                            <span id="f_name_error" class="text-danger" role="alert"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 second-name" style="margin-top:20px">
                                        <div class="form-group ">
                                            <input style="border-radius:5px; color:black" placeholder="Last Name*"
                                                class="form-control lname" type="text" name="last_name"
                                                value="{{ $user ? $user->lname : old('last_name') }}">
                                            <span id="l_name_error" class="text-danger" role="alert"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                        <div class="form-group ">
                                            <input style="border-radius:5px; color:black" placeholder="E-mail*"
                                                class="form-control email" type="text" name="email"
                                                value="{{ $user ? $user->email : old('email') }}">
                                            <span id="e_error" class="text-danger" role="alert"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                        <div class="form-group ">
                                            <input style="border-radius:5px; color:black"
                                                class="form-control phone telephoneInput" type="text" placeholder="cell"
                                                name="phone" value="{{ $user ? $user->phone : old('phone') }}">
                                            <span id="p_error" class="text-danger" role="alert"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                                        <div class="form-group ">
                                            <textarea style="border-radius:5px; color:black" id="w3review"
                                                class="form-control description" name="description" rows="6" cols="55">I am interested and want to know more about the {{ $inventory->title }}, you have listed for {{ $inventory->price_formate }}  on Best Dream car.
                                                            </textarea>

                                            <span id="description_error" class="text-danger" role="alert"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                                        <div class="form-group ">
                                            <p
                                                style="color:rgb(168, 11, 155); font-weight:bold; margin-bottom:15px; margin-top:10px">
                                                <span class="text-danger">*</span> Security Question (Enter the Correct
                                                answer)
                                            </p>


                                            <div style="display: flex">
                                                <div id="captchaLabelDetailsMob"
                                                    style="background-color:white; width:50%;  margin-right:10px; text-align:center; padding-top:7px; font-weight:600;  margin-top:2px; margin-left:3px; height:35px; border-radius:5px; border:1px solid rgb(189, 188, 188)">
                                                    {{ app('mathcaptcha')->label() }}
                                                </div>
                                                <div>
                                                    <input id="captchaInput"
                                                        class="form-control @error('mathcaptcha') is-invalid @enderror"
                                                        type="text" name="mathcaptcha" placeholder="Enter your result">
                                                    <span id="Mmathcaptcha" class="text-danger" role="alert">
                                                        @error('mathcaptcha')
                                                        {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                                        <div class="form-group ">
                                            <p style="color: black"><input type="checkbox" name="ask_trade"
                                                    id="tradeCheckedModal" style="cursor: pointer"> <label
                                                    for="tradeCheckedModal" style="cursor: pointer"> Do you have a
                                                    trade-in?</label></p>
                                        </div>
                                    </div>
                                    <div class="row p-0 m-0" style="margin-left: 0px; margin-right:0px; display:none"
                                        id="Auto_Trade_block_content">
                                        <div class="row p-0 m-0">
                                            <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                <div class="form-group ">
                                                    <input style="border-radius:5px" placeholder="Year*"
                                                        class="form-control year_trade" type="text" name="year"
                                                        value="">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                <div class="form-group ">
                                                    <input style="border-radius:5px" placeholder="Make*"
                                                        class="form-control make_trade" type="text" name="make"
                                                        value="">
                                                    <span class="invalid-feedback7 text-danger" role="alert">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                <div class="form-group ">
                                                    <input style="border-radius:5px" placeholder="Model*"
                                                        class="form-control model_trade" type="text" name="model"
                                                        value="">
                                                    <span class="invalid-feedback8 text-danger" role="alert"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                <div class="form-group ">
                                                    <input style="border-radius:5px" placeholder="Mileage*"
                                                        class="form-control mileage" type="text" name="mileage"
                                                        value="">
                                                    <span class="invalid-feedback9 text-danger" role="alert">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                <div class="form-group ">

                                                    <input style="border-radius:5px" placeholder="Color*"
                                                        class="form-control color" type="text" name="color" value="">

                                                    <span class="invalid-feedback10 text-danger" role="alert">
                                                    </span>

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 ">
                                                <div class="form-group ">
                                                    <input style="border-radius:5px" placeholder="VIN (optional)"
                                                        class="form-control vin" type="text" name="vin" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                                        <div class="form-group ">
                                            <p style="color: black"><input type="checkbox" class="isEmailSend"
                                                    name="isEmailSend" style="cursor: pointer" checked> Email
                                                me
                                                price
                                                drops for this vehicle </p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 ">
                                    <div class="form-group">

                                        <button
                                            style="background: darkcyan; width:100%; margin-bottom:15px; color:white; font-size:16px;"
                                            type="submit" class="btn leadLoading">Send Message</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Form -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- mobile filter modal close --}}

{{-- mobile device filter button start --}}
<div class="filter-btn-styel-auto">
    <div class="filter-all-btn">
        <button style="" type="button" class="btn  filter-option-details" data-bs-toggle="modal"
            data-bs-target="#MobileFilterModal">
            Check Availability
        </button>
    </div>
</div>
{{-- mobile device filter button close --}}
<!--/listing-->
{{-- image slider modal start --}}
<div class="modal fade" id="imageOpenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header mobile-slider-view">
                <h5 class="modal-title" id="exampleModalLabel">Listing Preview</h5>
                <button
                    style="position: absolute; top:15px; right:10px; background-color: white; z-index:9; padding:10px; border-radius:50%; color:black; font-size:11px"
                    type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div style="position:relative; padding:0 !important; margin:0 !important;" class="modal-body">
                <div style="--swiper-navigation-color: #ffffff; --swiper-pagination-color: #fff"
                    class="swiper deatailSwiper2">
                    <button
                        style="position: absolute; top:15px; right:10px; background-color: white; z-index:9; padding:10px; border-radius:50%; color:black; font-size:11px"
                        type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="swiper-wrapper">
                        @php
                        $image_obj = $inventory->local_img_url;
                        $image_str = str_replace(['[', ' ', "'", ']'], '', $image_obj);
                        $images = explode(',', $image_str);
                        @endphp
                        @foreach ($images as $image)
                        <div class="swiper-slide">
                            @if ($image_obj != '' && $image_obj != '[]')
                            <img style="width:100% !important; margin:0 !important; height:600px" class="br-3" src="{{ asset('frontend/') }}/{{ $image }}"
                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ strtoupper($inventory->dealer->state) }}, dealer name is {{ $inventory->dealer->name }} Best Dream car image "
                                loading="lazy"
                                onerror="this.onerror=null; this.src='{{ asset('frontend/NotFound.png') }}';">
                            @elseif ($image_obj == '[]')
                            <img class="auto-ajax-photo" width="100%" src="{{ asset('frontend/NotFound.png') }}"
                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ strtoupper($inventory->dealer->state) }}, dealer name is {{ $inventory->dealer->name }} Best Dream car image ">
                            @else
                            <img class="auto-ajax-photo" width="100%" src="{{ asset('frontend/NotFound.png') }}"
                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ strtoupper($inventory->dealer->state) }}, dealer name is {{ $inventory->dealer->name }} Best Dream car image ">
                            @endif

                        </div>
                        @endforeach
                    </div>
                    <!-- Navigation buttons for the main slider -->
                    <div style="background: rgb(250, 249, 249); color:black;  width:30px; right:0 !important; border-top-left-radius:5px; border-bottom-left-radius:5px; height:80px"
                        class="swiper-button-next"><i style="font-size:22px; font-weight:700"
                            class="fa fa-angle-right"></i></div>
                    <div style="background: rgb(250, 249, 249); color:black;  width:30px; left:0 !important; border-top-right-radius:5px; border-bottom-right-radius:5px; height:80px"
                        class="swiper-button-prev"><i style="font-size:22px; font-weight:700"
                            class="fa fa-angle-left"></i></div>
                </div>

                <!-- Swiper for thumbnails -->
                <div style="width:97%; margin:0 auto" thumbsSlider="" class="swiper deatailSwiper mt-1">
                    <div class="swiper-wrapper">
                        @php
                        $image_obj = $inventory->local_img_url;
                        $image_str = str_replace(['[', ' ', "'", ']'], '', $image_obj);
                        $images = explode(',', $image_str);
                        @endphp
                        @foreach ($images as $image)
                        <div class="swiper-slide">

                            @if ($image_obj != '' && $image_obj != '[]')
                            <img class="me-2 br-3 swipper-bottom-image" src="{{ asset('frontend/') }}/{{ $image }}"
                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ strtoupper($inventory->dealer->state) }}, dealer name is {{ $inventory->dealer->name }} Best Dream car image "
                                loading="lazy"
                                onerror="this.onerror=null; this.src='{{ asset('frontend/NotFound.png') }}';">
                            @elseif ($image_obj == '[]')
                            <img class="auto-ajax-photo" width="100%" src="{{ asset('frontend/NotFound.png') }}"
                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ strtoupper($inventory->dealer->state) }}, dealer name is {{ $inventory->dealer->name }} Best Dream car image ">
                            @else
                            <img class="auto-ajax-photo" width="100%" src="{{ asset('frontend/NotFound.png') }}"
                                alt="Used cars for sale {{ $inventory->title }}, price is {{ $inventory->price }}, vin {{ $inventory->vin }} in {{ $inventory->dealer->city }},{{ strtoupper($inventory->dealer->state) }}, dealer name is {{ $inventory->dealer->name }} Best Dream car image ">
                            @endif

                        </div>
                        @endforeach
                    </div>
                    <!-- Navigation buttons for the thumbnails -->
                    <div style="background: white; color:black" class="swiper-button-next"><i
                            class="fa fa-angle-right"></i></div>
                    <div style="background: white; color:black" class="swiper-button-prev"><i
                            class="fa fa-angle-left"></i></div>
                </div>

                {{-- Repeating div --}}

                <div class="repate">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <div class="">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <!-- Ad Box -->
                                    <div class="category-grid-box mt-3">
                                        <!-- Ad Img -->
                                        <div class="ad-archive-img">
                                            @php
                                            $image_obj = $inventory->local_img_url;
                                            $image_str = str_replace(['[', ' ', "'", ']'], '', $image_obj);
                                            $images = explode(',', $image_str);
                                            @endphp
                                            @foreach ($images as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('frontend/') }}/{{ $image }}"
                                                    alt="Used cars for sale Best Dream car image"
                                                    class="mini-image mb-3 rounded">
                                            </div>
                                            @endforeach
                                        </div>
                                        <!-- Ad Img End -->

                                        <!-- Addition Info -->

                                    </div>
                                    <!-- Ad Box End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
{{-- image slider modal end --}}
@endsection

@push('js')
<script>
    var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 6,
            slidesPerView: 6,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
</script>
<script>
    var swiper = new Swiper(".deatailSwiper", {
            spaceBetween: 4,
            slidesPerView: 6,
            freeMode: true,
            watchSlidesProgress: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper2 = new Swiper(".deatailSwiper2", {
            spaceBetween: 10,

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
</script>


<script>

$(document).ready(function () {
    refreshCaptcha(); 
});
    // document.addEventListener('DOMContentLoaded', function() {
        //     var inputs = document.querySelectorAll('.calculate_month');
        //     var fourthInput = document.getElementById('72');

        //     inputs.forEach(function(input) {
        //         input.addEventListener('click', function() {
        //             if (input !== fourthInput) {
        //                 fourthInput.setAttribute('readonly', true);
        //                 fourthInput.classList.remove('active');
        //             }
        //             this.removeAttribute('readonly');
        //             this.classList.add('active');
        //             this.focus();
        //         });

        //         input.addEventListener('blur', function() {
        //             if (this !== fourthInput) {
        //                 this.setAttribute('readonly', true);
        //                 this.classList.remove('active');
        //             }
        //         });
        //     });
        // });



        function truncateText() {
            var content = document.getElementById("text_data");
            var button = document.getElementById("show-more-button");

            if (content.style.display === "none") {
                content.style.display = "block";
                button.innerHTML = "Show Less";
            } else {
                content.style.display = "none";
                button.innerHTML = "Show More";
            }
        }
        //   copy link code start
        document.getElementById('copyUrlButton').addEventListener('click', function() {
            // Get the current URL from the browser's address bar
            const currentUrl = window.location.href;

            // Create a temporary input element to hold the URL
            const tempInput = document.createElement('input');
            tempInput.value = currentUrl;
            document.body.appendChild(tempInput);

            // Select the input's value and copy it to the clipboard
            tempInput.select();
            document.execCommand('copy');

            // Remove the temporary input element
            document.body.removeChild(tempInput);

            // Display a message to indicate that the URL has been copied
            Swal.fire({
                icon: 'success',
                title: 'URL Copied!',
                text: 'The URL has been copied to your clipboard.',
                showConfirmButton: false,
                timer: 1500,
                background: '#f4f6f7',
                customClass: {
                    popup: 'animated bounceIn'
                }
            });
        });
        //   copy link code close


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).on('change', '#tradeChecked', function() {
            var isChecked = this.checked;
            if (isChecked == true) {
                $('#Trade_block_content').css('display', 'block');
            } else {
                $('#Trade_block_content').css('display', 'none');
            }
        });
        $(document).on('change', '#tradeCheckedModal', function() {
            var isChecked = this.checked;
            if (isChecked == true) {
                $('#Auto_Trade_block_content').css('display', 'block');
            } else {
                $('#Auto_Trade_block_content').css('display', 'none');
            }
        });
        // mobile device
        $(document).on('change', '#tradeChecked', function() {
            var isChecked = this.checked;
            if (isChecked == true) {
                $('#Mobile_Trade_block_content').css('display', 'block');
            } else {
                $('#Mobile_Trade_block_content').css('display', 'none');
            }
        });

        $(document).ready(function() {
            $('.telephoneInput').inputmask('(999) 999-9999');
            $('#SendLeaddetails').on('submit', function(e) {
                e.preventDefault();

                // Serialize the form data
                var formData = new FormData($(this)[0]);
                $('.loading').text('Loading....');

                $.ajax({
                    url: "{{ route('lead.send') }}",
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        console.log(response);
                        $('#SendLeaddetails')[0].reset();
                        toastr.success(response.message);
                        $('#first_name').val(null);
                        $('#last_name').val(null);
                        $('#email').val(null);
                        $('#phone').val(null);
                        $('.loading').text('Send Message');
                        $('#first_name_error').html('');
                        $('#last_name_error').html('');
                        $('#email_error').html('');
                        $('#phone_error').html('');
                        $('#Wmathcaptcha').html('');
                        refreshCaptcha();

                    },
                    error: function(xhr) {

                        $('.loading').text('Send Message');
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $('#first_name_error').html(errors.first_name);
                            $('#last_name_error').html(errors.last_name);
                            $('#email_error').html(errors.email);
                            $('#phone_error').html(errors.phone);
                            $('#Wmathcaptcha').html(errors.mathcaptcha);
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#SendLeadweb').on('submit', function(e) {
                e.preventDefault();

                // Serialize the form data
                var formData = new FormData($(this)[0]);
                $('.leadLoading').text('Loading....');



                $.ajax({
                    url: "{{ route('lead.send') }}",
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        $('#SendLeadweb')[0].reset();
                        toastr.success(response.message);
                        $('#MobileFilterModal').modal('hide');
                        $('.leadLoading').text('Send Message');
                        refreshCaptcha();
                    },
                    error: function(xhr) {
                        // Handle error response
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            $('#f_name_error').html(errors.first_name);
                            $('#l_name_error').html(errors.last_name);
                            $('#e_error').html(errors.email);
                            $('#p_error').html(errors.phone);
                            $('#Mmathcaptcha').html(errors.mathcaptcha);
                        }
                    }
                });
            });

        });


</script>


@include('frontend.reapted_js')
@endpush