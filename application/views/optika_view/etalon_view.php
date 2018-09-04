<div class="page-content-my">
    <style>
        .flot-chart-bar {
            margin-right: 100px;
            margin-left: 100px;
            height: 100%;
        }

        #tooltip {
            position: absolute;
            display: none;
            padding: 5px 10px;
            border: 1px solid #e1e1e1;
        }

        .flot-chart {
            display: block;
            height: 400px;
        }

        .flot-chart-content {
            width: 100%;
            height: 100%;
        }

        table.table tr, th {
            text-align: center;
        }

        table.table th {
            background-color: #f0f0f0;
            text-align: center;
        }

        .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
            padding: 2px;
            vertical-align: middle;
        }

        table.table-info {
            margin-top: 10px;
            border-top: none;
            width: 100%;
            max-width: 80%;
            margin: auto;
            margin-bottom: 20px;
            border-collapse: collapse;
            border-spacing: 0;
            box-sizing: border-box;
            display: table;
        }

        table.table-info th,
        table.table-info td {
            text-align: center;
        }

        table.table-info td > label, th > label {
            margin-top: 4px;
        }

        div.opto {
            text-align: center;
        }

        .row_button {
            text-align: center;
            margin-top: 2px;
            margin-bottom: 2px;

        }

        .row_chart {
            float: right;
            margin-top: 5px;
            margin-bottom: 2px;

        }

        .row_button_foot {
            float: right;
            margin-top: 5px;
            margin-bottom: 2px;
        }

        .row_param {
            margin-top: 18px;
        }

        .text_header {
            margin-top: 15px;
        }

        table.table-ref {
            border-top: none;
            width: 100%;
            table-layout: auto;
            margin: auto;
            border-collapse: collapse;
            border-spacing: 0;
            box-sizing: border-box;
            display: table;
            text-align: left;
        }

        table.table-param {
            border-top: none;
            width: 100%;
            table-layout: auto;
            margin: auto;
            border-collapse: collapse;
            border-spacing: 0;
            box-sizing: border-box;
            display: table;
            text-align: left;
        }

        .width_td {
            width: 20%;
        }

        .width_td_left_bot {
            width: 150px;
        }

        input.input_value {
            padding: 0px;
            padding-left: 4px;
        / / font-weight: bold;

        }

        select.select_my_left {
            height: 21px;
            padding: 1px 2px;
            width: 150px;
            color: #1083cf;
            font-size: 13px;
            margin-top: 3px;
        / / font-weight: bold;
        }
    </style>
    <div class="container-fluid" style="padding-left: 8px; padding-right: 8px;">
        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-left: 8px; padding-right: 8px;">
            <div class="widget-box" style="margin-top: 9px">
                <div class="widget-header widget-header-small" style="color:#555; ">
                    <h5 class="widget-title" style="font-weight: bold;"><i class=" fa fa-tasks"></i> &nbsp;Эталонная
                        рефлектограмма</h5>
                </div>

                <div class="panel-body" style="padding: 0px 0px 5px 0px;">
                    <div class="row-fluid" style="margin-top: 5px;">
                        <div class="col-lg-10" style="padding: 0px 5px;">

                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-small"
                                     style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                                    <h6 class="widget-title" style="line-height: 5px; font-weight: bold;">Параметры
                                        эталонной рефлектограммы</h6>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main" style="padding: 10px 5px 5px 5px;">
                                        <table class="table-param">
                                            <tbody>
                                            <tr style="vertical-align: baseline;">
                                                <td class="width_td_left">
                                                    <span class="lbl">Имя шаблона: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <input type="text" class="input_value input-medium"
                                                           style="color:#1083cf; font-size: 13px;"> &nbsp;

                                                </td>
                                                <td>
                                                    <span class="lbl">Длина волны: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <select class="select_my_left" style="margin-top:3px;">
                                                        <option value="AL">1520</option>
                                                        <option value="AK">1610</option>
                                                        <option value="AZ">2000</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <span class="lbl">Длит. импульса: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <select class="select_my_left">
                                                        <option>10</option>
                                                        <option>20</option>
                                                        <option>30</option>
                                                        <option>40</option>
                                                        <option>50</option>
                                                        <option>60</option>
                                                    </select>

                                                </td>
                                                <!--                                                            <td style="    text-align: right;">
                                                                                                                <button class="btn btn-xs btn-info bigger" style="border-radius: 4px; line-height: 14px;">
                                                                                                                    Снять эталон
                                                                                                                </button>
                                                                                                            </td>-->
                                            </tr>
                                            <tr>
                                                <td class="width_td_left">
                                                    <span class="lbl">Время накопления:</span>
                                                </td>
                                                <td>
                                                    <select class="select_my_left">
                                                        <option>10</option>
                                                        <option>20</option>
                                                        <option>30</option>
                                                        <option>40</option>
                                                        <option>50</option>
                                                        <option>60</option>
                                                    </select>

                                                </td>
                                                <td>
                                                    <span class="lbl">Диапазон по длине: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <select class="select_my_left">
                                                        <option>1000</option>
                                                        <option>1500</option>
                                                        <option>2000</option>
                                                    </select>

                                                </td>
                                                <td>
                                                    <span class="lbl">Период: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <select class="select_my_left">
                                                        <option>циклично</option>
                                                        <option>единоразово</option>
                                                        <option>....</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2" style="padding: 0px 5px;">
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-small"
                                     style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main" style="padding: 5px;">
                                        <div class="row_button">
                                            <button id="getStandard" class="btn btn-xs btn-info bigger"
                                                    id_fiber="<?= $fiber_data["id_fiber"] ?>"
                                                    style="border-radius: 4px; line-height: 14px;">
                                                Выполнить измерение
                                            </button>
                                        </div>
                                        <div class="row_button">
                                            <!--    <button class="btn btn-xs btn-info bigger" style="border-radius: 4px; line-height: 14px;">
                                                    Сохранить как эталон&nbsp
                                                </button>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hr hr-18 dotted hr-double"></div>
                    <div class="row_fluid" style="padding: 5px;">
                        <div class="col-lg-3">
                            <label class="col-lg-8" for="start_segment">Начальная точка</label>
                            <input  class="col-lg-4" id="start_segment">
                        </div>
                        <div class="col-lg-3">
                            <label class="col-lg-8" for="end_segment">Конечная точка</label>
                            <input class="col-lg-4" id="end_segment">
                        </div>
                        <div class="col-lg-3">
                            <label class="col-lg-4" for="name_segment">Описание отрезка</label>
                            <input class="col-lg-8" id="name_segment">
                        </div>
                        <div class="col-lg-3">
                            <button class="col-lg-12 btn-xs btn-info bigger" id="add_segment"
                                    id_fiber="<?= $fiber_data["id_fiber"] ?>">Добавить контролируемый отрезок</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="simple-table" class="table  table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Идн. отрезка</th>
                                    <th>Начало отрезка (м.)</th>
                                    <th>Конец отрезка (м.)</th>
                                    <th>Описание</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody id="segments_table">
                                  <?php foreach ($fiber_segments as $segment): ?>
                                <tr id="segment_<?=$segment['id_fiber_segments']?>">


                                    <td>
                                        <?=$segment['id_fiber_segments']?>
                                    </td>
                                    <td><?=$segment['start']?></td>
                                    <td><?=$segment['end']?></td>
                                    <td><?=$segment['name']?></td>
                                    <td>
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <button class="btn btn-xs btn-danger delete_segment"
                                                    id_fiber_segments="<?=$segment['id_fiber_segments']?>">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div><!-- /.span -->
                    </div>
                </div> <!-- panel-body-->
                <!-- построение рефлектограммы -->
                <div class="panel-body" style="padding: 2px 0px 15px 0px;">
                    <div class="row_param" style="padding: 0px 5px;">
                        <!-- #section:custom/widget-box.options.transparent -->
                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-small"
                                 style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                                <h6 class="widget-title" style="line-height: 5px; font-weight: bold;">
                                    Рефлектограмма</h6>
                                <div class="widget-toolbar "
                                     style="padding: 0 0px 0 5px; margin-right: 5px;     line-height: 20px;">
                                    <a href="#" data-action="collapse" style="font-size: 12px; line-height: 20px;">
                                        <i class="ace-icon fa fa-chevron-up"></i></a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="row" style="margin-right: 19px;">
                                    <div class="row_chart">
                                        <button class="btn btn-white btn-info" style="border-radius:4px; ">
                                            <i class=" fa fa-search-plus "></i>
                                        </button>
                                        <button class="btn btn-white btn-info" style="border-radius:4px; ">
                                            <i class=" fa fa-search-minus "></i>
                                        </button>
                                        <button class="btn btn-white btn-info" style="border-radius:4px; ">
                                            <i class=" fa fa-arrows-alt "></i>
                                        </button>
                                        <button class="btn btn-white btn-info" style="border-radius:4px; ">
                                            <i class=" fa fa-qrcode "></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="widget-main" style="padding: 0px; margin-top: -15px;">
                                    <div class="box box-primary">
                                        <div class="box-body" style="margin-bottom: 5px;">
                                            <div class="flot-chart">
                                                <div class="flot-chart-content" id="line-chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- widget-box.options.transparent -->
                    </div> <!--row-param-->
                </div>


            </div> <!-- W-BOX-1 -->
        </div> <!-- col-lg-12 -->

    </div> <!-- container-fluid -->

