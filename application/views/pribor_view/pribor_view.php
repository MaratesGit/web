<?php
$pd = array("0" => '0', "5" => '5', "10" => '10', "20" => '20', "50" => '50', "100" => '100', "300" => '300', "1000" => '1000', "3000" => '3000', "10000" => '10000');
$range = array("0" => '0', "250" => '250', "500" => '500', "1000" => '1000', "2500" => '2500', "5000" => '5000', "10000" => '10000', "20000" => '20000', "50000" => '50000', "100000" => '100000', "150000" => '150000', "250000" => '250000');
$wave = array("0" => '0', "1310" => '1310', "1550" => '1550', "1625" => '1625');
$ta = array("0" => '0', "5" => '5', "15" => '15', "30" => '30', "60" => '60', "180" => '180');
$input_data_fiber = 'class="form-control " style="height:80px;"';
$fiber_type= array('name' => 'fiber_type', 'value' => '1', 'checked' => true, 'class' => 'ace');

if (!$fiber_group == '') {
    foreach ($fiber_group as $fiber => $value_fg) {
        $fiber_gr[$value_fg['id_fiber_group']] = $value_fg['name_fiber_group'];
    }
}
if (!$pul_d == '') {
    foreach ($pul_d as $pulse => $value_puls) {
        $pls[$value_puls['value']] = $value_puls['value'];
    }
}
if (!$range_l == '') {
    foreach ($range_l as $rang => $value_rl) {
        $rl[$value_rl['value']] = $value_rl['value'];
    }
}
if (!$wave_l == '') {
    foreach ($wave_l as $wav => $value_wl) {
        $wl[$value_wl['value']] = $value_wl['value'];
    }
}
if (!$time_l == '') {
    foreach ($time_l as $time => $value_ta) {
        $ti[$value_ta['value']] = $value_ta['value'];
    }
}
if (!isset($fiber_i))
    $fiber_i = '';
if (!isset($pls))
    $pls = '';
if (!isset($rl))
    $rl = '';
if (!isset($wl))
    $wl = '';
if (!isset($ti))
    $ti = '';
if (!isset($valuepdd))
    $valuepdd = '';
if (!isset($valueranged))
    $valueranged = '';
if (!isset($valuepd))
    $valuepd = '';
if (!isset($valuerange))
    $valuerange = '';
if (!isset($wavel))
    $wavel = '';
if (!isset($timea))
    $timea = '';
if (!isset($add_param))
    $add_param = '';
if (!isset($add_param_opt))
    $add_param_opt = '';
?>

