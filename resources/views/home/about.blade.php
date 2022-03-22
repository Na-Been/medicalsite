@extends('home.layouts.app')
@section('title','About Us')
@section('content')
    @if($slider)
        <div class="contact page-title">
            <div class="overlay-image"  style="background-image: url('{{asset(url('/').Storage::url($slider->image))}}')"></div>
            <h2 class="text-center text-white text-uppercase">About Us</h2>
        </div>
    @endif
    @forelse($abouts as $about)
        @if($about->name == 'who_we_are')
            <section class="who-we-are" id="whoweare">
                <div class="container">
                    <h3 class="text-center mb-5" style="color: #11857a; font-size: 2.5rem">
                        <b>{{str_replace('_',' ',ucfirst($about->name))}}</b>
                    </h3>

                    <div class="row">
                        <div class="col-md-10 m-auto">
                            <div class="" style="text-align: justify">
                                {!! $about->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if($about->name == 'mission_and_vision')
            <section class="vision">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 offset-md-1">
                            <h3 class="mb-2" style="color: #11857a; font-size: 2.5rem">
                                <b>{{str_replace('_',' ',ucfirst($about->name))}}</b>
                            </h3>
                            <p style="text-align: justify">
                                {!! $about->description !!}
                            </p>

                            <h3 class="mt-5" style="color: #11857a; font-size: 2.5rem">
                                <b>Vision</b>
                            </h3>
                            <div style="text-align: justify">
                                To enjoy the integrity, honesty and mutual trust of clients and
                                suppliers.
                            </div>
                        </div>
                        <div class="col-md-5 offset-md-1">
                            <img
                                width="80%"
                                src="{{url('/').Storage::url($about->image)}}"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </section>
        @endif
        @if($about->name == 'message_from_ceo')
            <section class="message-from-ceo" id="messagefromceo">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 offset-md-1">
                            <img
                                width="50%"
                                src="{{url('/').Storage::url($about->image)}}"
                                alt="https://pngimg.com/uploads/doctor/doctor_PNG15980.png "
                            />
                        </div>
                        <div class="col-md-4 pt-md-2">
                            <h3 class="mb-4" style="color: #11857a">{{str_replace('_',' ',ucfirst($about->name))}}</h3>
                            <i
                                class="fas fa-quote-left"
                                style="color: #11857a; font-size: 20px"
                            ></i>
                            <br/>
                            <div class="ceo-message" style="text-align: justify">
                                {!! $about->description !!}
                            </div>
                            <span>
             &nbsp;         &nbsp;<i class="fas fa-quote-right" style="color: #11857a; font-size: 20px"></i>
                        </span>
                            <br/>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @empty
        <h3 class="text-center" style="color:#888">No About Us Added Yet!!!</h1>
    @endforelse

    <section id="team"
             class="our-team"
             style="
        background: linear-gradient(
          to bottom,
          #f5f3f8,
          #f7f6fa,
          #faf9fc,
          #fcfcfd,
          #ffffff
        );
      ">
        <div class="container">
            <h3 class="text-center mb-5" style="color: #11857a; font-size: 2.5rem">
                <b>Our Team</b>
            </h3>
            <div class="ourTeam text-dark">
                @forelse($teams as $team)
                    <div class="tm">
                        @if($team->image)
                    <div class="team-image mb-4">
                            <img
                            style="width: 100%;
                                   height: 100%;
                                   object-fit: cover;"
                            class=""
                            src="{{url('/').Storage::url($team->image)}}"
                            alt="team_member_image"
                        />
                        @else
                        <div class="team-image mb-4">
                            <img
                            style="width: 100%;
                                   height: 100%;
                                   object-fit: cover;"
                            class=""
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAyGylU6_9S993PXHadYbqS0CwjNNw1FwDUrSQRKfe8TMgAPC97fXfZ20ibyG7XSJymSw&usqp=CAU"
                            alt=""
                        />
                        @endif
                    </div>
                        <h6 class="staff-name"><b>{{ucfirst($team->name)}}</b></h6>
                        <h6 class="staff-degination"><b>{{ucfirst($team->post)}}</b></h6>
                    </div>
                @empty
                    <h3 class="text-center">No Team Added Yet!!!</h3>
                @endforelse
            </div>
        </div>
    </section>
@endsection
