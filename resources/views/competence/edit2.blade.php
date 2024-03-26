@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h2>Competence</h2>
                        <form method="POST" action="{{ route('competence.update', @$competence->uid) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="class_uid" class="form-label">Class</label>
                                        <select class="form-select" aria-label="Default select example" name="class_uid"
                                            id="class_uid">
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->class_id }}"
                                                    @if ($competence->class_uid == $class->class_id) selected @endif>
                                                    {{ app()->getLocale() == 'en' ? $class->name_en : $class->name_bn }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subject_uid" class="form-label">Subject</label>
                                        <select class="form-select" aria-label="Default select example" name="subject_uid"
                                            id="subject_uid">
                                            <option value="">Select Subject</option>
                                            @foreach ($subjects as $subject)
                                                <option class="subject-option class-{{ $subject->class_uid }}"
                                                    value="{{ $subject->uid }}"
                                                    @if ($competence->subject_uid == $subject->uid) selected @endif>{{ $subject->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="competence_session" class="form-label">Competence Session</label>
                                        <select class="form-select" aria-label="Default select example" name="session">
                                            <option value="2023" @if ($competence->session == '2023') selected @endif>2023
                                            </option>
                                            <option value="2024" @if ($competence->session == '2024') selected @endif>2025
                                            </option>
                                            <option value="2025" @if ($competence->session == '2025') selected @endif>2025
                                            </option>
                                            <option value="2026" @if ($competence->session == '2026') selected @endif>2026
                                            </option>
                                            <option value="2027" @if ($competence->session == '2027') selected @endif>2027
                                            </option>
                                            <option value="2028" @if ($competence->session == '2028') selected @endif>2028
                                            </option>
                                            <option value="2029" @if ($competence->session == '2029') selected @endif>2029
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="chapter_uid" class="form-label">Chapter</label>
                                    <select class="form-select" aria-label="Default select example" name="chapter_uid" id="chapter_uid">
                                        <option value="">Select Chapter</option>
                                        @foreach ($chapters as $chapter)
                                        <option class="chapter-option subject-{{$chapter->subject_uid}}" value="{{$chapter->uid}}"
                                           @if ($chapter->uid == $competence->chapter_uid) selected @endif >{{ $chapter->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="competence_id" class="form-label">Competence ID</label>
                                        <input type="number" value="{{ @$competence->competence_id }}" class="form-control"
                                            aria-describedby="competence_id" name="competence_id">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name_bn" class="form-label">Competence Name In Bangla</label>
                                        <input type="text" value="{{ @$competence->name_bn }}" class="form-control"
                                            aria-describedby="name_bn" name="name_bn">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name_en" class="form-label">Competence Name In
                                            English</label>
                                        <input type="text" value="{{ @$competence->name_en }}" class="form-control"
                                            aria-describedby="name_en" name="name_en">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="details" class="form-label">Competence Details (In
                                            Bangla)</label>
                                        <textarea class="form-control" id="details" aria-describedby="description" name="details_bn">{{ @$competence->details_bn }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="details" class="form-label">Competence Details (In
                                            English)</label>
                                        <textarea class="form-control" id="details" aria-describedby="description" name="details_en">{{ @$competence->details_en }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <input type="date" value="{{ @$competence->start_date }}" class="form-control"
                                            aria-describedby="start_date" name="start_date">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="end_date" class="form-label">End Date</label>
                                        <input type="date" value="{{ @$competence->end_date }}" class="form-control"
                                            aria-describedby="end_date" name="end_date">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" aria-label="Default select example" name="status">
                                            <option value="Draft" @if ($competence->status == 'Draft') selected @endif>Draft
                                            </option>
                                            <option value="Publish" @if ($competence->status == 'Publish') selected @endif>
                                                Publish</option>
                                            <option value="Reject" @if ($competence->status == 'Reject') selected @endif>
                                                Reject</option>
                                            <option value="Approve" @if ($competence->status == 'Approve') selected @endif>
                                                Approve</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <span class="text-success fw-bold">ADD PI</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="additional-rows">
                                            @foreach ($competence->pis as $key => $pi)
                                                <div>
                                                    <h5 class="text-danger mb-3">PI No: {{ $loop->iteration }}</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input class="form-control" aria-describedby="piuid"
                                                            name="pi[{{ $key }}][piuid]"
                                                            value="{{ $pi->uid }}" hidden>
                                                        <div class="mb-3">
                                                            <label for="pi_id" class="form-label">PI Id</label>
                                                            <input type="number" class="form-control"
                                                                aria-describedby="pi_id"
                                                                name="pi[{{ $key }}][pi_id]"
                                                                value="{{ $pi->pi_id }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="pi_no" class="form-label">PI No</label>
                                                            <input type="text" class="form-control" aria-describedby="pi_no"
                                                                name="pi[{{ $key }}][pi_no]" value="{{ $pi->pi_no }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="pi_name_en" class="form-label">PI Name In
                                                                English</label>
                                                            <input type="text" class="form-control"
                                                                aria-describedby="pi_name_en"
                                                                name="pi[{{ $key }}][pi_name_en]"
                                                                value="{{ $pi->name_en }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="pi_name_bn" class="form-label">PI Name In
                                                                Bangla</label>
                                                            <input type="text" class="form-control"
                                                                aria-describedby="pi_name_bn"
                                                                name="pi[{{ $key }}][pi_name_bn]"
                                                                value="{{ $pi->name_bn }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="description"
                                                                class="form-label">Description</label>
                                                            <textarea class="form-control" id="description" aria-describedby="description"
                                                                name="pi[{{ $key }}][description]">{{ $pi->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div>
                                                        <h6 class="text-primary mb-3">Add Pi Attribute</h6>
                                                    </div>

                                                    @foreach ($weights as $weight)
                                                        @php
                                                            $attribute = \App\Models\PiCompetence\PiAttribute::where('pi_uid', $pi->uid)
                                                                ->where('weight_uid', $weight->uid)
                                                                ->first();
                                                        @endphp
                                                        <div class="card mt-2">
                                                            <div class="card-header">
                                                                <span class="text-info">{{ @$weight->name }}</span>
                                                            </div>
                                                            <div class="card-body">
                                                                <div id="additional-rows">
                                                                    <div class="row guide" id="guide">
                                                                        {{-- <input type="hidden" value="{{ $pi->uid }}" class="form-control" aria-describedby="pi_uid" name="pi[{{$key}}][attribute][{{ @$pi->uid }}][weight_uid]"> --}}
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="attribute_title_en"
                                                                                    class="form-label">Attribute Title
                                                                                    En</label>
                                                                                <textarea class="form-control" id="attribute_title_en" aria-describedby="attribute_title_en"
                                                                                    name="pi[{{ $key }}][attribute][{{ @$weight->uid }}][attribute_title_en]">{{ @$attribute->title_en }}</textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="attribute_title_bn"
                                                                                    class="form-label">Attribute Title
                                                                                    Bn</label>
                                                                                <textarea class="form-control" id="attribute_title_bn" aria-describedby="attribute_title_bn"
                                                                                    name="pi[{{ $key }}][attribute][{{ @$weight->uid }}][attribute_title_bn]">{{ @$attribute->title_bn }}</textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label for="attribute_description"
                                                                                    class="form-label">Attribute
                                                                                    Description</label>
                                                                                <textarea class="form-control" id="attribute_description" aria-describedby="attribute_description"
                                                                                    name="pi[{{ $key }}][attribute][{{ @$weight->uid }}][attribute_details]">{{ @$attribute->description }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
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
</script>
