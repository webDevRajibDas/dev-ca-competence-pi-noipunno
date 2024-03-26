<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Competence') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet"/>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugin/fontawesome-free/css/all.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    
    {{-- https://code.jquery.com/jquery-3.7.0.js
    https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js --}}

    <script src="{{ asset('plugin/js/handlebars-v4.0.12.js') }}"></script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");
        :root {
          --header-height: -1rem;
          --nav-width: -30px;
          --first-color: #4723d9;
          --first-color-light: #afa5d9;
          --white-color: #f7f6fb;
          --body-font: "Nunito", sans-serif;
          --normal-font-size: 1rem;
          --z-fixed: 100;
        }

        *,
        ::before,
        ::after {
          box-sizing: border-box;
        }

        body {
          position: relative;
          margin: var(--header-height) 0 0 0;
          padding: 0;
          font-family: var(--body-font);
          font-size: var(--normal-font-size);
          transition: 0.5s;
        }

        a {
          text-decoration: none;
        }

        .header {
          width: 100%;
          height: var(--header-height);
          position: fixed;
          top: 0;
          left: 0;
          display: flex;
          align-items: center;
          justify-content: space-between;
          padding: 0 1rem;
          background-color: var(--white-color);
          z-index: var(--z-fixed);
          transition: 0.5s;
        }

        .header_toggle {
          color: var(--first-color);
          font-size: 1.5rem;
          cursor: pointer;
        }

        .header_img {
          width: 35px;
          height: 35px;
          display: flex;
          justify-content: center;
          border-radius: 50%;
          overflow: hidden;
        }

        .header_img img {
          width: 40px;
        }

        .l-navbar {
          position: fixed;
          top: 0;
          left: -30%;
          width: var(--nav-width);
          height: 100vh;
          background-color: var(--first-color);
          padding: 0.5rem 1rem 0 0;
          transition: 0.5s;
          z-index: var(--z-fixed);
        }

        .nav {
          height: 100%;
          display: flex;
          flex-direction: column;
          justify-content: space-between;
          overflow: hidden;
        }

        .nav_logo,
        .nav_link {
          display: grid;
          grid-template-columns: max-content max-content;
          align-items: center;
          column-gap: 1rem;
          padding: 0.5rem 0 0.5rem 1.5rem;
        }

        .nav_logo {
          margin-bottom: 2rem;
        }

        .nav_logo-icon {
          font-size: 1.25rem;
          color: var(--white-color);
        }

        .nav_logo-name {
          color: var(--white-color);
          font-weight: 700;
        }

        .nav_link {
          position: relative;
          color: var(--first-color-light);
          margin-bottom: 1rem;
          transition: 0.3s;
        }

        .nav_link:hover {
          color: var(--white-color);
        }

        .nav_icon {
          font-size: 1.25rem;
        }

        .show {
          left: 0;
        }

        .app {
          padding-left: calc(var(--nav-width) + 1rem);
        }

        .active {
          color: var(--white-color);
        }

        .active::before {
          content: "";
          position: absolute;
          left: 0;
          width: 2px;
          height: 32px;
          background-color: var(--white-color);
        }

        .height-100 {
          height: 100vh;
        }

        .my-nav{
            margin-top: 10px !important;
        }

        @media only screen and (max-width: 600px) {
          body{
            margin: calc(var(--header-height) + 1rem) 0 0 0;
            padding-left: calc(var(--nav-width) + 2rem);
          }

          .my-nav{
            margin-top: 10px !important;
          }

          .header{
            height: calc(var(--header-height) + 1rem);
            padding: 0 2rem 0 calc(var(--nav-width) + 2rem);
          }

          .header_img{
            width: 40px;
            height: 40px;
          }

          .header_img img{
            width: 45px;
          }

          .l-navbar{
            left: 0;
            padding: 1rem 1rem 0 0;
          }

          .show{
            width: calc(var(--nav-width) + 156px);
          }

          .app{
            padding-left: calc(var(--nav-width) + 188px);
          }
          
        }
      </style>
