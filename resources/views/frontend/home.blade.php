@extends('frontend.website.layout.app')
<?php
use Illuminate\Support\Facades\Cookie;
$cookie_zipcode = request()->cookie('zipcode') ?? '';
 //dd($cookie_zipcode);
?>
@push('head')
<link rel="canonical" href="{{ route('home') }}">
@endpush

@foreach (app('globalStaticPage') as $page)
@if ($page->slug == 'home')


@if ($page->description)
@section('meta_description', $page->description)
@else
@section('meta_description', app('globalSeo')['description'])
@endif
@if ($page->keyword)
@section('meta_keyword', $page->keyword)
@else
@section('meta_keyword', app('globalSeo')['keyword'])
@endif
@section('title')
{{ $page->title }}
@endsection
@endif
@endforeach


@section('gtm')
{!! app('globalSeo')['gtm'] !!}

@endsection
@section('app_id', app('globalSeo')['app_id'])
{{--@section('og_title', app('globalSeo')['og_title'])
@section('og_description', app('globalSeo')['og_description'])--}}

@section('og_title')
{{ $page->title }}
@endsection

@section('og_description')
{{ $page->description }}
@endsection
@section('og_type', app('globalSeo')['og_type'])
@section('og_url', app('globalSeo')['og_url'])
@section('og_site_name', app('globalSeo')['og_site_name'])
@section('og_locale', app('globalSeo')['og_locale'])
@section('twitter_card', app('globalSeo')['twitter_card'])
{{--@section('twitter_title', app('globalSeo')['twitter_title'])
@section('twitter_description', app('globalSeo')['twitter_description'])--}}

@section('twitter_title')
{{ $page->title }}
@endsection

@section('twitter_description')
{{ $page->description }}
@endsection

@section('twitter_site', app('globalSeo')['twitter_site'])
@section('twitter_creator', app('globalSeo')['twitter_creator'])
@section('twitter_image', app('globalSeo')['twitter_image'])
@section('og_img', app('globalSeo')['og_img'])



