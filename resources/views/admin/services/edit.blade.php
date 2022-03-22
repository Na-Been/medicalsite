@extends('admin.sidebar.sidebar')
@section('title','Service')
@section('pageName','Service')
@section('sidebar')
    @parent
@stop
@section('content')
    <div class="intro-y flex items-center mt-5">
        <h2 class="text-lg font-medium mr-auto">
            Edit Service
        </h2>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="{{route('services.index')}}">
                <button class="button text-white bg-theme-7 shadow-md mr-2">Back To List</button>
            </a>
        </div>
    </div>
    <form method="POST" action="{{ route('services.update',$service->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="intro-y box p-5">
            <div class="grid grid-cols-2 gap-6 mt-4">

                <!-- BEGIN: Form Layout -->
                <div style="border-right:1px solid #b0b0b033;padding-right:30px">
                    <div class="text-xl mt-5">
                        <div>
                            <label> Category</label>
                            <div class="mt-2">
                                <select class="select2" name="category_id" style="height:40px !important">
                                    <option selected
                                            value="{{$service->category->id}}">{{$service->category->name}}</option>
                                    <option disabled>Please Select One</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-theme-6">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-xl mt-5">
                        <div>
                            <label> In Which Index You Want To Display It?</label>
                            <div class="mt-2">
                                <select class="select2" name="index_number" style="height:40px !important">
                                    <option selected value="{{$service->index_number}}">
                                        @if($service->index_number == 1)
                                            First
                                        @elseif($service->index_number == 2)
                                            Second
                                        @elseif($service->index_number == 3)
                                            Third
                                        @else
                                            Fourth
                                        @endif
                                    </option>
                                    <option disabled>Please Select One</option>
                                    <option value="1">First</option>
                                    <option value="2">Second</option>
                                    <option value="3">Third</option>
                                    <option value="4">Fourth</option>
                                </select>
                                @error('index_number')
                                <div class="text-theme-6">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-xl mt-5">
                        <div>
                            <label>Name</label>
                            <div class="mt-2">
                                <input type="text" class="input w-full border mt-2" name="name"
                                       placeholder="Input name" value="{{$service->name}}">
                                @error('name')
                                <div class="text-theme-6">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Description</label>
                        <div class="mt-2">
                        <textarea class="form-control summary-ckeditor"
                                  name="description">{!! $service->description !!}</textarea>
                            @error('description')
                            <div class="text-theme-6">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mt-2">
                        <label class="control-label col-md-3 p-0">Feature Image :</label>
                        <br>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new img-thumbnail"
                                 style="max-width: 200px; max-height: 150px;">
                                @if($service->image)
                                    <img
                                        src="{{asset(url('/').Storage::url($service->image))}}"
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
        $(document).ready(function () {
            $('.select2').select2({
                'width': '100%'
            });
        });
    </script>
@endsection

