@extends('admin.sidebar.sidebar')
@section('title','Profile')
@section('pageName','Profile')
@section('sidebar')
    @parent
@stop
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Update Profile
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5">
                <div class="relative flex items-center p-5">
                    <div class="w-12 h-12 image-fit">
                        @if(auth()->user()->image)
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                 src="{{asset(url('/').Storage::url(auth()->user()->image))}}">
                        @else
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                 src="{{asset('assets/images/profile-6.jpg')}}">
                        @endif
                    </div>
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-base">{{auth()->user()->name}}</div>
                    </div>
                </div>
                <div class="p-5 border-t border-gray-200 dark:border-dark-5">
                    <a class="flex items-center text-theme-1 dark:text-theme-10 font-medium"
                       href="{{route('change.profile')}}"> <i
                            data-feather="activity" class="w-4 h-4 mr-2"></i> Personal Information </a>
                    <a class="flex items-center mt-5" href="{{route('reset.password.page')}}"> <i data-feather="lock"
                                                                                                  class="w-4 h-4 mr-2"></i>
                        Change
                        Password </a>
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Personal Information
                    </h2>
                </div>
                <form method="POST" action="{{route('update.profile')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12 xl:col-span-4">
                                <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                    <div>
                                        <div class="mt-2">
                                            <label class="control-label col-md-3 p-0">Feature Image :</label>
                                            <br>
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new img-thumbnail"
                                                     style="max-width: 200px; max-height: 150px;">
                                                    @if(auth()->user()->image)
                                                        <img
                                                            src="{{asset(url('/').Storage::url(auth()->user()->image))}}"
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 xl:col-span-8">
                                <div>
                                    <label>Display Name</label>
                                    <input type="text" class="input w-full border bg-gray-100 mt-2" name="name"
                                           placeholder="Input text" value="{{auth()->user()->name}}">
                                    @error('name')
                                    <div class="text-theme-6">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <label>Email Address</label>
                                    <input type="text" class="input w-full border bg-gray-100   mt-2" name="email"
                                           placeholder="Input text" value="{{auth()->user()->email}}">
                                    @error('email')
                                    <div class="text-theme-6">{{$message}}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="button w-20 bg-theme-1 text-white mt-3">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END: Display Information -->
@endsection


