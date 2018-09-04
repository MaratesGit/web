<?php
if (!$fiber_group == '') {
    foreach ($fiber_group as $fiber => $value_fg) {
        $fiber_gr[$value_fg['id_fiber_group']] = $value_fg['name_fiber_group'];
    }
}
$id_etalon = 0;
$id = $fiber_data["id_fiber"];
$id_fiber = 'class="ajax_fiber select_my"' . " " . "id_fiber=$id" . " " . 'id=id_fiber_group' . " " . 'style="margin-bottom: 4px;"';
?>
<style>
    .page-content-my {
        margin-top: 5px;
        margin-bottom: 20px;
    }

</style>

<div class="page-content-my">
    <style>
        .flot-chart-bar {
            margin-right: 100px;
            margin-left: 100px;
            height: 100%;
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

        .infobox-stat {
            display: inline-block;
            width: 160px;
            height: 35px;
            color: #555;
            text-align: center;
            position: static;
        }

        .infobox-stat > .infobox-datastat {
            display: inline-block;
            border-width: 0;
            border-top-width: 0;
            font-size: 12px;
            text-align: left;
            line-height: 13px;
            min-width: 100px;
            padding-left: 3px;
            position: relative;
            top: 0;
        }

        .row_button {
            float: right;
            margin-top: 5px;
            margin-bottom: 2px;
            margin-right: 5px;
        }

        .row_button_et {
            text-align: center;
            margin-top: 25px;
            margin-bottom: 2px;
            margin-right: 5px;
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

        select.select_my {
            height: 21px;
            padding: 1px 2px;
            width: 150px;
            color: #1083cf;
            font-size: 13px;
        / / font-weight: bold;
        }

        input.select_my_left {
            padding-left: 4px;
            height: 21px;
            padding: 1px 2px;
            width: 90px;
            font-size: 13px;
            margin-top: 3px;
            text-align: center;
            font-size: 13px;
        }

        input[disabled] {
            background-color: #fff !important;
        }

        input::-webkit-input-placeholder {
            color: #1083cf;
        }

        input::-moz-placeholder {
            color: #1083cf;
        }

        .line_my {
            margin: 8px 5px;
            display: block;
            height: 0;
            overflow: hidden;
            font-size: 0;
            border-width: 1px 0 0 0;
            border-top: 4px solid #6fb3e0;
            border-top-color: rgb(111, 179, 224);
            border-radius: 4px;
        }

        .divider-my {
            height: 1px;
            margin: 3px 0;
            overflow: hidden;
            background-color: #f4f4f4;
        }
    </style>
    <div class="container-fluid" style="padding-left: 8px; padding-right: 8px;">
        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-left: 8px; padding-right: 8px;">
            <div class="widget-box" style="margin-top: 9px">
                <div class="widget-header widget-header-small" style="color:#555; ">
                    <h5 class="widget-title" style="font-weight: bold;"><i class=" fa fa-tasks"></i>
                        &nbsp;<?= $fiber_data["fiber_name"] ?></h5>
                </div>
                <div class="row" style="margin-right: 0px;">
                    <div class="row_button">
                        <?php if ($id_etalon == 0) { ?>
                            <a href="optikainfo/etaloninfo/<?= $fiber_data['id_fiber'] ?>">
                                <button class="btn btn-xs btn-info bigger"
                                        style="border-radius: 4px; line-height: 14px;">
                                    Создать эталон
                                </button>
                            </a>
                        <?php } else { ?>
                            <a href="optikainfo/etaloninfo/<?= $fiber_data['id_fiber'] ?>">
                                <button class="btn btn-xs btn-info bigger"
                                        style="border-radius: 4px; line-height: 14px;">
                                    Перейти к эталону
                                </button>
                            </a>
                        <?php } ?>
                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-xs btn-info bigger dropdown-toggle"
                                    aria-expanded="false"
                                    style="border-width: 3px;border-radius: 4px; line-height: 14px;">
                                Рефлектограмма
                                <span class="ace-icon fa fa-caret-down icon-on-right"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-info dropdown-menu-right">
                                <li>
                                    <a href="#"><span class="msg-time">
                                        <i class="ace-icon fa fa-clock-o"></i>
                                        <span> 06:20:21 15-12-2016</span>
                                        </span></a>
                                </li>
                                <li class="divider-my"></li>
                                <li>
                                    <a href="#"><span class="msg-time">
                                        <i class="ace-icon fa fa-clock-o"></i>
                                        <span> 06:20:21 15-12-2016</span>
                                        </span></a>
                                </li>
                                <li class="divider-my"></li>
                                <li>
                                    <a href="#"><span class="msg-time">
                                        <i class="ace-icon fa fa-clock-o"></i>
                                        <span> 06:20:21 15-12-2016</span>
                                        </span></a>
                                </li>
                                <li class="divider-my"></li>
                                <li>
                                    <a href="#"><span class="msg-time">
                                        <i class="ace-icon fa fa-clock-o"></i>
                                        <span> 06:20:21 15-12-2016</span>
                                        </span></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-body" style="padding: 0px 0px 5px 0px;">
                    <div class="row-fluid">
                        <div class="col-lg-4" style="padding: 0px 5px;">
                            <!-- #section:custom/widget-box.options.transparent -->
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-small"
                                     style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                                    <h6 class="widget-title" style="line-height: 5px; font-weight: bold;">Параметры
                                        эталонной рефлектограммы</h6>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main" style="padding: 5px;">
                                        <?php if ($id_etalon == 0) { ?>
                                            <div class="row_button_et">
                                                <span class="lbl" style="color: #1083cf">Отсутствует эталонная рефлектограмма &nbsp;</span>
                                            </div>
                                        <?php } else { ?>
                                            <table class="table-param" p>
                                                <tbody>
                                                <tr style="vertical-align: baseline;">
                                                    <td class="width_td_left">
                                                        <span class="lbl">Имя шаблона: &nbsp;</span>
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="нет данных"
                                                               class="input-medium select_my_left" disabled> &nbsp;

                                                    </td>
                                                    <td>
                                                        <span class="lbl">Дл. волны: &nbsp;</span>
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="нет данных"
                                                               class="input-medium select_my_left" disabled> &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="lbl">Дл. импульса: &nbsp;</span>
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="нет данных"
                                                               class="input-medium select_my_left" disabled> &nbsp;
                                                    </td>
                                                    <td class="width_td_left">
                                                        <span class="lbl">Вр. накопления:</span>
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="нет данных"
                                                               class="input-medium select_my_left" disabled> &nbsp;
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="lbl">Диап. по длине: &nbsp;</span>
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="нет данных"
                                                               class="input-medium select_my_left" disabled> &nbsp;
                                                    </td>
                                                    <td>
                                                        <span class="lbl">Период: &nbsp;</span>
                                                    </td>
                                                    <td>
                                                        <input type="text" placeholder="нет данных"
                                                               class="input-medium select_my_left" disabled> &nbsp;
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div> <!-- widget-box.options.transparent -->
                        </div> <!-- col-lg-4 -->
                        <div class="col-lg-8" style="padding: 0px 5px;">
                            <!-- #section:custom/widget-box.options.transparent -->
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-small"
                                     style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                                    <h6 class="widget-title" style="line-height: 5px; font-weight: bold;">
                                        Рефлектометрический модуль: <?= $fiber_data["otdr_name"] ?></h6>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main" style="padding: 5px;">
                                        <table class="table-ref">
                                            <tbody>
                                            <tr>
                                                <td class="width_td">
                                                    <dd>Опт. линия:</dd>
                                                </td>
                                                <td>
                                                    <span
                                                        style="color:#1083cf; ">ОЛ№<?= $fiber_data["id_fiber"] ?></span>
                                                </td>
                                                <td class="width_td">
                                                    <span class="lbl">Наименование: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <label style="margin-bottom: 4px;"><input type="text"
                                                                                              class="ajax_fiber input_value input-medium"
                                                                                              value="<?= $fiber_data["fiber_name"] ?>"
                                                                                              id="fiber_name"
                                                                                              id_fiber="<?= $fiber_data["id_fiber"] ?>"
                                                                                              style="color:#1083cf; font-size: 13px;">
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="lbl">Описание волокна: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <label style="margin-bottom: 4px;"><input type="text"
                                                                                              class="ajax_fiber input_value input-medium"
                                                                                              value="<?= $fiber_data["fiber_info"] ?>"
                                                                                              id="fiber_info"
                                                                                              id_fiber="<?= $fiber_data["id_fiber"] ?>"
                                                                                              style="color:#1083cf; font-size: 13px;">

                                                    </label>
                                                </td>
                                                <td>
                                                    <span class="lbl">Коэфф. преломл.: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <label style="margin-bottom: 4px;"><input type="text"
                                                                                              class="ajax_fiber input_value input-medium"
                                                                                              value="<?= $fiber_data["gi"] ?>"
                                                                                              id="gi"
                                                                                              id_fiber="<?= $fiber_data["id_fiber"] ?>"
                                                                                              style="color:#1083cf; font-size: 13px;">

                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="lbl">Дл. линии (м): &nbsp;</span>
                                                </td>
                                                <td>
                                                    <label style="margin-bottom: 4px;"><input type="text"
                                                                                              class="ajax_fiber input_value input-medium"
                                                                                              value="<?= $fiber_data["fiber_length"] ?>"
                                                                                              id="fiber_length"
                                                                                              id_fiber="<?= $fiber_data["id_fiber"] ?>"
                                                                                              style="color:#1083cf; font-size: 13px;">
                                                    </label>
                                                </td>
                                                <td>
                                                    <span class="lbl">Тип линии: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <?php if ($fiber_data["fiber_type"] == 't'): ?>
                                                        <select class="ajax_fiber select_my" id="fiber_type"
                                                                id_fiber="<?= $fiber_data["id_fiber"] ?>"
                                                                style="margin-bottom: 4px;">
                                                            <option value="t">светлая</option>
                                                            <option value="f">темная</option>
                                                        </select>
                                                    <?php else: ?>
                                                        <select class="ajax_fiber select_my" id="fiber_type"
                                                                id_fiber="<?= $fiber_data["id_fiber"] ?>"
                                                                style="margin-bottom: 4px;">
                                                            <option value="f">темная</option>
                                                            <option value="t">светлая</option>
                                                        </select>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="lbl">Количество точек апроксимации: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <label style="margin-bottom: 4px;"><input type="text"
                                                                                              class="ajax_fiber input_value input-medium"
                                                                                              value="<?= $fiber_data["aproximation_points"] ?>"
                                                                                              id="aproximation_points"
                                                                                              id_fiber="<?= $fiber_data["id_fiber"] ?>"
                                                                                              style="color:#1083cf; font-size: 13px;">
                                                    </label>
                                                </td>
                                                <td>
                                                    <span class="lbl">Группа: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <?php echo form_dropdown("name_fiber_group", $fiber_gr, $fiber_data["id_fiber_group"], $id_fiber); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="lbl">Режим теста: &nbsp;</span>
                                                </td>
                                                <td>
                                                    <select class="select_my" style="margin-bottom: 4px;"">
                                                    <option value="AL">Активный</option>
                                                    <option value="AK">Мягкий</option>
                                                    <option value="AZ">Не активный</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- widget-box.options.transparent -->
                        </div> <!-- col-lg-8 -->
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

                    <div class="row_param" style="padding: 0px 5px;">

                        <!-- #section:custom/widget-box.options.transparent -->
                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-small"
                                 style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                                <h6 class="widget-title" style="line-height: 5px; font-weight: bold;">
                                    Углы сравнения рефлектограммы</h6>
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
                                                <div class="flot-chart-content" id="alfa-line"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- widget-box.options.transparent -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h6 class="widget-title" style="line-height: 5px; font-weight: bold;">
                                    Углы по отрезкам</h6>
                                <?php foreach ($segments_alfas as $segment):?>
                                <label class="col-lg-8"><?=$segment['name']?></label>
                                <label class="col-lg-4"><?=$segment['alfa']?></label>
                                <?php endforeach?>
                            </div>
                        </div>
                    </div> <!--row-param-->

                    <div class="row_param" style="padding: 0px 5px;">
                        <!-- #section:custom/widget-box.options.transparent -->
                        <div class="widget-box transparent">
                            <div class="widget-body">
                                <div class="widget-main" style="padding: 0px;">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs" id="myTab">
                                            <li class="active">
                                                <a data-toggle="tab" href="#event" aria-expanded="true">
                                                    <i class="ace-icon fa fa-bullhorn bigger-110"></i>
                                                    События
                                                </a>
                                            </li>

                                            <li class="">
                                                <a data-toggle="tab" href="#param" aria-expanded="false">
                                                    <i class="ace-icon fa fa-cube bigger-110"></i>
                                                    Параметры
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="tab-content" style="padding:0px;">
                                        <div id="event" class="tab-pane fade active in">
                                            <div class="widget-main" style="margin-top: 12px; padding:0px;">
                                                <table class="table table-bordered ">
                                                    <thead class="thin-border-bottom">
                                                    <tr>
                                                        <th>№          </th>
                                                        <th>Пользователь</th>
                                                        <th>Событие     </th>
                                                        <th>Волокно</th>
                                                        <th>Время обнаружения аварии</th>
                                                        <th>Время последнего изменения аварии</th>
                                                        <th>Статус события</th>
                                                        <th>Состояние волокна</th>
                                                        <th>№ трассировки</th>
                                                        <th>Затухание</th>
                                                        <th>Расстояние до события</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($alarms as $alarm): ?>
                                                        <tr>
                                                            <td><?=$alarm['id_alarm']?></td>
                                                            <td><?=$alarm['user_name']?></td>
                                                            <td>
                                                                <?php
                                                                switch ($alarm['alarm_type']){
                                                                    case 1:
                                                                        echo '<img src="styleace/images/alarm_yellow_zatux.png" alt="Затухание" width="22" height="22"><span>Затухание</span>';
                                                                        break;
                                                                    case 2:
                                                                        echo '<img src="styleace/images/alarm_red_obriv.png" alt="Обрыв" width="22" height="22"><span>Обрыв</span>';
                                                                        break;
                                                                    case 3:
                                                                        echo '<img src="styleace/images/alarm_orange_new_pick.png" alt="Пик" width="22" height="22"><span>Пик</span>';
                                                                        break;
                                                                    case 4:
                                                                        echo '<img src="styleace/images/alarm_red_dlin.png" alt="Линия отсутствует на участке" width="22" height="22"><span>Линия отсутствует на участке</span>';
                                                                        break;

                                                                } ?>


                                                            </td>
                                                            <td><?=$alarm['fiber_name']?></td>
                                                            <td><?=$alarm['alarm_start']?></td>
                                                            <td><?=$alarm['statuschanged']?></td>
                                                            <td><?php if($alarm['ackstatus'] == 't') {
                                                                    echo "Обработано";
                                                                }else {
                                                                    echo '<div class="btn info alarm_rest" id_alarm='.$alarm['id_alarm'].' >Сбросить</div>';
                                                                }?></td>
                                                            <td><?php
                                                                switch ($alarm['fiber_status']) {
                                                                    case 1:
                                                                        echo "Вкл";
                                                                        break;
                                                                    case 0:
                                                                        echo "Выкл";
                                                                        break;
                                                                }?></td>
                                                            <td><?=$alarm['id_trace']?></td>
                                                            <td><?=$alarm['dB']?></td>
                                                            <td><?php printf("%10.2f", $alarm['point'])?></td>
                                                        </tr>
                                                    <?php endforeach ?>

                                                    </tbody>
                                                </table>
                                            </div> <!-- widget-main -->
                                        </div> <!-- EVENT -->
                                        <div id="param" class="tab-pane fade">
                                            <div class="row" style="margin-right: 0px;">
                                                <div class="row_button_foot">
                                                    <label>
                                                        Режим мониторинга
                                                        <input
                                                            name="switch-field-<?= $fiber_data['id_fiber'] ?>"
                                                            id="fiberSwitch_<?= $fiber_data['id_fiber'] ?>"
                                                            class="ace ace-switch ace-switch-4 fiberSwitch"
                                                            type="checkbox"
                                                        <?= $schedule["enabled"]?"checked":""?>
                                                        >
                                                                            <span class="lbl"
                                                                                  style="margin: 1px;"> </span>
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <table class="table-ref col-lg-12">
                                                        <tbody>
                                                        <tr>
                                                            <td class="width_td_left_bot col-lg-4">
                                                                <dd>Нименование измерения</dd>
                                                            </td>
                                                            <td class="col-lg-8">
                                                                <input type="text" class="input_value_schedule" id="schedule_name" value="<?=$schedule["name"]?>"
                                                                       >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="width_td_left_bot col-lg-4">
                                                                <dd>Минимальный интервал между измерениями</dd>
                                                            </td>
                                                            <td class="col-lg-8" >
                                                                <input type="text" class="input_value_schedule" id="schedule_interval" value="<?=$schedule["interval"]?>"
                                                                       >&nbsp;микро секунд
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-lg-3"></div>
                                            </div> <!-- row-fluid -->
                                        </div> <!-- PARAM -->
                                    </div> <!-- TAB content -->
                                </div>
                            </div> <!-- W-body -->
                        </div> <!--widget box-->
                    </div> <!--row-param-->
                </div> <!-- panel-body-->

            </div> <!-- W-BOX-1 -->
        </div> <!-- col-lg-12 -->
    </div> <!-- container-fluid -->

</div>    <!-- CONTENT-MY-->
<script src="styleace/components/Flot/excanvas.js"></script>
<script src="styleace/components/Flot/jquery.flot.js"></script>
<script src="styleace/components/Flot/jquery.flot.pie.js"></script>
<script src="styleace/components/Flot/jquery.flot.resize.js"></script>
<script src="styleace/components/Flot/jquery.flot.time.js"></script>
<script src="styleace/components/Flot/jquery.flot.categories.js"></script>
<script src="styleace/components/Flot/jquery.flot.navigate.js"></script>
<script src="styleace/components/Flot/jquery.flot.canvas.js"></script>

<script>

    $('.ajax_fiber').change(function () {
        spisok = $(this).val();
        name = $(this).attr('id');
        //  arr = name.split('_');
        id_fiber = $(this).attr('id_fiber');
        $.ajax({
            type: "post",
            url: "Ajax/ajax_fiber_property/" + name + "/" + id_fiber,
            data: "spisok=" + spisok,
            response: 'text',
            dataType: 'text'
        }).success(function ($data) {

        })
            .fail(function (xhr, status, error) {
                alert(xhr.responseText + '|\n' + status + '|\n' + error);
            });
    });


    $('.alarm_rest').click(function () {
        //  arr = name.split('_');
        var al = this;
        id_alarm = $(this).attr('id_alarm');
        $.ajax({
            type: "get",
            url: "Ajax/restAlarm/" + id_alarm
        }).success(function ($data) {
            $(al).parent()[0].html('Обработано');
        })
            .fail(function (xhr, status, error) {
                alert(xhr.responseText + '|\n' + status + '|\n' + error);
            });
    });

    $('.fiberSwitch').change(function () {
        var idFiberSwitch = $(this).attr('id');
        idFiberSwitch = idFiberSwitch.split('_');
        var checkFiberSwitch = $(this).prop("checked");
        $.ajax({
            url:"ajax/fiberMonitoringOff/" + idFiberSwitch[1] + "/" + checkFiberSwitch
        })
            .success(function(data) {

                alert(data?"Мониторинг линии включен":'Мониторинг линии отключен');
            })
    });

    function show() {
        $.ajax({
            url: 'ajax/getReflectogramm/<?=$id?>',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var data_refl = data;
                $.ajax({
                    url: 'ajax/getAlfaCompare/<?=$id?>',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $.plot($("#line-chart"), data_refl, {
                            grid: {
                                borderWidth: 1,
                                minBorderMargin: 20,
                                labelMargin: 10,
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
                        $.plot($("#alfa-line"), data, {
                            grid: {
                                borderWidth: 1,
                                minBorderMargin: 20,
                                labelMargin: 10,
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
                                zoomRange: [-1000, 1000],
                                panRange: [-1000, 1000]
                            },
                            zoom: {
                                interactive: true

                            },
                            pan: {
                                interactive: true
                            }
                        });
                        setTimeout('show()', 25000);
                    }
                });


            }
        });
    }
    $(function () {
        show();

    });
    /*
     * Custom Label formatter
     * ----------------------
     */
    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
            + label
            + "<br>"
            + Math.round(series.percent) + "%</div>";
    }
</script>
</div> <!-- main contetnt-->
