@extends('frontend.website.layout.app')
@push('head')
    <link rel="canonical" href="{{ url()->current() }}">
@endpush
@section('meta_description', "$data->seo_description")
@section('meta_keyword', "$data->seo_keyword")
@section('gtm')
{!! app('globalSeo')['gtm'] !!}
@endsection
@section('app_id', app('globalSeo')['app_id'])
@section('og_title', app('globalSeo')['og_title'])
@section('og_description', app('globalSeo')['og_description'])
@section('og_type', app('globalSeo')['og_type'])
@section('og_url', app('globalSeo')['og_url'])
@section('og_site_name', app('globalSeo')['og_site_name'])
@section('og_locale', app('globalSeo')['og_locale'])
@section('twitter_card', app('globalSeo')['twitter_card'])
@section('twitter_title', app('globalSeo')['twitter_title'])
@section('twitter_description', app('globalSeo')['twitter_description'])
@section('twitter_site', app('globalSeo')['twitter_site'])
@section('twitter_creator', app('globalSeo')['twitter_creator'])
@section('twitter_image', app('globalSeo')['twitter_image'])
@section('og_img', app('globalSeo')['og_img'])
@section('title',"$data->title")

@section('content')


<!--Breadcrumb-->
<section>
    <div class="bannerimg cover-image bg-background3 sptb-2" data-image-src="{{asset('frontend/assets')}}/images/banners/banner2.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white ">
                    <h3 style="font-weight:500" class="new-details-tilte">{{$data->title}}</h3>

                    <ol class="breadcrumb text-center new-details-bred">
                        <li>
                            <a style="color:white;" href="{{ route('home') }}">
                                Home<span style="margin: 0 4px;">/</span>
                            </a>
                        </li>
                        <li>
                            <a style="color:white;" href="{{route('frontend.news.page')}}">
                                News<span style="margin: 0 4px;">/</span>
                            </a>
                        </li>
                        <li class="active {{ strlen($data->title) > 21 ? 'long-title' : 'short-title' }}" aria-current="page" style="color:white;">
                            {{$data->title}}
                        </li>
                    </ol>
                    

                </div>
            </div>
        </div>
    </div>
</section>
<!--/Breadcrumb-->

