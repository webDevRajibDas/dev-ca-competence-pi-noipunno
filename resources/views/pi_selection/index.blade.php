@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('pi-selection.create') }}">
              + PI মূল্যায়ন যুক্ত করুন
            </a>
        </div>
    </div>

    <div class="">

        <h4 class="mt-3">PI মূল্যায়ন তালিকা </h4>

        <div class="">
            <div class="table-responsive table-container shadow p-2">
                <table id="pi_selection_table" class="custom-table myTable">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>মূল্যায়ন ধরণ</th>
                            <th>শ্রেণী</th>
                            <th>বিষয়</th>
                            <th>সেশন</th>
                            <th>শুরুর তারিখ</th>
                            <th>শেষ তারিখ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pi_selections as $key => $item)
                            <tr data-entry-id="{{ $item->uid }}">

                                <!-- <td>{{ $item->uid ?? '' }}</td> -->
                                <td>{{ @$item->assessmentType->assessment_details_name_bn ?? '' }}</td>
                                <td>{{ @$item->class->name_en ?? '' }}</td>
                                <td>{{ $item->subject->name ?? '' }}</td>
                                <td>{{ $item->session ?? '' }}</td>
                                <td>{{ $item->start_date ?? '' }}</td>
                                <td>{{ $item->end_date ?? '' }}</td>
                                <td>
                                    <a class="" href="{{ route('pi-selection.edit', $item->uid) }}">
                                        <button class="custom-edit-btn">
                                            <img src="{{ asset('assets/icons/edit-white.svg')}}" alt="">
                                        </button>
                                    </a>
                                    <form action="{{ route('pi-selection.destroy', $item->uid) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="custom-delete-btn">
                                            <i class="fa fa-trash text-light"></i>
                                        </button>
                                    </form>
                                    <a target="_blank" href="{{ route('pi-selection-pdf', [$item->session, $item->subject_uid]) }}">
                                        <img src="{{ asset('assets/icons/pdf.png') }}" style="width: 22px; height: 25px;" alt="">
                                    </a>
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
        var table = $('#pi_selection_table').DataTable({
            columnDefs: [{ visible: false, targets: groupColumn }],
            order: [[groupColumn, 'asc']],
            displayLength: 25,
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
        $('#pi_selection_table tbody').on('click', 'tr.group', function () {
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
