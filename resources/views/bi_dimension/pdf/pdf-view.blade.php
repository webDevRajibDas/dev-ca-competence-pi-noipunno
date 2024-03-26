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

    <h3>PI ডাইমেনশন ছক</h3>

    @foreach ($dimesions as $di)

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td colspan="2" class="text-center"> ডাইমেনশন নং {{ $di->dimension_no }} ,  ডাইমেনশনের নামঃ {{ $di->dimension_title }} </td>
                    </tr>
                </thead>
                <tbody>
                    @php
                       $bis = \App\Models\BiDimensionToBi::where('bi_dimension_uid', $di->uid)->get();
                    @endphp

                    @foreach ($bis as $bi)
                        @php
                            $uid = $bi->bi_uid;
                            $bi_name = \App\Models\PiCompetence\Bi::where('uid', $bi->bi_uid)->first();
                        @endphp
                        <tr>
                            <td width=5%>{{ $loop->iteration }}</td>
                            <td width=95% class="text-left">{{ $bi_name->name_bn; }}</td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

       

    @endforeach
</body>

</html>