@section('content')
<!--Section-->
<section>



    {{-- @dd($slider->slider_image); --}}

    <div class="banner-2 cover-image  sptb-3 sptb-tab bg-background2" @if (isset($slider->slider_image))
        style="background-image: url('{{ asset('/frontend/assets/images/logos') . '/' . $slider->slider_image
        }}');background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        background-position: center" @endif>

        <div class="header-text mb-0">
            <div class="container">
                <div style="width:600px; margin:0 auto;" class="text-center text-white banner-title">
                    <h1 style="background: rgba(0, 0, 0, 0.4);">

                        {{ $slider ? $slider->slider_title : '' }}

                    </h1>
                    <p style="width:550px; margin: 0 auto; color: rgb(250, 250, 250); background: rgba(0, 0, 0, 0.4);"
                        class="banner-para"> {{ $slider ? $slider->slider_subtitle : '' }}</p>
                </div>
                <div style="padding-top: 40px !important;" class="row">
                    <div class="mx-auto col-xl-10 col-lg-12 col-md-12 d-block">
                        <div class="item-search-tabs">
                            <div class="item-search-menu">
                                <ul class="nav">
                                    <li class=""><a href="#tab1" class="active" data-bs-toggle="tab">Make/Model</a>
                                    </li>
                                    <li><a href="#tab2" data-bs-toggle="tab">Body</a></li>
                                    <li><a href="#tab3" data-bs-toggle="tab">Payment</a></li>
                                </ul>
                            </div>
                            <form action="{{ route('auto') }}" method="get">
                                <div class="tab-content index-search-select">
                                    <div class="tab-pane active" id="tab1">
                                        <div class="search-background">
                                            <div class="form row no-gutters">
                                                <div class="form-group col-xl-2 col-lg-2 col-md-12  mb-0">
                                                    <select class="form-control homeMakeSearch"
                                                        data-placeholder="Select Make" name="make" id="homeMakeSearch">
                                                        <optgroup label="Popular Make">
                                                            <option value="">Select Make</option>
                                                            @foreach ($makes as $make)
                                                            <option value="{{ $make->make_name }}"
                                                                data-src="{{ $make->id }}">
                                                                {{ $make->make_name }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                    <select
                                                        class="form-control select2-popular-model border-bottom-0 border-start-0 w-100"
                                                        data-placeholder="Select" name="model">
                                                        <optgroup label="Popular Model" id="homeModelSearch">
                                                            <option value="">Select Model</option>

                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                    <select class="form-control select2-max-price border-bottom-0 w-100"
                                                        data-placeholder="Select" name="maximum_price">
                                                        <optgroup label="Price">
                                                            <option value="">Max Price</option>
                                                            <option value="0">$5k</option>
                                                            <option value="1">$10k</option>
                                                            <option value="2">$20K</option>
                                                            <option value="3">$30K</option>
                                                            <option value="4">$40K</option>
                                                            <option value="5">$50K</option>
                                                            <option value="6">$60K</option>
                                                            <option value="7">$70K</option>
                                                            <option value="8">$80K</option>
                                                            <option value="9">Above</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-6 col-lg-6  col-md-12 mb-0 location">
                                                    <div class="row no-gutters bg-transparent br-2">
                                                        <div class="form-group  col-xl-8 col-lg-7 col-md-12 mb-0">
                                                            <input type="text" class="form-control border-end-0 br-md-0"
                                                                id="sale-location" placeholder="Zip Code" name="zip"
                                                                value="{{ $cookie_zipcode ?? '' }}">
                                                            <span><i class="fa fa-map-marker location-gps me-1"></i>
                                                            </span>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-5 col-md-12 mb-0">
                                                            <button
                                                                style="height:41px;background:darkcyan; color:white; margin-left:1px; "
                                                                href="javascript:void(0);"
                                                                class="btn btn-block   fs-14">
                                                                <i style="padding-right:1px !important"
                                                                    class="fa fa-search"></i>
                                                                Search
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <div class="search-background">
                                            <div class="form row no-gutters">
                                                <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                    <input type="hidden" name="home" value="2">
                                                    <select class="form-control  border-bottom-0 border-start-0 w-100"
                                                        data-placeholder="Select" id="selectBodySearch" name="body">
                                                        <optgroup label="Search by Body">

                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                    <select class="form-control  border-bottom-0 border-start-0 w-100"
                                                        data-placeholder="Select" id="homeMileageSearch"
                                                        name="maximum_miles">
                                                        <optgroup label="Search by Mileage">
                                                            <option selected value="">Max Mileage</option>
                                                            <option value="10000">10,000 miles</option>
                                                            <option value="25000">25,000 miles </option>
                                                            <option value="50000">50,000 miles </option>
                                                            <option value="75000">75,000 miles </option>
                                                            <option value="100000">100,000 miles</option>
                                                            <option value="150000">150,000 miles</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="min-miles">
                                                <input type="hidden" name="max-miles">
                                                <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                    <select class="form-control border-bottom-0 w-100"
                                                        data-placeholder="Select" name="min_price">
                                                        <optgroup label="Min Price">
                                                            <option value="">Min Price</option>
                                                            <option value="1000">$1,000</option>
                                                            <option value="2000">$2,000</option>
                                                            <option value="3000">$3,000</option>
                                                            <option value="4000">$4,000</option>
                                                            <option value="5000">$5,000</option>
                                                            <option value="6000">$6,000</option>
                                                            <option value="7000">$7,000</option>
                                                            <option value="8000">$8,000</option>
                                                            <option value="10000">$10,000</option>
                                                            <option value="12000">$12,000</option>
                                                            <option value="15000">$15,000</option>
                                                            <option value="20000">$20,000</option>
                                                            <option value="25000">$25,000</option>
                                                            <option value="30000">$30,000</option>
                                                            <option value="40000">$40,000</option>
                                                            <option value="50000">$50,000</option>
                                                            <option value="75000">$75,000</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-6 col-lg-6  col-md-12 mb-0 location">
                                                    <div class="row no-gutters bg-transparent br-2">
                                                        <div class="form-group  col-xl-8 col-lg-7 col-md-12 mb-0">
                                                            <select class="form-control border-bottom-0 w-100"
                                                                data-placeholder="Select" name="max_price">
                                                                <optgroup label="Max Price">
                                                                    <option value="">Max Price</option>
                                                                    <option value="1000">$1,000</option>
                                                                    <option value="2000">$2,000</option>
                                                                    <option value="3000">$3,000</option>
                                                                    <option value="4000">$4,000</option>
                                                                    <option value="5000">$5,000</option>
                                                                    <option value="6000">$6,000</option>
                                                                    <option value="7000">$7,000</option>
                                                                    <option value="8000">$8,000</option>
                                                                    <option value="10000">$10,000</option>
                                                                    <option value="12000">$12,000</option>
                                                                    <option value="15000">$15,000</option>
                                                                    <option value="20000">$20,000</option>
                                                                    <option value="25000">$25,000</option>
                                                                    <option value="30000">$30,000</option>
                                                                    <option value="40000">$40,000</option>
                                                                    <option value="50000">$50,000</option>
                                                                    <option value="75000">$75,000</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-5 col-md-12 mb-0">
                                                            <button
                                                                style="height:41px;background:darkcyan; color:white; margin-left:1px; "
                                                                href="javascript:void(0);" class="btn btn-block  fs-14">
                                                                <i style="margin-bottom:1px !important"
                                                                    class="fa fa-search"></i>
                                                                Search
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab3">
                                        <div class="search-background">
                                            <div class="form row no-gutters">
                                                <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                    <select class="form-control  border-bottom-0 border-start-0 w-100"
                                                        data-placeholder="Select" name="min_payment">
                                                        <optgroup label="Min Payment">
                                                            <option selected value="">Min Payment</option>
                                                            <option value="100">$100</option>
                                                            <option value="150">$150 </option>
                                                            <option value="200">$200 </option>
                                                            <option value="250">$250 </option>
                                                            <option value="300">$300 </option>
                                                            <option value="350">$350 </option>
                                                            <option value="400">$400 </option>
                                                            <option value="450">$450 </option>
                                                            <option value="500">$500 </option>
                                                            <option value="550">$550 </option>
                                                            <option value="600">$600 </option>
                                                            <option value="650">$650 </option>
                                                            <option value="700">$700 </option>
                                                            <option value="750">$750 </option>
                                                            <option value="800">$800 </option>
                                                            <option value="850">$850 </option>
                                                            <option value="900">$900 </option>
                                                            <option value="950">$950 </option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                    <select class="form-control border-bottom-0 border-start-0 w-100"
                                                        data-placeholder="Select" name="max_payment">
                                                        <optgroup label="Max Payment">
                                                            <option selected value="">Select Max Payment
                                                            </option>
                                                            <option value="100">$100</option>
                                                            <option value="150">$150 </option>
                                                            <option value="200">$200 </option>
                                                            <option value="250">$250 </option>
                                                            <option value="300">$300 </option>
                                                            <option value="350">$350 </option>
                                                            <option value="400">$400 </option>
                                                            <option value="450">$450 </option>
                                                            <option value="500">$500 </option>
                                                            <option value="550">$550 </option>
                                                            <option value="600">$600 </option>
                                                            <option value="650">$650 </option>
                                                            <option value="700">$700 </option>
                                                            <option value="750">$750 </option>
                                                            <option value="800">$800 </option>
                                                            <option value="850">$850 </option>
                                                            <option value="900">$900 </option>
                                                            <option value="950">$950 </option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-2 col-lg-2 col-md-12 mb-0">
                                                    <select class="form-control border-bottom-0 w-100"
                                                        data-placeholder="Select" name="min_year" id="homeMinYear">
                                                        <optgroup label="Min Year">
                                                            <option value="">Select Min Year</option>
                                                            @foreach ($years as $year)
                                                            <option value="{{ $year->year }}">
                                                                {{ $year->year }}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-6 col-lg-6  col-md-12 mb-0 location">
                                                    <div class="row no-gutters bg-transparent br-2">
                                                        <div class="form-group  col-xl-8 col-lg-7 col-md-12 mb-0">
                                                            <select class="form-control border-bottom-0 w-100"
                                                                data-placeholder="Select" name="max_year"
                                                                id="homeMaxYear">
                                                                <optgroup label="Max Year">
                                                                    <option value="">Select Max Year</option>
                                                                    @foreach ($years as $year)
                                                                    <option value="{{ $year->year }}">
                                                                        {{ $year->year }}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="exterior-color">
                                                        <input type="hidden" name="interior-color">
                                                        <input type="hidden" name="transmission">
                                                        <input type="hidden" name="drivetrain">
                                                        <input type="hidden" name="fuel">
                                                        <div class="col-xl-4 col-lg-5 col-md-12 mb-0">
                                                            <button
                                                                style="height:41px;background:darkcyan; color:white; margin-left:1px; "
                                                                href="javascript:void(0);"
                                                                class="btn btn-block   fs-14">
                                                                <i style="margin-bottom:1px !important"
                                                                    class="fa fa-search"></i>
                                                                Search
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /header-text -->
    </div>
</section>
<!--Section-->
<div>

</div>
{{-- Recent activity section start here --}}

{{-- Recent activity section End here --}}


<section>
    <div class="container auto-page-banner-image">
        <div class="auto-page-image" style="margin-top:50px; margin-bottom:70px;  margin-left:20%">
            @php
            $banners = \App\Models\Banner::where('position', 'home page top')->first();
            @endphp

            @isset($banners->image)
            <img style="width:728px; height:90px;" src="{{ asset('/dashboard/images/banners/' . $banners->image) }}"
                alt="Used cars for sale dealer home top banner image dream best" />
            @else
            <img style="width:728px; height:90px;" src="{{ asset('/dashboard/images/banners/top.png') }}"
                alt="Used cars for sale dealer home top banner image dream best" />
            @endisset

            <!-- Your ad content goes here -->


        </div>
    </div>
</section>

@if($tendings->count() > 1)
<section style="padding-top: 5px !important; padding-bottom:3px !important" class="sptb2">
    <div style="border-radius:5px" class="container bg-white p-5">
        <div class="text-center">
            <h2 style="font-weight:500; margin-bottom:45px; margin-top:17px">Trending Searches</h2>

        </div>
        {{-- ['homeBodySearch' => request('homeBodySearch')] --}}
        <div style="margin: 0 auto" class="row mb-4">





            {{-- @foreach($userHistories as $userHistory)

            <div class="col-md-4 col-lg-3 col-sm-6 col-xs-6 mb-4 make-card">
                @if($userHistory && $userHistory->links)
                <a href="{{ $userHistory->links }}"
                    style="font-size: 16px; border-bottom: 1px solid rgb(18, 176, 197); color: rgb(18, 176, 197) !important;"
                    class="tending-view">
                    {{ $userHistory->title }} ({{$userHistory->count}})
                </a>

                @endif
            </div>
            @endforeach --}}
            @foreach($tendings as $trend)

            <div class="col-md-4 col-lg-3 col-sm-6 col-xs-6 mb-4 make-card">
                @if($trend)
                @php

                $trendpart = explode(' ',$trend->title);
                $trendpartMake = $trendpart[0];
                $trendpartModel = $trendpart[1];
                @endphp
                <a href="{{ route('auto', ['make' => $trendpartMake, 'model' => $trendpartModel]) }}"
                    style="font-size: 16px; border-bottom: 1px solid rgb(18, 176, 197); color: rgb(18, 176, 197) !important;"
                    class="tending-view">
                    {{ $trend->title }}
                </a>

                @endif
            </div>
            @endforeach









        </div>
    </div>
</section>

@endif


<!--Section-->
{{-- <section style="padding-top: 5px !important; padding-bottom:3px !important" class="sptb2">


    <div style="border-radius:5px;" class="container bg-white p-5">
        <div class="text-center  center-block">
            <h2 style="font-weight:500; margin-bottom:45px; margin-top:25px;">Popular Used Car Searches</h2>
        </div>
        <div style="margin-bottom: 35px" class="row">
            <div style="margin: 0 auto;" class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 cities">
                        <a style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;"
                            href="{{ route('auto', ['lowestPrice' => 'lowest']) }}"
                            class="top-cities card text-center mb-xl-0 mb-lg-5 p-0 box-shadow2">
                            <div class="card-body  br-ts-4 br-te-4">
                                <img src="{{ asset('frontend') }}/assets/images/lowest.svg"
                                    alt="Used cars for sale lowest price Best Dream car image" height="63px"
                                    class="  mb-0 p-0 br-0  bg-white">
                                <h4 class="font-weight-semibold mb-0 mt-5">Lowest Price</h4>
                            </div>

                        </a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 cities">
                        <a style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;"
                            href="{{ route('auto', ['lowestMileage' => 'lowest']) }}"
                            class="top-cities card text-center mb-xl-0 mb-lg-5 p-0 box-shadow2">
                            <div class="card-body  br-ts-4 br-te-4">
                                <img height="63px" src="{{ asset('frontend') }}/assets/images/car.svg"
                                    alt="Used cars for sale lowest mileage Best Dream car image"
                                    class=" mb-0 p-0 br-0  bg-white">
                                <h4 class="font-weight-semibold mb-0 mt-5">Lowest Mileage</h4>
                            </div>

                        </a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 cities">
                        <a style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;"
                            href="{{ route('auto', ['owned' => 'preowned']) }}"
                            class="top-cities card text-center mb-xl-0 mb-lg-5 p-0 box-shadow2">
                            <div class="card-body  br-ts-4 br-te-4">
                                <img height="63px" src="{{ asset('frontend') }}/assets/images/mark.svg"
                                    alt="Used cars for sale popular body Best Dream car image"
                                    class=" mb-0 p-0 br-0  bg-white">
                                <h4 class="font-weight-semibold mb-0 mt-5">Popular Body</h4>
                            </div>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--Section-->

<section style="padding-top: 5px !important; padding-bottom:3px !important" class="sptb2">
    <div style="border-radius:5px" class="container bg-white p-5">
        <div class="text-center">
            <h2 style="font-weight:500; margin-bottom:45px; margin-top:17px">Used Cars in Popular Cities</h2>

        </div>
        {{-- ['homeBodySearch' => request('homeBodySearch')] --}}
        <div style="margin: 0 auto" class="row mb-4">
            <div class="col-md-4 col-lg-3 col-sm-6 col-xs-6 mb-4 make-card mb-4">
                <a href="{{ route('auto', ['zip' => '78702','home2'=>true]) }}"
                    style="font-size: 16px; border-bottom:1px solid rgb(18, 176, 197); color:rgb(18, 176, 197) !important"
                    class="city">Used Cars in Austin, TX</a>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-6 col-xs-6 mb-4 make-card mb-4">
                <a href="{{ route('auto', ['zip' => '75241','home2'=>true]) }}"
                    style="font-size: 16px; border-bottom:1px solid rgb(18, 176, 197); color:rgb(18, 176, 197) !important"
                    class="city">Used Cars in Dallas, TX</a>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-6 col-xs-6 mb-4 make-card mb-4">
                <a href="{{ route('auto', ['zip' => '77007','home2'=>true]) }}"
                    style="font-size: 16px; border-bottom:1px solid rgb(18, 176, 197); color:rgb(18, 176, 197) !important"
                    class="city">Used Cars in Houston, TX</a>
            </div>
            <div class="col-md-4 col-lg-3 col-sm-6 col-xs-6 mb-4 make-card mb-4">
                <a href="{{ route('auto', ['zip' => '78205','home2'=>true]) }}"
                    style="font-size: 16px; border-bottom:1px solid rgb(18, 176, 197); color:rgb(18, 176, 197) !important"
                    class="city">Used Cars in San Antonio, TX</a>
            </div>


        </div>
    </div>
</section>
<!--Section-->

<!--Section-->
@if($bodies->count() > 1)
<section style="padding-top: 5px !important; padding-bottom:3px !important" class="sptb2">
    <div style="border-radius:5px" class="container bg-white p-5">
        <div class="text-center section-title center-block">
            <h2 style="margin-top:15px; margin-bottom:15px">Shop by Type</h2>
        </div>
        <div class="row mb-4">
            @forelse ($bodies as $body)
            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-6 col-xs-6 mb-0 make-card">
                <div style="box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;"
                    class="bg-white card bg-card-light">
                    <div class="card-body">
                        <div class="cat-item text-center">
                            <a href="{{ route('auto', ['body' => $body->name, 'home' => true]) }}"></a>
                            <div class="cat-img">
                                <img src="{{ asset('storage') . '/' . $body->image }}"
                                    alt="Used cars for sale Popular body {{ $body->name }}  Best Dream car image">
                            </div>
                            <div class="cat-desc">
                                <h5 class="mb-1">{{ $body->name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            @endforelse


        </div>


    </div>
</section>
@endif

<!--Section-->

<!--Section-->
@if($news->count() > 1)
<section style="padding-top: 5px !important; padding-bottom:5px !important" class="sptb">
    <div style="border-radius:5px; padding-bottom:25px" class="container bg-white p-5">
        <div class="text-center section-title center-block">
            <h2 style="margin-top:15px">Recent News</h2>
            <p style="margin-bottom:10px; font-size:17px; color:rgb(32, 32, 32)">Start your search by choosing one of
                the most popular news </p>
        </div>
        <div style="width:90% !important; margin: 0 auto !important; " id="defaultCarousel1"
            class="owl-carousel Card-owlcarousel owl-carousel-icons mb-5">
            @foreach ($news as $new)
            <div class="item">
                <div class="mb-0 card">
                    <div class="item7-card-img">
                        <a href="{{ route('frontend.news.details', ['slug' => $new->slug]) }}"></a>



                        @if (isset($new->img))
                        <img style="width: 100%; height:260px" class="news-img"
                            src="{{ asset('frontend') }}/assets/images/news/{{ $new->img }}"
                            alt="Used cars for sale Best Dream car {{ $new->title }} News image"
                            onerror="this.onerror=null; this.src='{{ asset('frontend/NotFound.png') }}';" />

                        @else
                        
                            <img style="width: 100%; height:260px" class="news-img"
                                src="{{ asset('frontend/found/NotFound.png') }}" alt="img" />
                        

                        @endif

                    </div>
                    <div class="card-body p-4">

                        @php
                        $title = Str::limit($new->title, 21, '...');
                        @endphp
                        <a href="{{ route('frontend.news.details', ['slug' => $new->slug]) }}" class="text-dark">
                            <h5 style="font-weight:600" class="fs-20 news-tit hyperlink-title">{{ $title }}</h5>
                        </a>

                        @php
                        $sub_title = Str::limit($new->sub_title, 100, '...');
                        @endphp
                        <p style="height:80px" class="news-par">{{ $sub_title }}</p>
                        <a href="{{ route('frontend.news.details', ['slug' => $new->slug]) }}"
                            style="float:right; color:darkcyan">Read more <i class="fa fa-angle-right ms-1"></i></a>


                    </div>
                </div>
            </div>
            @endforeach



        </div>
        <div style="text-align:center; margin-top:30px !important">
            <a href="{{ route('frontend.news.page') }}"
                style="border:2px solid black; border-radius:17px; padding-left:35px; padding-right:35px; padding-top:3px; padding-bottom:3px; "
                class="btn">See All </a>

        </div>
    </div>
</section>
@endif

<!--Section-->



@if($makes->count() > 1)
<section style="padding-top: 5px !important; padding-bottom:3px !important;margin-bottom:5px" class="sptb2 ">
    <div style="border-radius:5px" class="container bg-white p-5">
        <div class="section-title center-block text-center">
            <h2 style="margin-top:25px">Shop your favorite Makes</h2>
        </div>

        <div style="margin: 0 auto" class="row make-list">
            @forelse($makes as $key => $make_g)
            @php
            $count_make_obj = \App\Models\Inventory::where('make', $make_g->make_name)->where(
            'type',
            '!=',
            'new',
            );
            $count_make = $count_make_obj->count('make');
            $count_price = $count_make_obj->min('price');
            $formattedNumber = number_format($count_price, 0, '.', ',');
            @endphp
            @if ($key < 18 && $count_make !=0) <div class="col-md-4 col-lg-2 col-sm-6 col-xs-6 mb-0 make-card">
                <div class="mt-0 mb-2 mb-lg-0 br-3 p-0">
                    <div class="media-body">
                        <h4 class="mt-4 mb-1 fs-16 fw-medium">
                            <a href="{{ route('auto', ['make' => $make_g->make_name]) }}" class="text-body"
                                style="color:rgb(18, 176, 197) !important">{{ 'Used ' . $make_g->make_name }}</a>
                        </h4>
                    </div>
                </div>

                <p style="font-size:13px" class="listing-level">{{ $count_make }} listings starting at ${{
                    $formattedNumber }}
                </p>
        </div>
        @else
        @endif
        @empty
        <!-- Handle case when there are no makes -->
        @endforelse
    </div>

    <div style="text-align:center" id="hh">
        <button id="showMoreBtnMake"
            style="border:2px solid black; border-radius:17px; padding-left:45px; padding-right:45px; padding-top:3px; padding-bottom:3px; margin-top:15px"
            class="btn">Show More <i style="font-size:15px; margin-left:5px" class="fa fa-angle-down"></i>
        </button>
    </div>

    <div id="moreContent" class="row w-full" style="display:none; margin: 0 auto;">
        <div class="row m-0 p-0">
            @forelse($makes as $key => $make_g)
            @if ($key >= 18 && $count_make !=0)

            @php
            $count_make_obj = \App\Models\Inventory::where('make', $make_g->make_name)->where(
            'type',
            '!=',
            'new',
            );
            $count_make = $count_make_obj->count('make');
            $count_price = $count_make_obj->min('price');
            $formattedNumber = number_format($count_price, 0, '.', ',');
            @endphp


            <div class="col-md-4 col-lg-2 col-sm-6 col-xs-6 mb-0 make-card">
                <div class="mt-0 mb-2 mb-lg-0 br-3 p-0">
                    <div class="media-body">
                        <h4 class="mt-4 mb-1 fs-16 fw-medium">
                            <a href="{{ route('auto', ['make' => $make_g->make_name]) }}" class="text-body"
                                style="color:rgb(18, 176, 197) !important">{{ 'Used ' . $make_g->make_name }}</a>
                        </h4>
                    </div>
                </div>

                <p style="font-size:13px" class="listing-level">{{ $count_make }} listings starting at
                    ${{ $formattedNumber }}</p>
            </div>

            @else
            <!-- Additional content for the 'else' case if needed -->
            @endif
            @empty
            <!-- Handle case when there are no makes -->
            @endforelse

        </div>

    </div>
    <div id="hhh">
        <button id="showLessBtn" class="btn"
            style="display:none; border:2px solid black; border-radius:17px; padding-left:45px; padding-right:45px; padding-top:3px; padding-bottom:3px; margin-top:15px">Show
            Less <i style="font-size:15px; margin-left:5px" class="fa fa-angle-up"></i></button>
    </div>
    </div>
</section>

@endif


<!--Section-->
<!--Section-->

{{--@if (!auth()->user())
<section style="padding-top: 15px !important;" class="sptb2 ">
    <div style="border-radius:5px; padding:25px !important" class="container bg-white">
        <div class="row">
            <div class="col-md-6">
                <div class="p-0 border bg-light box-shadow2 br-3">
                    <div class="card-body">
                        <h6 class="mb-4 fs-18">{{ $ad1->title }}</h6>
                        <hr class="mx-auto mt-0 mb-4 deep-purple accent-2 d-inline-block">
                        <p>{{ $ad1->description }}</p>
                        <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="background:darkcyan"
                            class="text-white btn">Sell a Car</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-0 mt-5 border bg-light mt-md-0 box-shadow2 br-3">
                    <div class="card-body">
                        <h6 class="mb-4 fs-18">{{ $ad2->title }}</h6>
                        <hr class="mx-auto mt-0 mb-4 deep-purple accent-2 border-success d-inline-block">
                        <p>{{ $ad2->description }}</p>
                        <a href="{{ route('auto') }}" style="background:rgb(111, 0, 139)" class="text-white btn">Buy a
                            Car</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endif--}}
@endsection



@push('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
            $('#showMoreBtnMake').click(function() {

                $('#moreContent').show();
                $('#showMoreBtnMake').hide();
                $('#showLessBtn').show();
                $('#hh, #hhh').css('text-align', 'center');
            });

            $('#showLessBtn').click(function() {
                $('#moreContent').hide();
                $('#showMoreBtnMake').show();
                $('#showLessBtn').hide();
                $('#hh, #hhh').css('text-align', 'center');
            });
        });
        $(document).ready(function() {
            $('.homeMakeSearch').select2();

        });


        $(document).ready(function() {
            $.ajax({
                url: "{{ route('homePage.bodySearch') }}",
                type: "POST",
                // Replace 'yourIdValue' with the actual value you want to send
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    // $('#selectBodySearch').empty();
                    $('#selectBodySearch').append('<option value="">Select Body</option>');
                    $.each(res, function(index, item) {
                        console.log(item)

                        console.log('<option value="' + item + '">' + item + '</option>')
                        $('#selectBodySearch').append('<option value="' + item + '">' + item +
                            '</option>');
                        // $('#homeMakeSearch').append('<option value="' + index + '">' + item + '</option>');
                    });
                    console.log(res)
                    // alert(res);
                },
                error: function(error) {
                    console.error(error);
                }
            });

            $('#homeMakeSearch').on('change', function() {
                var data = $(this).val();
                // var id = $('#homeMakeSearch').data('src')
                var id = $(this).find('option:selected').data('src');
                $('#homeModelSearch').html('<option value="">Loading...</option>');
                $.ajax({
                    url: "{{ route('homePage.modelSearch', 1) }}",
                    type: "GET",
                    data: {
                        id: id
                    }, // Replace 'yourIdValue' with the actual value you want to send
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        $('#homeModelSearch').empty().append(
                            '<option value=""> Select Model</option>');
                        $.each(res, function(index, item) {

                            $('#homeModelSearch').append('<option value="' + item
                                .model_name +
                                '">' + item.model_name + '</option>');
                            // $('#homeMakeSearch').append('<option value="' + index + '">' + item + '</option>');
                        });
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });


            $('#subscribe').on('submit', function(e) {
                e.preventDefault();

                // Serialize the form data
                var formData = new FormData($(this)[0]);
                $('.subscribe_user').text('subscribe...');

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        $('#subscribe')[0].reset();
                        toastr.success(response.message);
                        $('#MobileFilterModal').modal('hide');
                        $('.subscribe_user').text('Subscribe');
                    },
                    error: function(xhr) {
                        // Handle error response
                        var errors = xhr.responseJSON.errors;

                    }
                });
            });
        });
</script>
@endpush
<!--Section-->