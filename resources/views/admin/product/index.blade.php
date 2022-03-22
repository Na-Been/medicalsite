@extends('admin.sidebar.sidebar')
@section('title','Products')
@section('pageName','Products')
@section('sidebar')
    @parent
@stop
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Products List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="{{route('product.create')}}">
                <button class="button text-white bg-theme-1 shadow-md mr-2">Add New Products</button>
            </a>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="example" style="width:100%">
                <thead>
                <tr>
                    <th class="whitespace-no-wrap">S.N.</th>
                    <th class="whitespace-no-wrap">IMAGE</th>
                    <th class="text-center whitespace-no-wrap">PRODUCT TITLE</th>
                    <th class="text-center whitespace-no-wrap">Category</th>
                    <th class="text-center whitespace-no-wrap">DESCRIPTION</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="intro-x">
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    @if($product->image)
                                        <img alt="blog image" class="tooltip rounded-full"
                                             src="{{asset(url('/').Storage::url($product->image))}}"
                                             title="Updated at {{$product->updated_at}}">
                                    @else
                                        <img alt="about image" class="tooltip rounded-full"
                                             src="{{asset('assets/images/profile-1.jpg')}}"
                                             title="image">
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="font-medium whitespace-no-wrap text-center">
                            {{ucfirst($product->title)}}
                        </td>
                        <td class="font-medium whitespace-no-wrap text-center">
                            {{ucfirst($product->category->name)}}
                        </td>
                        <td class="font-medium whitespace-no-wrap text-center">
                            {!! Str::limit(ucfirst($product->description),20) !!}
                        </td>

                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{route('product.show',$product->id)}}"> <i
                                        data-feather="eye"
                                        class="w-4 h-4 mr-1"></i> View
                                </a>
                                <a class="flex items-center mr-3" href="{{route('product.edit',$product->id)}}"> <i
                                        data-feather="check-square"
                                        class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6 delete" href="javascript:;" data-toggle="modal"
                                   data-target="#delete-confirmation-modal" data-value="{{$product->id}}"> <i
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
            @if(count($products) !=0)
                <form action="{{route('product.destroy',$product->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="px-5 pb-8 text-center">
                        <input type="hidden" class="product_id" name="product_id">
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
                $('.product_id').val(id);
            });
        });
    </script>
@endsection