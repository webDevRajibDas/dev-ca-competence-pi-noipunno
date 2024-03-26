@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-6">
            <div class="card shadow-sm">
                <div style="background-color: rgb(243 243 243 / 3%); border-bottom:0" class="card-header">প্রতিষ্ঠান</div>
                <div class="card-body">
                    {{-- <div class="btn-group">
                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Board wise
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Dhaka</a></li>
                            <li><a class="dropdown-item" href="#">Rajshahi</a></li>
                            <li><a class="dropdown-item" href="#">Cumilla</a></li>
                        </ul>
                    </div> --}}

                    <div style="width:100%; height:400px" id="instituteChartDiv"></div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-6 col-xxl-6">
            <div class="card shadow-sm">
                <div style="background-color: rgb(243 243 243 / 3%); border-bottom:0" class="card-header">শিক্ষার্থী</div>
                <div class="card-body">
                    <div id="studentsChartDiv" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 80px" class="row">
        <div class="col-sm-12 col-md-12 col-xl-12 col-xxl-12">
            <div style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;" class="card">
                <div style="background-color:#ffffff;border-bottom:0" class="card-header">
                    বিষয় ভিত্তিক/শিক্ষক
                </div>
                <div class="card-body">
                    @foreach ($subjects as $subject)
                        <button type="button" value="{{ $subject->class_id }}"
                            class="btn btn-light btn-fw filterByClass">{{ $subject->name_bn }}</button>
                    @endforeach
                    <div id="teacherSubjectWiseChart" style="height: 500px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin: 80px 0px 40px 0px;" class="row">
        <div class="col-sm-12 col-md-12 col-xl-12 col-xxl-12">
            <div style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;" class="card">
                <div style="
            background: linear-gradient(175deg, rgba(22,210,224,1) 0%, rgba(39,184,185,1) 100%); color:white;font-weight:600"
                    class="card-header">
                    বোর্ড প্রতিষ্ঠান / শিক্ষক
                </div>
                <div class="card-body">
                    <div id="boardInstituteChart" style="height: 400px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('child-scripts')
    <script>
        //Chart 1 initialize
        am5.ready(function() {
            var root1 = am5.Root.new("instituteChartDiv");
            root1.setThemes([am5themes_Animated.new(root1)]);
            root1._logo.dispose();

            const dataList = <?php echo json_encode($instituteData); ?>;
            var chart1 = root1.container.children.push(
                am5xy.XYChart.new(root1, {
                    panX: false,
                    panY: false,
                    paddingLeft: 0,
                    paddingRight: 30,
                    wheelX: "none",
                    wheelY: "none"
                })
            );
            chart1.zoomOutButton.set("forceHidden", true);
            var yRenderer = am5xy.AxisRendererY.new(root1, {
                minorGridEnabled: true
            });
            yRenderer.grid.template.set("visible", false);

            var yAxis = chart1.yAxes.push(
                am5xy.CategoryAxis.new(root1, {
                    categoryField: "name",
                    renderer: yRenderer,
                    paddingRight: 40
                })
            );

            yAxis.data.setAll(dataList);
            var xRenderer = am5xy.AxisRendererX.new(root1, {
                minGridDistance: 80,
                minorGridEnabled: true
            });

            var xAxis = chart1.xAxes.push(
                am5xy.ValueAxis.new(root1, {
                    min: 0,
                    renderer: xRenderer
                })
            );

            var series1 = chart1.series.push(
                am5xy.ColumnSeries.new(root1, {
                    name: "Institute",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueXField: "steps",
                    categoryYField: "name",
                    sequencedInterpolation: true,
                    calculateAggregates: true,
                    maskBullets: false,
                    tooltip: am5.Tooltip.new(root1, {
                        dy: -30,
                        pointerOrientation: "vertical",
                        labelText: "{valueX}"
                    })
                })
            );

            series1.columns.template.setAll({
                strokeOpacity: 0,
                cornerRadiusBR: 10,
                cornerRadiusTR: 10,
                cornerRadiusBL: 10,
                cornerRadiusTL: 10,
                maxHeight: 50,
                fillOpacity: 0.8
            });

            series1.set("heatRules", [{
                dataField: "valueX",
                min: am5.color(0xe5dc36),
                max: am5.color(0x5faa46),
                target: series1.columns.template,
                key: "fill"
            }]);

            series1.data.setAll(dataList);
            yAxis.data.setAll(dataList);

            var cursor1 = chart1.set("cursor", am5xy.XYCursor.new(root1, {}));
            cursor1.lineX.set("visible", false);
            cursor1.lineY.set("visible", false);

            cursor1.events.on("cursormoved", function() {
                var dataItem = series1.get("tooltip").dataItem;
                if (dataItem) {
                    //handleHover(dataItem)
                } else {
                    //handleOut();
                }
            })

            series1.appear();
            chart1.appear(1000, 100);

        });

        //Chart 2 initialize
        am5.ready(function() {
            var root = am5.Root.new("studentsChartDiv");
            root.setThemes([
                am5themes_Animated.new(root)
            ]);
            root._logo.dispose();

            var chart2 = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true,
                paddingLeft: 0,
                paddingRight: 1
            }));
            chart2.zoomOutButton.set("forceHidden", true);

            var cursor = chart2.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);

            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30,
                minorGridEnabled: true
            });

            xRenderer.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15
            });

            xRenderer.grid.template.setAll({
                location: 1
            })

            var xAxis = chart2.xAxes.push(am5xy.CategoryAxis.new(root, {
                disabled: true,
                maxDeviation: 0.3,
                categoryField: "class_name",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yRenderer = am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1
            })

            var yAxis = chart2.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: yRenderer
            }));

            // Create series
            var series = chart2.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series 1",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "total",
                sequencedInterpolation: true,
                categoryXField: "class_name",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            series.columns.template.setAll({
                cornerRadiusTL: 5,
                cornerRadiusTR: 5,
                strokeOpacity: 0
            });
            series.columns.template.adapters.add("fill", function(fill, target) {
                return chart2.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", function(stroke, target) {
                return chart2.get("colors").getIndex(series.columns.indexOf(target));
            });

            var dataListStudent = <?php echo json_encode($studentsData); ?>;
            //console.log(dataListStudent);

            xAxis.data.setAll(dataListStudent);
            series.data.setAll(dataListStudent);

            series.appear(1000);
            chart2.appear(1000, 100);

        });


        // Chart 3
        am5.ready(function() {
            var root = am5.Root.new("teacherSubjectWiseChart");
            root.setThemes([
                am5themes_Animated.new(root)
            ]);
            root._logo.dispose();

            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: true,
                panY: true,
                wheelX: "panX",
                wheelY: "zoomX",
                pinchZoomX: true,
                paddingLeft: 0,
                paddingRight: 1
            }));

            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);

            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30,
                minorGridEnabled: true
            });

            xRenderer.labels.template.setAll({
                rotation: -90,
                centerY: am5.p50,
                centerX: am5.p100,
                paddingRight: 15,
                fontSize: ".8em"
            });

            xRenderer.grid.template.setAll({
                location: 1
            })

            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "name",
                renderer: xRenderer,
                tooltip: am5.Tooltip.new(root, {})
            }));

            var yRenderer = am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1
            })

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                renderer: yRenderer
            }));


            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Subject wise teacher series",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "count",
                sequencedInterpolation: true,
                categoryXField: "name",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{valueY}"
                })
            }));

            series.columns.template.setAll({
                cornerRadiusTL: 5,
                cornerRadiusTR: 5,
                strokeOpacity: 0
            });
            series.columns.template.adapters.add("fill", function(fill, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            series.columns.template.adapters.add("stroke", function(stroke, target) {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });

            var subjectWiseTeacher = <?php echo json_encode($teacherSubject, JSON_NUMERIC_CHECK); ?>;


            $(document).ready(function() {
                $('.filterByClass').on('click', function() {
                    $('.filterByClass').removeClass('active-button');
                    $(this).addClass('active-button');

                    var classUid = $(this).val();
                    console.log(classUid);

                    var accessToken =
                        "{{ request()->bearerToken() ?? App\Helper\UtilsCookie::getCookie() }}";
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: 'http://master.project-ca.com/api/v2/get-teacher-subjectwise',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Authorization': 'Bearer ' + accessToken,
                            'Content-Type': 'application/json'
                        },
                        dataType: 'json',
                        data: JSON.stringify({
                            classId: classUid,
                        }),
                        success: function(response) {
                            updateChart(response);

                        },
                        error: function(error) {
                            console.error(' failed:', error);
                        }
                    });
                });
            });

            function updateChart(newData) {
                xAxis.data.setAll(newData);
                series.data.setAll(newData);
                chart.appear(1000, 100);
            }

            xAxis.data.setAll(subjectWiseTeacher);
            series.data.setAll(subjectWiseTeacher);

            series.appear(1000);
            chart.appear(1000, 100);

        });

        //Chart 4
        let chart3;
        let xAxis3, seriesEx, seriesMn, studentSeries;

        am5.ready(function() {
            var root = am5.Root.new("boardInstituteChart");
            root.setThemes([
                am5themes_Animated.new(root)
            ]);
            root._logo.dispose();
            chart3 = root.container.children.push(am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "none",
                wheelY: "none",
                pinchZoomX: false

            }));

            var cursor = chart3.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);

            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            });

            if (window.innerWidth > 600) {
                xRenderer.labels.template.setAll({
                    rotation: 0,
                    centerY: am5.p50,
                    centerX: am5.p100,
                    paddingRight: 5,
                    fontSize: 12,
                });

            } else {
                xRenderer.labels.template.setAll({
                    rotation: -90,
                    centerY: am5.p50,
                    centerX: am5.p100,
                    paddingRight: 5,
                    fontSize: 10,

                });
            }

            xRenderer.grid.template.setAll({
                location: 1,
                strokeOpacity: 0

            });


            xAxis3 = chart3.xAxes.push(am5xy.CategoryAxis.new(root, {
                maxDeviation: 0.3,
                categoryField: "board_short",
                renderer: xRenderer,
                autoWrap: true,
                tooltip: am5.Tooltip.new(root, {
                    labelText: "{board}"
                })
            }));


            var yRenderer = am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1,
            });
            yRenderer.labels.template.setAll({
                fontSize: 12
            });
            yRenderer.grid.template.setAll({
                strokeDasharray: [2, 2]
            });

            var yAxis2 = chart3.yAxes.push(am5xy.ValueAxis.new(root, {
                maxDeviation: 0.3,
                // renderer: am5xy.AxisRendererY.new(root, {
                //     strokeOpacity: 0.1
                // }),
                renderer: yRenderer
            }));

            // Create extra series (Series 2) for the extra bars
            seriesEx = chart3.series.push(am5xy.ColumnSeries.new(root, {
                name: "Teacher",
                xAxis: xAxis3,
                yAxis: yAxis2,
                valueYField: "teacher", // Use the same value field as the main series
                sequencedInterpolation: true,
                categoryXField: "board_short",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "Teacher : {valueY}"
                }),
                clustered: true,
                clusterGutter: am5.percent(50)

            }));

            seriesEx.columns.template.setAll({
                cornerRadiusTL: 0,
                cornerRadiusTR: 0,
                strokeOpacity: 0,
                width: am5.percent(90),
                fill: "#fdbb2d",
            });

            // Create main series (Series 1)
            seriesMn = chart3.series.push(am5xy.ColumnSeries.new(root, {
                name: "Institute",
                xAxis: xAxis3,
                yAxis: yAxis2,
                valueYField: "institute",
                sequencedInterpolation: true,
                categoryXField: "board_short",
                tooltip: am5.Tooltip.new(root, {
                    labelText: "Institute: {valueY}"
                }),
                clustered: true,
                clusterGutter: am5.percent(0)
            }));

            seriesMn.columns.template.setAll({
                cornerRadiusTL: 0,
                cornerRadiusTR: 0,
                strokeOpacity: 0,
                width: am5.percent(100),
                fill: "#05CDF9",
            });

            // seriesMn.columns.template.adapters.add("fill", function (fill, target) {
            //     return chart3.get("colors").getIndex(seriesMn.columns.indexOf(target));
            // });

            // seriesMn.columns.template.adapters.add("stroke", function (stroke, target) {
            //     return chart3.get("colors").getIndex(seriesMn.columns.indexOf(target));
            // });


            studentSeries = chart3.series.push(am5xy.ColumnSeries.new(root, {
                name: "Student Series",
                xAxis: xAxis3,
                yAxis: yAxis2,
                valueYField: "student",
                sequencedInterpolation: true,
                categoryXField: "board_short",
                clustered: true,
                clusterGutter: am5.percent(20),
                hiddenInLegend: true,
                tooltip: am5.Tooltip.new(root, {
                    labelText: "Student: {valueY}"
                }), // Add tooltip configuration for the "student" series
            }));

            studentSeries.columns.template.setAll({
                cornerRadiusTL: 0,
                cornerRadiusTR: 0,
                strokeOpacity: 0,
                width: am5.percent(90),
                fill: "#F905F6", // Set the fill color to transparent
            });


            var instituteTeacher = <?php echo json_encode($boardInstituteTeacher, JSON_NUMERIC_CHECK); ?>;
            console.log(instituteTeacher);

            xAxis3.data.setAll(instituteTeacher);
            seriesMn.data.setAll(instituteTeacher);
            seriesEx.data.setAll(instituteTeacher);
            studentSeries.data.setAll(instituteTeacher);

            seriesMn.appear(1000);
            seriesEx.appear(1000);
            studentSeries.appear(1000);
            chart3.appear(1000, 100);
        });
    </script>
@endpush
