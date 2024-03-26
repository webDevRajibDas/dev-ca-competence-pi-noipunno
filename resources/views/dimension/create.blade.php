@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="p-2 custom-class-title">ডাইমেনশন</h2>
            <div class="shadow-sm p-2 rounded my-2 custom-card">
                <div class="">

                    <form method="POST" action="{{ @$dimension ? route('dimension.update', @$dimension->uid) : route("dimension.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="class_id" class="form-label">শ্রেণী</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="class_id" id="class_id">
                                        <option value="">শ্রেণী নির্বাচন করুন</option>
                                        @foreach($classes as $class)
                                        <option value="{{$class->class_id}}" {{ @$dimension->class_id == $class->class_id ? 'selected' : '' }}>{{app()->getLocale() == 'en' ? $class->name_en :  $class->name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="subject_uid" class="form-label">বিষয়</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="subject_uid" id="subject_uid">
                                        <option value="">বিষয় নির্বাচন করুন</option>
                                    </select>
                                </div>
                            </div>

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
                            <hr>

                            <div class="col-md-12">
                                <div class="mb-3 input-container">
                                    <label for="pi_uid" class="form-label">PI</label>
                                    <div class="form-group form-check">
                                        <div id="pi_div">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"><button type="submit" class="custom-button ms-3 mt-2 mb-3">জমা দিন <img src="{{asset('frontend/noipunno/images/icons/arrow-right.svg')}}" alt="logo"> </button></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('change', '#class_id', function() {
        var class_id = $('#class_id').val();

        $.ajax({
            url: "{{ route('class_wise_subject') }}",
            type: "GET",
            data: {
                class_id: class_id,
            },
            success: function(data) {
                $('#subject_uid').html('');
                $('#subject_uid').html('<option value ="">বিষয় নির্বাচন করুন</option>');

                var selected = "{{ @$dimension->subject_uid }}";

                if (data) {
                    $.each(data, function(index, category) {
                        $('#subject_uid').append('<option value ="' + category.uid + '"' + ((
                                category.uid == selected) ? ('selected') : '') + '>' + category.name +
                            '</option>');
                    });
                }
                $('#subject_uid').trigger('change');
            }
        });
    });
    $(document).on('change', '#subject_uid', function() {
        var subject_uid = $('#subject_uid').val();

        $.ajax({
            url: "{{ route('pi_by_subject') }}",
            type: "GET",
            data: {
                subject_id: subject_uid
            },
            success: function(response) {
                var html ='';
                if (response) {
                    $.each(response.pis, function(index, category) {
                        html += `
                            <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="pi_uid[${category.uid}]" name="pi_uid[${category.uid}]">
                            <label class="form-check-label" for="pi_uid[${category.uid}]">${category.pi_no} - ${category.name_bn ?? category.name_en}</label>
                            </div>
                        `;
                    });
                }
                $('#pi_div').html(html);
            }
        });
    });
</script>
@endsection

