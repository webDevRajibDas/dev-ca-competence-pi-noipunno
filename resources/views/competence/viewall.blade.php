@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="table-responsive table-container shadow p-2">
                <table class="custom-table myTable">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class='d-flex flex-column align-items-center'>
                                    <span>একক যোগ্যতা নং</span>
                                    {{-- <span>Competence NO</span> --}}
                                </div>
                            </th>
                            <th scope="col">
                                <div class='d-flex flex-column align-items-center'>
                                    <span>একক যোগ্যতার বর্ণনা </span>
                                    {{-- <span>Competence Description</span> --}}
                                </div>
                            </th>
                            <th scope="col">
                                <div class='d-flex flex-column align-items-center'>
                                    <span>পারদর্শিতা সূচক নং</span>
                                    {{-- <span>PI NO</span> --}}
                                </div>
                            </th>
                            <th scope="col">
                                <div class='d-flex flex-column align-items-center'>
                                    <span>পারদর্শিতা সূচক বর্ণনা</span>
                                    {{-- <span>PI Description</span> --}}
                                </div>
                            </th>
                            <th scope="col">
                                <div class='d-flex flex-column align-items-center'>
                                    <span>পারদর্শিতা সূচক এর মূল্যায়ন নীতি</span>
                                    {{-- <span>Assesment of PI</span> --}}
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competences as $competence)
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

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
