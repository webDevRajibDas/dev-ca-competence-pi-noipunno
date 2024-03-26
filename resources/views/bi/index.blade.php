@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('bi.create') }}">
                + BI যুক্ত করুন
            </a>
            <a class="btn btn-color" href="{{ route('bi.copy') }}">
                কপি করুন
            </a>
            <a class="btn btn-color" href="{{ route('bi.pdf.download') }}">
                ডাউনলোড BI
            </a>
        </div>
    </div>
<div class="">

    <h4 class="mt-3 custom-class-title">BI তালিকা</h4>

        <div class="">
            <div class="table-responsive table-container shadow p-2">
                <table id="bi_table" class="custom-table myTable">
                    <thead>
                        <tr>

                            <th>
                                নাম
                            </th>
                            <th>
                                {{-- {{ trans('cruds.piWeight.fields.description') }} --}}
                                বিবরণ
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bis as $key => $bi)
                            <tr data-entry-id="{{ $bi->uid }}">

                                <!-- <td>
                                    {{ $bi->bi_id ?? '' }}
                                </td> -->
                                {{-- <td>
                                    {{ @$bi->class->name_bn ?? @$bi->class->name_en }}
                                </td>
                                <td>
                                    {{ @$bi->subject->name ?? '' }}
                                </td> --}}
                                <td>
                                    {{ $bi->name_en ?? $bi->name_bn }}
                                </td>
                                <td>
                                    {{ $bi->description ?? '' }}
                                </td>
                                <td>
                                    <a class="" href="{{ route('bi.edit', $bi->uid) }}">
                                        <button class="custom-edit-btn">
                                            <img src="{{ asset('assets/icons/edit-white.svg')}}" alt="">
                                        </button>
                                    </a>
                                    <form action="{{ route('bi.destroy', $bi->uid) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection

