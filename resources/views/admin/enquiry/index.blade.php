@extends('admin.sidebar.sidebar')
@section('title','Enquiry')
@section('pageName','Enquiry')
@section('sidebar')
    @parent
@stop
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Enquiry List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="example" style="width:100%">
                <thead>
                <tr>
                    <th class="whitespace-no-wrap">S.N.</th>
                    <th class="text-center whitespace-no-wrap">Name</th>
                    <th class="text-center whitespace-no-wrap">Email</th>
                    <th class="text-center whitespace-no-wrap">Query</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @foreach($enquiries as $enquiry)
                    <tr class="intro-x">
                        <td class="font-medium whitespace-no-wrap text-center">
                            {{$loop->iteration}}
                        </td>
                        <td class="text-center">{{ucfirst($enquiry->name)}}</td>
                        <td class="text-center">{{ucfirst($enquiry->email)}}</td>
                        <td class="text-center">{{Str::limit(ucfirst($enquiry->query),20)}}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{route('enquiry.show',$enquiry->id)}}"> <i
                                        data-feather="eye"
                                        class="w-4 h-4 mr-1"></i> View
                                </a>
                                <a class="flex items-center text-theme-6 delete" href="javascript:;" data-toggle="modal"
                                   data-target="#delete-confirmation-modal" data-value="{{$enquiry->id}}"> <i
                                        data-feather="trash-2"
                                        class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
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
            @if(count($enquiries) != 0)
                <form action="{{route('enquiry.destroy',$enquiry->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="px-5 pb-8 text-center">
                        <input type="hidden" class="enquiry_id" name="enquiry_id">
                        <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel
                        </button>
                        <button type="submit" class="button w-24 bg-theme-6 text-white">Delete</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.delete').click(function () {
                let id = $(this).data('value');
                $('.enquiry_id').val(id);
            });
        });
    </script>
@endsection
