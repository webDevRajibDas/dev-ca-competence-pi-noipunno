@extends('layouts.app')
@section('content')
    <div class="custom-card p-3 shadow-sm">
        <form method="GET" action="{{ route('chapter.copy') }}" enctype="multipart/form-data">
            <div class="row mt-2 container">
                <div class="col-md-3">
                    <div class="mb-3">
                        {{-- <label for="competence_session" class="form-label">সেশন</label> --}}
                        <select class="form-select custom-input-form" aria-label="Default select example" name="session">
                            <option value="2023" @if (request()->session == '2023') {{ 'selected' }} @endif>2023
                            </option>
                            <option value="2024" @if (request()->session == '2024') {{ 'selected' }} @endif>2024
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <select class="form-select custom-input-form" aria-label="Default select example" name="class_uid"
                            onchange="classWiseSubject(this.value);return;">
                            <option value="">শ্রেনী নির্বাচন করুন</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->class_id }}"
                                    @if (request()->class_uid == $class->class_id) {{ 'selected' }} @endif>
                                    {{ app()->getLocale() == 'en' ? $class->name_en : $class->name_bn }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <select class="form-select custom-input-form" aria-label="Default select example" name="subject_uid"
                            id="subject_uid">
                            <option value="">বিষয় নির্বাচন করুন</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <select class="form-select custom-input-form" aria-label="Default select example" name="limit">
                            <option value="">অধ্যায় পরিমান</option>
                            <option value="10" @if (request()->limit == '10') {{ 'selected' }} @endif>10
                            </option>
                            <option value="25" @if (request()->limit == '25') {{ 'selected' }} @endif>25
                            </option>
                            <option value="50" @if (request()->limit == '50') {{ 'selected' }} @endif>50
                            </option>
                            <option value="100" @if (request()->limit == '100') {{ 'selected' }} @endif>100
                            </option>
                            <option value="all" @if (request()->limit == 'all') {{ 'selected' }} @endif>সমস্ত
                                ডাটা</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="custom-button" type="submit">খুজুন</button>
                </div>
            </div>
        </form>
    </div>

    <div class="">
        <h4 class="mt-3 mb-3 custom-class-title">অধ্যায় তালিকা</h4>
        @if ($errors->has('chapterArr'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors->first('chapterArr') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(request()->session != date('Y'))
        <a type="button" class="btn btn-color float-right" id="copyButton">
            কপি করুন
        </a>
        @endif

        <div class="">
            <div class="table-responsive table-container shadow p-2">
                <table id="chapter_table" class="custom-table myTable">
                    <thead>
                        <tr>
                            @if(request()->session != date('Y'))
                            <th>
                                <input type="checkbox" id="checkAll">
                                <label for="checkAll">সবগুলো চেক করুন</label><br>
                            </th>
                            @endif
                            <th>
                                নাম
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>

                    <form method="post" action="{{ route('chapter.copyStore') }}" id="copyForm">
                        @csrf
                        <tbody>
                            @forelse ($chapters as $key => $chapter)
                                <tr>
                                    @if(request()->session != date('Y'))
                                    <td>
                                        <input type="checkbox" class="checkItem" data-chapter-id={{ $chapter->uid }}
                                            name="chapterArr[]" value={{ $chapter->uid }}>
                                    </td>
                                    @endif
                                    <td>
                                        {{ $chapter->name ?? '' }}
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <span>ইতোমধ্যে {{ request()->session ?? date('Y')-1}} এর সমস্ত ডাটা কপি সম্পন্ন হয়ে গেছে।</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </form>
                </table>
                @if (request()->limit !== 'all')
                    <div class="pagination justify-content-end">
                        {{ $chapters->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#checkAll').click(function() {
            $(':checkbox.checkItem').prop('checked', this.checked);
        });
        $(document).on('click', '#copyButton', function() {
            $('#copyForm').submit();
        });

        function classWiseSubject(classId) {
            let class_id = classId;
            if (class_id != '') {
                $.ajax({
                    url: "{{ route('class_wise_subject') }}",
                    type: "GET",
                    data: {
                        class_id: class_id,
                    },
                    success: function(data) {
                        $('#subject_uid').html('<option value ="">বিষয় নির্বাচন করুন</option>');

                        var selected = "{{ request()->subject_uid }}";

                        if (data) {
                            $.each(data, function(index, category) {
                                $('#subject_uid').append('<option value ="' + category.uid +
                                    '"' + (
                                        (category.uid == selected) ? ('selected') : '') +
                                    '>' +
                                    category.name +
                                    '</option>');
                            });
                        }
                    }
                });
            } else {
                $('#subject_uid').html('<option value ="">বিষয় নির্বাচন করুন</option>');
            }

        }
        let classId = "{{ request()->class_uid }}";
        if (classId !== '') {
            classWiseSubject(classId);
        }
    </script>
@endsection
