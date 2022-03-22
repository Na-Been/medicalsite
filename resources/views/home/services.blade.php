@extends('home.layouts.app')
@section('title','Services')
@section('content')
    @if($slider)
        <div class="contact page-title"
             >
            <div class="overlay-image" style="background-image:url('{{asset(url('/').Storage::url($slider->image))}}')"></div>
            <h2 class="text-center text-uppercase text-white">Our Services</h2>
        </div>
    @endif
    <div class="services">

                <section class="core-values" id="coreValue">
                        <div class="container">
                              @forelse($allServices as $services)
            @foreach($services as $service)
                @if($service->index_number == 1)
                            @if($loop->first)
                                <div class="row">
                                    <div class="col-md-10 offset-md-1">
                                        <h3 class="text-uppercase text-left mb-5" style="color: #11857a">
                                            <b>{{ucfirst($category->name ?? 'No Category Yet')}} </b></h3>
                                    </div>
                                </div>
                            @endif
                            <div class="row mb-2">
                                <div class="col-md-3 offset-md-1">
                                    <img width="100%" src="{{url('/').Storage::url($service->image)}}"
                                         class="card-img-top"
                                         alt="...">
                                </div>
                                <div class="col-md-7">
                                    <h4 class="title">{{ucfirst($service->name)}}</h4>
                                    <p>{!! $service->description !!}</p>
                                </div>
                            </div>
                            @endif
                @endforeach
                @empty
                <h1>No Data Available</h1>
                @endforelse
                        </div>
                    </section>


        @forelse($allServices as $services)
            @foreach($services as $service)

                @if($service->index_number == 3)
                    <section class="brands" id="{{$category->slug}}">
                        <div class="container">
                            @if($loop->first)
                                <h3 class="text-uppercase text-center mb-5" style="color: #11857a">
                                    <b class="contact-message-title">Brands We Deals</b>
                                </h3>
                                <div class="brand-company text-dark">
                                    @foreach($brands as $brand)
                                        <div class="slide">
                                            <a href="#"> <img width="100%"
                                                    src="{{asset(url('/').Storage::url($brand->image))}}"
                                                    alt="" class="img-responsive"/></a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </section>
                @endif
                @if($service->index_number == 4)
                    @if($loop->first)
                        <section class="customer-care" id="{{$category->slug}}">
                            <div class="container">
                                <div class="card p-5" style="background-color: #11857a;">
                                    <h3 class="text-uppercase text-center mb-4" style="color: #fff">
                                        <b>Customer Care </b>
                                    </h3>
                                    <h5 class="text-center mb-3" style="color: #fff;">For Every Product and Service That
                                        We
                                        Provide,
                                        Your Feedback is Crucial For Us. It Helps Us Provide You The Best Quality
                                        Possible.</h5>
                                    <p class="text-center"
                                       style="color: #fff;">{!! ucfirst($service->description) !!}</p>
                                </div>
                            </div>
                        </section>
                    @endif
                @endif
            @endforeach
        @empty
            <h1 class="text-center" style="color:#888">No Services Available Yet!!!</h1>
        @endforelse

        <div class="services">
            <section class="market" id="market">
                <div class="container">
                    <div class="row " id="market">
                        <div class="col-md-12">
                            <h3 class="text-uppercase text-center" style="color: #11857a">
                                <b>Our Target market </b>
                            </h3>
                            <p class="text-center">We strive to extend our services and products all over the country
                                someday. Till then, we have been supplying our equipment for Hospitals, Doctor Clinics,
                                Pharmaceutical Companies, Surgery Centres, Nursing Homes, Military, Dealers, Employment
                                Agencies, Physical Therapist, Occupational Therapist, Message Therapist, Insurance
                                Companies, Spas and Direct Consumers.</p>
                        </div>
                    </div>
                    <div class="row ">
                        @forelse($allServices as $services)
                            @foreach($services as $service)
                                @if($service->index_number == 3)
                                    <div class="col-md-6 mb-2 market-item">
                                        <img width="100%"
                                             src="{{asset(url('/').Storage::url($service->image))}}"
                                             alt="">
                                        <div class="market-about">
                                            <h2>{{ucfirst($service->name)}}</h2>
                                            <p>{!! ucfirst($service->description) !!}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @empty
                        @endforelse
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
