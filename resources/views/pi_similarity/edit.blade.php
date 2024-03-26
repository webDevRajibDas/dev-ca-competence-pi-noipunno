@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="p-2">PI to PI সমতা</h2>
            <div class="shadow-sm p-2 rounded my-2 custom-card">
                <div class="">
                    <form method="POST" action="{{ route("pi-similarity.update", @ $piSimilarList->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="class_uid" class="form-label">শ্রেণী</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="class_uid" id="class_uid">
                                        <option value="">শ্রেণী নির্বাচন করুন</option>
                                        @foreach($classes as $class)
                                        <option value="{{$class->class_id}}">{{app()->getLocale() == 'en' ? $class->name_en :  $class->name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="subject_uid" class="form-label">বিষয়</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="subject_uid" id="subject_uid">
                                        <option value="">বিষয় নির্বাচন করুন</option>
                                        @foreach($subjects as $subject)
                                        <option class="subject-option class-{{$subject->class_uid}}" value="{{$subject->uid}}">{{ $subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="chapter_uid" class="form-label">অধ্যায়</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="chapter_uid" id="chapter_uid">
                                        <option value="">অধ্যায় নির্বাচন করুন</option>
                                        @foreach($chapters as $chapter)
                                        <option class="chapter-option subject-{{$chapter->subject_uid}}" value="{{$chapter->uid}}">{{ $chapter->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="competence_uid" class="form-label">পারদর্শিতা</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="competence_uid" id="competence_uid">
                                        <option value="">পারদর্শিতা নির্বাচন করুন</option>
                                        @foreach($competences as $competence)
                                        <option class="competence-option chapter-{{$competence->chapter_uid}}" value="{{$competence->uid}}">{{ $competence->name_bn ?? $competence->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="pi_uid" class="form-label">Pis</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="pi_id" id="pi_uid">
                                        <option value="">PI নির্বাচন করুন</option>
                                        @foreach($pis as $pi)
                                        <option class="pi-option competence-{{$pi->competence_uid}}" value="{{$pi->uid}}" @if($piSimilarList->pi_id == $pi->id) selected @endif>{{ $pi->name_bn ?? $pi->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <hr><h1 class="d-flex justify-content-center mb-3">Is Similar To Pi</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="class_uid" class="form-label">শ্রেণী</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="class_uid" id="sclass_uid">
                                        <option value="">শ্রেণী নির্বাচন করুন</option>
                                        @foreach($classes as $class)
                                        <option value="{{$class->class_id}}">{{app()->getLocale() == 'en' ? $class->name_en :  $class->name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="subject_uid" class="form-label">বিষয়</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="subject_uid" id="ssubject_uid">
                                        <option value="">বিষয় নির্বাচন করুন</option>
                                        @foreach($subjects as $subject)
                                        <option class="ssubject-option class-{{$subject->class_uid}}" value="{{$subject->uid}}">{{ $subject->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="chapter_uid" class="form-label">অধ্যায়</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="chapter_uid" id="schapter_uid">
                                        <option value="">অধ্যায় নির্বাচন করুন</option>
                                        @foreach($chapters as $chapter)
                                        <option class="schapter-option subject-{{$chapter->subject_uid}}" value="{{$chapter->uid}}">{{ $chapter->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="competence_uid" class="form-label">পারদর্শিতা</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="competence_uid" id="scompetence_uid">
                                        <option value="">পারদর্শিতা নির্বাচন করুন</option>
                                        @foreach($competences as $competence)
                                        <option class="scompetence-option chapter-{{$competence->chapter_uid}}" value="{{$competence->uid}}">{{ $competence->name_bn ?? $competence->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="pi_uid" class="form-label">Pis</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="similar_pi_id" id="spi_uid">
                                        <option value="">PI নির্বাচন করুন</option>
                                        @foreach($pis as $pi)
                                        <option class="spi-option competence-{{$pi->competence_uid}}" value="{{$pi->uid}}" @if($piSimilarList->similar_pi_id == $pi->id) selected @endif>{{ $pi->name_bn ?? $pi->name_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

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

        document.getElementById('sclass_uid').addEventListener('change', function() {
            var classId = this.value;
            var subjectOptions = document.querySelectorAll('.ssubject-option');

            // Hide all subject options
            subjectOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show subject options that belong to the selected class
            var classSubjectOptions = document.querySelectorAll('.ssubject-option.class-' + classId);
            classSubjectOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });

        document.getElementById('ssubject_uid').addEventListener('change', function() {
            var subjectId = this.value;
            var chapterOptions = document.querySelectorAll('.schapter-option');

            // Hide all subject options
            chapterOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show subject options that belong to the selected class
            var subjectChapterOptions = document.querySelectorAll('.schapter-option.subject-' + subjectId);
            subjectChapterOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });

        document.getElementById('schapter_uid').addEventListener('change', function() {
            var chapterId = this.value;
            var competenceOptions = document.querySelectorAll('.scompetence-option');

            // Hide all competence options
            competenceOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show competence options that belong to the selected chapter
            var chapterCompetenceOptions = document.querySelectorAll('.scompetence-option.chapter-' + chapterId);
            chapterCompetenceOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });

        document.getElementById('scompetence_uid').addEventListener('change', function() {
            var competenceId = this.value;
            var piOptions = document.querySelectorAll('.spi-option');

            // Hide all pi options
            piOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show pi options that belong to the selected competence
            var competencePiOptions = document.querySelectorAll('.spi-option.competence-' + competenceId);
            competencePiOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });

        document.getElementById('similar_competence_id').addEventListener('change', function() {
            var similarCompetenceId = this.value;
            var similarPiOptions = document.querySelectorAll('.similar-pi-option');

            // Hide all subject options
            similarPiOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show subject options that belong to the selected class
            var similarPiOptions = document.querySelectorAll('.similar-pi-option.class-' + similarCompetenceId);
            similarPiOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });
    });

</script>

