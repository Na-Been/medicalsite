<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{getSetting('site_title')}} | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet"
          href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('dist/styles/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('dist/slick-1.8.1/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('dist/slick-1.8.1/slick/slick-theme.css')}}"/>
</head>
<body>
<header>
    <div class="header__top">
        <div class="container">
            <div class="row pt-3 pb-3">
                <div class="col-md-5 location">
                    <i
                        class="las la-map-marker-alt"
                        style="color: #11857a; font-size: 20px; font-weight: 600"
                    ></i>
                    &nbsp; {{getSetting('address')}}
                </div>
                <div class="col-md-7 info">
                    <h6 class="">
                        <i class="las la-envelope"></i> &nbsp; {{getSetting('email')}}
                    </h6>
                    <h6 class="">
                        <i class="las la-headset"></i> {{getSetting('phone_number') .'/'. getSetting('mobile_number')}}
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-lg-0">
                <div class="container-fluid p-sm-0">
                    @if(getSetting('logo'))
                        <a class="navbar-brand text-white" href="{{route('home.index')}}">
                            <img src="{{asset(url('/').Storage::url(getSetting('logo')))}}" style="height: 35px"></a>
                    @else
                        <a class="navbar-brand text-white" href="{{route('home.index')}}">Mediaids</a>
                    @endif
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link {{request()->route('home.index')?'active':null}}" aria-current="page"
                                   href="{{route('home.index')}}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Our Product
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @forelse($categories as $key=> $categorys)
                                        @if($key=='products')
                                            @foreach($categorys as $category)
                                                <li>
                                                    <a class="dropdown-item"
                                                       href="{{route('categories.product',$category->slug)}}">
                                                        <i class="las la-arrow-right"></i>{{$category->name}}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    @empty
                                        <li>No Product Category Available</li>
                                    @endforelse
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown1" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    Services
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    @forelse($categories as $key=> $categorys)
                                        @if($key=='services')
                                            @foreach($categorys as $category)
                                                <li>
                                                    <a class="dropdown-item"
                                                       href="{{route('categories.service',$category->slug)}}">
                                                        <i class="las la-arrow-right"></i>{{$category->name}}</a>
                                                </li>
                                            @endforeach
                                        @endif
                                    @empty
                                        <li>No Services Category Available</li>
                                    @endforelse
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-sm-0" href="{{route('home.about')}}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-sm-0" href="{{route('home.news')}}">News & Update</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.blog')}}">Blogs</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.faq')}}">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.contact')}}">Contact</a>
                            </li>
                        </ul>
                        <div class="nav__appointment">
                  <span class="navbar-text">
                    <a href="#" class="theme-btn text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Get Appointment</a>
                  </span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
@include('home.message.message')
@yield('content')
@include('home.layouts.footer')
@yield('script')
</body>
</html>
