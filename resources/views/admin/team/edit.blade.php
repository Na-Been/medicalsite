@extends('admin.sidebar.sidebar')
@section('title','Our Team')
@section('pageName','Our Team')
@section('sidebar')
    @parent
@stop
@section('content')
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Edit Team
        </h2>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="{{route('team.index')}}">
                <button class="button text-white bg-theme-7 shadow-md mr-2">Back To List</button>
            </a>
        </div>
    </div>
    <form method="POST" action="{{ route('team.update',$team->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="intro-y box p-5">
            <div class="grid grid-cols-2 gap-6 mt-4">

                <!-- BEGIN: Form Layout -->

                <div style="border-right:1px solid #b0b0b033;padding-right:30px">
                    <div>
                        <label>Name</label>
                        <input type="text" class="input w-full border mt-2" name="name"
                               placeholder="Input name" value="{{$team->name}}">
                        @error('name')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" class="input w-full border mt-2" name="email"
                               placeholder="Input email" value="{{$team->email}}">
                        @error('email')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label>Education</label>
                        <input type="text" class="input w-full border mt-2" name="education"
                               placeholder="Input education" value="{{$team->education}}">
                        @error('education')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label>Post</label>
                        <input type="text" class="input w-full border mt-2" name="post"
                               placeholder="Input post" value="{{$team->post}}">
                        @error('post')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label>Number</label>
                        <input type="number" class="input w-full border mt-2" name="number"
                               placeholder="Input number" value="{{$team->number}}">
                        @error('number')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label>Address</label>
                        <input type="text" class="input w-full border mt-2" name="address"
                               placeholder="Input address" value="{{$team->address}}">
                        @error('address')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="mt-3">
                        <label>Description</label>
                        <div class="mt-2">
                        <textarea class="form-control summary-ckeditor"
                                  name="description">{!! $team->description !!}</textarea>
                            @error('description')
                            <div class="text-theme-6">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="control-label col-md-3 p-0">Feature Image :</label>
                        <br>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new img-thumbnail"
                                 style="max-width: 200px; max-height: 150px;">
                                @if($team->image)
                                    <img
                                        src="{{asset(url('/').Storage::url($team->image))}}"
                                        alt="...">
                                @else
                                    <img
                                        src="{{asset('assets/images/placeholders/image_placeholder.png')}}"
                                        alt="...">
                                @endif
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"
                                 style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                                <br>
                                <span class="btn btn-outline-secondary btn-file w-100 mb-3"><span
                                        class="fileinput-new">Select Image</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="image"></span>
                                <a href="#" class="btn btn-outline-secondary fileinput-exists w-100"
                                   data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                        @error('image')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>

                    <div class=" mt-5">
                        <button type="submit" class="button w-24 bg-theme-1 text-white">Update</button>
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


