@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="p-2 custom-class-title">আচরণগত সূচক</h2>
            <div class="shadow-sm p-2 rounded my-2 custom-card">
                <div class="">

                    <form method="POST" action="{{ route("bi.update", $bi->uid) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="bi_id" class="form-label">BI ID</label>
                                    <input type="number" value="{{$bi->bi_id}}" class="custom-input-form" aria-describedby="bi_id" name="bi_id">
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="class_uid" class="form-label">Class</label>
                                    <select class="form-select" aria-label="Default select example" name="class_uid" id="class_uid">
                                        <option value="">Select Class</option>
                                        @foreach($classes as $class)
                                        <option value="{{$class->class_id}}" @if($bi->class_uid == $class->class_id) selected @endif>{{app()->getLocale() == 'en' ? $class->name_en :  $class->name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="subject_uid" class="form-label">Subject</label>
                                    <select class="form-select" aria-label="Default select example" name="subject_uid" id="subject_uid">
                                        <option value="">Select Subject</option>
                                        @foreach($subjects as $subject)
                                        <option class="subject-option class-{{$subject->class_uid}}" value="{{$subject->uid}}"  @if($bi->subject_uid == $subject->uid) selected @endif>{{ $subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="name_bn" class="form-label">BI নাম (BN)</label>
                                    <input type="text" class="custom-input-form" aria-describedby="name_bn"
                                        name="name_bn" value="{{$bi->name_bn}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="name_en" class="form-label">BI নাম (EN)</label>
                                    <input type="text" class="custom-input-form" aria-describedby="name_en"
                                        name="name_en" value="{{$bi->name_en}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="description" class="form-label">BI বর্ণনা</label>
                                    <textarea class="custom-input-form" id="description" aria-describedby="description" name="description">{{$bi->description}}</textarea>
                                </div>
                            </div>
                            <div>
                                <hr><h1 class="d-flex justify-content-center mb-3">Bi মাত্রা</h1>
                            </div>

                            @foreach($bi->weights as $weight)
                            <div id="additional-rows">
                                <div>
                                    <hr><h1 class="d-flex justify-content-center mb-3">{{$weight->name}}</h1>
                                </div>
                                <div class="row guide" id="guide">
                                    <input type="hidden" value="{{@$weight->uid}}" class="form-control" aria-describedby="wuid"
                                        name="wuid[]">
                                    <input type="hidden" value="{{@$weight->uid}}" class="form-control" aria-describedby="weight_uid"
                                            name="weight_uid[]">
                                    <div class="col-md-6">
                                        <div class="mb-3 input-container">
                                            <label for="title_en" class="form-label">টাইটেল (EN)</label>
                                            <textarea class="custom-input-form" id="title_en" aria-describedby="title_en" name="title_en[]">{{ $weight->title_en }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 input-container">
                                            <label for="title_bn" class="form-label">টাইটেল (BN)</label>
                                            <textarea class="custom-input-form" id="title_bn" aria-describedby="title_bn" name="title_bn[]">{{ $weight->title_bn }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 input-container">
                                            <label for="description" class="form-label">বর্ণনা</label>
                                            <textarea class="custom-input-form" id="description" aria-describedby="description" name="details[]"> {{ $weight->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
