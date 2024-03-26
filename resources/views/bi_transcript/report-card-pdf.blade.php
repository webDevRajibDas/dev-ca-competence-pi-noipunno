<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noipunno Deshboard</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body{
            font-family: 'nikoshban';
        }
        .responsive-img {
            width: 100%;
            height: auto;
            border-bottom: 5px solid #201B58;
        }
        .responsive-logo {
            /* width: 100%;
            height: auto; */
        }
        .container {
            width: 95%;
            margin: 0 auto;
        }
        .sucjects {
            color: #000000;
            font-family: kalpurush;
            font-size: 23px;
            font-style: normal;
            font-weight: 400;
            line-height: 38px;
            text-align: center;
            margin-top: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #201B58;
        }

        .subject {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, 1fr);
            grid-column-gap: 10px;
            grid-row-gap: 10px;
        }

            .subject-title {
                color: #000000;
                font-family: kalpurush;
                text-align: center;
                font-weight: 400;
                font-size: 25px;
                padding-top: 3px;
                padding-bottom: 3px;
                margin-bottom: 10px;
                background-color: #0000002f;
            }
    
            .card {
                border: 1px solid #0000007a;
            }
    
            .card-title {
                color: #000000;
                font-family: kalpurush;
                text-align: center;
                font-weight: 400;
                font-size: 20px;
                padding-top: 5px;
                padding-bottom: 5px;
                border-bottom: 1px solid #0000007a;
            }
    
            .card-body {
                color: #000000;
                font-family: kalpurush;
                text-align: center;
                font-weight: 400;
                font-size: 16px;
                padding: 5px;
                min-height: 5rem;
            }
    
            .card-footer {
                display: flex;
                height: 35px;
            }
    
            .card-footer-light {
                width: 14.2857%;
                height: 35px;
                border-top: 1px solid #000000;
                border-right: 1px solid #000000;
                border-bottom: 1px solid #000000;
                background-color: #ffffff;
            }
    
            .card-footer-dark {
                width: 14.2857%;
                height: 35px;
                border-top: 1px solid #000000;
                border-right: 1px solid #000000;
                background-color: #00000088;
                border-bottom: 1px solid #000000;
            }
    
            .dotted {
                border-bottom: dotted;
                color: #000000;
            }
        </style>
</head>

