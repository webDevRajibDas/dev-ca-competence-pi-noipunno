@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="my-3 custom-class-title">অভিজ্ঞতা অনুযায়ী পারদর্শিতা সূচক ডাউনলোড করুন</h2>
                        <form method="GET" action="{{ route('pi.pdf.download') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="class_uid" class="form-label">শ্রেনী</label>
                                        <select class="form-select" aria-label="Default select example" name="class_uid"
                                            id="class_uid">
                                            <option value="">শ্রেনী নির্বাচন করুন</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->class_id }}">
                                                    {{ app()->getLocale() == 'en' ? $class->name_en : $class->name_bn }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="subject_uid" class="form-label">বিষয়</label>
                                        <select class="form-select" aria-label="Default select example" name="subject_uid"
                                            id="subject_uid">
                                            <option value="">বিষয় নির্বাচন করুন</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div style="margin-top: 30px;">
                                        <button type="submit" class="btn btn-primary">ডাউনলোড করুন</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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
                    $('#subject_uid').html('<option value ="">Select Subject</option>');

                    var selected = "{{ @$class_room->subject_uid }}";

                    if (data) {
                        $.each(data, function(index, category) {
                            $('#subject_uid').append('<option value ="' + category.uid + '"' + (
                                    (category.uid == selected) ? ('selected') : '') + '>' +
                                category.name + '</option>');
                        });
                    }
                }
            });
        });
    </script>
@endsection
