@extends('home.layouts.app')
@section('title','News & Update')
@section('content')
    @if($slider)
        <div class="contact page-title"
            >
            <div class="overlay-image"  style="background-image: url('{{asset(url('/').Storage::url($slider->image))}}')"></div>
            <h2 class="text-center text-white text-uppercase">News & Updates</h2>
        </div>
    @endif

    <section class="news" id="news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-uppercase text-left mb-5" style="color: #11857a">
                        <b>Latest News & Updates </b></h3>
                </div>
            </div>

            <div class="row ">
                @forelse($news as $new)
                    <div class="col-md-6 mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <img style="width:100%;height:100%;object-fit:cover"
                                     src="{{url('/').Storage::url($new->image)}}"
                                     class="card-img-top" alt="...">
                            </div>
                            <div class="col-md-9">
                                <h4 class="title">{!! $new->title !!}</h4>
                                <p>{!! Str::limit(ucfirst($new->description),150) !!}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3 class=" text-center" style="color:#888">No News Available !!!</h3>
                @endforelse
            </div>
        </div>
    </section>

@endsection