<body>
 
    <div class="">
        <img src="{{ $bannarImagePath }}" class="responsive-img" width="100%" height="500px" />
    </div>

    <div class="container-fluid" style="padding-bottom: 10px;  border-bottom: 4px solid #201B58;">
        <div class="container">
            <div class="row" style="display: flex; justify-content: center;">
               <img src="{{ $logoPath }}" class="responsive-logo" width="100%" height="" /> 
            </div>
            <div class="row">
                <div style="float: left; width: 100%; padding-top: 5px; padding-bottom: 5px;">
                    <div style="float: left; width: 12.5%;">শিক্ষার্থীর নাম </div>
                    <div style="float: left; margin-top: 6px;">
                        : ....................................................................................................
                    </div>
                </div>
                <div style="float: left; width: 50%; padding-top: 5px; padding-bottom: 5px;">
                    <div style="float: left; width: 25%;">শিক্ষার্থীর নাম </div>
                    <div style="float: left; margin-top: 6px;">
                        : ..............................................
                    </div>
                </div>
                <div style="float: left; width: 50%; padding-top: 5px; padding-bottom: 5px;">
                    <div style="float: left; width: 25%;">শিক্ষার্থীর আইডি </div>
                    <div style="float: left; margin-top: 6px;">
                        : ..............................................
                    </div>
                </div>
                <div style="float: left; width: 50%; padding-top: 5px; padding-bottom: 5px;">
                    <div style="float: left; width: 15%;">শ্রেণি </div>
                    <div style="float: left; margin-top: 6px;">
                        : ..............................................
                    </div>
                </div>
                <div style="float: left; width: 50%; padding-top: 5px; padding-bottom: 5px;">
                    <div style="float: left; width: 15%;">শিক্ষাবর্ষ </div>
                    <div style="float: left; margin-top: 6px;">
                        : ..............................................
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <h1 class="sucjects">বিষয়সমূহ</h1>

                <ul>
                    <div style="width: 100%; margin: 0 auto; margin-top: 30px; margin-bottom: 50px;">
                        <div style="display: flex; justify-content: space-between;">
                            <div style="float: left; width: 50%;">
                                <li style="display: flex; list-style-type: none; align-items: center; font-size: 20px; font-family: kalpurush; font-weight: 500;">
                                    <img src="{{ $cap }}" style="margin-right: 5px;"> <span>বাংলা</span>
                                </li>
                                <li style="display: flex; list-style-type: none; align-items: center; font-size: 20px; font-family: kalpurush; font-weight: 500;">
                                    <img src="{{ $cap }}" style="margin-right: 5px;"> ইতিহাস ও সামাজিক বিজ্ঞান
                                </li>
                                <li style="display: flex; list-style-type: none; align-items: center; font-size: 20px; font-family: kalpurush; font-weight: 500;">
                                    <img src="{{ $cap }}" style="margin-right: 5px;"> ইংরেজি
                                </li>
                                <li style="display: flex; list-style-type: none; align-items: center; font-size: 20px; font-family: kalpurush; font-weight: 500;">
                                    <img src="{{ $cap }}" style="margin-right: 5px;"> জীবন ও জীবিকা
                                </li>
                                <li style="display: flex; list-style-type: none; align-items: center; font-size: 20px; font-family: kalpurush; font-weight: 500;">
                                    <img src="{{ $cap }}" style="margin-right: 5px;"> গণিত
                                </li>
                            </div>

                            <div style="float: left; width: 50%;">
                                <li style="display: flex; list-style-type: none; align-items: center; font-size: 20px; font-family: kalpurush; font-weight: 500;">
                                    <img src="{{ $cap }}" style="margin-right: 5px;"> বাংলা
                                </li>
                                <li style="display: flex; list-style-type: none; align-items: center; font-size: 20px; font-family: kalpurush; font-weight: 500;">
                                    <img src="{{ $cap }}" style="margin-right: 5px;"> ইতিহাস ও  সামাজিক বিজ্ঞান
                                </li>
                                <li style="display: flex; list-style-type: none; align-items: center; font-size: 20px; font-family: kalpurush; font-weight: 500;">
                                    <img src="{{ $cap }}" style="margin-right: 5px;"> ইংরেজি
                                </li>
                                <li style="display: flex; list-style-type: none; align-items: center; font-size: 20px; font-family: kalpurush; font-weight: 500;">
                                    <img src="{{ $cap }}" style="margin-right: 5px;"> জীবন ও  জীবিকা
                                </li>
                                <li style="display: flex; list-style-type: none; align-items: center; font-size: 20px; font-family: kalpurush; font-weight: 500;">
                                    <img src="{{ $cap }}" style="margin-right: 5px;"> গণিত
                                </li>
                            </div>
                        </div>
                    </div>
                </ul>

            </div>
        </div>
    </div>

    {{-- <div class="page-border-desing bg-white my-5">
        <div class="container py-4 "
            style="border-top: 50px solid #DDDEE0; border-left: 50px solid #DDDEE0; border-bottom: 50px solid #DDDEE0;">
            <h1 class="report-card-design-title text-center py-2 my-3">বাংলা</h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <div>
                            <h4 class="report-card-design-subject-title text-center py-2 border-bottom border-dark">
                                যোগাযোগ</h4>
                        </div>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                            ;">
                            <h4 class="report-card-design-subject-assessment text-center">পরিস্থিতি বিবেচনায় প্রমিত
                                ভাষায়
                                যোগাযোগ করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            ভাষারীতি</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                    ;">
                            <h4 class="report-card-design-subject-assessment text-center">বিভিন্ন ধরনের লেখা পড়ে
                                লেখকের
                                দৃষ্টিভঙ্গি
                                উপলব্ধি করেছে এবং নিজের বক্তব্য বোোঝাতে বিভিন্ন অর্থবৈচিত্রর্যমূলক বাক্য তৈরি করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            প্রায়োোগিক যোগাযোগ</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">বিশ্লেষণাত্মক
                                ভাষায় লিখতে
                                পেরেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            সৃজনশীল ও মননশীল প্রকাশ</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">সাহিত্যরস উপভোোগ করে নিজের
                                কল্পনা
                                ও অনুভূতি সৃষ্টিশীল উপায়ে প্রকাশ
                                করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            মানবিক চিন্তন</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">কোনো ঘটনা বা বিষয়
                                সম্পর্ককেনিজের
                                মত দিয়েছে ও অন্যের মতের গঠনমূলক
                                সমালোোচনা করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="report-card-design-title text-center py-2 mt-5 mb-3">English</h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <div>
                            <h4 class="report-card-design-subject-title text-center  py-2 border-bottom border-dark">
                                Communication</h4>
                        </div>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                            ;">
                            <h4 class="report-card-design-subject-assessment text-center">Communicates with relevance
                                to a given context</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-dark"></div>
                            <div class="assessment-mark-dark"></div>
                            <div class="assessment-mark-dark"></div>
                            <div class="assessment-mark-dark"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-dark"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            Linguistic norms</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                    ;">
                            <h4 class="report-card-design-subject-assessment text-center">Uses appropriate vocabulary
                                and expressions as required in
                                the context</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            Democratic practice</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">Values democratic atmosphere
                                in communication and
                                participates accordingly</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2 border-bottom border-dark">
                            Creative expression</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">Comprehends and relates to
                                literary texts</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="report-card-design-title text-center py-2 mt-5 mb-3">গণিত</h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <div>
                            <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                                গাণিতিক অনুসন্ধান</h4>
                        </div>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                            ;">
                            <h4 class="report-card-design-subject-assessment text-center">
                                সমস্যা সমাধানে বিভিন্ন গাণিতিক
                                অনুসন্ধান প্রক্রিয়া যাচাই করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2 border-bottom border-dark">
                            সংখ্যা ও পরিমাণ</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                    ;">
                            <h4 class="report-card-design-subject-assessment text-center">গাণিতিক সমস্যা সমাধানে যথাযথ
                                ভাষা ও
                                কৌশলের প্রয়োোগ করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            জ্যামিতিক আকৃতি</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">নিয়মিত জ্যামিতিক আকৃতি চিনতে
                                পেরেছে এবং সেগুলোো পরিমাপ করতে
                                পেরেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            গাণিতিক সম্পর্ক</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">সমস্যা সমাধানে গাণিতিক যুক্তি
                                ও সূত্র
                                ব্যবহার করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            সম্ভাব্যতা বিশ্লেষণ</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">প্রাপ্ত তথ্য বিশ্লেষণ করে
                                সমস্যা সমাধানের
                                সম্ভাবনা যাচাই করে দেখেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="report-card-design-title text-center py-2 mt-5 mb-3">বিজ্ঞান</h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <div>
                            <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                                বৈজ্ঞানিক অনুসন্ধান</h4>
                        </div>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                            ;">
                            <h4 class="report-card-design-subject-assessment text-center">
                                বৈজ্ঞানিক অনুসন্ধানের ক্ষেত্রে তথ্য প্রমাণ ও বস্তুনিষ্ঠতার উপর জোোর দিয়েছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            বস্তুর গঠন ও আচরণ</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                    ;">
                            <h4 class="report-card-design-subject-assessment text-center">পরিবেশের বিভিন্ন বস্তুর
                                বাহ্যিক গঠন ও
                                আচরণের সম্পর্ক অনুসন্ধান করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            বস্তু ও শক্তির মিথস্ক্রিয়া</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">বিভিন্ন প্রাকৃতি ক ঘটনায়
                                শক্তির স্থানান্তর
                                অনুসন্ধান করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            স্থিতি ও পরিবর্তন</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">কোনো সিস্টেমে ঘটে চলা বিভিন্ন
                                পরিবর্তন মধ্য দিয়ে যে ভারসাম্য সৃষ্টি
                                হয় তা অনুসন্ধান করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            বিজ্ঞানলব্ধ সামাজিক মূল্যবোধ</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">মানুষ ও প্রকৃতির উপর প্রভাব
                                বিবেচনায়
                                নিয়ে বিজ্ঞান ও প্রযুক্তির ইতিবাচক
                                প্রয়োগে সচেষ্ট হয়েছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="report-card-design-title text-center py-2 mt-5 mb-3">ডিজিটাল প্রযুক্তি </h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <div>
                            <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                                ডিজিটাল সাক্ষরতা</h4>
                        </div>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                            ;">
                            <h4 class="report-card-design-subject-assessment text-center">
                                প্রযুক্তির সাহায্যে প্রয়োোজনীয় তথ্য সংগ্রহ
                                ও তথ্য দায়িত্বশীল ব্যবহার করতে
                                পেরেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            আইসিটি সক্ষমতা</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                    ;">
                            <h4 class="report-card-design-subject-assessment text-center">ব্যক্তিগত প্রয়োোজনে ডিজিটাল
                                মাধ্যম
                                ব্যবহার করে জরুরি সেবা গ্রহণের জন্য
                                যোোগাযোোগ করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            ডিজিটাল সলিউশন উদ্ভাবন</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">অ্যালগরিদম ব্যবহার করে
                                প্রোগ্রাম তৈরি
                                করেছে এবং বিভিন্ন ধরনের নেটওয়ার্ককে
                                তথ্য আদানপ্রদানের কৌশল ব্যাখ্যা
                                করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            আইসিটির নিরাপদ, নৈতিক ও
                            দায়িত্বশীল ব্যবহার</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">সামাজিক রীতি-নীতি, ঝুঁকি ও
                                নৈতিক
                                দিক বিবেচনা করে ডিজিটাল প্রযুক্তি
                                ব্যবহার করে
                                ব্যক্তিগত যোগাযোগ করছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="report-card-design-title text-center py-2 mt-5 mb-3">ইতিহাস ও সামাজিক বিজ্ঞান </h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <div>
                            <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                                আত্মপরিচয়</h4>
                        </div>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                            ;">
                            <h4 class="report-card-design-subject-assessment text-center">
                                লিখিত ও অলিখিত উৎস থেকে তথ্য
                                নিয়ে বিভিন্ন দৃষ্টিকোোণ থেকে নিজের
                                আত্মপরিচয় ও ইতিহাস অন্বেষণ করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            মুক্তিযুদ্ধের চেতনা</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                    ;">
                            <h4 class="report-card-design-subject-assessment text-center">বিভিন্ন উৎস থেকে তথ্য নিয়ে
                                মুক্তিযুদ্ধে
                                সর্বস্তরের মানুষের অবদান অনুসন্ধান
                                করেছে </h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            প্রাকৃতিক ও সামাজিক কাঠাম</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">বিভিন্ন প্রেক্ষাপটে গড়ে ওঠা
                                সামাজিক
                                ও রাজনৈতিক কাঠামোো কীভাবে মানুষের
                                অবস্থান ও ভূমিকা নির্ধারণ করে তা
                                অনুসন্ধান করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            সম্পদ ব্যবস্থাপনা</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">ময় ও অঞ্চলভেদে অর্থনৈতিক
                                ব্যবস্থা
                                কীভাবে গড়ে ওঠে তা অনুসন্ধান করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            পরিবর্তনশীলতায় ভূমিকা</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">সময় ও ভৌগোলিক অবস্থানের
                                সাপেক্ষে
                                সমাজের পরিবর্তন পর্যালোচনা করে নিজ
                                প্রেক্ষাপটে দায়িত্বশীল আচরণ করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="report-card-design-title text-center py-2 mt-5 mb-3">জীবন ও জীবিকা </h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <div>
                            <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                                আত্মউন্নয়ন</h4>
                        </div>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                            ;">
                            <h4 class="report-card-design-subject-assessment text-center">
                                নিজের পছন্দ ও সক্ষমতা বিবেচনায়
                                জীবনের লক্ষ্য নির্ধারণ করে দায়িত্বশীল
                                কাজে নিজেকে সম্পৃক্ত করতে পেরেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            ক্যারিয়ার প্ল্যানিং</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                    ;">
                            <h4 class="report-card-design-subject-assessment text-center">পেশার পরিবর্তন এবং তার সংগে
                                নতুন
                                নতুন দক্ষতা অর্জনের প্রয়োজনীয়তা বুঝে
                                তা অর্জনের জন্ নিজ প্রেক্ষাপটে সমস্যা
                                সমাধানের চেষ্টা করেছে </h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            পেশাগত দক্ষতা</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">নির্দিষ্ট পেশা সম্পর্কে মৌলিক
                                ধারণা ও
                                আগ্রহ প্রদর্শন করতে পেরেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            ভবিষ্যৎ কর্মদক্ষতা</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">পেশায় ভবিষ্যৎ প্রযুক্তির
                                প্রভাব জেনে
                                অভিযোজনের প্রস্তুতি নিতে পারছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="report-card-design-title text-center py-2 mt-5 mb-3">ধর্ম শিক্ষা </h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <div>
                            <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                                ধর্মীয় জ্ঞান</h4>
                        </div>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                            ;">
                            <h4 class="report-card-design-subject-assessment text-center">
                                ধর্মের মৌলিক বিষয় সমূহ জানতে আগ্রহ প্রদর্শন করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            ধর্মীয় বিধিবিধান</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                    ;">
                            <h4 class="report-card-design-subject-assessment text-center">ধর্মের বিধি-বিধান উপলব্ধি করে
                                চর্চার
                                চেষ্টা করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            ধর্মীয় মূল্যবোধ</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">ধর্মীয় শিক্ষায় উদ্বুদ্ধ হয়ে
                                সকলের সংগে
                                মিলেমিশে থেকেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="report-card-design-title text-center py-2 mt-5 mb-3">স্বাস্থথ্য সুরক্ষা </h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <div>
                            <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                                আত্ম পরিচর্যা</h4>
                        </div>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                            ;">
                            <h4 class="report-card-design-subject-assessment text-center">
                                শারীরিক ও মানসিক পরিবর্তন উপলব্ধি
                                করে নিজের দৈনন্দিন যত্ন ও পরিচর্যায়
                                উদ্যোগী হয়েছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            আবেগিক বুদ্ধিমত্তা</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                    ;">
                            <h4 class="report-card-design-subject-assessment text-center">কাউকে কষ্ট না নিয়ে নিজের
                                সামর্থ্য ও
                                সক্ষমতা অনুযায়ী কাজ করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            সামাজিক বুদ্ধিমত্তা</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">পারস্পরিক সম্পর্ক বজায় রাখতে
                                পেরেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="report-card-design-title text-center py-2 mt-5 mb-3">শিল্প ও সংস্কৃতি </h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <div>
                            <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                                পর্যবেক্ষণ ও রূপান্তর</h4>
                        </div>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                            ;">
                            <h4 class="report-card-design-subject-assessment text-center">
                                প্রকৃতির রূপ ও ঘটনাপ্রবাহ নিজের মতোো
                                করে বিভিন্নভাবে প্রকাশের আগ্রহ প্রদর্শন
                                করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            নান্দনিকতার বহুমাত্রিক প্রকাশ</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                    ;">
                            <h4 class="report-card-design-subject-assessment text-center">শিল্পকলার বিভিন্ন ধারার
                                পরিবেশনা
                                উপভোোগ করতে পারছে এবং সম্পৃক্ত
                                হতে আগ্রহ প্রকাশ করছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center  py-2  border-bottom border-dark">
                            যাপিত জীবনে নান্দনিকতা</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">দৈনন্দিন কার্যক্রমে
                                নান্দনিকতার প্রকাশ
                                করছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="report-card-design-title text-center py-2 mt-5 mb-3">আচরণিক নির্দেশক </h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <div>
                            <h4 class="report-card-design-subject-title text-center py-3 border-dark">
                                অংশগ্রহণ ও যোগাযোগ</h4>
                        </div>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center d-none"
                            style="height: 60%
                            ;">
                            <h4 class="report-card-design-subject-assessment text-center">
                                প্রকৃতির রূপ ও ঘটনাপ্রবাহ নিজের মতোো
                                করে বিভিন্নভাবে প্রকাশের আগ্রহ প্রদর্শন
                                করেছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center py-2 border-dark">
                            নিষ্ঠা ও সততা</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center d-none"
                            style="height: 60%
                    ;">
                            <h4 class="report-card-design-subject-assessment text-center">শিল্পকলার বিভিন্ন ধারার
                                পরিবেশনা
                                উপভোোগ করতে পারছে এবং সম্পৃক্ত
                                হতে আগ্রহ প্রকাশ করছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 position-relative py-3">
                    <div class="card border border-2 border-dark my-3 h-100">
                        <h4 class="report-card-design-subject-title text-center py-2 border-dark">
                            পারস্পরিক শ্রদ্ধা ও সহযোোগিতা</h4>
                        <div class="align-items-center card border-0 flex-direction-column justify-content-center align-items-center text-center d-none"
                            style="height: 60%
                        ;">
                            <h4 class="report-card-design-subject-assessment text-center">দৈনন্দিন কার্যক্রমে
                                নান্দনিকতার প্রকাশ
                                করছে</h4>
                        </div>
                        <div class="d-flex position-absolute bottom-0 w-100">
                            <div class="assessment-mark-light-first"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                            <div class="assessment-mark-light"></div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="report-card-design-title ps-2 py-2 mt-5 mb-3">মূল্যায়নের স্কেল </h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-7 position-relative py-3">
                    <div class="py-3 px-0 h-100">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="d-flex gap-2 indicators-check-boxes">
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                            </div>
                            <div class="d-flex align-items-center d-flex gap-2" style="margin-top: -5px;">
                                <div class="ps-3"> = </div>
                                <div class="ps-5">অনন্য (Upgrading)</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="d-flex gap-2 indicators-check-boxes">
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-light"></div>
                            </div>
                            <div class="d-flex align-items-center d-flex gap-2" style="margin-top: -5px;">
                                <div class="ps-3"> = </div>
                                <div class="ps-5">অর্জনমুখী (Achieving)</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="d-flex gap-2 indicators-check-boxes">
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                            </div>
                            <div class="d-flex align-items-center d-flex gap-2" style="margin-top: -5px;">
                                <div class="ps-3"> = </div>
                                <div class="ps-5">অগ্রগামী (Advancing)</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="d-flex gap-2 indicators-check-boxes">
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                            </div>
                            <div class="d-flex align-items-center d-flex gap-2" style="margin-top: -5px;">
                                <div class="ps-3"> = </div>
                                <div class="ps-5">সক্রিয় (Activating)</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="d-flex gap-2 indicators-check-boxes">
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                            </div>
                            <div class="d-flex align-items-center d-flex gap-2" style="margin-top: -5px;">
                                <div class="ps-3"> = </div>
                                <div class="ps-5">অনুসন্ধানী (Exploring)</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="d-flex gap-2 indicators-check-boxes">
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                            </div>
                            <div class="d-flex align-items-center d-flex gap-2" style="margin-top: -5px;">
                                <div class="ps-3"> = </div>
                                <div class="ps-5">বিকাশমান (Developing)</div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="d-flex gap-2 indicators-check-boxes">
                                <div class="assessment-scale-box-dark"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                                <div class="assessment-scale-box-light"></div>
                            </div>
                            <div class="d-flex align-items-center d-flex gap-2" style="margin-top: -5px;">
                                <div class="ps-3"> = </div>
                                <div class="ps-5">প্রারম্ভিক (Elementary)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-5 position-relative py-3">
                    <div class="col-sm-6 col-md-12 py-2">
                        <div class="d-flex flex-column flex-md-row std-identity py-2 align-items-center">
                            <div class="institution-name">উপস্থিতির হার</div>
                            <div class="card border-0 dots py-3">
                                : .........................................%
                            </div>
                        </div>
                        <div class="d-flex std-identity py-2">
                            <div class="institution-name">শ্রেণি শিক্ষকের মন্তব্য</div>
                            <div class="dots"> : </div>
                        </div>
                        <div class="card border-0 dots py-3">
                            .....................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 py-3">
                    <div class="card p-2 border-dark h-100">
                        <div class="d-flex std-identity py-2">
                            <div class="institution-name">শিক্ষার্থীর মন্তব্য :</div>
                        </div>
                        <div>
                            <h5>যে কাজটি সবচেয়ে ভালোোভাবে করতে পেরেছি :</h5>
                        </div>
                        <div class="dots py-3">
                            ......................................................................................................................................................................................................................................................................................................................
                        </div>
                        <div>
                            <h5>আরো উন্নতির জন্য যা যা করতে চাই :</h5>
                        </div>
                        <div class="dots py-3">
                            ..................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 py-3">
                    <div class="card p-2 border-dark h-100">
                        <div class="d-flex std-identity py-2">
                            <div class="institution-name">অভিভাবকের মন্তব্য :</div>
                        </div>
                        <div>
                            <h5>আমার সন্তান যে কাজটি সবচেয়ে ভালোোভাবে করতে পারে:</h5>
                        </div>
                        <div class="dots py-3">
                            ......................................................................................................................................................................................................................................................................................................................
                        </div>
                        <div>
                            <h5>আমার সন্তানের উন্নয়নে আমি যা করতে পারি:</h5>
                        </div>
                        <div class="dots py-3">
                            ..................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="d-flex flex-column flex-md-row justify-content-around">
                    <div class=" py-2 py-md-0">
                        <p>.............................</p>
                        <p>শ্রেণি শিক্ষকের স্বাক্ষর</p>
                        <p>তারিখ :</p>
                    </div>
                    <div class=" py-2 py-md-0">
                        <p>.............................</p>
                        <p>প্রধান শিক্ষকের স্বাক্ষর</p>
                        <p>তারিখ :</p>
                    </div>
                    <div class=" py-2 py-md-0">
                        <p>.............................</p>
                        <p>অভিভাবকের স্বাক্ষর</p>
                        <p>তারিখ :</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



</body>

</html>