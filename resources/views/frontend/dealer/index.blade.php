@extends('frontend.website.layout.app')
@push('head')
    <link rel="canonical" href="{{ url()->current() }}">
@endpush

@foreach(app('globalStaticPage') as $page)
@if ($page->slug == 'find-dealership')
@if ($page->description)
@section('meta_description',$page->description)
@else
@section('meta_description', app('globalSeo')['description'])
@endif
@if ($page->keyword)
@section('meta_keyword', $page->keyword)
@else
@section('meta_keyword', app('globalSeo')['keyword'])
@endif
@section('title')
    Dealership | Best Used Cars for Sale - bestdreamcar.com®
@endsection
@endif
@endforeach

@section('gtm')
{!! app('globalSeo')['gtm'] !!}
@endsection
@section('app_id', app('globalSeo')['app_id'])

@section('og_title')
    Dealership | Best Used Cars for Sale - bestdreamcar.com®
@endsection
@section('og_description', app('globalSeo')['og_description'])
@section('og_type', app('globalSeo')['og_type'])
@section('og_url', app('globalSeo')['og_url'])
@section('og_site_name', app('globalSeo')['og_site_name'])
@section('og_locale', app('globalSeo')['og_locale'])
@section('twitter_card', app('globalSeo')['twitter_card'])

@section('twitter_title')
    Dealership | Best Used Cars for Sale - bestdreamcar.com®
@endsection
@section('twitter_description', app('globalSeo')['twitter_description'])
@section('twitter_site', app('globalSeo')['twitter_site'])
@section('twitter_creator', app('globalSeo')['twitter_creator'])
@section('twitter_image', app('globalSeo')['twitter_image'])
@section('og_img', app('globalSeo')['og_img'])
@push('css')
    <style>
    .showInventoryBtn
    {
        border: 1px solid rgb(4, 100, 100);
        padding: 5px;
        text-transform: uppercase;
        color: rgb(8, 57, 63);
        border-radius:3px;
        font-weight: 500;

    }
    .showInventoryBtn:hover
    {
        background-color: rgb(79, 0, 131);
        transition: .5s ease all;
        color: white;
    }

    .dealer-result-name
    {

        font-weight: 700;
        color: rgb(31, 17, 17);
        text-transform: uppercase;
    }
    .dealer-result-location
    {


        color: rgb(31, 17, 17);
        text-transform: uppercase;
        font-size: 14px
    }
    </style>
@endpush
@section('content')

	<!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3 sptb-2" data-image-src="{{asset('frontend/assets')}}/images/banners/banner2.jpg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1 class="">Find Dealer Ship</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Dealership</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->



	<!--Statistics-->
    <section id="main_container">
        <div class="container">
            <div class="mt-4">
                <div class="item2-gl ">
                    <div class="mb-0">
                        <div class="">
                            <div class="mb-0 row">
                                <div class="col-lg-12">
                                    <div style="padding:18px; border-radius:4px; width:100%" class="bg-white auto-page-filter-topbar">
                                        <!-- Flex container for heading and select dropdown -->
                                        <div class="d-flex justify-content-between top-fil align-items-center w-100 mt-1" style="gap: 4%;">
                                            <!-- Heading -->
                                            <h6 class="mb-0  text-center show-text  p-1 highlight-count d-flex align-items-center justify-content-center"
                                                style="width: 55%; border: 1px solid rgba(190, 190, 190, 0.5); border-radius: 7px;">
                                                Showing of results
                                            </h6>


                                            <!-- Select dropdown for sorting -->
                                            <div style="width: 41%; margin-top: 12px;">
                                                <select class="mobile_selected_sort_search p-1 border"
                                                    id="city_sort_search"
                                                    style="width: 100%; border: 1px solid rgba(190, 190, 190, 0.5) !important; color: #080e1b; border-radius:7px">
                                                    <option value="">Select City</option>
                                                    @forelse ($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                                    @empty
                                                        <option>No City</option>
                                                    @endforelse

                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>

                        </div>
                    </div>



                </div>

            </div>

            <div style="margin:0 auto; background:white; width:99.7%" class="row p-3 mt-3 mb-5">
                @forelse ($dealers as $dealer)

                @php
                    $parts = explode("Map", $dealer->address);
                    $lines = explode("\n", trim($parts[0]));

                    $address = isset($lines[0]) ? trim($lines[0]) : '';
                    $cityStateZip = isset($lines[1]) ? trim($lines[1]) : '';
                @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-3 border">
                        <img width="20%" src="{{asset('/frontend/assets/images/dd.png')}}"/>
                        <div style="overflow:hidden" class="find-dealer-results-item">
                            <div class="dealer-info">
                                <div class="dealer-result-name mb-1">{{ $dealer->name }}</div>
                                <div class="dealer-result-location">{{ $address }}</div>
                                <div class="dealer-result-phone">
                                    <a class="fs-14" href="tel:{{ $dealer->phone }}">{{$cityStateZip}}</a>

                                </div>
                            </div>
                            @php
                                $stockId = $dealer->dealer_id ?? '0000';
                                $dealer_name_data = $dealer->name;
                                $dealer_name = str_replace(' ', '_',str_replace(' in Austin, TX', '', $dealer_name_data));
                                $dealerId = $dealer->id;
                             @endphp

                            <div class="dealer-result-inventory mt-3 mb-5">
                                <a href="{{ route('dealer', ['stockId' => $stockId, 'dealer_name' => $dealer_name, 'id' => $dealerId]) }}" class="showInventoryBtn">View Inventory ({{ count($dealer->inventories) }})</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-3 mt-4">
                        <div class="find-dealer-results-item">
                            <div class="dealer-info">
                                <div class="dealer-result-name">No Data Available Here</div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </section>


@endsection


@push('js')
@include('frontend.website.layout.js.dealer_view_js')
@endpush
