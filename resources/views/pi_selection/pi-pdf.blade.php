<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: 'nikoshban';
        }

        h2 h3 {
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 25px;
        }

        .table tr td {
            vertical-align: top;
            padding: 5px;
            font-size: 12px;
        }

        .table.border tr td {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .table-bordered th,
        .table-bordered td,
        .table-bordered tr {
            vertical-align: middle;
            padding: 0.75rem;
            border: .5px solid #a9a8a8;
            font-size: 12px;
        }

        .table-bordered tr td {
            font-size: 11px !important;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .footer,
        .header {
            width: 100%;
        }

        .header .left {
            float: left;
            width: 10%;
            text-align: left;
        }

        .header .center {
            float: left;
            width: 80%;
            text-align: center;
            font-weight: bold;
        }

        .header .center p {
            margin: 0;
            padding: 0;
        }

        .header .right {
            float: left;
            width: 9%;
            padding-top: 5px;
            padding-right: 5px;
            text-align: right;
        }

        .footer .left {
            float: left;
            width: 30%;
        }

        .footer .center {
            float: left;
            width: 40%;
            text-align: center;
        }

        .footer .right {
            float: left;
            width: 30%;
            text-align: right;
        }
    </style>
    <title>Competence PDF Report</title>
</head>

<body>

    <h3>PI মূল্যায়ন ছক</h3>

    @foreach ($piData as $pi)

        @if($pi->subject_uid == $subjectUid)
        
            <table class="table table-bordered">
                <thead>
                    <tr>
                        @php
                            $pi_class     = \App\Models\Setting\PiClass::where('class_id', $pi->class_id)->first();
                            $pi_subject   = \App\Models\Setting\Subject::where('uid', $pi->subject_uid)->first();
                            $pi_assesment = \App\Models\AssessmentDetail::where('uid', $pi->assessment_type)->first();
                        @endphp
                        <td colspan="2" class="text-center">PI মূল্যায়ন ছক - {{ $pi_class->name_bn }} শ্রেণী, বিষয়ঃ {{  $pi_subject->name }}, মূল্যায়ন ধরনঃ {{  $pi_assesment->assessment_details_name_bn }} </td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $pi_selections = \App\Models\PiCompetence\PiSelectionDetail::where('pi_selection_uid', $pi->uid)->get();
                    @endphp

                    @foreach ($pi_selections as $pi_selection)
                        @php
                            $uid = $pi_selection->pi_uid;
                            $pi_name = \App\Models\PiCompetence\Pi::where('uid', $uid)->first();
                        @endphp
                        <tr>
                            <td width=5%>{{ $loop->iteration }}</td>
                            <td width=95% class="text-left">{{ $pi_name->name_bn; }}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

        @endif

    @endforeach
</body>

</html>
