@extends('layouts.app')
@section('content')
    <div class="custom-card p-3 shadow-sm">
        <form method="GET" action="{{ route('bi.copy') }}" enctype="multipart/form-data">
            <div class="row mt-2 container">
                <div class="col-md-3">
                    <div class="mb-3">
                        {{-- <label for="competence_session" class="form-label">সেশন</label> --}}
                        <select class="form-select custom-input-form" aria-label="Default select example" name="session">
                            <option value="2023" @if (request()->session == '2023') {{ 'selected' }} @endif>2023
                            </option>
                            <option value="2024" @if (request()->session == '2024') {{ 'selected' }} @endif>2024
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="mb-3">
                        <select class="form-select custom-input-form" aria-label="Default select example" name="limit">
                            <option value="">BI পরিমান</option>
                            <option value="10" @if (request()->limit == '10') {{ 'selected' }} @endif>10
                            </option>
                            <option value="25" @if (request()->limit == '25') {{ 'selected' }} @endif>25
                            </option>
                            <option value="50" @if (request()->limit == '50') {{ 'selected' }} @endif>50
                            </option>
                            <option value="100" @if (request()->limit == '100') {{ 'selected' }} @endif>100
                            </option>
                            <option value="all" @if (request()->limit == 'all') {{ 'selected' }} @endif>সমস্ত
                                ডাটা</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="custom-button" type="submit">খুজুন</button>
                </div>
            </div>
        </form>
    </div>

    <div class="">
        <h4 class="mt-3 mb-3 custom-class-title">BI তালিকা</h4>
        @if ($errors->has('biArr'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $errors->first('biArr') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(request()->session != date('Y'))
        <a type="button" class="btn btn-color float-right" id="copyButton">
            কপি করুন
        </a>
        @endif

        <div class="">
            <div class="table-responsive table-container shadow p-2">
                <table id="chapter_table" class="custom-table myTable">
                    <thead>
                        <tr>
                            @if(request()->session != date('Y'))
                            <th>
                                <input type="checkbox" id="checkAll">
                                <label for="checkAll">সবগুলো চেক করুন</label><br>
                            </th>
                            @endif

                            <th>
                                সিরিয়াল নাম্বার
                            </th>
                            <th>
                                নাম
                            </th>
                        </tr>
                    </thead>

                    <form method="post" action="{{ route('bi.copyStore') }}" id="copyForm">
                        @csrf
                        <tbody>
                            <?php $i = 0;?>
                            @forelse ($bis as $key => $bi)
                            <?php $i++?>
                                <tr>
                                    @if(request()->session != date('Y'))
                                    <td>
                                        <input type="checkbox" class="checkItem" name="biArr[]" value={{ $bi->uid }}>
                                    </td>
                                    @endif
                                    <td>
                                        {{ $i }}
                                    </td>

                                    <td>
                                        {{ $bi->name_en ?? $bi->name_bn }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        @if (request()->session == date('Y'))
                                        <span>{{ request()->session }} এর কোন ডাটা পাওয়া যায়নি।</span>
                                        @else
                                        <span>ইতোমধ্যে {{ request()->session ?? date('Y')-1}} এর সমস্ত ডাটা কপি সম্পন্ন হয়ে গেছে।</span>
                                        @endif

                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </form>
                </table>
                @if (request()->limit !== 'all')
                    <div class="pagination justify-content-end">
                        {{ $bis->links('vendor.pagination.bootstrap-4') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#checkAll').click(function() {
            $(':checkbox.checkItem').prop('checked', this.checked);
        });
        $(document).on('click', '#copyButton', function() {
            $('#copyForm').submit();
        });
    </script>
@endsection
