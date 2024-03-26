@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="p-2 custom-class-title">বিষয়</h2>
                <div class="shadow-sm p-2 rounded my-2 custom-card">
                    <div class="">
                        <form method="POST" action="{{ route("subject.store") }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-container">
                                        <label for="subject_id" class="form-label">বিষয় ID</label>
                                        <input type="number" class="custom-input-form" aria-describedby="subject_id"
                                            name="subject_id" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-container">
                                        <label for="name" class="form-label">বিষয়ের নাম</label>
                                        <input type="text" class="custom-input-form" aria-describedby="name"
                                            name="name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-container">
                                        <label for="class_uid" class="form-label">শ্রেণী</label>
                                        <select class="form-select custom-input-form" aria-label="Default select example" name="class_uid">
                                            @foreach($classes as $class)
                                            <option value="{{$class->class_id}}">{{app()->getLocale() == 'en' ? $class->name_en :  $class->name_bn}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="session" class="form-label">Version</label>
                                        <select class="form-select" aria-label="Default select example" name="session">
                                            <option value="bangla">Bangla</option>
                                            <option value="english">English</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4"><button type="submit" class="custom-button ms-3 mt-2 mb-3">জমা দিন <img src="https://teacher.project-ca.com/frontend/noipunno/images/icons/arrow-right.svg" alt="logo"> </button></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
