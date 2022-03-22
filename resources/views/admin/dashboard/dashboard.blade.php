@extends('admin.sidebar.sidebar')
@section('title','Dashboard')
@section('pageName','Dashboard')
@section('sidebar')
    @parent
@stop
@section('content')
    <!-- BEGIN: Content -->
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General Report
                    </h2>
                    <a href="{{route('admin.dashboard')}}" class="ml-auto flex text-theme-1 dark:text-theme-10"> <i
                            data-feather="refresh-ccw"
                            class="w-4 h-4 mr-3"></i>
                        Reload Data </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in"><a href="{{route('category.index')}}">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="activity" class="report-box__icon text-theme-10"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{$category}}</div>
                                    <div class="text-base text-gray-600 mt-1">Total Category</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <a href="">
                            <div class="report-box zoom-in"><a href="{{route('product.index')}}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="package" class="report-box__icon text-theme-11"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$product}}</div>
                                        <div class="text-base text-gray-600 mt-1">Total Products</div>
                                    </div>
                                </a>
                            </div>
                        </a>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <a href="">
                            <div class="report-box zoom-in"><a href="{{route('news.index')}}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="airplay" class="report-box__icon text-theme-12"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$news}}</div>
                                        <div class="text-base text-gray-600 mt-1">News & Update</div>
                                    </div>
                                </a>
                            </div>
                        </a>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <a href="">
                            <div class="report-box zoom-in"><a href="{{route('enquiry.index')}}">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="info" class="report-box__icon text-theme-9"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$enquiry}}</div>
                                        <div class="text-base text-gray-600 mt-1">Enquiry</div>
                                    </div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Sales Report -->


            <!-- BEGIN: Weekly Top Products -->
            <div class="col-span-12 mt-6">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Latest Enquires
                    </h2>
                </div>
                <table class="table table-report sm:mt-2">
                    <thead>
                    <tr>
                        <th class="whitespace-no-wrap">S.N.</th>
                        <th class="whitespace-no-wrap">NAME</th>
                        <th class="whitespace-no-wrap">EMAIL</th>
                        <th class="text-center whitespace-no-wrap">QUERY</th>
                        <th class="text-center whitespace-no-wrap">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($enquiries as $enquiry)
                        <tr class="intro-x">
                            <td>{{$loop->iteration}}</td>
                            <td class="text-center">{{$enquiry->name}}</td>
                            <td class="text-center">{{$enquiry->email}}</td>
                            <td class="text-center">{!! Str::limit($enquiry->query,20) !!}</td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{route('enquiry.show',$enquiry->id)}}"> <i
                                            data-feather="eye"
                                            class="w-4 h-4 mr-1"></i> View
                                    </a>
                                    <a class="flex items-center text-theme-6 delete" href="javascript:;"
                                       data-toggle="modal"
                                       data-target="#delete-confirmation-modal" data-value="{{$enquiry->id}}"> <i
                                            data-feather="trash-2"
                                            class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <td colspan="5" class="text-center">
                            <strong>No Enquiry Yet!!!</strong>
                        </td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <!-- END: Weekly Top Products -->
        </div>
    </div>
    <!-- END: Content -->

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
