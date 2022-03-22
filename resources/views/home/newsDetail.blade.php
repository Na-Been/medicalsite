@extends('home.layouts.app')
@section('title','News Details')
<style>
    ul {
        padding: 0px;
    }

    .details .title {
        color: #11857a;
    }
</style>
@section('content')

    <section class="details">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    @if($news->image)
                        <img
                            width="100%"
                            src="{{url('/').Storage::url($news->image)}}"
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
                <div class="col md-4 offset-md-1" style="display: flex; align-items: center; color: #11857a;">
                    <h2 class="product-name">{{$news->title}}</h2>
                </div>
            </div>
            <div class="row mt-5">


                <div class="col-md-10 offset-md-1">
                    <ul class="p-md-0">
                        <h5 class="title">Description</h5>

                        <li>
                            {!! $news->description !!}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="blog mt-md-5">
        <div class="container">
            <div class="row">
                @foreach($newsUpdate as $news)
                    <div class="col-md-6 mb-3">
                        <div class="card blog-card">
                            <div class="row">
                                <div class="col-md-6">
                                    @if($news->image)
                                        <img
                                            style="width:100%;height:100%;object-fit:cover"
                                            src="{{url('/').Storage::url($news->image)}}"
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
                                    <div class="date mb-4">{{$news->updated_at->format('Y-m-d')}}</div>

                                    <p class="description">
                                        {!! Str::limit(ucfirst($news->description),50) !!}
                                    </p>
                                    <a href="{{route('description.blog',$news->id)}}" class="read-more">Read More
                                        <i class="las la-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
