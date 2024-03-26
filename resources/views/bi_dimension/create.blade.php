@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="p-2 custom-class-title">BI ডাইমেনশন</h2>
            <div class="shadow-sm p-2 rounded my-2 custom-card">
                <div class="">

                    <form method="POST" action="{{ @$dimension ? route('bi-dimension.update', @$dimension->uid) : route("bi-dimension.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="dimension_no" class="form-label">ডাইমেনশন নং</label>
                                    <input type="text" class="custom-input-form" aria-describedby="dimension_no" value="{{ @$dimension->dimension_no }}"
                                        name="dimension_no">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="dimension_title" class="form-label">ডাইমেনশন নাম</label>
                                    <input type="text" class="custom-input-form" aria-describedby="dimension_title" value="{{ @$dimension->dimension_title }}"
                                        name="dimension_title">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 input-container">
                                    <label for="dimension_details" class="form-label">ডাইমেনশন বিস্তারিত</label>
                                    <textarea class="custom-input-form" id="dimension_details" aria-describedby="dimension_details" name="dimension_details">{{ @$dimension->dimension_details }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="mb-3 input-container">
                                    <label for="pi_uid" class="form-label">BI</label>
                                    <div class="form-group form-check">
                                        <div id="pi_div">
                                            @foreach ($bis as $bi) 
                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" id="bi_uid[{{ $bi->uid }}]" name="bi_uid[{{ $bi->uid }}]">
                                                    <label class="form-check-label" for="bi_uid[{{ $bi->uid }}]">{{ $bi->name_bn }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"><button type="submit" class="custom-button ms-3 mt-2 mb-3">জমা দিন <img src="https://master.project-ca.com/frontend/noipunno/images/icons/arrow-right.svg" alt="logo"> </button></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