</div> <!-- content-my -->
<script src="styleace/components/Flot/excanvas.js"></script>
<script src="styleace/components/Flot/jquery.flot.js"></script>
<script src="styleace/components/Flot/jquery.flot.pie.js"></script>
<script src="styleace/components/Flot/jquery.flot.resize.js"></script>
<script src="styleace/components/Flot/jquery.flot.time.js"></script>
<script src="styleace/components/Flot/jquery.flot.categories.js"></script>
<script src="styleace/components/Flot/jquery.flot.navigate.js"></script>
<script src="styleace/components/Flot/jquery.flot.canvas.js"></script>
</div>
<script>
    function show() {
        $.ajax({
            url: 'ajax/getStandardReflectogramm/<?=$fiber_data["id_fiber"]?>',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $.plot($("#line-chart"), data, {
                    grid: {
                        borderWidth: 1,
                        minBorderMargin: 20,
                        labelMargin: 10,
                        hoverable: true,
                        clickable: true,
                        backgroundColor: {
                            colors: ["#fff", "#e4f4f4"]
                        },
                        margin: {
                            top: 8,
                            bottom: 20,
                            left: 20
                        }
                    },
                    legend: {
                        show: true
                    },
                    xaxis: {
                        zoomRange: [-10000, 100000],
                        panRange: [-10000, 100000]
                    },
                    yaxis: {
                        zoomRange: [-50000, 50000],
                        panRange: [-50000, 50000]
                    },
                    zoom: {
                        interactive: true

                    },
                    pan: {
                        interactive: true
                    }
                });

            }
        });
    }
    show();
    $("<div id='tooltip'></div>").css({
        position: "absolute",
        display: "none",
        border: "1px solid #fdd",
        padding: "2px",
        "background-color": "#fee",
        opacity: 0.80
    }).appendTo("body");

    $("#line-chart").bind("plothover", function (event, pos, item) {
        if (item) {
            var x = item.datapoint[0].toFixed(2),
                y = item.datapoint[1].toFixed(2);

            $("#tooltip").html("Затухание на " + x + " метре = " + y)
                .css({top: item.pageY + 5, left: item.pageX + 5})
                .fadeIn(200);
        } else {
            $("#tooltip").hide();
        }
    });

    $("#line-chart").bind("plotclick", function (event, pos, item) {
        if (item) {
            $("#clickdata").text(" - click point " + item.dataIndex + " in " + item.series.label);
            plot.highlight(item.series, item.datapoint);
        }
    });

    $('#getStandard').click(function () {
        $('#getStandard').attr('disabled', true);
        $.ajax({
            url: "ajax/doStandardReflectogramm/<?=$fiber_data["id_fiber"]?>",
        })
            .success(function ($data) {
                show();
                $('#getStandard').attr('disabled', false);
            })
            .fail(function (xhr, status, error) {
                alert(xhr.responseText + '|\n' + status + '|\n' + error);
                $('#getStandard').attr('disabled', false);
            });
    });

    $('#getStandard').click(function () {
        $('#getStandard').attr('disabled', true);
        $.ajax({
            url: "ajax/doStandardReflectogramm/<?=$fiber_data["id_fiber"]?>",
        })
            .success(function (data) {
                show();
                $('#getStandard').attr('disabled', false);
            })
            .fail(function (xhr, status, error) {
                alert(xhr.responseText + '|\n' + status + '|\n' + error);
                $('#getStandard').attr('disabled', false);
            });
    });
    $('#add_segment').click(function(){
        var start = $('#start_segment').val(),
            end   = $('#end_segment').  val(),
            name  = $('#name_segment'). val();

        $.ajax({
            url: "ajax/addFiberSegment",
            type: "POST",
            data: "id_fiber=<?=$fiber_data["id_fiber"]?>&start=" + start + "&end=" + end + "&name=" + name
        })
            .success(function (data) {
                var str = " <tr id=\"segment_"+ data +"\"><td> " + data + "</td><td>" + start + "</td>" + "</td><td>" + end + "</td>"+
                    "</td><td>" + name + "</td>" +
                    "<td><div class=\"hidden-sm hidden-xs btn-group\"><button class=\"btn btn-xs btn-danger\" id=\"delete_"+
                    data + "\" > <i class=\"ace-icon fa fa-trash-o bigger-120\"></i></button></div></td></tr>" +
                    "<script> $('#delete_"+ data + "').click(function(){$.ajax({url: \"ajax/deleteFiberSegment/"+ data +"\"})" +
                    ".success(function () {  $('#segment_" + data + "').remove();}).fail(function (xhr, status, error) {" +
                    "alert(xhr.responseText +  status +  error);  $('#getStandard').attr('disabled', false) " +
                    " ;}) " +
                    " ;} " +
                    " ) "+
                    " <\/script> ";
                $('#segments_table').append(str);

            })
            .fail(function (xhr, status, error) {
                alert(xhr.responseText + '|\n' + status + '|\n' + error);
                $('#getStandard').attr('disabled', false);
            });
    });
    $('.delete_segment').click(function(){
        var id_fiber_segments = $(this).attr('id_fiber_segments');
        $.ajax({
            url: "ajax/deleteFiberSegment/"+id_fiber_segments})
            .success(function () {
                $('#segment_' + id_fiber_segments).remove();
            })
            .fail(function (xhr, status, error) {
                alert(xhr.responseText + '|\n' + status + '|\n' + error);
                $('#getStandard').attr('disabled', false);
            });
    });
</script>