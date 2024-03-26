@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('chapter.create') }}">
                {{-- {{ trans('global.add') }} Chapter --}}
                + অধ্যায় যুক্ত করুন
            </a>
            <a class="btn btn-color" href="{{ route('chapter.copy') }}">
                কপি করুন
            </a>
        </div>
    </div>

    <div class="">
        <h4 class="mt-3 mb-3 custom-class-title">অধ্যায় তালিকা</h4>

        <div class="custom-card p-3 shadow-sm">
            <form method="GET" action="{{ route('chapter') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mt-2 container">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <select class="form-select custom-input-form" aria-label="Default select example"
                                name="class_uid" id="class_uid">
                                <option value="">শ্রেনী নির্বাচন করুন</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->class_id }}">
                                        {{ app()->getLocale() == 'en' ? $class->name_en : $class->name_bn }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <select class="form-select custom-input-form" aria-label="Default select example"
                                name="subject_uid" id="subject_uid">
                                <option value="">বিষয় নির্বাচন করুন</option>
                                @foreach ($subjects as $subject)
                                    <option class="subject-option class-{{ $subject->class_uid }}"
                                        value="{{ $subject->uid }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="custom-button" type="submit">খুজুন</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="">
            <div class="table-responsive table-container shadow p-2">
                <table id="chapter_table" class="custom-table myTable">
                    <thead>
                        <tr>
                            <!-- <th>
                                {{ trans('cruds.chapter.fields.id') }}
                            </th> -->
                            <th>
                                {{-- {{ trans('cruds.chapter.fields.name') }} --}}
                                নাম
                            </th>

                            <th>
                                {{-- {{ trans('cruds.chapter.fields.class') }} --}}
                                শ্রেণী
                            </th>
                            <th>
                                {{-- {{ trans('cruds.chapter.fields.subject') }} --}}
                                বিষয়
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chapters as $key => $chapter)
                            <tr data-entry-id="{{ $chapter->uid }}">
                                <!--
                                <td>
                                    {{ $chapter->chapter_id ?? '' }}
                                </td> -->
                                <td>
                                    {{ $chapter->name ?? '' }}
                                </td>
                                <td>
                                    {{ app()->getLocale() == 'en' ? $chapter->class->name_en ?? '' : $chapter->class->name_bn ?? '' }}
                                </td>
                                <td>
                                    {{ $chapter->subject->name ?? '' }}
                                </td>
                                <td>
                                    <a class="" href="{{ route('chapter.edit', $chapter->uid) }}">
                                        <button class="custom-edit-btn">
                                            <img src="{{ asset('assets/icons/edit-white.svg') }}" alt="">
                                        </button>
                                    </a>
                                    <form action="{{ route('chapter.destroy', $chapter->uid) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="custom-delete-btn">
                                            <i class="fa fa-trash text-light"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('class_uid').addEventListener('change', function() {
            var classId = this.value;
            var subjectOptions = document.querySelectorAll('.subject-option');

            // Hide all subject options
            subjectOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show subject options that belong to the selected class
            var classSubjectOptions = document.querySelectorAll('.subject-option.class-' + classId);
            classSubjectOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });
    });
</script>

@section('scripts')
    <script>
        $(document).ready(function() {
            var groupColumn = 1;
            var table = $('#chapter_table').DataTable({
                columnDefs: [{
                    visible: false,
                    targets: groupColumn
                }],
                order: [
                    [groupColumn, 'asc']
                ],
                displayLength: 25,
                fixedHeader: true,
                //columnDefs: [
                //    { width: 200, targets: 0 }
                //],
                //fixedColumns: true,
                drawCallback: function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api
                        .column(groupColumn, {
                            page: 'current'
                        })
                        .data()
                        .each(function(group, i) {
                            if (last !== group) {
                                $(rows)
                                    .eq(i)
                                    .before('<tr class="group"><td colspan="8">' + group +
                                        '</td></tr>');

                                last = group;
                            }
                        });
                },
            });

            // Order by the grouping
            $('#chapter_table tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
                    table.order([groupColumn, 'desc']).draw();
                } else {
                    table.order([groupColumn, 'asc']).draw();
                }
            });
        });
    </script>
@endsection
