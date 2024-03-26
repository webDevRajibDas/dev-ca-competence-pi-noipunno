@extends('layouts.app')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('competence.add.pi',['id'=>$competenceId]) }}">
               + (PI) যুক্ত করুন
            </a>
        </div>
    </div>

    <div class="">
        {{-- <h4 class="my-3 custom-class-title">একক যোগ্যতা তালিকা</h4> --}}

        <div class="">
            <div class="table-responsive table-container shadow p-2">
                <table id="competence_table" class="custom-table myTable">
                    <thead>
                        <tr>
                            <th>
                                PI নাম্বার
                            </th>
                            <th>
                                PI নাম
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pis as $key => $pi)
                        <tr>
                            <td>
                                {{ $pi->pi_no ?? '' }}
                            </td>
                            <td>
                                {{ $pi->name_bn ?? $pi->name_en }}
                            </td>

                            <td>
                                <a class="" href="{{ route('competence.edit.pi', ['id'=>$competenceId,'pi_id'=> $pi->uid]) }}">
                                    <button class="custom-edit-btn">
                                        <img src="{{ asset('assets/icons/edit-white.svg')}}" alt="">
                                    </button>
                                </a>
                                <form action="{{ route('competence.delete.pi', ['id'=>$competenceId,'pi_id'=> $pi->uid]) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <input type="hidden" name="competence_id" value="{{$competenceId}}">
                                    <input type="hidden" name="pi_id" value="{{ $pi->uid }}">
                                    <button type="submit" class="custom-delete-btn mt-1">
                                        <i class="fa fa-trash text-light"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">No data found</td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>
                <div class="pagination justify-content-end">
                    {{ $pis->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')

@endsection
