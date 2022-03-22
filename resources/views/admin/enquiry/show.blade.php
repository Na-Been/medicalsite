@extends('admin.sidebar.sidebar')
@section('title','Enquiry')
@section('pageName','Enquiry')
@section('sidebar')
    @parent
@stop
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Name : {{$enquiry->name}}<br/>
        Email : {{$enquiry->value}}
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="{{route('enquiry.index')}}">
                <button class="button text-white bg-theme-7 shadow-md mr-2">Back To List</button>
            </a>
            <a class="flex items-center text-theme-6 delete" href="javascript:;" data-toggle="modal"
               data-target="#delete-confirmation-modal" data-value="{{$enquiry->id}}"> <i data-feather="trash-2"
                                                                                        class="w-4 h-4 mr-1"></i> Delete
            </a>
        </div>
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div>
                <h1>Vision</h1><br/>
                <h3>{!! $enquiry->query !!}</h3><br/>

            </div>
        </div>

        <!-- BEGIN: Delete Confirmation Modal -->
        <div class="modal" id="delete-confirmation-modal">
            <div class="modal__content">
                <div class="p-5 text-center">
                    <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot
                        be
                        undone.
                    </div>
                </div>
                <form method="POST" action="{{route('enquiry.destroy',$enquiry->id)}}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="enquiry_id" id="enquiry_id" class="enquiry_id">
                    <div class="px-5 pb-8 text-center">
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
                $(document).ready(function (){
                    $('.delete').click(function (){
                        let id = $(this).data('value');
                        $('#enquiry_id').val(id);
                    });
                });
            </script>
@endsection