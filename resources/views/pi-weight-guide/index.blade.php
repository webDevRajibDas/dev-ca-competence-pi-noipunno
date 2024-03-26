@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('pi-weight.create') }}">
                {{ trans('global.add') }} PI Weight
            </a>
            {{-- <a class="btn btn-color" href="{{ route('competence.viewall') }}">
                {{ trans('global.all') }} Competence View
            </a> --}}
        </div>
    </div>
    
<div class="card">
    <div class="card-header">
    PI Weights {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PiClass">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.competence.fields.competence') }}
                        </th>
                        <th>
                        PI
                        </th>
                        <th>
                            weight Guide
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($piWeights as $key => $piWeight)
                        <tr data-entry-id="{{ $piWeight->uid }}">
                            <td>
                                {{ $piWeight->competence->name_bn ?? $piWeight->competence->name_en }}
                            </td>
                            <td>
                                {{ $piWeight->pi->name_bn ?? $piWeight->pi->name_en }}
                            </td>
                            <td>
                                {{ $piWeight->guide_bn ?? $piWeight->guide_en }}
                            </td>
                            <td>
                                {{ $piWeight->description ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('pi-weight.edit', $piWeight->uid) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                {{-- <a class="btn btn-xs btn-success" href="{{ route('pi-weight.view', $piWeight->uid) }}">
                                    {{ trans('global.view') }}
                                </a> --}}
                                <form action="{{ route('pi-weight.destroy', $piWeight->uid) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-end">
                {{ $piWeights->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>



@endsection
