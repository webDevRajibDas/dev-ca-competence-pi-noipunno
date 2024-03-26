@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="p-2 custom-class-title">PI মাত্রা</h2>
            <div class="shadow-sm p-2 rounded my-2 custom-card">
                <div class="">
                    <form method="POST" action="{{ route("weight.update", $weight->uid) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="name" class="form-label">মাত্রার নাম</label>
                                    <input type="text" value="{{@$weight->name}}" class="custom-input-form" aria-describedby="name"
                                        name="name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="type" class="form-label">মাত্রার ধরণ</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="type">
                                        <option value="square" @if($weight->type == 'square') selected @endif>বর্গক্ষেত্র</option>
                                        <option value="circle" @if($weight->type == 'circle') selected @endif>বৃত্ত</option>
                                        <option value="triangle" @if($weight->type == 'triangle') selected @endif>ত্রিভুজ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="number" class="form-label">মাত্রার সংখ্যা</label>
                                    <input type="number" value="{{@$weight->number}}" class="custom-input-form" aria-describedby="number"
                                        name="number">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="description" class="form-label">মাত্রার বিবরণ</label>
                                    <textarea class="custom-input-form" id="description" aria-describedby="description" name="description">{{@$weight->description}}</textarea>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="session" class="form-label">মাত্রার সেশন</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="session">
                                        <option value="2023" @if($weight->session == '2023') selected @endif>2023</option>
                                        <option value="2024" @if($weight->session == '2024') selected @endif>2024</option>
                                        <option value="2025" @if($weight->session == '2025') selected @endif>2025</option>
                                        <option value="2026" @if($weight->session == '2026') selected @endif>2026</option>
                                        <option value="2027" @if($weight->session == '2027') selected @endif>2027</option>
                                        <option value="2028" @if($weight->session == '2028') selected @endif>2028</option>
                                        <option value="2029" @if($weight->session == '2029') selected @endif>2029</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="symbol" class="form-label">প্রতীক</label>
                                    <input type="file" class="custom-input-form" aria-describedby="symbol" name="symbol">
                                </div>
                            </div>

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
