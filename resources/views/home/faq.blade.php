@extends('home.layouts.app')
@section('title','FAQ')
@section('content')
    @if($slider)
        <div class="contact page-title"
             >
            <div class="overlay-image" style="background-image: url('{{asset(url('/').Storage::url($slider->image))}}')"></div>
            <h2 class="text-center text-uppercase text-white">FAQ</h2>
        </div>
    @endif
    <section class="faq">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="accordion" id="accordionExample">
                        @forelse($faqs as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$faq->id}}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{$faq->id}}" aria-expanded="true"
                                            aria-controls="collapse{{$faq->id}}">
                                 {!! ucfirst($faq->question) !!}
                                    </button>
                                </h2>
                                <div id="collapse{{$faq->id}}" class="accordion-collapse collapse"
                                     aria-labelledby="heading{{$faq->id}}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! ucfirst($faq->answer) !!}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3 class="text-center " style=" color:#888">No FAQ Available For Now!!!</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
