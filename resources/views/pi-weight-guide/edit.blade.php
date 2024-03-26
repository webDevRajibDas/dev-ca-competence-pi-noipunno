@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="p-2">PI Weight</h2>
            <div class="shadow-sm p-2 rounded my-2 custom-card">
                <div class="">
                    <form method="POST" action="{{ route("pi-weight.update", @$piWeight->uid) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="class_uid" class="form-label">Class</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="class_uid" id="class_uid">
                                        <option value="">Select Class</option>
                                        @foreach($classes as $class)
                                        <option value="{{$class->class_id}}">{{app()->getLocale() == 'en' ? $class->name_en :  $class->name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="subject_uid" class="form-label">Subject</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="subject_uid" id="subject_uid">
                                        <option value="">Select Subject</option>
                                        @foreach($subjects as $subject)
                                        <option class="subject-option class-{{$subject->class_uid}}" value="{{$subject->uid}}">{{ $subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="chapter_uid" class="form-label">Chapter</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="chapter_uid" id="chapter_uid">
                                        <option value="">Select Chapter</option>
                                        @foreach($chapters as $chapter)
                                        <option class="chapter-option subject-{{$chapter->subject_uid}}" value="{{$chapter->uid}}">{{ $chapter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="competence_uid" class="form-label">Competence</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="competence_uid" id="competence_uid">
                                        <option value="">Select Competence</option>
                                        @foreach($competences as $competence)
                                        <option class="competence-option chapter-{{$competence->chapter_uid}}" value="{{$competence->uid}}" @if($competence->uid == $piWeight->competence_uid) selected @endif>{{ $competence->name_bn ?? $competence->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="pi_uid" class="form-label">Pis</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="pi_uid" id="pi_uid">
                                        <option value="">Select PI</option>
                                        @foreach($pis as $pi)
                                        <option class="pi-option competence-{{$pi->competence_uid}}" value="{{$pi->uid}}" @if($pi->uid == $piWeight->pi_uid) selected @endif>{{ $pi->name_bn ?? $pi->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div>
                            <hr><h1 class="d-flex justify-content-center mb-3">Add Pi Guide</h1>
                        </div>
                        <div id="additional-rows">
                            <div class="row guide" id="guide">
                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="guide_en" class="form-label">Guide En</label>
                                        <textarea class="custom-input-form" id="guide_en" aria-describedby="guide_en" name="guide_en">{{ $piWeight->guide_en }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="guide_bn" class="form-label">Guide Bn</label>
                                        <textarea class="custom-input-form" id="guide_bn" aria-describedby="guide_bn" name="guide_bn">{{ $piWeight->guide_bn }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="custom-input-form" id="description" aria-describedby="description" name="description">{{ $piWeight->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach($piWeight->weights as $weight)
                        <div id="additional-rows">
                            <div>
                                <hr><h1 class="d-flex justify-content-center mb-3">{{$weight->weight->name}}</h1>
                            </div>
                            <div class="row guide" id="guide">
                                <input type="hidden" value="{{@$weight->uid}}" class="form-control" aria-describedby="wuid"
                                        name="wuid[]">
                                <input type="hidden" value="{{@$weight->weight_uid}}" class="form-control" aria-describedby="weight_uid"
                                        name="weight_uid[]">
                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="title_en" class="form-label">Title En</label>
                                        <textarea class="custom-input-form" id="title_en" aria-describedby="title_en" name="title_en[]">{{$weight->title_en}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="title_bn" class="form-label">Title Bn</label>
                                        <textarea class="custom-input-form" id="title_bn" aria-describedby="title_bn" name="title_bn[]">{{$weight->title_bn}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 input-container">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="custom-input-form" id="description" aria-describedby="description" name="details[]">{{$weight->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"><button type="submit" class="custom-button ms-3 mt-2 mb-3">জমা দিন <img src="https://teacher.project-ca.com/frontend/noipunno/images/icons/arrow-right.svg" alt="logo"> </button></div>
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
            var subjectChapterOptions = document.querySelectorAll('.chapter-option.subject-' + subjectId);
            subjectChapterOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });

        document.getElementById('chapter_uid').addEventListener('change', function() {
            var chapterId = this.value;
            var competenceOptions = document.querySelectorAll('.competence-option');

            // Hide all competence options
            competenceOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show competence options that belong to the selected chapter
            var chapterCompetenceOptions = document.querySelectorAll('.competence-option.chapter-' + chapterId);
            chapterCompetenceOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });

        document.getElementById('competence_uid').addEventListener('change', function() {
            var competenceId = this.value;
            var piOptions = document.querySelectorAll('.pi-option');

            // Hide all pi options
            piOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show pi options that belong to the selected competence
            var competencePiOptions = document.querySelectorAll('.pi-option.competence-' + competenceId);
            competencePiOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });

    });
 </script>
