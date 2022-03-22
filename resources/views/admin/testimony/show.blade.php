@extends('admin.sidebar.sidebar')
@section('title','Testimony')
@section('pageName','Testimony')
@section('sidebar')
    @parent
@stop
@section('content')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="{{route('testimony.index')}}">
                <button class="button text-white bg-theme-7 shadow-md mr-2">Back To List</button>
            </a>
            <a class="flex items-center text-theme-6 delete" href="javascript:;" data-toggle="modal"
               data-target="#delete-confirmation-modal" data-value="{{$testimony->id}}"> <i data-feather="trash-2"
                                                                                            class="w-4 h-4 mr-1"></i>
                Delete
            </a>
        </div>
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div>
                <h1>Name</h1><br/>
                <h3>{{ucfirst($testimony->name)}}</h3><br/>

                <h1>Designation</h1><br/>
                <h3> {!! Str::limit(ucfirst($testimony->designation),20) !!}</h3>

                <h1>Review</h1><br/>
                <h3>    {!! Str::limit(ucfirst($testimony->review),20) !!}</h3>

                <h1>Rating</h1><br/>
                <h3>  {{$testimony->rating}}</h3>

                <h1>Image</h1><br/>
                @if($testimony->image)
                    <img src="{{asset(url('/').Storage::url($testimony->image))}}" style="width: 200px; height: 150px;">
                @else
                    <img src="{{asset('assets/images/profile-1.jpg')}}" style="width: 200px; height: 150px;">
                @endif
            </div>
        </div>

        <!-- BEGIN: Delete Confirmation Modal -->

        <div class="modal" id="delete-confirmation-modal">
            <div class="modal__content">
                <div class="p-5 text-center">
                    <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be
                        undone.
                    </div>
                </div>
                <form action="{{route('testimony.destroy',$testimony->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="px-5 pb-8 text-center">
                        <input type="hidden" name="testimony_id" class="testimony_id">
                        <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">
                            Cancel
                        </button>
                        <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- END: Delete Confirmation Modal -->
        @endsection
        @section('script')
            <script>
                $(document).ready(function () {
                    $('.delete').click(function () {
                        let id = $(this).data('value');
                        $('.testimony_id').val(id);
                    });
                });
            </script>
@endsection
