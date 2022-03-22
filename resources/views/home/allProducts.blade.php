@extends('home.layouts.app')
@section('title','Products')
@section('content')
    @if($slider)
        <div class="product">
            <div class="contact page-title"
                 style="background-image: url('{{asset(url('/').Storage::url($slider->image))}}')">
                <h2 class="text-center text-uppercase text-white">Our Product</h2>
            </div>
            @endif
            <div class="container mt-5">

                <div class="row">
                    @forelse($items as $item)
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <img
                                    src="{{url('/').Storage::url($item->image)}}"
                                    class="card-img-top"
                                    alt="..."
                                />
                                <div class="card-body text-center">
                                    <h5 class="card-title text-center mb-3">{{$item->title}}</h5>
                                    <a href="{{route('single.product.details',$item->slug)}}"
                                       class="btn product-card-btn"
                                    ><b><i class="las la-eye"></i> &nbsp;View More</b></a
                                    >
                                </div>
                            </div>
                        </div>
                    @empty
                        <strong>No Product Available !!</strong>
                    @endforelse
                </div>
            </div>
        </div>


@endsection