<div class="page-content-my">
    <!--    <div class="main-content">
            <div class="main-content-inner">-->
    <style>

        .ms-options-wrap,
        .ms-options-wrap * {
            box-sizing: border-box;
        }

        .ms-options-wrap > button:focus,
        .ms-options-wrap > button {
            position: relative;
            width: 100%;
            text-align: left;
            border: 1px solid #aaa;
            background-color: #fff;
            padding: 5px 20px 5px 5px;
            margin-top: 1px;
            font-size: 13px;
            color: #aaa;
            outline: none;
            white-space: nowrap;
        }

        .ms-options-wrap > button:after {
            content: ' ';
            height: 0;
            position: absolute;
            top: 50%;
            right: 5px;
            width: 0;
            border: 6px solid rgba(0, 0, 0, 0);
            border-top-color: #6688a6;
            margin-top: -3px;
        }

        .ms-options-wrap > .ms-options {
            position: absolute;
            left: 0;
            width: 100%;
            margin-top: 1px;
            margin-bottom: 20px;
            background: white;
            z-index: 2000;
            border: 1px solid #aaa;
        }

        .ms-options-wrap > .ms-options > .ms-search input {
            width: 100%;
            padding: 4px 5px;
            border: none;
            border-bottom: 1px groove;
            outline: none;
        }

        .ms-options-wrap > .ms-options .ms-selectall {
            display: inline-block;
            font-size: .9em;
            text-transform: lowercase;
            text-decoration: none;
        }
        .ms-options-wrap > .ms-options .ms-selectall:hover {
            text-decoration: underline;
        }

        .ms-options-wrap > .ms-options > .ms-selectall.global {
            margin: 4px 5px;
        }

        .ms-options-wrap > .ms-options > ul > li.optgroup {
            padding: 5px;
        }
        .ms-options-wrap > .ms-options > ul > li.optgroup + li.optgroup {
            border-top: 1px solid #aaa;
        }

        .ms-options-wrap > .ms-options > ul > li.optgroup .label {
            display: block;
            padding: 5px 0 0 0;
            font-weight: bold;
        }

        .ms-options-wrap > .ms-options > ul label {
            position: relative;
            display: inline-block;
            width: 100%;
            padding: 8px 4px;
            margin: 1px 0;
        }

        .ms-options-wrap > .ms-options > ul li.selected label,
        .ms-options-wrap > .ms-options > ul label:hover {
            background-color:#e5f1f9;
        }

        .ms-options-wrap > .ms-options > ul input[type="checkbox"] {
            margin-right: 5px;
            position: absolute;
            left: 0px;
            top: 7px;
        }
        ul,li { padding:0; list-style:none; }
        .label { color:#000; font-size:16px;}

        table.table tr,th{
            text-align: center;
        }
        table.table th{
            background-color:#f5f5f5;
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
            table-layout: fixed;        
            border-collapse: collapse;
            border-spacing: 0;
            box-sizing: border-box;
            display: table;
        }
        table.table-info th,
        table.table-info td{
            text-align: center;
        }
        table.table-info td > label, th > label{
            margin-top: 4px;
        }
        div.opto{
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
        .row_button{
            float: right;
            margin-top: 5px;
            margin-bottom: 2px;
            margin-right: 5px;
        }


        .table_my{
            border-top: none;
            width: 100%;
            table-layout: auto;
            margin: auto;
            border-collapse: collapse;
            border-spacing: 0;
            box-sizing: border-box;
            display: table;
            text-align: center;
        }
        .table_my td{
            padding: 2px;
        }

    </style>
    <div class="container-fluid" style="padding-left: 8px; padding-right: 8px;">
        <?php if (isset($error['error_']) && isset($error['error_text'])) { ?>
            <div class="alert alert-danger"  style="text-align: center; margin: 8px 8px 5px 8px;">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <strong> <i class="ace-icon fa fa-times"></i>
                    <?= $error['error_'] ?>
                </strong>
                <?= $error['error_text'] ?>
            </div>
        <?php } else if (isset($success['success_']) && isset($success['success_text'])) { ?> 
            <div class="alert alert-success"  style="text-align: center; margin: 8px 8px 5px 8px;">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <strong> 
                    <?= $success['success_'] ?>
                </strong>
                <?= $success['success_text'] ?>
            </div>
        <?php } ?> 
        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-left: 8px; padding-right: 8px;">	
            <div class="widget-box" style="margin-top: 9px">    
                <div class="widget-header widget-header-small" style="color:#555">
                    <h5 class="widget-title" style="font-weight: bold;"><i class=" fa fa-tasks"></i> &nbsp;Информация о приборе</h5>
                </div>
                <?= $add_param_opt ?>  
                <div class="panel-body" style="padding: 3px 5px 5px 5px;">

                    <div class="row">
                        <div class="col-lg-12 widget-container-col">
                            <!-- #section:custom/widget-box.options.transparent -->
                            <div class="widget-box transparent">
                                <div class="widget-header widget-header-small" style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                                    <i class="ace-icon fa fa-hdd-o"></i>&nbsp;
                                    <h6 class="widget-title" style="line-height: 5px; font-weight: bold;" >
                                        <?= $otdr_info['otdr_name'] ?> | IMEI:<?= $otdr_info['otdr_imei'] ?>
                                    </h6>
                                    <div class="widget-toolbar " style="padding: 0 0px 0 5px; margin-right: 5px;     line-height: 20px;">
                                        <a href="#" data-action="collapse" style="font-size: 12px; line-height: 20px;">
                                            <i class="ace-icon fa fa-chevron-up"></i></a>
                                    </div>

                                </div>
                                <?= $add_param ?>
                                <div class="hr hr32 hr-dotted" style="margin: 5px;"></div>
                                <div class="widget-body"     style="margin-top: 3px;"> 
                                    <div class="widget-main" style="padding: 3px 0px 2px 0px;">
                                        <table class="table-info" >
                                            <tbody>   
                                                <tr class="thin-border-bottom">
                                                    <?php foreach ($fiber_info as $ot => $vall): ?> 
                                                        <?php if ($vall['id_otdr'] == $otdr_info['id_otdr']): ?>
                                                            <?php if ($vall['fibers'] != NULL): ?>
                                                                <?php $td = 0;
                                                                foreach ($vall['fibers'] as $item => $name):
                                                                    ?>                        
                                                                    <td style="font-weight: bold;" id="<?= $name['id_fiber'] ?>">
                                                                        <span > <?= $name["fiber_name"] ?></span> <br>
                                                                        <?php if ($name['fiber_type'] == 't'): ?>
                                                                        <img style="margin-left: 3px;" src="styleace/images/alarm_green/alarm_green_light.png" alt="Все хорошо" width="46" height="46"> <br>
                                                                        <?php else: ?> 
                                                                        <img style="margin-left: 3px;" src="styleace/images/alarm_green/alarm_green_dark.png" alt="Все хорошо" width="46" height="46"> <br>
                                                                        <?php endif ?>
                                                                        <label>
                                                                            <input name="switch-field-<?= $name['id_fiber'] ?>" class="ace ace-switch ace-switch-4" type="checkbox">
                                                                            <span class="lbl" style="margin: 1px;"> </span>
                                                                        </label>
                                                                    </td>  
                                                                    <?php $td++;
                                                                    if ($td == 8)
                                                                        break;
                                                                    ?>    
            <?php endforeach ?>
        <?php else: ?>
                                                        <div class="alert alert-danger" style="text-align: center; margin-bottom: 8px;">
                                                            <button type="button" class="close" data-dismiss="alert">
                                                                <i class="ace-icon fa fa-times"></i>
                                                            </button>
                                                            <strong> <i class="ace-icon fa fa-times"></i>
                                                                Внимание!
                                                            </strong>
                                                            Оптическая линия у <b> <?= $otdr_info['otdr_name'] ?> </b> не обнаружена. 
                                                        </div>
                                                    <?php endif ?>
    <?php endif ?>
<?php endforeach ?> 
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> 
                        </div> <!-- widget-box.options.transparent -->
                        <!-- /section:custom/widget-box.options.transparent -->
                    </div>

                </div>	
            </div> <!--widget box-->

            <!-- Cписок волокн и тд -->   
            <div class="widget-box transparent" style="margin-top: 15px;">
                <div class="widget-header widget-header-small" style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                    <i class="ace-icon fa fa-pencil-square-o"></i>&nbsp;<h6 class="widget-title" style="line-height: 5px; font-weight: bold;">Список волокн и параметров измерений</h6>
                </div>

                <div class="widget-body">
                    <div class="widget-main padding-12 no-padding-left no-padding-right" style="padding-bottom:2px;">
                        <table class="table table-bordered" style="margin-bottom: 5px;">
                            <thead class="thin-border-bottom">
                                <tr>
                                    <th>
                                        № 
                                    </th>
                                    <th>
                                        Имя волокна 
                                    </th>
                                    <th>
                                        Длина волны
                                    </th>
                                    <th> 
                                        Длительность импульса
                                    </th>
                                    <th>
                                        Время накопления
                                    </th>
                                    <th>
                                        Диапазон по длине   
                                    </th>
                                    <th>
                                        Коэффициент преломления
                                    </th>
                                    <th>
                                        Расписание измерений    
                                    </th>
                                </tr>
                            </thead>
                            <tbody><?php $td_num = 1; foreach ($fiber_info as $tab => $vali): ?>
                                <?php if ($vali['id_otdr'] == $otdr_info['id_otdr']): ?>
                                         <?php if ($vali['fibers'] != NULL): ?>
                                    <?php  foreach ($vali['fibers'] as $item => $name): ?>
                                <tr>
                                    <td>
                                        <?= $td_num ?>
                                    </td>
                                    <td>
                                        <?= $name["fiber_name"] ?>
                                    </td>
                                    <td><?= $name["fiber_length"] ?>
                                    </td>
                                    <td>нет данных
                                    </td>
                                    <td>нет данных
                                    </td>
                                    <td>нет данных
                                    </td>
                                    <td><?= $name["gi"] ?>
                                    </td>
                                    <td>нет данных
                                    </td>
                                </tr>
                                            <?php $td_num++ ?>
                                        <?php endforeach ?>
                                <?php else: ?>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        нет данных
                                    </td>
                                    <td>нет данных
                                    </td>
                                    <td>нет данных
                                    </td>
                                    <td>нет данных
                                    </td>
                                    <td>нет данных
                                    </td>
                                    <td>нет данных
                                    </td>
                                    <td>нет данных
                                    </td>
                                </tr>
                                    <?php endif ?><?php endif ?>
                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- widget-boxtransparent -->  
            <!-- Информация о событии -->   
            <div class="widget-box transparent" style="margin-top: 15px;">
                <div class="widget-header widget-header-small" style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                    <i class="ace-icon fa fa-bell-o small"></i>&nbsp;<h6 class="widget-title" style="line-height: 5px; font-weight: bold;">Информация о событиях</h6>
                </div>
                <div class="widget-body">
                    <div class="widget-main padding-12 no-padding-left no-padding-right" style="padding-bottom:2px;">
                        <table class="table table-bordered ">
                            <thead class="thin-border-bottom">
                                <tr>
                                    <th>
                                        №
                                    </th>
                                    <th>
                                        Дата
                                    </th>
                                    <th>
                                        Событие 
                                    </th>
                                    <th> 
                                        Пользователь
                                    </th>
                                    <th>
                                        Уровень аварии
                                    </th>
                                    <th>
                                        Комментарий    
                                    </th>
                                    <th>
                                        Волокно
                                    </th>
                                    <th>
                                        Тест    
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>нет данных</td>
                                    <td>нет данных</td>
                                    <td>нет данных</td>
                                    <td>нет данных</td>
                                    <td>нет данных</td>
                                    <td>нет данных</td>
                                    <td>нет данных</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- widget-boxtransparent -->
        </div> <!-- widget-box.options.transparent -->

        <!-- Модальное окно начало -->
        <div id="my-modal-wiz" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div>
                        <div class="modal-header" style="padding: 10px;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-size: 22px;">&times;</button>
                            <h4 class="lighter blue no-margin">Добавление параметров рефлектометра <?= $otdr_info['otdr_name'] ?></h4>
                        </div>

                        <form method="post" action="otdrpage/add_param/<?= $otdr_info['id_otdr'] ?>" accept-charset="utf-8" enctype="multipart/form-data"> 
                            <div class="modal-body" style="padding: 5px 15px 5px 15px;">   
                                <table class="table_my">
                                    <tbody>
                                        <tr>
                                          
                                    <label style="font-weight: bold;"> Длительность импульса , nm </label>
                                        <?php echo form_multiselect('value[]', $pd, $pls, 'class = "multi"') ?>
                                    </tr><div class="hr hr-16 hr-dotted"></div>
                                    <tr>
                                    <label style="font-weight: bold;"> Диапазон, m </label>
                                        <?php echo form_multiselect('value_rg[]', $range, $rl, 'class = "multi"') ?>
                                    </tr><div class="hr hr-16 hr-dotted"></div>
                                    <tr>
                                    <label style="font-weight: bold;"> Длина волны , nm </label>
                                        <?php echo form_multiselect('value_wl[]', $wave, $wl, 'class = "multi"') ?>
                                    </tr><div class="hr hr-16 hr-dotted"></div>
                                    <tr>
                                    <label style="font-weight: bold;"> Время накопления </label>
                                        <?php echo form_multiselect('value_ta[]', $ta,$ti, 'class = "multi"') ?>
                                    </tr><div class="hr hr-16 hr-dotted"></div>
                  
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer" style="padding-bottom: 2px;">
                                <button data-bb-handler="success" type="submit" class="btn btn-sm btn-success">
                                    Сохранить 
                                </button>
                                <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                                    <font face="arial"> Закрыть</font>
                                </button></p>
                            </div> 
                    </form>
                    </div>
                </div>
            </div>
        </div>       
        <!-- Модальное окно конец -->   
        
        <!-- Модальное окно ОПТИКА начало --> 
        <div id="my-modal-opt" class="modal">
            <div class="modal-dialog" style="width:500px;">
                <div class="modal-content" style="position: absolute;">
                    <div>
                        <div class="modal-header" style="padding: 10px;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="font-size: 22px;">&times;</button>
                            <h4 class="lighter blue no-margin">Добавление опт.линии к <?= $otdr_info['otdr_name'] ?></h4>
                        </div>
                        <form method="post" action="otdrpage/add_optik_line/<?= $otdr_info['id_otdr'] ?>" class="form-horizontal" id="validation-form_" accept-charset="utf-8" enctype="multipart/form-data">    
                            <div class="modal-body" style="padding: 5px 15px 5px 15px;">
                                <div class="form-group" style="margin-bottom: 7px;">
                                    <label class="control-label col-xs-12 col-sm-5 no-padding-right">Наименование ОЛ:</label>
                                    <div class="col-xs-12 col-sm-7">
                                        <div class="clearfix">
                                            <input type="text" id="fiber_name" name="fiber_name" placeholder="ОЛ" class="col-xs-12 col-sm-12" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 2px;">
                                    <label class="control-label col-xs-12 col-sm-5 no-padding-right" >Группа ОЛ:</label>
                                    <div class="col-xs-12 col-sm-7">
                                        <?php echo form_dropdown("name_fiber_group", $fiber_gr, '','class="input-control" style="width: 100%;"'); ?>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 2px;">
                                    <label class="control-label col-xs-12 col-sm-5 no-padding-right" >Fiber_type:</label>
                                    <div class="col-xs-12 col-sm-7" style="margin-top: 7px;">
                                         <?php echo form_checkbox($fiber_type); ?><span class="lbl"> Светлое / Темное </span>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 7px;">
                                    <label class="control-label col-xs-12 col-sm-5 no-padding-right">Длина ОЛ:</label>
                                    <div class="col-xs-12 col-sm-7">
                                        <input type="number" id="fiber_length" name="fiber_length" class="col-xs-12 col-sm-12">
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 7px;">
                                    <label class="control-label col-xs-12 col-sm-5 no-padding-right">GI:</label>
                                    <div class="col-xs-12 col-sm-7">
                                        <div class="clearfix">
                                           <input type="number" id="gi" name="gi" class="col-xs-12 col-sm-12" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 7px;">
                                    <label class="control-label col-xs-12 col-sm-5 no-padding-right">Информация по ОЛ:</label>
                                    <div class="col-xs-12 col-sm-7">
                                         <?php echo form_textarea('fiber_info', $fiber_i, $input_data_fiber); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button data-bb-handler="success" type="submit" class="btn btn-sm btn-success">
                                    Добавить
                                </button>
                                <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                                    Закрыть
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Модальное окно конец --> 
                       <!-- Удаление прибора - модальное окно -->
<div id="my-modal-opt-del" class="modal fade" tabindex="-1">
    <div class="modal-dialog" style=" width: 650px;">
        <div class="modal-content">
            <div class="modal-header" style="padding: 10px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="lighter blue no-margin">Удаление ОЛ</h3>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" style="margin-bottom: 2px;">
                    <tbody>
                        <tr style="font-weight: bold">
                            <td>Имя ОЛ: </td>
                            <td>Длина ОЛ: </td>
                            <td>Fiber_type </td>
                            <td>GI </td>
                            <td></td>
                        </tr>
                     <?php foreach ($fiber_info as $fibers => $mod_name): ?> 
                        <?php if ($mod_name['id_otdr'] == $otdr_info['id_otdr']): ?>
                            <?php if ($mod_name['fibers'] != NULL): ?>
                        
                            <?php foreach ($mod_name['fibers'] as $fib => $mod_name_): ?>
                            <tr>
                                <td>
                                    <?= $mod_name_['fiber_name'] ?>
                                </td>
                                <td><?= $mod_name_['fiber_length'] ?></td>
                                <td>
                                    <?= $mod_name_['fiber_type'] ?>
                                </td>
                                <td>
                                    <?= $mod_name_['gi'] ?>
                                </td>
                                <td class="center">
                                    <div class="hidden-sm btn-group" style="width: 100%; color:red;">
                                    <?= anchor('otdrpage/del_optik_line/' . $mod_name_['id_fiber'] . '/' . $mod_name['id_otdr'] , '<button class="btn btn-white btn-danger btn-sm" style="border-width: 0px; width:100%; color: #cb2626 !important;">
                                    <i class="ace-icon fa fa-trash-o bigger-90"></i>Удалить
                                    </button>');
                                    ?>
                                </div>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-danger" style="text-align: center; margin-bottom: 8px;">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <i class="ace-icon fa fa-times"></i>
                                                </button>
                                                <strong> <i class="ace-icon fa fa-times"></i>
                                                    Внимание!
                                                </strong>
                                                Оптических линий у <b> <?= $otdr_info['otdr_name'] ?> </b> не найдено.
                                            </div>
                                    <?php endif ?>
                                <?php endif ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>						
            </div>
        </div> <!--/.modal-content -->
    </div>
</div>
        <script src="styleace/components/_mod/bootstrap-multiselect/jquery.multiselect.js"></script>
        <script src="styleace/components/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="styleace/components/autosize/dist/autosize.js"></script>
        <script src="styleace/components/jquery-validation/dist/jquery.validate.js"></script>
        <script src="styleace/assets/js/form_validation_ol.js"></script>
        
        <script type="text/javascript">
            $('.multi').multiselect({
                columns: 2,
                placeholder: 'Выберите параметры',
              
            });
        </script>
    </div>
</div> <!-- contetnt-->
<!--    </div>  main contetnt iner-->
</div> <!-- main contetnt-->