<!--news details-->
<section class="sptb">
    <div class="container">
        <div style="margin:0 auto" class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 news-left">
                <div class="news-card">
                    <div class="">
                        <div class="item7-card-img">

                            @isset($data->img)
                            <img height="500px" src="{{ asset('/frontend/assets/images/news/' . $data->img) }}" alt="img" class="w-100 br-5 mb-4 art-image" onerror="this.onerror=null; this.src='{{ asset('frontend/NotFound.png') }}';"/>
                            @else

                            <img  height="500px" class="w-100 br-5 mb-4 art-image" src="{{ asset('frontend/NotFound.png') }}"
                                alt="News img">

                            @endisset


                        </div>

                        
                            <h1 style="font-size:25px; font-weight:600" class="   mb-2 news-top">{{$data->title}}</h1>
                       
                        
                           <div style="font-size:16px; width:98%" class="mb-5 me-5">{!! $data->description !!}</div>

                    </div>
                </div>

            </div>

            <!--Rightside Content-->
            <div class="col-xl-4 col-lg-4 col-md-12 details-bottom">
                <p style="font-size:19px; font-weight:600; margin-top:-7px; opacity:95%; margin-bottom:5px">Get Even More Great Car News</p>
                
                
                <p style="font-size:16px;">The latest news, reviews, and cool cars delivered to your inbox.</p>
                <form id="subscribe" action="{{route('frontend.subscribe.user')}}" method="post">
                        @csrf
                <div class="d-flex news-right-title">
                    
                    <input height="80px" class="me-2 subs-email-input" type="email" name="email" placeholder="Enter your email">
                    <button type="submit" class="btn btn-primary subscribe-button text-center">Subscribe</button>
                    
                   
                </div>
                </form>

                <p style="font-size:18px; font-weight:500;">Trending Now</p>
               
                <div class="rated-products">
                            <ul class="vertical-scroll">
                                @forelse ($news as $new)
                                <li class="item mb-3">
                                    <div class="media m-0 mt-0 p-1">


                                        <a
                                            href="{{ route('frontend.news.details', ['slug' => $new->slug]) }}">
                                            

                                                @if (isset($new->img))
                                                <img
                                                class="me-2  tending-img"
                                                src="{{ asset('/frontend/assets/images/news/' . $new->img) }}"
                                                alt="news-details" onerror="this.onerror=null; this.src='{{ asset('frontend/NotFound.png') }}';"/>

                                            @else
                                            <a href="#">
                                                <img  src="{{ asset('frontend/found/NotFound.png') }}" alt="img"
                                                class="me-2  tending-img">
                                            </a>

                                            @endif
                                        </a>
                                        @php
                                            $title = Str::limit($new->title,'17','...' );
                                            $desc = Str::limit(strip_tags($new->description), 50, '...');
                                        @endphp
                                        <div class="media-body">
                                            <h6 style="font-weight:600" class="mb-0 dea-tit">
                                                <a style="" class="mt-2 d-block hyperlink-title"
                                                href="{{ route('frontend.news.details', ['slug' => $new->slug]) }}">{{ $title }}</h4>
                                            </a>
                                            </h6>
                                            <p style="font-size:15px" class="mb-1 mt-0">{!! $desc !!}</p>

                                            
                                            <p style="font-size:12px; font-weight:400" class="mb-0"> {{\Carbon\Carbon::parse($new->created_at)->format('F d, Y')}} </p>
                                           
                                            {{-- <a style="color:rgb(5, 140, 150); cursor:pointer" class="mt-2 d-block"
                                                href="{{ route('frontend.news.details', ['id' => $new->id, 'title' => str_replace(' ', '-', $new->title)]) }}">Read more</h4>
                                            </a> --}}
                                            @php
                                            $des = Str::substr($new->description, 0, 25)
                                            @endphp




                                        </div>
                                    </div>
                                </li>
                                @empty
                                <p style="text-align:center">No Related Seller Ads</p>
                                @endforelse


                            </ul>
                        </div>



                {{-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Popular News</h3>
                    </div>

                    <div class="card-body">
                        <div class="rated-products">
                            <ul class="vertical-scroll">
                                @forelse ($news as $new)
                                <li class="item">
                                    <div class="media m-0 mt-0 p-1">


                                        <a
                                            href="{{ route('frontend.news.details', ['id' => $new->id, 'title' => str_replace(' ', '-', $new->title)]) }}"><img
                                                class="me-2 br-3 related-img"
                                                src="{{ asset('/frontend/assets/images/news/' . $new->img) }}"
                                                alt="">
                                        </a>
                                        <div class="media-body">
                                            <a
                                                href="{{ route('frontend.news.details', ['id' => $new->id, 'title' => str_replace(' ', '-', $new->title)]) }}">{{ $new->title }}</h4>
                                            </a>
                                            @php
                                            $des = Str::substr($new->description, 0, 25)
                                            @endphp




                                        </div>
                                    </div>
                                </li>
                                @empty
                                <p style="text-align:center">No Related Seller Ads</p>
                                @endforelse


                            </ul>
                        </div>
                    </div>
                </div> --}}


            </div>
            <!--/Rightside Content-->
        </div>
    </div>
</section>
<!--/Add details-->



@endsection

@push('js')
<script>

$.ajaxSetup({
         headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       });

    $('#subscribe').on('submit', function(e) {
                e.preventDefault();

                // Serialize the form data
                
                let sub= $('.subs-email-input').val();
                if(sub){
                    var formData = new FormData($(this)[0]);
                $('.subscribe-button').text('Loading...');
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
                        $('.subscribe-button').text('Subscribe');
                    },
                    error: function(xhr) {
                        // Handle error response
                        var errors = xhr.responseJSON.errors;

                    }
                });
                }else{
                    Swal.fire({
    title: 'Must Enter Your Email',
    icon: 'warning', // Change to 'warning' for a warning type alert
    confirmButtonText: 'OK'
});


                }
                
                
            });
</script>
@endpush