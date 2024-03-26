@extends('layouts.app')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('subject.create') }}">
              + বিষয় যুক্ত করুন
            </a>
        </div>
    </div>

    <div class="">

        <h4 class="my-3 custom-class-title"> বিষয়ের তালিকা </h4>


        <div class="">
            <div class="table-responsive table-container shadow p-2">
                <table id="subject_table" class="custom-table myTable">
                    <thead>
                        <tr>
                            <th>
                                {{-- {{ trans('cruds.subject.fields.name') }} --}}
                                নাম
                            </th>
                            <th>
                                {{-- {{ trans('cruds.subject.fields.class') }} --}}
                                শ্রেণী
                            </th>
                            {{-- <th>
                                {{ trans('cruds.subject.fields.version') }}
                            </th> --}}
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subjects as $key => $subject)
                        <tr data-entry-id="{{ $subject->uid }}">

                            <td>
                                {{ $subject->name ?? '' }}
                            </td>
                            <td>
                                {{ app()->getLocale() == 'en' ? $subject->class->name_en ?? '' :  $subject->class->name_bn ?? '' }}
                            </td>
                            {{-- <td>
                                {{ $subject->version ?? '' }}
                            </td> --}}
                            <td>
                                <a class="" href="{{ route('subject.edit', $subject->uid) }}">
                                    <button class="custom-edit-btn">
                                        <img src="{{ asset('assets/icons/edit-white.svg')}}" alt="">
                                    </button>
                                </a>
                                <form action="{{ route('subject.destroy', $subject->uid) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')

<script>
    $(document).ready(function () {
        var groupColumn = 1;
        var table = $('#subject_table').DataTable({
            columnDefs: [{ visible: false, targets: groupColumn }],
            order: [[groupColumn, 'asc']],
            displayLength: 13,
            fixedHeader: true,
            //columnDefs: [
            //    { width: 200, targets: 0 }
            //],
            //fixedColumns: true,
            language: {
                paginate: {
                    // next: '<i class="fa fa-fw fa-long-arrow-right">',
                    // previous: '<i class="fa fa-fw fa-long-arrow-left">'
                    next: '<span style="color: black;"> > </span>',
                    previous: '<span style="color: black;"> < </span>',
                    first: '<span style="color: black;"> << </span>',
                    last: '<span style="color: black;"> >> </span>',
                }
            },
            pagingType: "full_numbers",
            drawCallback: function (settings) {
                var api = this.api();
                var rows = api.rows({ page: 'current' }).nodes();
                var last = null;

                api
                    .column(groupColumn, { page: 'current' })
                    .data()
                    .each(function (group, i) {
                        if (last !== group) {
                            $(rows)
                                .eq(i)
                                .before('<tr class="group"><td colspan="8">' + group + '</td></tr>');

                            last = group;
                        }
                    });
            },
        });

        // Order by the grouping
        $('#subject_table tbody').on('click', 'tr.group', function () {
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

