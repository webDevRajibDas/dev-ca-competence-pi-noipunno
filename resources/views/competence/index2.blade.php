@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('competence.create') }}">
                {{ trans('global.add') }} Competence
            </a>
            <a class="btn btn-success" href="{{ route('competence.viewall') }}">
                {{ trans('global.all') }} Competence View
            </a>
            <a class="btn btn-success" href="{{ route('pi.pdf') }}">
                Download PDF
            </a>
            <a class="btn btn-success" href="{{ route('competence.pdf') }}">
                Download Porisisto
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        Competence {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="competence_table" class="table table-bordered table-striped table-hover datatable datatable-PiClass">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.competence.fields.class') }}
                        </th>
                        <th>
                            {{ trans('cruds.competence.fields.subject') }}
                        </th>
                        <th>
                            Competence ID
                        </th>
                        <th>
                            {{ trans('cruds.competence.fields.competence') }}
                        </th>
                        {{-- <th>
                            Name
                        </th> --}}
                        {{-- <th>
                            {{ trans('cruds.competence.fields.details') }}
                        </th> --}}
                        <th>
                            {{ trans('cruds.competence.fields.session') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($competences as $key => $competence)
                        <tr data-entry-id="{{ $competence->uid }}">
                            <td>
                                {{ $competence->class->name_bn ?? @$competence->class->name_en }}
                            </td>
                            <td>
                                {{ $competence->subject->name ?? '' }}
                            </td>
                            <td>
                                {{ $competence->competence_id ?? '' }}
                            </td>
                            <td>
                                {{ $competence->name_bn ?? @$competence->name_en }}
                            </td>
                            {{-- <td>
                                {{ $competence->details_bn ?? @$competence->details_en }}
                            </td> --}}
                            {{-- <td>
                                {{ $competence->details ?? '' }}
                            </td> --}}
                            <td>
                                {{ $competence->session ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('competence.edit', $competence->uid) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <a class="btn btn-xs btn-success" href="{{ route('competence.view', $competence->uid) }}">
                                    {{ trans('global.view') }}
                                </a>
                                <form action="{{ route('competence.destroy', $competence->uid) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="pagination justify-content-end">
                {{ $competences->links('vendor.pagination.bootstrap-4') }}
            </div> --}}
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        var groupColumn = 1;
        var table = $('#competence_table').DataTable({
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
        $('#competence_table tbody').on('click', 'tr.group', function () {
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
