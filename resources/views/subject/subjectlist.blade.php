@extends('layouts.app')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            @php 
             $number ='';
                if ($classValue == 6) {
                   $number = 'ষষ্ঠ';
                }elseif ($classValue == 7) {
                    $number = 'সপ্তম';
                }elseif ($classValue == 8) {
                    $number = 'অষ্টম';
                }elseif ($classValue == 9) {
                    $number = 'নবম';
                }else {
                    $number = 'দশম';
                }        
            @endphp
            <h4 class="my-3 custom-class-title">{{$number}} শ্রেণী বিষয়</h4>
        </div>
    </div>

    <div class="row">
        @foreach ($subjects as $subject)
        <div class="col-3">
            <div class="subjectlist-container">
                <div class="icon">
                    <img src="./assets/images/dashboard/book.png" alt="subject">
                </div>
            <div class="">
                <h2>{{$subject->name}}</h2>
                <p class="text-muted">বিষয় কোড : {{@$subject->subject_no}}</p>
            </div>
            </div>
        </div>
        @endforeach
    </div>
        
@endsection

@section('scripts')

<script>
    $(document).ready(function () {
       
    });
</script>

@endsection

