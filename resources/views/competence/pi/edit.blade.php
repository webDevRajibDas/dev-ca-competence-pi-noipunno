@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- <h2 class="my-3 custom-class-title">একক যোগ্যতা</h2> --}}
                <div class="shadow-sm p-2 rounded my-2 custom-card">
                    <div class="">

                        <form method="POST"
                            action="{{ route('competence.update.pi', ['id' => $pi->competence_uid, 'pi_id' => $pi->uid]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf


                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <span class="text-success fw-bold">পারদর্শিতা সূচক (PI) যুক্ত করুন</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="additional-rows">

                                        <div>
                                            <h5 class="text-danger mb-3">পারদর্শিতা সূচক (PI) নং: {{@$pi->pi_no}}
                                            </h5>
                                        </div>
                                        <div class="row">
                                            <input class="form-control" aria-describedby="piuid" name="pi[piuid]"
                                            value="{{ $pi->uid }}" hidden>
                                            {{-- <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="pi_id" class="form-label">PI Id</label>
                                                    <input type="number" class="form-control" aria-describedby="pi_id"
                                                        name="pi[pi_id]" value="{{ $pi->pi_id }}">
                                                </div>
                                            </div> --}}

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="pi_no" class="form-label">পারদর্শিতা সূচক (PI)
                                                        নং</label>
                                                    <input type="text" class="form-control" aria-describedby="pi_no"
                                                        name="pi[pi_no]" value="{{ $pi->pi_no }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="pi_name_en" class="form-label">পারদর্শিতা সূচক (PI) এর
                                                        নাম (ইংরেজি)</label>
                                                    <input type="text" class="form-control" aria-describedby="pi_name_en"
                                                        name="pi[pi_name_en]" value="{{ $pi->name_en }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="pi_name_bn" class="form-label">পারদর্শিতা সূচক (PI) এর
                                                        নাম (বাংলা)</label>
                                                    <input type="text" class="form-control" aria-describedby="pi_name_bn"
                                                        name="pi[pi_name_bn]" value="{{ $pi->name_bn }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">বিস্তারিত</label>
                                                    <textarea class="form-control" id="description" aria-describedby="description" name="pi[description]">{{ $pi->description }}</textarea>
                                                </div>
                                            </div>

                                            <hr>

                                            <div>
                                                <h6 class="text-primary mb-3">পারদর্শিতা সূচক (PI) এর বৈশিষ্ট্য যুক্ত
                                                    করুন</h6>
                                            </div>

                                            @foreach ($pi->pi_attribute as $weight)

                                                @php
                                                    $attribute = \App\Models\PiCompetence\PiAttribute::where('pi_uid', $pi->uid)
                                                        ->where('weight_uid', $weight->weight_uid)
                                                        ->first();
                                                @endphp

                                                <div class="card mt-2">
                                                    <div class="card-header">
                                                        <span class="text-info">{{ @$weight->weight->name }}</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div id="additional-rows">
                                                            <div class="row guide" id="guide">
                                                                {{-- <input type="hidden" value="{{ $pi->uid }}" class="form-control" aria-describedby="pi_uid" name="pi[{{$key}}][attribute][{{ @$pi->uid }}][weight_uid]"> --}}
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="attribute_title_en"
                                                                            class="form-label">বৈশিষ্ট্যর নাম
                                                                            (ইংরেজি)
                                                                        </label>
                                                                        <textarea class="form-control" id="attribute_title_en" aria-describedby="attribute_title_en"
                                                                            name="pi[attribute][{{ @$weight->uid }}][attribute_title_en]">{{ @$attribute->title_en }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="attribute_title_bn"
                                                                            class="form-label">বৈশিষ্ট্যর নাম
                                                                            (বাংলা)</label>
                                                                        <textarea class="form-control" id="attribute_title_bn" aria-describedby="attribute_title_bn"
                                                                            name="pi[attribute][{{ @$weight->uid }}][attribute_title_bn]">{{ @$attribute->title_bn }}</textarea>
                                                                    </div>
                                                                </div>

                                                                {{-- <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="attribute_description"
                                                                            class="form-label">বৈশিষ্ট্যর বর্ণনা</label>
                                                                            <textarea class="form-control" id="attribute_description" aria-describedby="attribute_description"
                                                                                name="pi[attribute][{{ @$weight->uid }}][attribute_details]">{{ @$attribute->description }}</textarea>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>

                    </div>

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
