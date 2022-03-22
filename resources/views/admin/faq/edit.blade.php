@extends('admin.sidebar.sidebar')
@section('title','FAQ')
@section('pageName','FAQ')
@section('sidebar')
    @parent
@stop
@section('content')
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Edit FAQ
        </h2>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="{{route('question.index')}}">
                <button class="button text-white bg-theme-7 shadow-md mr-2">Back To List</button>
            </a>
        </div>
    </div>
    <form method="POST" action="{{ route('question.update',$faq->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

            <div class="intro-y box p-5">
                <div class="grid grid-cols-2 gap-6 mt-4">

                    <!-- BEGIN: Form Layout -->

                    <div style="border-right:1px solid #b0b0b033;padding-right:30px">

                        <div class="mt-3">
                            <label>Question</label>
                            <div class="mt-2">
                        <textarea class="form-control summary-ckeditor"
                                  name="question">{!! $faq->question !!}</textarea>
                                @error('question')
                                <div class="text-theme-6">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-3">
                            <label>Answer</label>
                            <div class="mt-2">
                        <textarea class="form-control summary-ckeditor"
                                  name="answer">{!! $faq->answer !!}</textarea>
                                @error('answer')
                                <div class="text-theme-6">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class=" mt-5">
                            <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                        </div>
                    </div>

                    <!-- END: Form Layout -->
                </div>
            </div>
    </form>
@endsection
@section('script')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replaceAll('summary-ckeditor');
    </script>
@endsection
