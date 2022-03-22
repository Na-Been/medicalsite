@extends('home.layouts.app')
@section('title','Contact')
@section('content')
    @if($slider)
        <div class="contact page-title"
             >
            <div class="overlay-image" style="background-image: url('{{asset(url('/').Storage::url($slider->image))}}')"></div>
            <h2 class="text-center text-uppercase text-white">Contact us</h2>
        </div>
    @endif
    <section class="get-in-touch">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <h3 class="text-uppercase text-center" style="color: #fff">
                        <b>Get In touch</b>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div
                    class="col-md-4 my-4 p-md-4 d-flex text-center"
                    style="flex-direction: column; align-items: center">
                    <div class="contact-address-icon mb-2">
                        <i class="las la-phone"></i>
                    </div>
                    <h4 class="title text-uppercase"><b>Phone</b></h4>
                    <div class="phone-number">
                        {{getSetting('phone_number').' /'. getSetting('mobile_number')}} <br/>

                    </div>
                </div>
                <div
                    class="col-md-4 my-4 d-flex p-md-4 text-center"
                    style="flex-direction: column; align-items: center">
                    <div class="contact-address-icon mb-2">
                        <i class="las la-map-marker"></i>
                    </div>
                    <h4 class="title text-uppercase"><b>Address</b></h4>
                    <div class="location">
                        {{getSetting('address')}} <br/>
                    </div>
                </div>

                <div
                    class="col-md-4 my-4 p-md-4 d-flex text-center"
                    style="flex-direction: column; align-items: center">

                    <div class="contact-address-icon mb-2">
                        <i class="las la-envelope"></i>
                    </div>
                    <h4 class="title text-uppercase"><b>Email</b></h4>
                    <div class="email">
                        {{getSetting('email')}}
                        <br/>
                        {{getSetting('website')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="message">
        <div class="container">
            <div class="row">
                <div class="col-md-5 offset-md-1">
                    <h3
                        class="text-uppercase contact-message-title"
                        style="color: #11857a">
                        <b>Message Us</b>
                    </h3>
                    <p class="contact-message-description" style="text-align: justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis
                        ad blanditiis eveniet voluptatibus ex. Nisi, nobis recusandae
                        sapiente mollitia ut culpa libero nemo fugiat aliquam ipsa
                        obcaecati, repudiandae excepturi suscipit.
                    </p>
                    <div style=" filter: drop-shadow(-1px 6px 3px rgba(50, 50, 0, 0.5));">
                        <div class="message-logo text-center m-auto">
                            <h4 class="text-uppercase">Mediaids</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-sm-3 offset-md-1">
                    <form action="{{route('enquiry.store')}}" method="POST" class="form">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" autocomplete="off" name="name" required/>
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" class="form-control" name="email" required/>
                        </div>
                        <br/>

                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea class="form-control" id="" rows="3" name="query"></textarea>
                        </div>
                        <br/>
                        <button class="btn" type="submit"
                                style="background-color:#11857a;color:#fff;border-radius: 30px; padding: 15px 30px;">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
