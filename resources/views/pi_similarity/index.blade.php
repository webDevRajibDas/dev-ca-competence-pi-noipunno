@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('pi-similarity.create') }}">
              + পারদর্শিতা সূচক সমতা যুক্ত করুন
            </a>
            {{-- <a class="btn btn-success" href="{{ route('competence.viewall') }}">
                {{ trans('global.all') }} Competence View
            </a> --}}
        </div>
    </div>

<div class="">
    <h4 class="mt-3 custom-class-title">পারদর্শিতা সূচক সমতা তালিকা</h4>

    <div class="">
        <div class="table-responsive table-container shadow p-2">
            <table id="pi_similarity_table" class="custom-table myTable">
                <thead>
                    <tr>
             
                        <!-- <th>
                            {{ trans('cruds.competence.fields.id') }}
                        </th>  -->
                        <th>
                           PI
                        </th>
                        <th>
                            PI সমতা
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($piSimilarities as $key => $piSimilarity)
                        <tr data-entry-id="{{ $piSimilarity->id }}">
                            <!-- <td>
                                {{ $piSimilarity->id ?? '' }}
                            </td> -->
                            <td>
                                {{  $piSimilarity->p1_name_bn ?? $piSimilarity->p1_name_en }}
                            </td>
                            <td>
                                {{  $piSimilarity->p2_name_bn ?? $piSimilarity->p2_name_en }}
                            </td>
                            <td>
                                <a class="" href="{{ route('pi-similarity.edit', $piSimilarity->uid) }}">
                                    <button class="custom-edit-btn">
                                        <img src="https://teacher.project-ca.com/frontend/noipunno/images/icons/edit-white.svg" alt="">
                                    </button>
                                </a>
                                <form action="{{ route('pi-similarity.destroy', $piSimilarity->uid) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
        var groupColumn = 0;
        var table = $('#pi_similarity_table').DataTable({
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
        $('#pi_similarity_table tbody').on('click', 'tr.group', function () {
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
