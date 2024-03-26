<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Competence') }}</title>
    <!-- bootstrap 5 min.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;800&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- jquery -->
   
    <link rel="stylesheet" href="{{ asset('assets/css/hover-min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/table.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/input.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/button.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/card.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<style>
    body{
         font-family: 'Public Sans', sans-serif;
    }
    .font-20{
        font-size: 20px;
    }
    .font-14{
        font-size: 14px;
    }
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #428F92;
        border-color: #428F92;
        border-radius: 40px;
    }
    .page-link {
        /* position: relative; */
        display: block;
        color: rgb(37, 37, 37);
        /* text-decoration: none; */
        /* background-color: #fff; */
        border: none !important;
        /* transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out; */
    }
    tr.group td,
    tr.group:hover {
        background-color: #ddd !important;
        color: #377577;
        font-weight: bold;
    }
    #chartdivInstitute {
        width: 100%;
        height: 400px;
    }
   
    .active-button {
        background-color: #e6d5f6;
        color: #8231D3;
    }

   

</style>

<body>

    <!-- topnav -->
    <div style="background-color: #e4feff" class="topnav border-bottom">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <div><a href="/"><img src="{{ asset('assets/images/noipunno-new-logo.svg') }}" class="img-fluid" alt="main logo" /></a></div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="topnav-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('assets/icons/search-normal.svg') }}" class="img-fluid topnav-icon-style"
                                alt="search icon" />
                            <!-- Modal -->
                        </div>
                        <div class="topnav-icon"><img src="{{ asset('assets/icons/star.svg') }}" class="img-fluid topnav-icon-style" alt="main logo" />
                        </div>
                        <div class="topnav-icon"><img src="{{ asset('assets/icons/dark-light-mode.svg') }}" class="img-fluid topnav-icon-style" alt="main logo" /></div>
                        <div class="topnav-icon position-relative"><img src="{{ asset('assets/icons/notification.svg') }}"class="img-fluid" alt="main logo" />
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                4
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </div>
                        <!-- <div><img src="{{ asset('assets/icons/teacher.svg') }}" class="img-fluid topnav-profile-icon-style" alt="main logo" /></div> -->

                        <div class="btn-group position-relative">
                            <a class="navbar-menu-item d-flex align-items-center ms-2" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"> <img src="{{ asset('assets/icons/teacher.svg') }}"
                                    class="img-fluid topnav-profile-icon-style" alt="moon icon" />
                                <!-- <img src="{{ asset('assets/icons/teacher.svg') }}" class="img-fluid position-absolute bottom-0 end-0"
                                    alt="Status icon" /> -->
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <div class="border-bottom topnav-dropdown-style">
                                        <div class="d-flex align-items-center gap-2">
                                            <div><img src="{{ asset('assets/icons/teacher.svg') }}" class="img-fluid icon-right-space"
                                                    alt="profile icon" /></div>
                                            <div>
                                                <h6 class="profile-style">আতাউর রহমান</h6>
                                                <h6 class="profile-style">Head শিক্ষক</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="topnav-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/profile-icon.svg') }}" class="img-fluid icon-right-space"
                                                alt="profile icon" />
                                            আমার প্রোফাইল
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="topnav-dropdown-style dropdown-item profile-style border-bottom">
                                            <img src="{{ asset('assets/icons/setting-2.svg') }}" class="img-fluid icon-right-space"
                                                alt="profile icon" />
                                            সেটিংস
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="topnav-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/help.svg') }}" class="img-fluid icon-right-space"
                                                alt="profile icon" />
                                            সাহায্য
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="topnav-dropdown-style dropdown-item profile-style border-bottom">
                                            <img src="{{ asset('assets/icons/info-circle.svg') }}" class="img-fluid icon-right-space"
                                                alt="profile icon" />
                                            সাধারণ প্রশ্ন উত্তর
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <div class="topnav-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/sign-out.svg') }}" class="img-fluid icon-right-space"
                                                alt="profile icon" />
                                            সাইন আউট
                                        </div>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                                            @csrf
                                            <!-- <div class="topnav-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/sign-out.svg') }}" class="img-fluid icon-right-space"
                                                alt="profile icon" />
                                            সাইন আউট
                                            </div> -->
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- navbar -->
    <div class="topnav border-bottom">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span><i class="fa-solid fa-bars"></i></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link active navbar-menu-item d-flex align-items-center"
                                                aria-current="page" href="/"><img src="{{ asset('assets/icons/home.svg') }}"
                                                    class="img-fluid icon-right-space" alt="main logo" /> প্রথম পাতা
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item dropdown">
                                            <a class="nav-link navbar-menu-item d-flex align-items-center" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false"><img
                                                    src="{{ asset('assets/icons/report.svg') }}" class="img-fluid icon-right-space"
                                                    alt="main logo" />
                                                রিপোর্ট<img src="{{ asset('assets/icons/tik-ico.svg') }}"
                                                    class="img-fluid icon-left-space" alt="tik icon" />
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link navbar-menu-item d-flex align-items-center" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('assets/icons/nav-teacher-icon.svg') }}"
                                                    class="img-fluid icon-right-space" alt="main logo" />
                                                শিক্ষক <img src="{{ asset('assets/icons/tik-ico.svg') }}"
                                                    class="img-fluid icon-left-space" alt="tik icon" />
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link navbar-menu-item d-flex align-items-center" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false"><img
                                                    src="{{ asset('assets/icons/student-icon.svg') }}"
                                                    class="img-fluid icon-right-space" alt="main logo" />
                                                শিক্ষার্থী <img src="{{ asset('assets/icons/tik-ico.svg') }}"
                                                    class="img-fluid icon-left-space" alt="tik icon" />
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link navbar-menu-item d-flex align-items-center" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false"><img
                                                    src="{{ asset('assets/icons/class-icon.svg') }}"
                                                    class="img-fluid icon-right-space" alt="main logo" />
                                                শ্রেণী <img src="{{ asset('assets/icons/tik-ico.svg') }}"
                                                    class="img-fluid icon-left-space" alt="tik icon" />
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link navbar-menu-item d-flex align-items-center" href="#"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false"><img
                                                    src="{{ asset('assets/icons/requests.svg') }}" class="img-fluid icon-right-space"
                                                    alt="main logo" />
                                                অনুরোধগুলি <img src="{{ asset('assets/icons/tik-ico.svg') }}"
                                                    class="img-fluid icon-left-space" alt="tik icon" />
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <div class="d-lg-flex d-block align-items-lg-center mt-2 mt-lg-0">
                        <div class="btn-group position-relative">
                            <a class="btn btn-color  nav-link navbar-menu-item nav-right-dorpdown  d-flex align-items-center"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding:2px 12px;border-radius:5px;"><img
                                    src="{{ asset('assets/icons/add.svg') }}" class="img-fluid icon-right-space" alt="add icon" />
                                <span class="text-white" style="font-family: Public Sans;font-size:14px;font-weight:400">ব্যবস্থাপনা</span><img src="{{ asset('assets/icons/tik-ico-white.svg') }}" class="img-fluid icon-left-space"
                                    alt="dropdown icon" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end management-dropdown">
                                <li>
                                    <a href="{{ route('class') }}">
                                        <div class="management-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/branch-ico.svg') }}" class="img-fluid icon-right-space"
                                                alt="profile icon" />
                                                শ্রেণী ব্যবস্থাপনা
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('subject') }}">
                                        <div class="management-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/branch-ico.svg') }}" class="img-fluid icon-right-space"
                                                alt="profile icon" />
                                                বিষয় ব্যবস্থাপনা
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('chapter') }}">
                                        <div class="management-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/branch-ico.svg') }}" class="img-fluid icon-right-space"
                                                alt="profile icon" />
                                                অধ্যায় ব্যবস্থাপনা
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('weight') }}">
                                        <div class="management-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/branch-ico.svg') }}" class="img-fluid icon-right-space"
                                                alt="profile icon" />
                                                পারদর্শিতার মাত্রা ব্যবস্থাপনা
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('competence') }}">
                                        <div class="management-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/teacher-management.svg') }}"
                                                class="img-fluid icon-right-space" alt="profile icon" />
                                                একক যোগ্যতা এবং পারদর্শিতা সূচক ব্যবস্থাপনা
                                        </div>
                                    </a>
                                </li>
                                <li><a href="{{ route('oviggota') }}">
                                        <div class="management-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/std-management.svg') }}"
                                                class="img-fluid icon-right-space" alt="profile icon" />
                                                অভিজ্ঞতা ব্যবস্থাপনা
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('dimension') }}">
                                        <div class="management-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/std-management.svg') }}"
                                                class="img-fluid icon-right-space" alt="profile icon" />
                                                ডাইমেনশন ব্যবস্থাপনা
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('pi-selection') }}">
                                        <div class="management-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/std-management.svg') }}"
                                                class="img-fluid icon-right-space" alt="profile icon" />
                                                (PI) মূল্যায়ন ব্যবস্থাপনা
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('bi') }}">
                                        <div class="management-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/std-management.svg') }}"
                                                class="img-fluid icon-right-space" alt="profile icon" />
                                                আচরণগত সূচক ব্যবস্থাপনা
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('bi.dimension') }}">
                                        <div class="management-dropdown-style dropdown-item profile-style">
                                            <img src="{{ asset('assets/icons/std-management.svg') }}"
                                                class="img-fluid icon-right-space" alt="profile icon" />
                                                আচরণগত ডাইমেনশন ব্যবস্থাপনা
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <main class="py-4 container">
        @yield('content')
    </main>

  
<script src="{{'assets/js/jquery-3.5.1.js'}}"></script>


<!-- Chart Resources -->
<script src="{{ asset('assets/amcharts/index.js') }}"></script>
<script src="{{ asset('assets/amcharts/xy.js') }}"></script>
<script src="{{ asset('assets/amcharts/Animated.js') }}"></script>
<script src="{{ asset('assets/amcharts/Responsive.js') }}"></script>
<script src="{{ asset('assets/amcharts/Frozen.js') }}"></script>
<script src="https://cdn.amcharts.com/lib/5/fonts/notosans-sc.js"></script>


<!-- bootstrap 5 min.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" crossorigin="anonymous"></script>

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
   @yield('scripts')

   @stack('child-scripts')
</body>
</html>
