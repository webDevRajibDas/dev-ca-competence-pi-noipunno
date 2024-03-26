@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('bi-similarity.create') }}">
                {{ trans('global.add') }} Bi Relation
            </a>
            {{-- <a class="btn btn-color" href="{{ route('competence.viewall') }}">
                {{ trans('global.all') }} Competence View
            </a> --}}
        </div>
    </div>

<div class="card">
    <div class="card-header">
        Competence {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive table-container shadow p-2">
            <table id="bi_similirity_table" class="custom-table myTable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.competence.fields.id') }}
                        </th>
                        <th>
                           BI
                        </th>
                        <th>
                            Similer BI
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($biSimilarities as $key => $biSimilarity)
                        <tr data-entry-id="{{ $biSimilarity->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $biSimilarity->id ?? '' }}
                            </td>
                            <td>
                                {{  app()->getLocale() == 'en' ? $biSimilarity->b1_name_en ?? '' : $biSimilarity->b1_name_bn ?? '' }}
                            </td>
                            <td>
                                {{  app()->getLocale() == 'en' ? $biSimilarity->b2_name_en ?? '' : $biSimilarity->b2_name_bn ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('bi-similarity.edit', $biSimilarity->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action="{{ route('bi-similarity.destroy', $biSimilarity->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
        var table = $('#bi_similirity_table').DataTable({
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
        $('#bi_similirity_table tbody').on('click', 'tr.group', function () {
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

