@extends('admin.sidebar.sidebar')
@section('title','Our Team')
@section('pageName','Our Team')
@section('sidebar')
    @parent
@stop
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Our Team List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="{{route('team.create')}}">
                <button class="button text-white bg-theme-1 shadow-md mr-2">Add New Team</button>
            </a>
            <div class="dropdown">
                <button class="dropdown-toggle button px-2 box text-gray-700 dark:text-gray-300">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="example" style="width:100%">
                <thead>
                <tr>
                    <th class="whitespace-no-wrap">S.N.</th>
                    <th class="whitespace-no-wrap">IMAGE</th>
                    <th class="text-center whitespace-no-wrap">Name</th>
                    <th class="text-center whitespace-no-wrap">Email</th>
                    <th class="text-center whitespace-no-wrap">Education</th>
                    <th class="text-center whitespace-no-wrap">Post</th>
                    <th class="text-center whitespace-no-wrap">Number</th>
                    <th class="text-center whitespace-no-wrap">Address</th>
                    <th class="text-center whitespace-no-wrap">Description</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr class="intro-x">
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="w-40">
                            <div class="flex">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    @if($team->image)
                                        <img alt="blog image" class="tooltip rounded-full"
                                             src="{{asset(url('/').Storage::url($team->image))}}"
                                             title="Updated at {{$team->updated_at}}">
                                    @else
                                        <img alt="about image" class="tooltip rounded-full"
                                             src="{{asset('assets/images/profile-1.jpg')}}"
                                             title="image">
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="font-medium whitespace-no-wrap text-center">
                            {{ucfirst($team->name)}}
                        </td>
                        <td class="text-center">{{$team->email}}</td>
                        <td class="text-center">{{ucfirst($team->education)}} </td>
                        <td class="text-center">{{ucfirst($team->post)}} </td>
                        <td class="text-center">{{$team->number}} </td>
                        <td class="text-center">{{ucfirst($team->address)}} </td>
                        <td class="text-center">{!! Str::limit(ucfirst($team->description),20) !!} </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{route('team.show',$team->id)}}"> <i
                                        data-feather="eye"
                                        class="w-4 h-4 mr-1"></i> View
                                </a>
                                <a class="flex items-center mr-3" href="{{route('team.edit',$team->id)}}"> <i
                                        data-feather="check-square"
                                        class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6 delete" href="javascript:;" data-toggle="modal"
                                   data-target="#delete-confirmation-modal" data-value="{{$team->id}}"> <i
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
            @if(count($teams) != 0)
                <form action="{{route('team.destroy',$team->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="px-5 pb-8 text-center">
                        <input type="hidden" name="team_id" id="team_id">
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
                var id = $(this).data('value');
                $('#team_id').val(id);
            });
        });
    </script>
@endsection
