@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="p-2">Bi to Bi Relation</h2>
            <div class="shadow-sm p-2 rounded my-2 custom-card">
                <div class="">
                    <form method="POST" action="{{ route("bi-similarity.update", @$biSimilarList->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="competence_id" class="form-label">Class</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="competence_id" id="competence_id">
                                        <option value="">Select Competence</option>
                                        @foreach($competences as $competence)
                                        <option value="{{$competence->uid}}">{{app()->getLocale() == 'en' ? $competence->name_en :  $competence->name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="bi_id" class="form-label">BI</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="bi_id" id="bi_id">
                                        <option value="">Select BI</option>
                                        @foreach($bis as $bi)
                                        <option value="{{$bi->id}}" class="bi-option class-{{$bi->competence_uid}}" @if($biSimilarList->bi_id == $bi->id) selected @endif>{{app()->getLocale() == 'en' ? $bi->name_en :  $bi->name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <hr><h1 class="d-flex justify-content-center mb-3">Is Similar To Bi</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="similar_competence_id" class="form-label">Class</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="similar_competence_id" id="similar_competence_id">
                                        <option value="">Select Competence</option>
                                        @foreach($competences as $competence)
                                        <option value="{{$competence->uid}}">{{app()->getLocale() == 'en' ? $competence->name_en :  $competence->name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="similar_bi_id" class="form-label">BI</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="similar_bi_id" id="similar_bi_id">
                                        <option value="">Select BI</option>
                                        @foreach($bis as $bi)
                                        <option value="{{$bi->id}}" class="similar-bi-option class-{{$bi->competence_uid}}" @if($biSimilarList->similar_bi_id == $bi->id) selected @endif>{{app()->getLocale() == 'en' ? $bi->name_en :  $bi->name_bn}}</option>
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
        document.getElementById('competence_id').addEventListener('change', function() {
            var competenceId = this.value;
            var piOptions = document.querySelectorAll('.bi-option');

            // Hide all subject options
            piOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show subject options that belong to the selected class
            var piOptions = document.querySelectorAll('.bi-option.class-' + competenceId);
            piOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });

        document.getElementById('similar_competence_id').addEventListener('change', function() {
            var similarCompetenceId = this.value;
            var similarBiOptions = document.querySelectorAll('.similar-bi-option');

            // Hide all subject options
            similarBiOptions.forEach(function(option) {
                option.style.display = 'none';
            });

            // Show subject options that belong to the selected class
            var similarBiOptions = document.querySelectorAll('.similar-bi-option.class-' + similarCompetenceId);
            similarBiOptions.forEach(function(option) {
                option.style.display = 'block';
            });
        });
    });

</script>

