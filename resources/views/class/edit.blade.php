@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="p-2 custom-class-title">শ্রেণী</h3>
            <div class="shadow-sm p-2 rounded my-2 custom-card">
                <div class="">
                    <form method="POST" action="{{ route("class.update", $class->uid) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 input-container">
                                    <label for="class_id" class="custom-label">শ্রেণী আইডি</label>
                                    <input type="number" aria-describedby="class_id" class="custom-input-form" name="class_id" value="{{$class->class_id}}">
                                </div>
                                <div class="mb-3 input-container">
                                    <label for="name_bn" class="custom-label">শ্রেণীর নাম (BN)</label>
                                    <input type="text" class="custom-input-form" aria-describedby="name_bn" name="name_bn" value="{{$class->name_bn}}">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3 input-container">
                                    <label for="name_en" class="custom-label">শ্রেণীর নাম (EN)</label>
                                    <input type="text" class="custom-input-form" aria-describedby="name_en" name="name_en" value="{{$class->name_en}}">
                                </div>
                                <div class="mb-3 input-container">
                                    <label for="class_code" class="custom-label">শ্রেণী কোড</label>
                                    <input type="text" class="custom-input-form" aria-describedby="class_code" name="class_code" value="{{$class->class_code}}">
                                </div>
                            </div>

                            <div class="col-md-4">

                            </div>

                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="version" class="form-label">Version</label>
                                    <select class="form-select" aria-label="Default select example" name="version">
                                        <option value="bangla" @if($class->version == 'bangla') selected @endif>Bangla</option>
                                        <option value="english" @if($class->version == 'english') selected @endif>English</option>
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

