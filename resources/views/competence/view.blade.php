@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">পারদর্শিতা: {{@$competence->name_en}}</h2>
                <h3 class="card-title">শ্রেণী: {{@$competence->class->name}}</h3>
                <div>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class='d-flex flex-column align-items-center'>
                                        <span>মূল যোগ্যতা নং</span>
                                        <span>পারদর্শিতা নং</span>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class='d-flex flex-column align-items-center'>
                                        <span>মূল যোগ্যতা </span>
                                        <span>পারদর্শিতার বর্ণনা</span>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class='d-flex flex-column align-items-center'>
                                        <span>পারদর্শিতার নির্দেশক নং</span>
                                        <span>PI নং</span>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class='d-flex flex-column align-items-center'>
                                        <span>পারদর্শিতার নির্দেশক</span>
                                        <span>PI বর্ণনা</span>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class='d-flex flex-column align-items-center'>
                                        <span>পারদর্শিতার নির্দেশক মূল্যায়ন নীতি</span>
                                        <span>PI এর মূল্যায়ন</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$competence->subject->subject_id}}.{{$competence->class->class_id}}.{{$competence->competence_id}}</td>
                                <td>{{$competence->details}}</td>
                                <td>
                                    <table class="table text-center">
                                        <tbody>
                                            @foreach ($competence->pis as $pi)
                                                <tr>
                                                    <td>{{$competence->subject->subject_id}}.{{$competence->class->class_id}}.{{$competence->competence_id}}.{{$pi->pi_id}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="table text-center">
                                        <tbody>
                                            @foreach ($competence->pis as $pi)
                                                <tr>
                                                    <td>{{$pi->description}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table class="table text-center">
                                        <tbody>
                                            @foreach ($competence->pis as $pi)
                                                <tr>
                                                    @foreach ($weights as $weight)
                                                        <td>
                                                            @if($weight->symbol)
                                                                <img src="{{ asset($weight->symbol) }}" height="30px" weight="30" alt="Symbol Image">
                                                            @else
                                                                No Symbol Available
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
