@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="my-3 custom-class-title">একক যোগ্যতা</h2>
                <div class="shadow-sm p-2 rounded my-2 custom-card">
                    <div class="">

                        <form method="POST" action="{{ route('competence.update', @$competence->uid) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="class_uid" class="form-label">শ্রেণী</label>
                                        <select class="form-select" aria-label="Default select example" name="class_uid"
                                            id="class_uid">
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->class_id }}"
                                                    @if ($competence->class_uid == $class->class_id) selected @endif>
                                                    {{ app()->getLocale() == 'en' ? $class->name_en : $class->name_bn }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subject_uid" class="form-label">বিষয়</label>
                                        <select class="form-select" aria-label="Default select example" name="subject_uid"
                                            id="subject_uid">
                                            <option value="">বিষয় নির্বাচন করুন</option>
                                            {{-- @foreach ($subjects as $subject)
                                                <option class="subject-option class-{{ $subject->class_uid }}"
                                                    value="{{ $subject->uid }}"
                                                    @if ($competence->subject_uid == $subject->uid) selected @endif>{{ $subject->name }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="competence_session" class="form-label">সেশন</label>
                                        <select class="form-select" aria-label="Default select example" name="session">
                                            {{-- <option value="2023" @if ($competence->session == '2023') selected @endif>2023
                                            </option> --}}
                                            <option value="2024" @if ($competence->session == '2024') selected @endif>2024
                                            </option>
                                            {{-- <option value="2025" @if ($competence->session == '2025') selected @endif>2025
                                            </option>
                                            <option value="2026" @if ($competence->session == '2026') selected @endif>2026
                                            </option>
                                            <option value="2027" @if ($competence->session == '2027') selected @endif>2027
                                            </option>
                                            <option value="2028" @if ($competence->session == '2028') selected @endif>2028
                                            </option>
                                            <option value="2029" @if ($competence->session == '2029') selected @endif>2029
                                            </option> --}}
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="chapter_uid" class="form-label">Chapter</label>
                                    <select class="form-select" aria-label="Default select example" name="chapter_uid" id="chapter_uid">
                                        <option value="">Select Chapter</option>
                                        @foreach ($chapters as $chapter)
                                        <option class="chapter-option subject-{{$chapter->subject_uid}}" value="{{$chapter->uid}}"
                                           @if ($chapter->uid == $competence->chapter_uid) selected @endif >{{ $chapter->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="competence_id" class="form-label">একক যোগ্যতা আইডি</label>
                                        <input type="text" value="{{ @$competence->competence_id }}" class="form-control"
                                            aria-describedby="competence_id" name="competence_id">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name_bn" class="form-label">একক যোগ্যতার নাম (বাংলা)</label>
                                        <input type="text" value="{{ @$competence->name_bn }}" class="form-control"
                                            aria-describedby="name_bn" name="name_bn">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name_en" class="form-label">একক যোগ্যতার নাম (ইংরেজি)</label>
                                        <input type="text" value="{{ @$competence->name_en }}" class="form-control"
                                            aria-describedby="name_en" name="name_en">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="details" class="form-label">একক যোগ্যতা বিস্তারিত (বাংলা)</label>
                                        <textarea class="form-control" id="details" aria-describedby="description" name="details_bn">{{ @$competence->details_bn }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="details" class="form-label">একক যোগ্যতা বিস্তারিত (ইংরেজি)</label>
                                        <textarea class="form-control" id="details" aria-describedby="description" name="details_en">{{ @$competence->details_en }}</textarea>
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="start_date" class="form-label">শুরুর তারিখ</label>
                                        <input type="date" value="{{ @$competence->start_date }}" class="form-control"
                                            aria-describedby="start_date" name="start_date">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="end_date" class="form-label">শেষ তারিখ</label>
                                        <input type="date" value="{{ @$competence->end_date }}" class="form-control"
                                            aria-describedby="end_date" name="end_date">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">স্ট্যাটাস</label>
                                        <select class="form-select" aria-label="Default select example" name="status">
                                            <option value="Draft" @if ($competence->status == 'Draft') selected @endif>Draft
                                            </option>
                                            <option value="Publish" @if ($competence->status == 'Publish') selected @endif>
                                                Publish</option>
                                            <option value="Reject" @if ($competence->status == 'Reject') selected @endif>
                                                Reject</option>
                                            <option value="Approve" @if ($competence->status == 'Approve') selected @endif>
                                                Approve</option>
                                        </select>
                                    </div>
                                </div> --}}
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
        $(function(){
            $('#class_uid').trigger('change');
        });
    
        $(document).on('change', '#class_uid', function() {
            var class_id = $('#class_uid').val();
            $.ajax({
                url: "{{ route('class_wise_subject') }}",
                type: "GET",
                data: {
                    class_id: class_id,
                },
                success: function(data) {
                    $('#subject_uid').html('');
                    $('#subject_uid').html('<option value ="">বিষয় নির্বাচন করুন</option>');
    
                    var selected = "{{ @$competence->subject_uid }}";
    
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
    </script>
@endsection

