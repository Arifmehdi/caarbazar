@extends('frontend.website.layout.app')

@push('head')
    <link rel="canonical" href="{{ url()->current() }}">
@endpush
@foreach(app('globalStaticPage') as $page)
@if ($page->slug == 'faq')
@if ($page->description)
{{--@section('meta_description',$page->description)--}}
@section('meta_description')
    Get answers to frequently asked questions about bestdreamcar.
@endsection

@else
@section('meta_description')
    Get answers to frequently asked questions about bestdreamcar.
@endsection
@endif
@if ($page->keyword)
@section('meta_keyword', $page->keyword)
@else
@section('meta_keyword', app('globalSeo')['keyword'])
@endif
@section('title')
        FAQ | Best Used Cars for Sale - bestdreamcar.com®
@endsection
@endif
@endforeach



@section('gtm')
{!! app('globalSeo')['gtm'] !!}
@endsection
@section('app_id', app('globalSeo')['app_id'])

@section('og_title')
        FAQ | Best Used Cars for Sale - bestdreamcar.com®
@endsection

@section('og_description')
    Get answers to frequently asked questions about bestdreamcar.
@endsection
@section('og_type', app('globalSeo')['og_type'])
@section('og_url', app('globalSeo')['og_url'])
@section('og_site_name', app('globalSeo')['og_site_name'])
@section('og_locale', app('globalSeo')['og_locale'])
@section('twitter_card', app('globalSeo')['twitter_card'])

@section('twitter_title')
        FAQ | Best Used Cars for Sale - bestdreamcar.com®
@endsection
@section('twitter_description')
    Get answers to frequently asked questions about bestdreamcar.
@endsection
@section('twitter_site', app('globalSeo')['twitter_site'])
@section('twitter_creator', app('globalSeo')['twitter_creator'])
@section('twitter_image', app('globalSeo')['twitter_image'])
@section('og_img', app('globalSeo')['og_img'])
@section('content')

	<!--Section-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-image-src="{{asset('frontend')}}/assets/images/banners/banner2.jpg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1 class="">FAQ</h1>

                        <ol class="breadcrumb text-center">
                            <li   class=""><a style="color:white" href="{{ route('home') }}">Home<span style="margin-left:4px; margin-right:4px;">/</span> </a></li>
                            <li  class=""><a style="color:white" href="javascript:void(0);">FAQS</a></li>

                        </ol>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="error" class="section-padding-80 components">
    <div class="container">
        <div style="margin-top:65px; margin-bottom:150px" class="row">
            <div class="col-md-7 margin-bottom-40">
                <div style="width:90%" class="contact-first-part">
                    @if($faqs->count() > 1)
                    <p style="font-size:35px; font-weight:500" class="faqs-title"><img width="60px" src="{{asset('/frontend/assets/images/Light.svg')}}"/>Frequently Asked Questions</p>
                    @endif

                    @if($faqs->isNotEmpty())
                    <div class="panel-group1" id="accordion2">
                        @foreach ($faqs as $index => $faq)
                        
                        <div class="panel panel-default mb-4 border p-0">
                            <div class="panel-heading1">
                                <h4 class="panel-title1">
                                    <a class="accordion-toggle {{ $index == 0 ? '' : 'collapsed' }}" data-bs-toggle="collapse" data-parent="#accordion2" href="#collapse{{$faq->id}}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}">
                                        {{$faq->title}}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{$faq->id}}" class="panel-collapse collapse {{ $index == 0 ? 'show' : '' }}" role="tabpanel" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}">
                                <div class="panel-body bg-white">
                                    <p>{!! $faq->description !!}</p>
                                </div>
                            </div>
                        </div>
                       
                        @endforeach
                    </div>
                    @endif
                

               




                </div>

            </div>
            <div class="col-md-5 margin-bottom-40">
                <img style="margin-top:72px;" src="{{asset('/frontend/assets/images/faq.webp')}}"/>

                <p class="mt-4">The Best Dream car offers a range of engine options to suit different driving preferences. Best Dream car is a premium vehicle, and its price reflects the quality and features it offers. The base model starts at a competitive price for the luxury market, with higher-end models and customizations adding to the cost. For precise pricing, we recommend contacting your local dealership or visiting our website.</p>
                <p>Yes, the Best Dream car is highly customizable. From the exterior color and wheel design to the interior upholstery and technology packages, you can tailor the car to match your personal style and preferences. Whether you want a sporty look or a more classic appearance, the Best Dream car can be configured to meet your exact specifications.</p>

                <div style="border-left: 2px solid darkcyan">
                                        <div style="padding-left:55px">
                                        <p class="p-0 mb-2" style="font-size:22px; margin-top:55px; font-weight:600; opacity:80%">Let's Us Contact?</p>
                                    <p class="p-0" style="font-size: 16px;">Check out our contact page and let's connect us for more information.</p>
                                    <a href="{{ route('contact')}}" style="padding:7px 55px 7px 55px; background:none; border:1px solid darkcyan; border-radius:12px; font-size:16px; color:darkcyan ">Contact Us</a>
                                        </div>
                                    </div>

            </div>
        </div>
    </div>
</section>
    <!--Section-->

    <!--Faq section-->
    <!-- <section class="sptb">
        <div class="container">
            <div class="panel-group1" id="accordion2">
                @foreach ($faqs as $faq )


                <div class="panel panel-default mb-4 border p-0">
                    <div class="panel-heading1">
                        <h4 class="panel-title1">
                            <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-parent="#accordion2" href="#collapse{{$faq->id}}" aria-expanded="false">{{$faq->title}}</a>
                        </h4>
                    </div>
                    <div id="collapse{{$faq->id}}" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
                        <div class="panel-body bg-white">
                            <p>{!! $faq->description !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section> -->
    <!--/Faq section-->




@endsection

@push('js')

@include('frontend.reapted_js')
@endpush
