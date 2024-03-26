@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('competence.create') }}">
                <i class="fa fa-plus text-white"></i> একক যোগ্যতা যুক্ত করুন
            </a>
            <a class="btn btn-color" href="{{ route('competence.copy') }}">
                কপি করুন
            </a>
            <a class="btn btn-color" href="{{ route('pi.pdf') }}">
                PDF ডাউনলোড করুন
            </a>
            <a class="btn btn-color" href="{{ route('competence.pdf') }}">
                পরিশিষ্ট ডাউনলোড করুন
            </a>
        </div>
    </div>

    <div class="">
        <h4 class="my-3 custom-class-title">একক যোগ্যতা তালিকা</h4>

        <div class="">
            <div class="table-responsive table-container shadow p-2">
                <table id="competence_table" class="custom-table myTable">
                    <thead>
                        <tr>
                            <th>
                                শ্রেণী
                            </th>
                            <th>
                                বিষয়
                            </th>
                            <th>
                                একক যোগ্যতা আইডি
                            </th>
                            <th>
                                একক যোগ্যতা
                            </th>

                            <th>
                                সেশন
                            </th>
                            <th>
                                (PI) যুক্ত করুন
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
                                <td>
                                    {{ $competence->session ?? '' }}
                                </td>
                                <td>
                                    <a class="" href="{{ route('competence.lists.pi', $competence->uid) }}" title="PI Lists">
                                        <button class="custom-edit-btn">
                                            <i class="fa fa-plus text-white"></i>
                                            {{-- <img src="{{ asset('assets/icons/edit-white.svg')}}" alt=""> --}}
                                        </button>
                                    </a>

                                </td>
                                <td>
                                    <a class="" href="{{ route('competence.edit', $competence->uid) }}" title="Add Competence">
                                        <button class="custom-edit-btn ">
                                            <img src="{{ asset('assets/icons/edit-white.svg')}}" alt="">
                                        </button>
                                    </a>
                                    <form action="{{ route('competence.destroy', $competence->uid) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="custom-delete-btn mt-1">
                                            <i class="fa fa-trash text-light"></i>
                                        </button>
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
