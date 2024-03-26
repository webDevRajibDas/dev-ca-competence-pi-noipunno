@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="my-3 custom-class-title">একক যোগ্যতা</h2>
                <div class="shadow-sm p-2 rounded my-2 custom-card">
                    <div class="">

                        <form method="POST" action="{{ route('competence.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="class_uid" class="form-label">শ্রেণী</label>
                                        <select class="form-select custom-input-form" aria-label="Default select example" name="class_uid"
                                            id="class_uid">
                                            <option value="">শ্রেণী নির্বাচন করুন</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->class_id }}">
                                                    {{ app()->getLocale() == 'en' ? $class->name_en : $class->name_bn }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="subject_uid" class="form-label">বিষয়</label>
                                        <select class="form-select custom-input-form" aria-label="Default select example" name="subject_uid"
                                            id="subject_uid">
                                            <option value="">বিষয় নির্বাচন করুন</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="competence_id" class="form-label">একক যোগ্যতা আইডি</label>
                                        <input type="text" class="custom-input-form" aria-describedby="competence_id"
                                            name="competence_id">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="competence_session" class="form-label">সেশন</label>
                                        <select class="form-select custom-input-form" aria-label="Default select example" name="session">
                                            {{-- <option value="2023">2023</option> --}}
                                            <option value="2024">2024</option>
                                            {{-- <option value="2025">2025</option> --}}
                                            {{-- <option value="2026">2026</option> --}}
                                            {{-- <option value="2027">2027</option> --}}
                                            {{-- <option value="2028">2028</option> --}}
                                            {{-- <option value="2029">2029</option> --}}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="name_bn" class="form-label">একক যোগ্যতার নাম (বাংলা)</label>
                                        <input type="text" class="custom-input-form" aria-describedby="name_bn"
                                            name="name_bn">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="name_en" class="form-label">একক যোগ্যতার নাম (ইংরেজি)</label>
                                        <input type="text" class="custom-input-form" aria-describedby="name_en"
                                            name="name_en">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="details" class="form-label">একক যোগ্যতা বিস্তারিত (বাংলা)</label>
                                        <textarea class="custom-input-form" id="details" aria-describedby="description" name="details_bn"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="details" class="form-label">একক যোগ্যতা বিস্তারিত (ইংরেজি)</label>
                                        <textarea class="custom-input-form" id="details" aria-describedby="description" name="details_en"></textarea>
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
        // $(function(){
        //     $('#class_uid').trigger('change');
        // });
    
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
    
                    var selected = "{{ @$oviggota->subject_uid }}";
    
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

