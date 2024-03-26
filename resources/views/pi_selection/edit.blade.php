@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="p-2">PI মূল্যায়ন</h2>
            <div class="shadow-sm p-2 rounded my-2 custom-card">
                <div class="">

                    <form method="POST" action="{{ @$editData ? route('pi-selection.update', @$editData->uid) : route("pi-selection.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
                                <div class="mb-3 input-container">
                                    <label for="assessment_type" class="form-label">মূল্যায়ন ধরণ</label>
                                        <select class="form-select custom-input-form" aria-label="" name="assessment_type" id="assessment_type">
                                            <option value="">মূল্যায়ন ধরণ নির্বাচন করুন</option>
                                            @foreach($assessment_types as $assessment_type)
                                            <option value="{{$assessment_type->uid}}" {{ @$editData->assessment_type == $assessment_type->uid ? 'selected' : '' }}>{{ $assessment_type->assessment_details_name_bn }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3 input-container">
                                    <label for="start_date" class="form-label">শুরুর তারিখ</label>
                                    <input type="date" class="custom-input-form" aria-describedby="start_date" value="{{ @$editData->start_date }}"
                                        name="start_date">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3 input-container">
                                    <label for="end_date" class="form-label">শেষ তারিখ</label>
                                    <input type="date" class="custom-input-form" aria-describedby="end_date" value="{{ @$editData->end_date }}"
                                        name="end_date">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3 input-container">
                                    <label for="session" class="form-label">সেশন</label>
                                    {{-- <input type="text" class="form-control" aria-describedby="session" value="{{ @$editData->session }}"
                                        name="session" placeholder="2023"> --}}
                                        <select class="form-select custom-input-form" aria-label="Default select example" name="session">
                                            <option value="2023" {{ @$editData->session == '2023' ? 'selected' : '' }}>2023</option>
                                            <option value="2024" {{ @$editData->session == '2024' ? 'selected' : '' }}>2024</option>
                                            <option value="2025" {{ @$editData->session == '2025' ? 'selected' : '' }}>2025</option>
                                        </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3 input-container">
                                    <label for="class_id" class="form-label">শ্রেণী</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="class_id" id="class_id">
                                        <option value="">শ্রেণী নির্বাচন করুন</option>
                                        @foreach($classes as $class)
                                        <option value="{{$class->class_id}}" {{ @$editData->class_id == $class->class_id ? 'selected' : '' }}>{{app()->getLocale() == 'en' ? $class->name_en :  $class->name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3 input-container">
                                    <label for="subject_uid" class="form-label">বিষয়</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="subject_uid" id="subject_uid">
                                        <option value="">বিষয় নির্বাচন করুন</option>
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="col-md-6">
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
                            <div class="col-sm-4"><button type="submit" class="custom-button ms-3 mt-2 mb-3">জমা দিন <img src="https://teacher.project-ca.com/frontend/noipunno/images/icons/arrow-right.svg" alt="logo"> </button></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#class_id').trigger('change');
    });

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
                $('#subject_uid').html('<option value ="">Select Subject</option>');

                var selected = "{{ @$editData->subject_uid }}";

                if (data) {
                    $.each(data, function(index, category) {
                        $('#subject_uid').append('<option value ="' + category.uid + '"' + ((
                                category
                                .uid == selected) ? ('selected') : '') + '>' + category.name +
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
            url: "{{ route('subject_wise_chapter') }}",
            type: "GET",
            data: {
                subject_id: subject_uid
            },
            success: function(response) {
                var html ='';
                if (response) {
                    $.each(response.data, function(index, category) {
                        html += `
                            <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="chapter_uid[${category.uid}]" name="chapter_uid[${category.uid}]">
                            <label class="form-check-label" for="chapter_uid[${category.uid}]">${category.name}</label>
                            </div>
                        `;
                    });
                }
                $('#chapter_div').html(html);
            }
        });

        $.ajax({
            url: "{{ route('pi_by_subject') }}",
            type: "GET",
            data: {
                subject_id: subject_uid,
                edit_pi_selection_id:"{{ @$editData->uid }}"
            },
            success: function(response) {
                var html ='';
                if (response) {
                    $.each(response.pis, function(index, pi) {
                        let checked = response.selected_pi.includes(pi.uid);
                        html += `
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="pi_uid[${pi.uid}]" name="pi_uid[${pi.uid}]" ${(checked)?('checked'):('')}>
                                <label class="form-check-label" for="pi_uid[${pi.uid}]">${pi.competence.class_uid}.${pi.competence.competence_id}.${pi.pi_id} - ${pi.name_bn ?? pi.name_en}</label>
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

