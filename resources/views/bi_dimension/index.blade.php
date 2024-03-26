@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('bi-dimension.create') }}">
                + BI ডাইমেনশন যুক্ত করুন
            </a>

            <a class="btn btn-color" href="{{ route('bi-dimension.copy') }}">
                কপি করুন
            </a>

            <a class="btn btn-color" target="_blank" href="{{ route('bi-dimension-pdf-download') }}">
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

                            <th>ডাইমেনশন নং</th>
                            <th>ডাইমেনশন নাম</th>
                            <th>ডাইমেনশন বিস্তারিত</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dimensions as $key => $item)
                            <tr data-entry-id="{{ $item->uid }}">

                                <!-- <td>{{ $item->uid ?? '' }}</td> -->

                                <td>{{ $item->dimension_no ?? '' }}</td>
                                <td>{{ $item->dimension_title ?? '' }}</td>
                                <td>{{ $item->dimension_details ?? '' }}</td>
                                <td>
                                    <a class="" href="{{ route('bi-dimension.edit', $item->uid) }}">
                                        <button class="custom-edit-btn">
                                            <img src="{{ asset('assets/icons/edit-white.svg') }}" alt="">
                                        </button>
                                    </a>
                                    <form action="{{ route('bi-dimension.destroy', $item->uid) }}" method="POST"
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
@endsection