</head>
<style>

</style>
<body>

    <div id="app">

        {{-- start custom navbar --}}

        <nav class="navbar navbar-expand-lg my-nav" style="background-color: white; border-bottom: 1px solid rgb(192, 191, 191);">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="https://teacher.project-ca.com/frontend/images/noipunno-new-logo.svg" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-end" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex justify-content-end ms-auto align-items-center">
                          <li class="nav-item dropdown">
                            <a class="nav-link noipunno-dropdown" href="#" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-section">
                                    <img src="https://teacher.project-ca.com/frontend/images/user-profile.png" alt="">
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownUser">
                                <li><a class="dropdown-item" href="https://teacher.project-ca.com/logout">Logout</a></li>
                            </ul>
                          </li>
                    </ul>
                </div>
            </div>
        </nav>



        <div class="noipunno-navbar-container" style="background-color: white;">
            <nav class="container navbar navbar-expand-lg" style="background-color: white;">
                <div class="d-flex justify-content-between w-100">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <img src="https://teacher.project-ca.com/frontend/images/home.svg" alt="">
                    </button>

                    <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                                <a class="navbar-brand" href="/">
                                    <img src="https://teacher.project-ca.com/frontend/images/noipunno-new-logo.svg" alt="">
                                </a>
                            </h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body subheader-accordion">
                            <div class="accordion accordion-flush">
                                <div class="accordion-item">
                                      <h2 class="accordion-header">
                                          <a href="{{ route('class') }}">
                                          <button class="accordion-button collapsed d-flex justify-content-between align-items-center  w-100" type="button" data-bs-toggle="collapse" data-bs-target="#sreni-collapseOne" aria-expanded="false" aria-controls="sreni-collapseOne">
                                              <img src="https://teacher.project-ca.com/frontend/images/class.svg" alt="">
                                              <span class="fs-6 px-2">Class</span>
                                          </button>
                                          </a>
                                      </h2>
                                </div>
                            </div>

                            <div class="accordion accordion-flush">
                                <div class="accordion-item">
                                      <h2 class="accordion-header">
                                          <a href="{{ route('subject') }}">
                                          <button class="accordion-button collapsed d-flex justify-content-between align-items-center  w-100" type="button" data-bs-toggle="collapse" data-bs-target="#sreni-collapseOne" aria-expanded="false" aria-controls="sreni-collapseOne">
                                              <img src="https://teacher.project-ca.com/frontend/images/class.svg" alt="">
                                              <span class="fs-6 px-2">Subject</span>
                                          </button>
                                          </a>
                                      </h2>
                                </div>
                            </div>

                            <div class="accordion accordion-flush">
                                <div class="accordion-item">
                                      <h2 class="accordion-header">
                                          <a href="{{ route('chapter') }}">
                                          <button class="accordion-button collapsed d-flex justify-content-between align-items-center  w-100" type="button">
                                              <img src="https://teacher.project-ca.com/frontend/images/class.svg" alt="">
                                              <span class="fs-6 px-2">Chapter</span>
                                          </button>
                                          </a>
                                      </h2>
                                </div>
                            </div>

                            <div class="accordion accordion-flush">
                                <div class="accordion-item">
                                      <h2 class="accordion-header">
                                          <a href="{{ route('weight') }}">
                                          <button class="accordion-button collapsed d-flex justify-content-between align-items-center  w-100" type="button">
                                              <img src="https://teacher.project-ca.com/frontend/images/class.svg" alt="">
                                              <span class="fs-6 px-2">PI Weight</span>
                                          </button>
                                          </a>
                                      </h2>
                                </div>
                            </div>

                            <div class="accordion accordion-flush">
                                <div class="accordion-item">
                                      <h2 class="accordion-header">
                                          <a href="{{ route('competence') }}">
                                          <button class="accordion-button collapsed d-flex justify-content-between align-items-center  w-100" type="button">
                                              <img src="https://teacher.project-ca.com/frontend/images/class.svg" alt="">
                                              <span class="fs-6 px-2">Competence & PI</span>
                                          </button>
                                          </a>
                                      </h2>
                                </div>
                            </div>

                            <div class="accordion accordion-flush">
                                <div class="accordion-item">
                                      <h2 class="accordion-header">
                                          <a href="{{ route('oviggota') }}">
                                          <button class="accordion-button collapsed d-flex justify-content-between align-items-center  w-100" type="button">
                                              <img src="https://teacher.project-ca.com/frontend/images/class.svg" alt="">
                                              <span class="fs-6 px-2">Oviggota</span>
                                          </button>
                                          </a>
                                      </h2>
                                </div>
                            </div>

                            <div class="accordion accordion-flush">
                                <div class="accordion-item">
                                      <h2 class="accordion-header">
                                          <a href="{{ route('dimension') }}">
                                          <button class="accordion-button collapsed d-flex justify-content-between align-items-center  w-100" type="button">
                                              <img src="https://teacher.project-ca.com/frontend/images/class.svg" alt="">
                                              <span class="fs-6 px-2">Dimension</span>
                                          </button>
                                          </a>
                                      </h2>
                                </div>
                            </div>

                            <div class="accordion accordion-flush">
                                <div class="accordion-item">
                                      <h2 class="accordion-header">
                                          <a href="{{ route('pi-selection') }}">
                                          <button class="accordion-button collapsed d-flex justify-content-between align-items-center  w-100" type="button">
                                              <img src="https://teacher.project-ca.com/frontend/images/class.svg" alt="">
                                              <span class="fs-6 px-2">Pi Selection</span>
                                          </button>
                                          </a>
                                      </h2>
                                </div>
                            </div>

                            <div class="accordion accordion-flush">
                                <div class="accordion-item">
                                      <h2 class="accordion-header">
                                          <a href="{{ route('pi-similarity') }}">
                                          <button class="accordion-button collapsed d-flex justify-content-between align-items-center  w-100" type="button">
                                              <img src="https://teacher.project-ca.com/frontend/images/class.svg" alt="">
                                              <span class="fs-6 px-2">Pi Similarity</span>
                                          </button>
                                          </a>
                                      </h2>
                                </div>
                            </div>

                            <div class="accordion accordion-flush">
                                <div class="accordion-item">
                                      <h2 class="accordion-header">
                                          <a href="{{ route('bi') }}">
                                          <button class="accordion-button collapsed d-flex justify-content-between align-items-center w-100" type="button">
                                              <img src="https://teacher.project-ca.com/frontend/images/class.svg" alt="">
                                              <span class="fs-6 px-2">Behavioural Indicator(BI)</span>
                                          </button>
                                          </a>
                                      </h2>
                                </div>
                            </div>

                        </div>
                    </div>

            {{-- menu desktop view --}}
                    <div class="d-none d-lg-flex pages-buttons">

                        {{-- main nav menu --}}
                            <div class="dropdown">
                                <button class="d-flex justify-content-between align-items-center btn btn-ligh" type="button">
                                    <a href="{{ route('class') }}" class="dropdown-item">
                                        <div class="d-flex t">
                                            <span>Class</span>
                                        </div>
                                    </a>
                                </button>
                                {{-- <div class="dropdown-menu" aria-labelledby="prothomPata" data-bs-popper="static">
                                    <div class="create-profile-dropdown-container">

                                        <a href="{{ route('class') }}" class="dropdown-item">
                                            <div class="d-flex t">
                                                <span>Class</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('class.create') }}" class="dropdown-item">
                                            <div class="d-flex t">
                                                <span>Add Pi Class</span>
                                            </div>
                                        </a>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="dropdown">
                                <button class="d-flex justify-content-between align-items-center btn btn-ligh" type="button">
                                    {{-- <span class="fs-6 px-2">Subject</span>
                                    <img src="https://teacher.project-ca.com/frontend/images/arrow-down.svg" alt=""> --}}
                                    <a href="{{ route('subject') }}" class="dropdown-item">
                                        <div class="d-flex ">
                                            <span>Subject</span>
                                        </div>
                                    </a>
                                </button>
                                {{-- <div class="dropdown-menu" aria-labelledby="prothomPata">
                                    <div class="create-profile-dropdown-container">
                                        <a href="{{ route('subject') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Subject</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('subject.create') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Add Subject</span>
                                            </div>
                                        </a>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="dropdown">
                                <button class="d-flex justify-content-between align-items-center btn btn-ligh" type="button">
                                    <a href="{{ route('chapter') }}" class="dropdown-item">
                                        <div class="d-flex ">
                                            <span>Chapter</span>
                                        </div>
                                    </a>
                                </button>
                                {{-- <div class="dropdown-menu" aria-labelledby="prothomPata">
                                    <div class="create-profile-dropdown-container">
                                        <a href="{{ route('chapter') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Chapter</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('chapter.create') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Add Chapter</span>
                                            </div>
                                        </a>
                                    </div>
                                </div> --}}
                            </div>


                            <div class="dropdown">
                                <button class="d-flex justify-content-between align-items-center btn btn-ligh" type="button" id="prothomPata" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fs-6 px-2">Competence & PI</span>
                                    <img src="https://teacher.project-ca.com/frontend/images/arrow-down.svg" alt="">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="prothomPata">
                                    <div class="create-profile-dropdown-container">
                                        <a href="{{ route('competence') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Competence & PI</span>
                                            </div>
                                        </a>

                                        <a href="{{ route('weight') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>PI Weight</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown">
                                <button class="d-flex justify-content-between align-items-center btn btn-ligh" type="button">
                                    <a href="{{ route('oviggota') }}" class="dropdown-item">
                                        <div class="d-flex ">
                                            <span>Oviggota</span>
                                        </div>
                                    </a>
                                </button>
                                {{-- <div class="dropdown-menu" aria-labelledby="prothomPata">
                                    <div class="create-profile-dropdown-container">
                                        <a href="{{ route('oviggota') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Oviggota</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('oviggota.create') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Add Oviggota</span>
                                            </div>
                                        </a>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="dropdown">
                                <button class="d-flex justify-content-between align-items-center btn btn-ligh" type="button">
                                    <a href="{{ route('dimension') }}" class="dropdown-item">
                                        <div class="d-flex ">
                                            <span>Dimension</span>
                                        </div>
                                    </a>
                                </button>
                                {{-- <div class="dropdown-menu" aria-labelledby="prothomPata">
                                    <div class="create-profile-dropdown-container">
                                        <a href="{{ route('dimension') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Dimension</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('dimension.create') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Add Dimension</span>
                                            </div>
                                        </a>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="dropdown">
                                <button class="d-flex justify-content-between align-items-center btn btn-ligh" type="button">
                                    <a href="{{ route('pi-selection') }}" class="dropdown-item">
                                        <div class="d-flex ">
                                            <span>Pi Selection</span>
                                        </div>
                                    </a>
                                </button>
                                {{-- <div class="dropdown-menu" aria-labelledby="prothomPata">
                                    <div class="create-profile-dropdown-container">
                                        <a href="{{ route('pi-selection') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Pi Selection</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('pi-selection.create') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Add Pi Selection</span>
                                            </div>
                                        </a>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="dropdown">
                                <button class="d-flex justify-content-between align-items-center btn btn-ligh" type="button">
                                    <a href="{{ route('pi-similarity') }}" class="dropdown-item">
                                        <div class="d-flex ">
                                            <span>Pi Similarity</span>
                                        </div>
                                    </a>
                                </button>
                                {{-- <div class="dropdown-menu" aria-labelledby="prothomPata">
                                    <div class="create-profile-dropdown-container">
                                        <a href="{{ route('pi-similarity') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Pi Similarity</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('pi-similarity.create') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Add Pi Similarity</span>
                                            </div>
                                        </a>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="dropdown">
                                <button class="d-flex justify-content-between align-items-center btn btn-ligh" type="button">
                                    <a href="{{ route('bi') }}" class="dropdown-item">
                                        <div class="d-flex ">
                                            <span>Behavioural Indicator(BI)</span>
                                        </div>
                                    </a>
                                </button>
                                {{-- <div class="dropdown-menu" aria-labelledby="prothomPata">
                                    <div class="create-profile-dropdown-container">
                                        <a href="{{ route('bi') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Behavioural Indicator(BI)</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('bi.create') }}" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Add BI</span>
                                            </div>
                                        </a>
                                        <a href="{{ route('bi.pdf.download') }}" target="_blank" class="dropdown-item">
                                            <div class="d-flex ">
                                                <span>Download BI</span>
                                            </div>
                                        </a>
                                    </div>
                                </div> --}}
                            </div>

                        {{-- main nav menu --}}

                    </div>


              {{-- right side menu --}}
                <div>
                  <div class="dropdown">
                      <button class="np-btn-form-submit border-0 rounded-1 d-flex justify-content-between align-items-center rounded-1 dropdown-toggle p-2" style="background-color: #428F92; color: white; " type="button" id="createMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="https://teacher.project-ca.com/frontend/images/add.svg" alt="">
                          <span class="px-3">ব্যবস্থাপনা</span>
                          <img src="https://teacher.project-ca.com/frontend/images/arrow-down-white.svg" alt="">
                      </button>
                      <div class="dropdown-menu" aria-labelledby="createMenuButton">
                          <div class="create-profile-dropdown-container">
                              <a class="dropdown-item" href="https://teacher.project-ca.com/noipunno-dashboard/branch-add">
                                  <div class="d-flex align-items-center">
                                      <img class="d-block pe-2" src="https://teacher.project-ca.com/frontend/images/student.svg" alt="">
                                      <span>ব্রাঞ্চ ব্যবস্থাপনা</span>
                                  </div>
                              </a>

                              <a class="dropdown-item" href="https://teacher.project-ca.com/noipunno-dashboard/shift-add">
                                  <div class="d-flex align-items-center">
                                      <img class="d-block pe-2" src="https://teacher.project-ca.com/frontend/images/student.svg" alt="">
                                      <span>শিফট ব্যবস্থাপনা</span>
                                  </div>
                              </a>

                              <a class="dropdown-item" href="https://teacher.project-ca.com/noipunno-dashboard/version-add">
                                  <div class="d-flex align-items-center">
                                      <img class="d-block pe-2" src="https://teacher.project-ca.com/frontend/images/student.svg" alt="">
                                      <span>ভার্সন ব্যবস্থাপনা</span>
                                  </div>
                              </a>

                              <a class="dropdown-item" href="https://teacher.project-ca.com/noipunno-dashboard/section-add">
                                  <div class="d-flex align-items-center">
                                      <img class="d-block pe-2" src="https://teacher.project-ca.com/frontend/images/student.svg" alt="">
                                      <span>সেকশন ব্যবস্থাপনা</span>
                                  </div>
                              </a>
                              <a class="dropdown-item" href="https://teacher.project-ca.com/teachers">
                                  <div class="d-flex align-items-center">
                                      <img class="d-block pe-2" src="https://teacher.project-ca.com/frontend/images/teacher.svg" alt="">
                                      <span>শিক্ষক ব্যবস্থাপনা</span>
                                  </div>
                              </a>
                              <a class="dropdown-item" href="https://teacher.project-ca.com/students">
                                  <div class="d-flex align-items-center">
                                      <img class="d-block pe-2" src="https://teacher.project-ca.com/frontend/images/student.svg" alt="">
                                      <span>শিক্ষার্থী ব্যবস্থাপনা</span>
                                  </div>
                              </a>
                              <a class="dropdown-item" href="https://teacher.project-ca.com/noipunno-dashboard/classroom-add">
                                  <div class="d-flex align-items-center">
                                      <img class="d-block pe-2" src="https://teacher.project-ca.com/frontend/images/student.svg" alt="">
                                      <span>বিষয় শিক্ষক নির্বাচন</span>
                                  </div>
                              </a>
                      </div>
                  </div>
                </div>
              {{-- right side menu --}}
            {{-- menu desktop view --}}

        </div>


</div>


</nav>
</div>
  {{-- end custom navbar --}}


        {{-- <header class="header" id="header">
            <div class="header_toggle">
              <i class="bx bx-menu" id="header-toggle"></i>
            </div>
            <div class="header_img">

            </div>
        </header> --}}



{{--
          <div class="l-navbar" id="nav-bar">
            <nav class="nav">
              <div>
                <div class="nav_list">
                  <a href="{{ route('class') }}" class="nav_link active">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Class</span>
                  </a>
                  <a href="{{ route('subject') }}" class="nav_link">
                    <i class="bx bx-user nav_icon"></i>
                    <span class="nav_name">Subject</span>
                  </a>
                  <a href="{{ route('chapter') }}" class="nav_link">
                    <i class="bx bx-message-square-detail nav_icon"></i>
                    <span class="nav_name">Chapter</span>
                  </a>
                  <a href="{{ route('weight') }}" class="nav_link">
                    <i class="bx bx-bookmark nav_icon"></i>
                    <span class="nav_name">PI Weight</span>
                  </a>
                  <a href="{{ route('competence') }}" class="nav_logo">
                    <i class="bx bx-layer nav_logo-icon"></i>
                    <span class="nav_logo-name">Competence & PI</span>
                  </a>
                  <a href="{{ route('oviggota') }}" class="nav_link">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Oviggota</span>
                  </a>
                  <a href="{{ route('dimension') }}" class="nav_link">
                    <i class="bx bx-layer nav_logo-icon"></i>
                    <span class="nav_name">Dimension</span>
                  </a>
                  <a href="{{ route('pi-selection') }}" class="nav_link">
                    <i class="bx bx-message-square-detail nav_icon"></i>
                    <span class="nav_name">Pi Selection</span>
                  </a>
                  <a href="{{ route('pi-similarity') }}" class="nav_link">
                    <i class="bx bx-folder nav_icon"></i>
                    <span class="nav_name">Pi Similarity</span>
                  </a>
                  <a href="{{ route('bi') }}" class="nav_link">
                    <i class="bx bx-folder nav_icon"></i>
                    <span class="nav_name">Behavioural Indicator(BI)</span>
                  </a>


                </div>
              </div>
              <a href="{{ route('logout') }}" class="nav_link">
                <i class="bx bx-log-out nav_icon"></i>
                <span class="nav_name">Sign Out</span>
              </a>
            </nav>
          </div> --}}

          <div class="height-100 bg-light">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest

                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4 container">
                @yield('content')
            </main>
          </div>
    </div>

<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    >
</script>

<script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function (event) {
        const showNavbar = (toggleId, navId, bodyId, headerId) => {
          const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId);

          // Validate that all variables exist
          if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener("click", () => {
              // show navbar
              nav.classList.toggle("show");
              // change icon
              toggle.classList.toggle("bx-x");
              // add padding to body
              bodypd.classList.toggle("app");
              // add padding to header
              headerpd.classList.toggle("app");
            });
          }
        };

        showNavbar("header-toggle", "nav-bar", "app", "header");

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll(".nav_link");

        function colorLink() {
          if (linkColor) {
            linkColor.forEach((l) => l.classList.remove("active"));
            this.classList.add("active");
          }
        }
        linkColor.forEach((l) => l.addEventListener("click", colorLink));

        // Your code to run since DOM is loaded and ready
      });
</script>

 @yield('scripts')

</body>
</html>
