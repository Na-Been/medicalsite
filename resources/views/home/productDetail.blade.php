@extends('home.layouts.app')
@section('title','Product Details')
<style>
    ul{
        padding: 0px;
    }
    .details .title{
        color: #11857a;
    }
</style>
@section('content')

    <section class="details">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-1">
                    <img
                        width="100%"
                        src="{{url('/').Storage::url($product->image)}}"
                        alt=""
                    />
                </div>
                <div class="col md-4 offset-md-1" style="display: flex; align-items: center; color: #11857a;">
                    <h2 class="product-name">{{$product->title}}</h2>
                </div>
            </div>
            <div class="row mt-5">


                <div class="col-md-10 offset-md-1">
                    <ul class="p-md-0">
                        <h5 class="title">Description</h5>

                        <li>
                            {!! $product->description !!}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection
