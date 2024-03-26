@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- <h2 class="my-3 custom-class-title">(PI)</h2> --}}
                <div class="shadow-sm p-2 rounded my-2 custom-card">
                    <div class="">

                        <form method="POST" action="{{ route('competence.store.pi',['id'=> $competenceId]) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="competence_uid" value="{{$competenceId ?? 0}}"/>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <span class="text-success fw-bold">(PI) যুক্ত করুন</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="additional-rows">
                                        <!-- Additional rows will be dynamically added here -->
                                        <div class="row new_pi" id="new_pi">
                                            {{-- <div class="col-md-6">
                                                <div class="mb-3 input-container">
                                                    <label for="pi_id" class="form-label">পারদর্শিতা সূচক (PI) আইডি </label>
                                                    <input type="number" class="custom-input-form" aria-describedby="pi_id"
                                                        name="pi[1][data][id]">
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="pi_no" class="form-label">পারদর্শিতা সূচক (PI) নং </label>
                                                    <input type="text" class="form-control" aria-describedby="pi_no"
                                                        name="pi[1][data][pi_no]">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3 input-container">
                                                    <label for="pi_name_en" class="form-label">পারদর্শিতা সূচক (PI) এর নাম (ইংরেজি)</label>
                                                    <input type="text" class="custom-input-form"
                                                        aria-describedby="pi_name_en" name="pi[1][data][name_en]">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 input-container">
                                                    <label for="pi_name_bn" class="form-label">পারদর্শিতা সূচক (PI) এর নাম (বাংলা)</label>
                                                    <input type="text" class="custom-input-form"
                                                        aria-describedby="pi_name_bn" name="pi[1][data][name_bn]">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 input-container">
                                                    <label for="description" class="form-label">পারদর্শিতা সূচক (PI) নির্দেশিকা</label>
                                                    <textarea class="custom-input-form" id="description" aria-describedby="description" name="pi[1][data][description]"></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div>
                                                <h6 class="text-primary mb-3">পারদর্শিতা সূচক (PI) এর বৈশিষ্ট্য যুক্ত করুন</h6>
                                            </div>
                                            @foreach ($weights as $weight)
                                                <div class="card mt-2">
                                                    <div class="card-header">
                                                        <span class="text-info">{{ $weight->name }}</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="additional-rows">
                                                            <div class="row guide" id="guide">
                                                                {{-- <input type="hidden" value="{{ @$weight->uid }}" class="form-control" aria-describedby="weight_uid" name="pi[1][data][attribute][{{ @$weight->uid }}][weight_uid]"> --}}
                                                                <div class="col-md-6">
                                                                    <div class="mb-3 input-container">
                                                                        <label for="attribute_title_en"
                                                                            class="form-label">বৈশিষ্ট্যর নাম (ইংরেজি)</label>
                                                                        <textarea class="custom-input-form" id="attribute_title_en" aria-describedby="attribute_title_en"
                                                                            name="pi[1][data][attribute][{{ @$weight->uid }}][attribute_title_en]"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="mb-3 input-container">
                                                                        <label for="attribute_title_bn"
                                                                            class="form-label">বৈশিষ্ট্যর নাম (বাংলা)</label>
                                                                        <textarea class="custom-input-form" id="attribute_title_bn" aria-describedby="attribute_title_bn"
                                                                            name="pi[1][data][attribute][{{ @$weight->uid }}][attribute_title_bn]"></textarea>
                                                                    </div>
                                                                </div>

                                                                {{-- <div class="col-md-6">
                                                                    <div class="mb-3 input-container">
                                                                        <label for="attribute_description"
                                                                            class="form-label">বৈশিষ্ট্যর বিবরণ</label>
                                                                        <textarea class="custom-input-form" id="attribute_description" aria-describedby="attribute_description"
                                                                            name="pi[1][data][attribute][{{ @$weight->uid }}][attribute_details]"></textarea>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            {{-- <div class="col-md-12">
                                                <button type="button" class="btn btn-danger my-3"
                                                    onclick="removeRow(this)">সারি সরান</button>
                                            </div> --}}
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- <div class="col-md-12">
                                <div class="d-flex justify-content-end my-3">
                                    <button type="button" id="add-row-btn" class="btn btn-success"
                                        onclick="addRow()">সারি যোগ করুন</button>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4"><button type="submit" class="custom-button ms-3 mt-2 mb-3">জমা দিন <img src="{{asset('frontend/noipunno/images/icons/arrow-right.svg')}}" alt="logo"> </button></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('class_uid').addEventListener('change', function() {
            var classId = this.value;
            var subjectOptions = document.querySelectorAll('.subject-option');

            // Hide all subject options
            subjectOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show subject options that belong to the selected class
            var classSubjectOptions = document.querySelectorAll('.subject-option.class-' + classId);
            classSubjectOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });

        document.getElementById('subject_uid').addEventListener('change', function() {
            var subjectId = this.value;
            var chapterOptions = document.querySelectorAll('.chapter-option');

            // Hide all subject options
            chapterOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show subject options that belong to the selected class
            var subjectChapterOptions = document.querySelectorAll('.chapter-option.subject-' +
                subjectId);
            subjectChapterOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });
    });

    var counter = 2;

    function addRow() {
        var additionalRows = document.getElementById('additional-rows');
        var newPi = document.getElementById('new_pi');

        // Clone the new_pi div
        var newRow = newPi.cloneNode(true);

        // Clear the input fields
        var inputs = newRow.getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
            let input_name = inputs[i].name.split("[data]");
            inputs[i].name = `pi[${counter}][data]${input_name[1]}`
            // console.log(input_name);
            inputs[i].value = '';
        }

        // Clear the textareas
        var textareas = newRow.getElementsByTagName('textarea');
        for (var i = 0; i < textareas.length; i++) {
            let textarea_name = textareas[i].name.split("[data]");
            textareas[i].name = `pi[${counter}][data]${textarea_name[1]}`

            textareas[i].value = '';
        }

        counter++;
        // Append the cloned div to additional-rows
        additionalRows.appendChild(newRow);
    }

    function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>
