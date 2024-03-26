@extends('layouts.app')
@section('content')
    <div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">
                        <div class='d-flex flex-column align-items-center'>
                            <span>মূল যোগ্যতা নং</span>
                            <span>Competence NO</span>
                        </div>
                    </th>
                    <th scope="col">
                        <div class='d-flex flex-column align-items-center'>
                            <span>মূল যোগ্যতা </span>
                            <span>Competence Description</span>
                        </div>
                    </th>
                    <th scope="col">
                        <div class='d-flex flex-column align-items-center'>
                            <span>পারদর্শিতার নির্দেশক নং</span>
                            <span>PI NO</span>
                        </div>
                    </th>
                    <th scope="col">
                        <div class='d-flex flex-column align-items-center'>
                            <span>পারদর্শিতার নির্দেশক</span>
                            <span>PI Description</span>
                        </div>
                    </th>
                    <th scope="col">
                        <div class='d-flex flex-column align-items-center'>
                            <span>পারদর্শিতার নির্দেশক মূল্যায়ন নীতি</span>
                            <span>Assesment of PI</span>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>06.07.02</td>
                    <td>মূল যোগ্যতা</td>
                    <td>
                        <table class="table text-center">
                            <tbody>
                                <tr>
                                    <td>06.07.01.01</td>
                                </tr>
                                <tr>
                                    <td>06.07.01.02</td>
                                </tr>
                                <tr>
                                    <td>06.07.01.03</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>পারদর্শিতার নির্দেশক</td>
                    <td>পারদর্শিতার নির্দেশক মূল্যায়ন নীতি</td>
                </tr>
                <tr>
                    <td>06.07.03</td>
                    <td>মূল যোগ্যতা</td>
                    <td>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>06.07.01.01</td>
                                </tr>
                                <tr>
                                    <td>06.07.01.02</td>
                                </tr>
                                <tr>
                                    <td>06.07.01.03</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>পারদর্শিতার নির্দেশক</td>
                    <td>পারদর্শিতার নির্দেশক মূল্যায়ন নীতি</td>
                </tr>
                <tr>
                    <td>06.07.02</td>
                    <td>মূল যোগ্যতা</td>
                    <td>
                        <table class="table text-center">
                            <tbody>
                                <tr>
                                    <td>06.07.01.01</td>
                                </tr>
                                <tr>
                                    <td>06.07.01.02</td>
                                </tr>
                                <tr>
                                    <td>06.07.01.03</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>পারদর্শিতার নির্দেশক</td>
                    <td>পারদর্শিতার নির্দেশক মূল্যায়ন নীতি</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
