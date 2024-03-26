@extends('layouts.app')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-color" href="{{ route('subject.create') }}">
              + বিষয় যুক্ত করুন
            </a>
        </div>
    </div>

    

    <div class="row">
        <h4 class="my-3 custom-class-title"> বিষয়ের তালিকা </h4>
    @php
        $classLevels = [6, 7, 8, 9, 10];
    @endphp

    @foreach ($classLevels as $classLevel)
        <div class="col-md-3 col-sm-6 col-xxl-3 card-hover">
            <a href="{{ route('class.subjects', ['class' => $classLevel]) }}" class="">
                <div class="subject-container">
                    <div class="icon">
                        <img src="./assets/images/dashboard/book.png" alt="subject">
                    </div>
                    @php 
                        $number ='';
                        if ($classLevel == 6) {
                        $number = 'ষষ্ঠ';
                        }elseif ($classLevel == 7) {
                            $number = 'সপ্তম';
                        }elseif ($classLevel == 8) {
                            $number = 'অষ্টম';
                        }elseif ($classLevel == 9) {
                            $number = 'নবম';
                        }else {
                            $number = 'দশম';
                        }    
                    @endphp
                    <h2 class="mt-3">{{$number}} শ্রেণি বিষয়</h2>
                </div>
            </a>
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

