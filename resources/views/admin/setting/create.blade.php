@extends('admin.sidebar.sidebar')
@section('title','Setting')
@section('pageName','Setting')
@section('sidebar')
    @parent
@stop
@section('content')
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
           Update Setting
        </h2>
    </div>
    <form method="POST" action="{{route('setting.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="intro-y box p-5">
            <div class="grid grid-cols-2 gap-6 mt-4">

                <!-- BEGIN: Form Layout -->

                <div>
                    <div>
                        <label>Title</label>
                        <input type="text" class="input w-full border mt-2" name="title"
                               value="{{old('title',getSetting('title'))}}" placeholder="Input title">
                        @error('title')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div>
                        <label>Site Title</label>
                        <input type="text" class="input w-full border mt-2" name="site_title"
                               value="{{old('site_title',getSetting('site_title'))}}" placeholder="Input site_title">
                        @error('site_title')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label>Short Name</label>
                        <input type="text" class="input w-full border mt-2" name="short_name"
                               value="{{old('short_name',getSetting('short_name'))}}" placeholder="Input short name">
                        @error('short_name')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label>Phone Number</label>
                        <input type="number" class="input w-full border mt-2" name="phone_number"
                               value="{{old('phone_number',getSetting('phone_number'))}}" placeholder="Input phone_number">
                        @error('phone_number')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label>Mobile Number</label>
                        <input type="number" class="input w-full border mt-2" name="mobile_number"
                               value="{{old('mobile_number',getSetting('mobile_number'))}}" placeholder="Input mobile_number">
                        @error('mobile_number')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label>Street Address</label>
                        <input type="text" class="input w-full border mt-2" name="street_address"
                               value="{{old('street_address',getSetting('street_address'))}}" placeholder="Input street_address">
                        @error('street_address')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label>Post Address</label>
                        <input type="text" class="input w-full border mt-2" name="post_code"
                               value="{{old('post_code',getSetting('post_code'))}}" placeholder="Input post_code">
                        @error('post_code')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label>Address</label>
                        <input type="text" class="input w-full border mt-2" name="address"
                               value="{{old('address',getSetting('address'))}}" placeholder="Input address">
                        @error('address')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label>Email</label>
                        <input type="email" class="input w-full border mt-2" name="email"
                               value="{{old('email',getSetting('email'))}}" placeholder="Input email">
                        @error('email')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label>Website</label>
                        <input type="url" class="input w-full border mt-2" name="website"
                               value="{{old('website',getSetting('website'))}}" placeholder="Input website">
                        @error('website')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="mt-2">
                        <label>Facebook Link</label>
                        <input type="url" class="input w-full border mt-2" name="facebook_link"
                               value="{{old('facebook_link',getSetting('facebook_link'))}}" placeholder="Input facebook link">
                        @error('facebook_link')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label>Instagram Link</label>
                        <input type="url" class="input w-full border mt-2" name="instagram_link"
                               value="{{old('instagram_link',getSetting('instagram_link'))}}" placeholder="Input instagram link">
                        @error('instagram_link')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label>Twitter Link</label>
                        <input type="url" class="input w-full border mt-2" name="twitter_link"
                               value="{{old('twitter_link',getSetting('twitter_link'))}}" placeholder="Input twitte link">
                        @error('twitter_link')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label>Skype Link</label>
                        <input type="url" class="input w-full border mt-2" name="skype_link"
                               value="{{old('skype_link',getSetting('skype_link'))}}" placeholder="Input skype link">
                        @error('skype_link')
                        <div class="text-theme-6">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <label class="control-label col-md-3 p-0">Upload Logo :</label>
                        <br>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new img-thumbnail"
                                 style="max-width: 200px; max-height: 150px;">
                                @if(getSetting('logo'))
                                    <img
                                        src="{{asset(url('/').Storage::url(getSetting('logo')))}}"
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
                                    <input type="file" name="logo"></span>
                                <a href="#" class="btn btn-outline-secondary fileinput-exists w-100"
                                   data-dismiss="fileinput">Remove</a>
                            </div>

                        </div>
                    </div>

                    <div class="text-left mt-5">
                        <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                    </div>
                </div>
            </div>
            <!-- END: Form Layout -->

        </div>
    </form>
@endsection
