@extends('layouts.app')

@section('content')

<div class="">
    <!-- student-chart -->
    <section class="container my-2">
        <div class="card-container">
            <div class="row g-3 ">
                <div class="col-lg-2 col-md-6">
                    <div class="card teacher-profile border-0">
                        <div class="card-header border-0">
                            <div class="edit-icon">
                                <img src="./assets/images/dashboard/edit-2.svg" alt="">
                            </div>
                            <div class="profile-img">
                                <img src="./assets/images/dashboard/60px.png" alt="">
                            </div>
                            <div class="teacher-title">
                                <h2>প্রধান শিক্ষক</h2>
                            </div>
                            <div class="icon">
                                <div class="single-icon">
                                    <img src="./assets/images/dashboard/ico.svg" alt="">
                                </div>
                                <div class="single-icon">
                                    <img src="./assets/images/dashboard/message.svg" alt="">
                                </div>
                                <div class="single-icon">
                                    <img src="./assets/images/dashboard/moon.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="card-title">আতাউর রহমান</h2>
                            <p class="card-text">95481468716473</p>
                            <p class="card-text">পাবনা জিলা স্কুল, পাবনা</p>
                            <div class="button">
                                <img src="./assets/images/dashboard/eye.svg" alt="">
                                <a href="#" class="">আমার প্রোফাইল</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="student-chart">
                        <div class="header">
                            <h3>শিক্ষার্থীর হাজিরা</h3>
                            <div class="timeline">
                                <h4>টাইমলাইন</h4>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>সাপ্তাহিক </option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </select>
                            </div>
                            <div class="all">
                                <h4>ক্লাস অনুসারে ফিল্টার</h4>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>সব</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="chart">
                            <img src="./assets/images/dashboard/Chart.png" alt="">

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <div class="all-teacher-student-card gy-5">
                        <div class="card-container mb-2">
                            <div class="total-student">
                                <div class="title">
                                    <h3>
                                        সর্বমোট
                                        <br />
                                        <span>শিক্ষার্থী</span>
                                    </h3>
                                    <h6>
                                        শ্রেণী - ষষ্ঠ - সপ্তম
                                    </h6>
                                </div>
                                <div class="circle">
                                    <h5>
                                        ৯২৩
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-container mb-2">
                            <div class="total-student">
                                <div class="title">
                                    <h3>
                                        সর্বমোট
                                        <br />
                                        <span>শিক্ষার্থী</span>
                                    </h3>
                                    <h6>
                                        শ্রেণী - ষষ্ঠ - সপ্তম
                                    </h6>
                                </div>
                                <div class="circle">
                                    <h5>
                                        ৯২৩
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-container">
                            <div class="total-student">
                                <div class="title">
                                    <h3>
                                        সর্বমোট
                                        <br />
                                        <span>শিক্ষার্থী</span>
                                    </h3>
                                    <h6>
                                        শ্রেণী - ষষ্ঠ - সপ্তম
                                    </h6>
                                </div>
                                <div class="circle">
                                    <h5>
                                        ৯২৩
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="request-container">
                        <div class="header d-flex justify-content-between px-2">
                            <div>
                                <h5 class="request">অনুরোধ</h5>
                            </div>
                            <div>
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </div>
                        </div>
                        <div class="">
                            <p class="px-2 request_paragraph">
                                বিষয়গুলি আপনার পর্যালোচনা করা দরকার
                            </p>
                            <div class="">
                                <ul class="nav d-flex justify-content-between align-items-center px-2">
                                    <li class="nav-item d-flex align-items-center">
                                        <img src="./assets/images/dashboard/alertico.png" alt="">
                                        <a class="nav-link tab_nav" id="application-tab" data-bs-toggle="tab"
                                            data-bs-target="#application" href="#">
                                            আবেদন
                                        </a>
                                    </li>
                                    <li class="nav-item d-flex align-items-center">
                                        <img src="./assets/images/dashboard/info-circle.png" alt="">
                                        <a class="nav-link tab_nav" id="notice-tab" data-bs-toggle="tab"
                                            data-bs-target="#notice" href="#">
                                            বিজ্ঞপ্তি
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="tabContent">
                                    <div class="tab-pane fade show active" id="application" role="tabpanel"
                                        aria-labelledby="application-tab">
                                        <div class="border-bottom py-1">
                                            <div class="d-flex gap-2 px-2 align-items-center">
                                                <div>
                                                    <img src="./assets/images/dashboard/ico2.png" class="img-fluid"
                                                        alt="icon" />
                                                </div>
                                                <div class="request_to_change_ph_no">
                                                    ফোন নম্বর পরিবর্তনের অনুরোধ করেছেন
                                                </div>
                                            </div>
                                            <div class="teacher_name_designation">
                                                <div class="d-flex gap-2 pt-1">
                                                    <div>সামিনা চৌধুরী</div>
                                                    <div>|</div>
                                                    <div>সহকারী শিক্ষক</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between py-2 px-2">
                                                <div class="d-flex gap-1">
                                                    <div>
                                                        <h6 class="class_day_section">
                                                            Class 6
                                                        </h6>
                                                    </div>
                                                    <div>
                                                        <h6 class="class_day_section">
                                                            Day
                                                        </h6>
                                                    </div>
                                                    <div>
                                                        <h6 class="class_day_section">
                                                            Section A
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="requested_date">
                                                        অনুরোধ করেছেন ৬ অক্টোবর ২০২৩
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- report -->
    <section class="container report-container my-5">
        <h2>রিপোর্ট</h2>
        <div class="row mt-2 mb-5">
            <div class="col">
                <div class="student-container">
                    <div class="icon">
                        <img src="./assets/images/dashboard/document-text.png" alt="">
                    </div>
                    <h2>শিক্ষার্থীদের প্রতিবেদন</h2>
                </div>
            </div>
            <div class="col">
                <div class="student-container">
                    <div class="icon">
                        <img src="./assets/images/dashboard/document-text.png" alt="">
                    </div>
                    <h2>শিক্ষার্থীদের প্রতিবেদন</h2>

                </div>
            </div>
            <div class="col">
                <div class="student-container">
                    <div class="icon">
                        <img src="./assets/images/dashboard/document-text.png" alt="">
                    </div>
                    <h2>শিক্ষার্থীদের প্রতিবেদন</h2>

                </div>
            </div>
            <div class="col">
                <div class="student-container">
                    <div class="icon">
                        <img src="./assets/images/dashboard/document-text.png" alt="">
                    </div>
                    <h2>শিক্ষার্থীদের প্রতিবেদন</h2>

                </div>
            </div>
            <div class="col">
                <div class="student-container">
                    <div class="icon">
                        <img src="./assets/images/dashboard/document-text.png" alt="">
                    </div>
                    <h2>শিক্ষার্থীদের প্রতিবেদন</h2>

                </div>
            </div>
        </div>

    </section>

    <!-- subject info-->

    <section class="container report-container">
        <h2>শ্রেণী বিষয়ক তথ্য</h2>
        <div class="row mt-2 mb-5">
            <div class="col">
                <div class="subject-container">
                    <div class="icon">
                        <img src="./assets/images/dashboard/book.png" alt="">
                    </div>
                    <h2 class="mt-3">শিক্ষার্থীদের প্রতিবেদন</h2>
                    <div class="total-student">
                        <P>Total Student</P>
                        <p class="number">54</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="subject-container">
                    <div class="icon">
                        <img src="./assets/images/dashboard/book.png" alt="">
                    </div>
                    <h2 class="mt-3">শিক্ষার্থীদের প্রতিবেদন</h2>
                    <div class="total-student">
                        <P>Total Student</P>
                        <p class="number">54</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="subject-container">
                    <div class="icon">
                        <img src="./assets/images/dashboard/book.png" alt="">
                    </div>
                    <h2 class="mt-3">শিক্ষার্থীদের প্রতিবেদন</h2>
                    <div class="total-student">
                        <P>Total Student</P>
                        <p class="number">54</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="subject-container">
                    <div class="icon">
                        <img src="./assets/images/dashboard/book.png" alt="">
                    </div>
                    <h2 class="mt-3">শিক্ষার্থীদের প্রতিবেদন</h2>
                    <div class="total-student">
                        <P>Total Student</P>
                        <p class="number">54</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="subject-container">
                    <div class="icon">
                        <img src="./assets/images/dashboard/book.png" alt="">
                    </div>
                    <h2 class="mt-3">শিক্ষার্থীদের প্রতিবেদন</h2>
                    <div class="total-student">
                        <P>Total Student</P>
                        <p class="number">54</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- class routine -->

    <section>
        <div class="container pt-5">
            <div class="row">
                <div class="card shadow-sm border-0 p-3">
                    <div class="d-flex justify-content-between align-items-center flex-column flex-md-row">
                        <div class="">
                            <h6 class="p-0 m-0 class_routine">
                                ক্লাস রুটিন
                            </h6>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="d-flex gap-2 align-items-center">
                                <h6 class="p-0 m-0 time_line">
                                    টাইমলাইন
                                </h6>
                                <div class="session_and_all_dropdown">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle border-0 bg-white" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            প্রভাতি সেশন
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    Action
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    Another action
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    Something else here
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-2 align-items-center">
                                <h6 class="p-0 m-0 time_line">
                                    ক্লাস অনুসারে ফিল্টার
                                </h6>
                                <div class="session_and_all_dropdown">
                                    <div class="dropdown">
                                        <button class="dropdown-toggle border-0 bg-white" type="button"
                                            id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            সব
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    Action
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    Another action
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    Something else here
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-2">
                        <ul class="nav d-flex justify-content-between align-items-center px-2">
                            <li class="nav-item d-flex align-items-center">
                                <img src="./assets/images/dashboard/profile-2user.png" alt="user-icon">
                                <a class="nav-link tab_nav" id="class_six-tab" data-bs-toggle="tab"
                                    data-bs-target="#class_six" href="#">
                                    ষষ্ঠ শ্রেণী
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <img src="./assets/images/dashboard/profile-2user.png" alt="user-icon">
                                <a class="nav-link tab_nav" id="class_seven-tab" data-bs-toggle="tab"
                                    data-bs-target="#class_seven" href="#">
                                    সপ্তম শ্রেণী
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <img src="./assets/images/dashboard/profile-2user.png" alt="user-icon">
                                <a class="nav-link tab_nav" id="class_eight-tab" data-bs-toggle="tab"
                                    data-bs-target="#class_eight" href="#">
                                    অষ্টম শ্রেণী
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <img src="./assets/images/dashboard/profile-2user.png" alt="user-icon">
                                <a class="nav-link tab_nav" id="class_nine-tab" data-bs-toggle="tab"
                                    data-bs-target="#class_nine" href="#">
                                    নবম শ্রেণী
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <img src="./assets/images/dashboard/profile-2user.png" alt="user-icon">
                                <a class="nav-link tab_nav" id="class_ten-tab" data-bs-toggle="tab"
                                    data-bs-target="#class_ten" href="#">
                                    দশম শ্রেণী
                                </a>
                            </li>
                        </ul>
                        <div class="d-flex gap-2">
                            <h6 class="my-2 py-1 px-3 p-0 m-0 classes_name">
                                পদ্মা
                            </h6>
                            <h6 class="my-2 py-1 px-3 p-0 m-0 classes_name">
                                মেঘনা
                            </h6>
                            <h6 class="my-2 py-1 px-3 p-0 m-0 classes_name">
                                যমুনা
                            </h6>
                        </div>
                        <div class="tab-content" id="tabContent">
                            <div class="tab-pane fade show active" id="class_six" role="tabpanel"
                                aria-labelledby="class_six-tab">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="table_row_style">
                                                <th scope="col"></th>
                                                <th scope="col" style="background-color: #F0F9F9;">
                                                    8:00AM - 9:00AM
                                                </th>
                                                <th scope="col" style="background-color: #F0F9F9;">
                                                    8:00AM - 9:00AM
                                                </th>
                                                <th scope="col" style="background-color: #F0F9F9;">
                                                    8:00AM - 9:00AM
                                                </th>
                                                <th scope="col" style="background-color: #F0F9F9;">
                                                    8:00AM - 9:00AM
                                                </th>
                                                <th scope="col" style="background-color: #F0F9F9;">
                                                    8:00AM - 9:00AM
                                                </th>
                                                <th scope="col" style="background-color: #F0F9F9;">
                                                    8:00AM - 9:00AM
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table_row_style ">
                                                <th scope="row" style="background-color: #F0F9F9;">
                                                    Cell label
                                                </th>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                            </tr>
                                            <tr class="table_row_style">
                                                <th scope="row" style="background-color: #F0F9F9;">
                                                    Cell label
                                                </th>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                            </tr>
                                            <tr class="table_row_style">
                                                <th scope="row" style="background-color: #F0F9F9;">
                                                    Cell label
                                                </th>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                            </tr>
                                            <tr class="table_row_style">
                                                <th scope="row" style="background-color: #F0F9F9;">
                                                    Cell label
                                                </th>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                            </tr>
                                            <tr class="table_row_style">
                                                <th scope="row" style="background-color: #F0F9F9;">
                                                    Cell label
                                                </th>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                            </tr>
                                            <tr class="table_row_style">
                                                <th scope="row" style="background-color: #F0F9F9;">
                                                    Cell label
                                                </th>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                                <td>Cell label</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="class_seven" role="tabpanel"
                                aria-labelledby="class_seven-tab">
                                <h1>সপ্তম শ্রেণী</h1>
                            </div>
                            <div class="tab-pane fade" id="class_eight" role="tabpanel"
                                aria-labelledby="class_eight-tab">
                                <h1>অষ্টম শ্রেণী</h1>
                            </div>
                            <div class="tab-pane fade" id="class_nine" role="tabpanel" aria-labelledby="class_nine-tab">
                                <h1>নবম শ্রেণী</h1>
                            </div>
                            <div class="tab-pane fade" id="class_ten" role="tabpanel" aria-labelledby="class_ten-tab">
                                <h1>class_ten</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
