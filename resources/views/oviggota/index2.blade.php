@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('oviggota.create') }}">
                {{ trans('global.add') }} Oviggota
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        Oviggota {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="oviggota_table" class="table table-bordered table-striped table-hover datatable datatable-PiClass">
                <thead>
                    <tr>
                        {{-- <th width="10">

                        </th> --}}
                        {{-- <th>
                            ID
                        </th> --}}
                        <th>
                            Class
                        </th>
                        <th>
                            Subject
                        </th>
                        <th width="10%">
                            Oviggota no
                        </th>
                        <th>
                            Oviggota Title
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($oviggotas as $key => $item)
                        <tr data-entry-id="{{ $item->uid }}">
                            <td>
                                {{ @$item->class->name_en ?? '' }}
                            </td>
                            <td>
                                {{ $item->subject->name ?? '' }}
                            </td>
                            <td>
                                {{ $item->oviggota_no ?? '' }}
                            </td>
                            <td>
                                {{ $item->oviggota_title ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('oviggota.edit', $item->uid) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action="{{ route('oviggota.destroy', $item->uid) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        var table = $('#oviggota_table').DataTable({
            columnDefs: [{ visible: false, targets: groupColumn }],
            order: [[groupColumn, 'asc']],
            displayLength: 25,
            fixedHeader: true,
            //columnDefs: [
            //    { width: 200, targets: 0 }
            //],
            //fixedColumns: true,
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
        $('#oviggota_table tbody').on('click', 'tr.group', function () {
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
