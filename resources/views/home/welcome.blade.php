@extends('home.layouts.app')
@section('title','Home')
@section('content')
    {{-- Slider --}}
    <div class="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>

                <button
                    type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide-to="2"
                    aria-label="Slide 3"></button>

            </div>
            <div class="carousel-inner" style="color: #000 !important">
                <div class="carousel-item active">
                    @if($slider)
                        <img
                            src="{{asset(url('/').Storage::url($slider->image))}}"
                            class="d-block w-100"
                            alt="..."/>
                         <div class="carousel-caption d-md-block"
                         style="color: #000 !important">

                        <h5>{{$slider->title}}</h5>
                        <p>{{$slider->sub_title}}</p>
                        <button class="btn slider-btn">
                            More &nbsp; <i class="las la-arrow-right"></i>
                        </button>
                    </div>
                    @else
                        <img
                            src="{{asset('https://image.freepik.com/free-photo/overhead-view-medical-pills-equipment-s-white-background_23-2148129662.jpg')}}"
                            class="d-block w-100"
                            alt="..."/>
                             <div class="carousel-caption d-md-block"
                         style="color: #000 !important">

                        <h5>Medical And Health</h5>
                        <p>A professional and friendly care provider.</p>
                        <button class="btn slider-btn">
                            More &nbsp; <i class="las la-arrow-right"></i>
                        </button>
                    </div>
                    @endif

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions "
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true "></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button " data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next ">
                <span class="carousel-control-next-icon" aria-hidden="true "></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{-- content--}}
    @if($about != null)
        <section class="guest-response pt-0">
            <div class="slanted">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <h3
                                class="text-center mb-3 mt-5"
                                style="color: #11857a; font-size: 2.5rem; color: #fff"
                            >
                                <b>{{str_replace('_',' ',ucfirst($about->name))}}</b>
                            </h3>


                            <div class="about-description">
                                {!! $about->description !!}
                            </div>

                            <a
                                href="{{route('home.about')}}"
                                class="btn mb-5"
                                style="background-color: #94d1cc; color: #fff"
                            >
                                More &nbsp;<i class="las la-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="doctor">
                <img
                    src="{{url('/').Storage::url($about->image)}}"
                    alt=""
                />
            </div>
        </section>
    @endif



    <section class="feature-product">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <h3
                        class="text-center mb-3"
                        style="color: #11857a; font-size: 2.5rem"
                    >
                        <b>Our Feature Product</b>
                    </h3>
                </div>
            </div>
            <div class="row pb-4">
                @forelse($products as $product)
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <img
                                src="{{url('/').Storage::url($product->image)}}"
                                class="card-img-top"
                                alt="..."
                            />
                            <div class="card-body text-center">
                                <h5 class="card-title text-center mb-3">{{$product->title}}</h5>
                                <a href="{{route('single.product.details',$product->slug)}}"
                                   class="btn product-card-btn"
                                ><b><i class="las la-eye"></i> &nbsp;View More</b></a
                                >
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class="text-center" style="color:#888">No Product Added Yet!!!</h3>
                @endforelse
            </div>
            <div class="more-product">
          <span>
              <a class="text-white ps-2" href="{{route('all.product.list')}}">More Product&nbsp;
                  <i class="las la-angle-double-right"></i></a>
          </span>
                <hr/>
            </div>
        </div>
    </section>

    <section class="help">
        <div class="container">
            <div class="card  m-auto" style="background-color: #11857a">
                <div class="row">
                    <div class="col-md-12 pb-2">
                        <h2 class="help-title text-center text-white">
                            <b>Mediaids Help Center</b>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1 help-form">
                        <form action="{{route('enquiry.store')}}" method="POST" class="m-auto" style="position:relative">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-white" for="">Email Address</label>
                                        <input type="text" class="form-control" name="email" required/>
                                    </div>
                                    @error('email')
                                    <div class='text-danger'>{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-white" for="">Name</label>
                                        <input type="text" class="form-control" name="name"/>
                                    </div>
                                        @error('name')
                                    <div class='text-danger'>{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label class="text-white" for="">Query</label>
                                <textarea class="form-control" id="" rows="3" name="query"></textarea>
                                    @error('query')
                                    <div class='text-danger'>{{$message}}</div>
                                    @enderror
                            </div>


                                    <button type="submit " class="p-0 help-submit-button">
                                            <div class="help-send">
                                        <i class="las la-arrow-right text-white"></i>
                                            </div>
                                    </button>

                        </form>
                     </div>
                </div>
            </div>
        </div>
    </section>
    <section class="client-testimonial">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <h3 class="text-center mb-3" style="color: #11857a; font-size: 2.5rem">
                        <b> Client Testimonials</b>
                    </h3>
                    <p class="text-center m-auto" style="color: #11857a">
                        Here Are The Users Testimonials !!!
                    </p>
                </div>
            </div>
            <div class="center">
                @forelse($testimonials as $testimony)
                    <div>
                        <div class="card text-center text-justify">
                            <h6 class="text-center quote">
                                <i class="fas fa-quote-left"></i>
                            </h6>
                            <div class="rating text-center d-flex mb-2 mb2 justify-content-center">
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                            </div>
                            <div class="user-says">
                                {!! $testimony->review !!}
                            </div>
                            <div class="user">
                                <div class="user-image">
                                    <img width="100%"
                                         src="{{url('/').Storage::url($testimony->image)}}"
                                         alt="https://avatarfiles.alphacoders.com/791/79102.png"/>

                                </div>
                                <span class="user-name mt-2"><b>{{$testimony->name}}</b></span>
                                <span class="user-info mt-2"><b>Software developer</b></span>
                            </div>
                        </div>
                        </div>
                        @empty
                                   <h4 class="text-center" style="color:#888">No No Testimonials Available!!!</h4>
                        @endforelse
            </div>
        </div>
    </section>
       <section class="cta-section py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2>
                        Need a doctor for checkup? Call for an
                        <span style="color:#1b9d91">emergency services!</span>
                    </h2>
                </div>
                <div class="col-md-4">
                    <div class="action text-white text-center">
                                    <h3 class="text-white">Call Us : {{getSetting('mobile_number')??getSetting('phone_number') }}</h3>
                                    <p class="text-xl-end text-center">For an appoinment</p>
                                    <i class="icofont-woman-in-glasses"></i>
                                </div>
                </div>
            </div>
        </div>

    </section>
    <section class="home-blog">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <h3 class="text-center mb-3" style="color: #11857a; font-size: 2.5rem">
                        <b>Blogs</b>
                    </h3>
                </div>
            </div>
            <div class="row">
                @forelse($blogs as $blog)
                    <div class="col-lg-6 mb-2">
                        <div class="card blog-card">
                            <div class="row">
                                <div class="col-md-6">
                                    <img  style="    width: 100%;
    height: 100%;
    object-fit: cover;"
                                         src="{{url('/').Storage::url($blog->image)}}"
                                         alt=""/>
                                </div>
                                <div class="col-md-6 py-4">
                                    <div class="date mb-4 px-3">{{$blog->updated_at->format('Y-m-d')}}</div>
                                    <div class="description px-3">
                                        {!! Str::limit($blog->description, 220) !!}
                                    </div>
                                    <a href="{{route('home.blog')}}#blog-description" class="read-more px-3">

                                        Read More <i class="las la-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="text-center" style="color:#888">No Blogs Available!!!</h4>
                @endforelse
            </div>
        </div>
    </section>

@endsection

