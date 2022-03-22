<!doctype html>
@if(modeSelector('mode_status') == 0)
    <html lang="en" class="light">
    @else
        <html lang="en" class="dark">
        @endif
        <head>
            <meta charset="utf-8">

            <link rel="icon" href="{{asset('assets/images/placeholders/image_placeholder.png')}}">

            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description"
                  content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
            <meta name="keywords"
                  content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
            <meta name="author" content="LEFT4CODE">
            <title>{{getSetting('site_title')?? null }} | @yield('title')</title>
            <!-- END: CSS Assets-->
            <link rel="stylesheet"
                  href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
            <!-- select 2 -->
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
            <!-- BEGIN: CSS Assets-->
            <link rel="stylesheet" href="{{asset('assets/css/app.css')}}"/>
            <link rel="stylesheet" href="{{asset('assets/css/table.css')}}"/>
            <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}"/>
        </head>
        <body class="app">
        @section('sidebar')
            <!-- BEGIN: Mobile Menu -->
            <div class="mobile-menu md:hidden">
                <div class="mobile-menu-bar">
                    <a href="{{url('/')}}" class="flex mr-auto">
                        @if(getSetting('logo'))
                            <img alt="Midone Tailwind HTML Admin Template" class="w-6"
                                 src="{{asset(url('/').Storage::url(getSetting('logo')))}}">
                        @else
                            <img alt="Midone Tailwind HTML Admin Template" class="w-6"
                                 src="{{asset('assets/images/logo.svg')}}">
                        @endif
                    </a>
                    <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2"
                                                                        class="w-8 h-8 text-white transform -rotate-90"></i>
                    </a>
                </div>
                <ul class="border-t border-theme-24 py-5 hidden">
                    <li>
                        <a href="{{route('admin.dashboard')}}"
                           class="side-menu {{request()->routeIs('admin.dashboard')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="home"></i></div>
                            <div class="side-menu__title"> Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('about.index')}}"
                           class="side-menu {{request()->routeIs('about.index')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="activity"></i></div>
                            <div class="side-menu__title"> About Us</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('news.index')}}"
                           class="side-menu {{request()->routeIs('news.index')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="airplay"></i></div>
                            <div class="side-menu__title"> News & Updates</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('blog.index')}}"
                           class="side-menu {{request()->routeIs('blog.index')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="book"></i></div>
                            <div class="side-menu__title"> Blog</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('category.index')}}"
                           class="side-menu {{request()->routeIs('category.index')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="package"></i></div>
                            <div class="side-menu__title"> Category</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('product.index')}}"
                           class="side-menu {{request()->routeIs('product.index')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="package"></i></div>
                            <div class="side-menu__title"> Products</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('services.index')}}"
                           class="side-menu {{request()->routeIs('services.index')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="link"></i></div>
                            <div class="side-menu__title"> Services</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('question.index')}}"
                           class="side-menu {{request()->routeIs('question.index')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="help-circle"></i></div>
                            <div class="side-menu__title"> FAQ</div>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('enquiry.index')}}"
                           class="side-menu {{request()->routeIs('enquiry.index')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="info"></i></div>
                            <div class="side-menu__title">Enquiries</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('testimony.index')}}"
                           class="side-menu {{request()->routeIs('testimony.index')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="clipboard"></i></div>
                            <div class="side-menu__title">Testimonials</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('slider.index')}}"
                           class="side-menu {{request()->routeIs('slider.index')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="sliders"></i></div>
                            <div class="side-menu__title">Slider</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.setting')}}"
                           class="side-menu {{request()->routeIs('admin.setting')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="settings"></i></div>
                            <div class="side-menu__title"> Setting</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('team.index')}}"
                           class="side-menu {{request()->routeIs('team.index')? 'side-menu--active' : ' '}}">
                            <div class="side-menu__icon"><i data-feather="users"></i></div>
                            <div class="side-menu__title"> Our Team</div>
                        </a>
                    </li>
                </ul>

            </div>
            <!-- END: Mobile Menu -->

            <div class="flex">
                <!-- BEGIN: Side Menu -->
                <nav class="side-nav">
                    <a href="{{url('/')}}" class="intro-x flex items-center pl-5 pt-4">
                        @if(getSetting('logo'))
                            <img alt="Midone Tailwind HTML Admin Template" class="w-6"
                                 src="{{asset(url('/').Storage::url(getSetting('logo')))}}">
                        @else
                            <img alt="Midone Tailwind HTML Admin Template" class="w-6"
                                 src="{{asset('assets/images/logo.svg')}}">
                        @endif
                        <span
                            class="hidden xl:block text-white text-lg ml-3"> {{getSetting('short_name')}} </span>
                    </a>
                    <div class="side-nav__devider my-6"></div>
                    <ul>
                        <li>
                            <a href="{{route('admin.dashboard')}}"
                               class="side-menu {{request()->routeIs('admin.dashboard')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="home"></i></div>
                                <div class="side-menu__title"> Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('category.index')}}"
                               class="side-menu {{request()->routeIs('category.index')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="activity"></i></div>
                                <div class="side-menu__title"> Category</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('product.index')}}"
                               class="side-menu {{request()->routeIs('product.index') || request()->routeIs('product.create')||request()->routeIs('product.show')||
                                        request()->routeIs('product.edit')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="package"></i></div>
                                <div class="side-menu__title">Products</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('services.index')}}"
                               class="side-menu {{request()->routeIs('services.index') || request()->routeIs('services.create')||request()->routeIs('services.show')||
                                        request()->routeIs('services.edit')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="link"></i></div>
                                <div class="side-menu__title">Services</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('about.index')}}"
                               class="side-menu {{request()->routeIs('about.index') || request()->routeIs('about.create')||request()->routeIs('about.show')||
                                        request()->routeIs('about.edit')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="activity"></i></div>
                                <div class="side-menu__title"> About Us</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('team.index')}}"
                               class="side-menu {{request()->routeIs('team.index') || request()->routeIs('team.create')||request()->routeIs('team.show')||
                                        request()->routeIs('team.edit')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="users"></i></div>
                                <div class="side-menu__title"> Our Team</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('news.index')}}"
                               class="side-menu {{request()->routeIs('news.index') || request()->routeIs('news.create')||request()->routeIs('news.show')||
                                        request()->routeIs('news.edit')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="airplay"></i></div>
                                <div class="side-menu__title"> News & Updates</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('blog.index')}}"
                               class="side-menu {{request()->routeIs('blog.index') || request()->routeIs('blog.create')||request()->routeIs('blog.show')||
                                        request()->routeIs('blog.edit')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="book"></i></div>
                                <div class="side-menu__title"> Blog</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('question.index')}}"
                               class="side-menu {{request()->routeIs('question.index') || request()->routeIs('question.create')||request()->routeIs('question.show')||
                                        request()->routeIs('question.edit')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="help-circle"></i></div>
                                <div class="side-menu__title"> FAQ</div>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('enquiry.index')}}"
                               class="side-menu {{request()->routeIs('enquiry.index') || request()->routeIs('enquiry.show')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="info"></i></div>
                                <div class="side-menu__title">Enquiries</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('testimony.index')}}"
                               class="side-menu {{request()->routeIs('testimony.index') || request()->routeIs('testimony.create')||request()->routeIs('testimony.show')||
                                        request()->routeIs('testimony.edit')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="clipboard"></i></div>
                                <div class="side-menu__title">Testimonials</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('slider.index')}}"
                               class="side-menu {{request()->routeIs('slider.index') || request()->routeIs('slider.create')||request()->routeIs('slider.show')||
                                        request()->routeIs('slider.edit')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="sliders"></i></div>
                                <div class="side-menu__title">Slider</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.setting')}}"
                               class="side-menu {{request()->routeIs('admin.setting')? 'side-menu--active' : ' '}}">
                                <div class="side-menu__icon"><i data-feather="settings"></i></div>
                                <div class="side-menu__title"> Setting</div>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- END: Side Menu -->
                <div class="content">
                    <!-- BEGIN: Top Bar -->
                    <div class="top-bar">
                        <!-- BEGIN: Breadcrumb -->
                        <div class="-intro-x breadcrumb mr-auto hidden sm:flex"><a href="{{route('admin.dashboard')}}"
                                                                                   class="">Application</a> <i
                                data-feather="chevron-right" class="breadcrumb__icon"></i> <a
                                href="{{Request::url()}}"
                                class="breadcrumb--active">@yield('pageName')</a>
                        </div>
                        <!-- END: Breadcrumb -->

                        <!-- BEGIN: Notifications -->
                        <div class="intro-x dropdown mr-auto sm:mr-6">
                            <div class="dropdown-toggle notification notification--bullet cursor-pointer"><i
                                    data-feather="bell"
                                    class="notification__icon dark:text-gray-300"></i>
                            </div>
                            <div class="notification-content pt-2 dropdown-box">
                                <div class="notification-content__box dropdown-box__content box dark:bg-dark-6">
                                    <div class="notification-content__title"><a href=""> Order
                                            Notifications </a></div>
                                    <div class="cursor-pointer relative flex items-center mt-3 markAsRead"
                                         data-value="">
                                        <div class="w-12 h-12 flex-none image-fit mr-1">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                                 src="{{asset('assets/images/profile-4.jpg')}}">
                                            <div
                                                class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                        </div>
                                        <div class="ml-2 overflow-hidden">
                                            <div class="flex items-center">
                                                <a href="javascript:;" class="font-medium truncate mr-5"></a>
                                                <div
                                                    class="text-xs text-gray-500 ml-auto whitespace-no-wrap"></div>
                                            </div>
                                            <div class="w-full truncate text-gray-600">New Order

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Notifications -->
                        <!-- BEGIN: Account Menu -->
                        <div class="intro-x dropdown w-8 h-8">
                            <div
                                class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                                @if(auth()->user()->image)
                                    <img alt="Midone Tailwind HTML Admin Template"
                                         src="{{asset(url('/').Storage::url(auth()->user()->image))}}">
                                @else
                                    <img alt="Midone Tailwind HTML Admin Template"
                                         src="{{asset('assets/images/profile-1.jpg')}}">
                                @endif
                            </div>
                            <div class="dropdown-box w-56">
                                <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                                    <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                                        <div class="font-medium">{{auth()->user()->name}}</div>
                                        <div class="text-xs text-theme-41 dark:text-gray-600">Admin</div>
                                    </div>
                                    <div class="p-2">
                                        <a href="{{route('change.profile')}}"
                                           class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                            <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                        <a href="{{route('reset.password.page')}}"
                                           class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                            <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                                    </div>
                                    <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                                        <form method="POST" action="{{route('logout')}}"
                                              class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                                            @csrf
                                            <button type="submit" style="display:flex ;align-items:center"><i
                                                    data-feather="toggle-right"
                                                    class="w-4 h-4 mr-2"></i>
                                                Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Account Menu -->
                    </div>
                    <!-- END: Top Bar -->
                @show
                @yield('content')

                <!-- BEGIN: Dark Mode Switcher-->
                    <div data-url="{{route('change.theme.mode')}}"
                         class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
                        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
                        <div class="dark-mode-switcher__toggle border"></div>
                    </div>
                    <!-- END: Dark Mode Switcher-->
                </div>
            </div>
        </body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script type="text/javascript" src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/toastr.min.js')}}"></script>
        <!-- select 2 -->
        @yield('script')
        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    language: {
                        paginate: {
                            sNext: '<i class="fa fa-forward datatable-arrow"></i>',
                            sPrevious: '<i class="fa fa-backward datatable-arrow"></i>',
                            //    sFirst: '<i class="fa fa-step-backward"></i>',
                            //    sLast: '<i class="fa fa-step-forward"></i>'
                        }
                    }
                });
            });

            $(document).on('click', '.markAsRead', function () {
                let id = $(this).data('value');
                $(this).remove();
                $.ajax({
                    method: 'GET',
                    dataType: 'json',
                    url: 'order/mark/read/' + id,
                });
            });

            {{--@if(session()->has('notify'))
            Toastify({
                text: "{{ session()->get('notify') }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#0d93e9",
                stopOnFocus: true,
            }).showToast();
            @endif--}}

            @if(session()->has('success'))
            Toastify({
                text: "{{ session()->get('success') }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#006400",
                stopOnFocus: true,
            }).showToast();
            @endif

            @if(session()->has('failed'))
            Toastify({
                text: "{{ session()->get('failed') }}",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#d70707",
                stopOnFocus: true,
            }).showToast();
            @endif
        </script>
        </html>
