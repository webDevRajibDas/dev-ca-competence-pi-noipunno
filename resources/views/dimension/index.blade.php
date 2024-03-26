@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('dimension.create') }}">
                + ডাইমেনশন যুক্ত করুন
            </a>
            <a class="btn btn-color" href="{{ route('dimension.copy') }}">
                কপি করুন
            </a>

            <a class="btn btn-color" href="{{ route('dimension-pdf') }}">
                ডাইমেনশন ডাউনলোড করুন
            </a>

        </div>
    </div>
    <div class="">

        <h4 class="mt-3 custom-class-title">ডাইমেনশন তালিকা </h4>

        <div class="">
            <div class="table-responsive table-container shadow p-2">
                <table id="dimension_table" class="custom-table myTable">
                    <thead>
                        <tr>
                            <!-- <th>ID</th>  -->
                            <th>শ্রেণী</th>
                            <th>বিষয়</th>
                            <th>ডাইমেনশন নং</th>
                            <th>ডাইমেনশন নাম</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dimensions as $key => $item)
                            <tr data-entry-id="{{ $item->uid }}">

                                <!-- <td>{{ $item->uid ?? '' }}</td> -->
                                <td>{{ @$item->class->name_en ?? '' }}</td>
                                <td>{{ $item->subject->name ?? '' }}</td>
                                <td>{{ $item->dimension_no ?? '' }}</td>
                                <td>{{ $item->dimension_title ?? '' }}</td>
                                <td>
                                    <a class="" href="{{ route('dimension.edit', $item->uid) }}">
                                        <button class="custom-edit-btn">
                                            <img src="{{ asset('assets/icons/edit-white.svg') }}" alt="">
                                        </button>
                                    </a>
                                    <form action="{{ route('dimension.destroy', $item->uid) }}" method="POST"
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


@section('scripts')
    <script>
        $(document).ready(function() {
            var groupColumn = 1;
            var table = $('#dimension_table').DataTable({
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
            $('#dimension_table tbody').on('click', 'tr.group', function() {
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
