@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('class.create') }}">
                {{-- {{ trans('global.add') }} {{ trans('cruds.piClass.title_singular') }} --}}
                + ক্লাস যুক্ত করুন
            </a>
        </div>
    </div>

<div class="">

    {{-- <h4> {{ trans('cruds.piClass.title_singular') }} {{ trans('global.list') }}</h4> --}}
    <h5 class="my-3 custom-class-title">ক্লাস তালিকা</h5>

    <div class="">
        <div class="table-responsive table-container shadow p-2">
            <table id="class_table" class="custom-table myTable">
                <thead>
                    <tr>
                        <th>
                            {{-- {{ trans('cruds.piClass.fields.id') }} --}}
                            ID
                        </th>
                        <th>
                            {{-- {{ trans('cruds.piClass.fields.name_en') }} --}}
                            ক্লাসের নাম (EN)
                        </th>
                        <th>
                            {{-- {{ trans('cruds.piClass.fields.name_bn') }} --}}
                            ক্লাসের নাম (BN)
                        </th>
                        <th>
                            {{-- {{ trans('cruds.piClass.fields.name_bn') }} --}}
                            শ্রেণী কোড
                        </th>
                         <!-- <th>
                            {{ trans('cruds.piClass.fields.version') }}
                        </th>  -->
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($classes as $key => $piClass)
                        <tr data-entry-id="{{ $piClass->uid }}">
                            <td>
                                {{ $piClass->class_id ?? '' }}
                            </td>
                            <td>
                                {{ $piClass->name_en ?? '' }}
                            </td>
                            <td>
                                {{ $piClass->name_bn ?? '' }}
                            </td>
                            <td>
                                {{ $piClass->class_code ?? '' }}
                            </td>
                            <!-- <td>
                                {{ $piClass->version ?? '' }}
                            </td>   -->
                            <td>
                                <a class="" href="{{ route('class.edit', $piClass->uid) }}">
                                    <button class="custom-edit-btn">
                                        {{-- <img src="https://master.project-ca.com/frontend/noipunno/images/icons/edit-white.svg" alt=""> --}}
                                        <img src="{{ asset('assets/icons/edit-white.svg')}}" alt="">
                                    </button>
                                </a>
                                {{-- <form action="{{ route('class.destroy', $piClass->uid) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="custom-delete-btn">
                                        <i class="fa fa-trash text-light"></i>
                                    </button>
                                </form> --}}
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

