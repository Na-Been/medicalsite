@extends('home.layouts.app')
@section('title','Blog')
@section('content')
    @if($slider)
        <div class="contact page-title">
            <div class="overlay-image"
                 style="background-image: url('{{asset(url('/').Storage::url($slider->image))}}')"></div>
            <h2 class="text-center text-uppercase text-white">Blogs</h2>
        </div>
    @endif
    <section class="blog mt-md-5">
        <div class="container">

            <div class="row">
                @forelse($blogs as $blog)
                    <div class="col-md-6 mb-3">
                        <div class="card blog-card">
                            <div class="row">
                                <div class="col-md-6">
                                    @if($blog->image)
                                        <img
                                            style="width:100%;height:100%;object-fit:cover"
                                            src="{{url('/').Storage::url($blog->image)}}"
                                            alt=""
                                        />
                                    @else
                                        <img
                                            width="100%"
                                            src="{{asset('assets/images/placeholders/200x200.jpg')}}"
                                            alt=""
                                        />
                                    @endif
                                </div>
                                <div class="col-md-6 py-4">
                                    <div class="date mb-4">{{$blog->updated_at->format('Y-m-d')}}</div>

                                    <p class="description">
                                        {!! Str::limit(ucfirst($blog->description),50) !!}
                                    </p>
                                    <a href="{{route('description.blog',$blog->id)}}" class="read-more">Read More
                                        <i class="las la-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1 class=" text-center" style="color: #878686!important;">No Blog Available !!!</h1>
                @endforelse
            </div>
        </div>
    </section>
@endsection
