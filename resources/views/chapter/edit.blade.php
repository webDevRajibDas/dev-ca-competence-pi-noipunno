@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center rounded">
        <div class="col-md-12">
            <h2 class="p-2">অধ্যায়</h2>
            <div class="shadow-sm p-2 rounded my-2 custom-card">
                <div class="">
                    <form method="POST" action="{{ route("chapter.update", $chapter->uid) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="chapter_id" class="form-label">অধ্যায় ID</label>
                                    <input type="number" class="custom-input-form" aria-describedby="chapter_id"
                                        name="chapter_id" value="{{$chapter->chapter_id}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="name" class="form-label">শ্রেণীর নাম</label>
                                    <input type="text" class="custom-input-form" aria-describedby="name"
                                        name="name" value="{{$chapter->name}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="class_uid" class="form-label">শ্রেণী</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="class_uid" id="class_uid">
                                        <option value="">শ্রেণী নির্বাচন করুন</option>
                                        @foreach($classes as $class)
                                        <option value="{{$class->class_id}}" @if($chapter->class_uid == $class->class_id) selected @endif>{{app()->getLocale() == 'en' ? $class->name_en :  $class->name_bn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 input-container">
                                    <label for="subject_uid" class="form-label">বিষয়</label>
                                    <select class="form-select custom-input-form" aria-label="Default select example" name="subject_uid" id="subject_uid">
                                        <option value="">বিষয় নির্বাচন করুন</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="" id="add_file_extra_div">
                            @if (!empty($poriccheds))
                                @foreach ($poriccheds as $key => $item)
                                    <div class="row remove_file_extra_div" style="margin-top: 2px; margin-left: 0; margin-right:0;">
                                        <div class="col-11" style="border: 2px solid #0d6efd;padding: 20px;border-radius: 10px 0px 0px 10px;">
                                            <div class="row">
                                                <input type="hidden" value="{{ !empty($item->uid) ? $item->uid : '' }}" name="poricched_uid[{{ $key }}]">

                                                <div class="form-group col-sm-6">
                                                    <label>পরিচ্ছেদ নং</label>
                                                    <input type="text" class="custom-input-form @error('poricched_no') is-invalid @enderror" value="{{!empty($item->poricched_no) ? $item->poricched_no : old('poricched_no')}}" name="poricched_no[{{ $key }}]">
                                                    @error('poricched_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label>পরিচ্ছেদের নাম</label>
                                                    <input type="text" class="custom-input-form @error('poricched_title') is-invalid @enderror" value="{{!empty($item->poricched_title) ? $item->poricched_title : old('poricched_no')}}" name="poricched_title[{{$key}}]">
                                                    @error('poricched_title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #0d6efd;border-radius: 0px 10px 10px 0px;">

                                            <div class="form-group col-md-2">
                                                <i class="btn btn-success fa fa-plus-circle add_file_extra"></i>

                                                <i class="btn btn-danger fa fa-minus-circle remove_file_extra" style="display:{{ $key != 0 ? '' : 'none' }}"> </i>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @if (empty($poriccheds) || count($poriccheds) == 0)
                                <div class="row remove_file_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
                                    <div class="col-11" style="border: 2px solid #0d6efd;padding: 20px;border-radius: 10px 0px 0px 10px;">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>পরিচ্ছেদ নং</label>
                                                <input type="text" class="custom-input-form @error('poricched_no') is-invalid @enderror" value="" name="poricched_no[5000]">
                                                @error('poricched_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>পরিচ্ছেদের নাম</label>
                                                <input type="text" class="custom-input-form @error('poricched_title') is-invalid @enderror" value="" name="poricched_title[5000]">
                                                @error('poricched_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #0d6efd;border-radius: 0px 10px 10px 0px;">

                                        <div class="form-group col-md-2">
                                            <i class="btn btn-success fa fa-plus-circle add_file_extra"></i>
                                        </div>

                                    </div>
                                </div>
                            @endif
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
<script id="extra_file_templete" type="text/x-handlebars-template">
    <div class="row remove_file_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
              <div class="col-11" style="border: 2px solid #0d6efd;padding: 20px;border-radius: 10px 0px 0px 10px;">
                  <div class="row">
                      <div class="form-group col-sm-6">
                        <label>পরিচ্ছেদ নং</label>
                        <input type="text" class="form-control @error('poricched_no') is-invalid @enderror"
                            value="" name="poricched_no[@{{counter}}]">
                        @error('poricched_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                      <div class="form-group col-sm-6">
                        <label>পরিচ্ছেদের নাম</label>
                        <input type="text" class="form-control @error('poricched_title') is-invalid @enderror"
                            value="" name="poricched_title[@{{counter}}]">
                        @error('poricched_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
              </div>
              <div class="col-1" style="text-align: center;writing-mode: vertical-lr; background: #0d6efd;border-radius: 0px 10px 10px 0px;">
                  <div class="form-group col-md-2">
                      <i class="btn btn-success fa fa-plus-circle add_file_extra"></i>
                      <i class="btn btn-danger fa fa-minus-circle remove_file_extra"> </i>
                  </div>

              </div>
          </div>
      </script>

<script>
    $(document).ready(function() {
            var counter = 10000;
            $(document).on("click", ".add_file_extra", function() {
                var source = $("#extra_file_templete").html();
                var template = Handlebars.compile(source);
                var data = {
                    counter: counter
                };
                var html = template(data);

                $("#add_file_extra_div").append(html);
                counter++;
            });

            $(document).on("click", ".remove_file_extra", function(event) {
                $(this).closest(".remove_file_extra_div").remove();
            });
        });
    $(document).on('change', '#class_uid', function() {
        var class_id = $('#class_uid').val();
        $.ajax({
            url: "{{ route('class_wise_subject') }}",
            type: "GET",
            data: {
                class_id: class_id,
            },
            success: function(data) {
                $('#subject_uid').html('');
                $('#subject_uid').html('<option value ="">Select Subject</option>');

                var selected = "{{ @$chapter->subject_uid }}";

                if (data) {
                    $.each(data, function(index, category) {
                        $('#subject_uid').append('<option value ="' + category.uid + '"' + ((
                                category
                                .uid == selected) ? ('selected') : '') + '>' + category.name +
                            '</option>');
                    });
                }
            }
        });
    });

    $(function(){
        $('#class_uid').trigger('change');
    });
</script>
@endsection
