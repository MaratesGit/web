<!--<link rel="stylesheet" href="styleace/assets/css/datepicker.css ">-->
<style>
    .page-content-my {
        margin-top: 5px;
        margin-bottom: 20px;
    }

</style>
<?php
$otdr_act = array('name' => 'otdr_active', 'value' => '1', 'checked' => true, 'class' => 'ace');
$otdr_cert = array('name' => 'otdr_cert', 'value' => '1', 'checked' => true, 'class' => 'ace');

if (!isset($poverka))
    $poverka = '';
if (!isset($add_otdr))
    $add_otdr = '';

function calendar($name, $value = '')
{
    $months = range(1, 12);
    $days = range(1, 31);
    $years = range(1961, 2099);
    $value = date("d.m.Y", time());
    echo
    "<div class='input-group' style='position:static;'>
                        <input class='form-control date-range-picker' id=$name name=$name data-date-format='dd-mm-yyyy' value='$value'>
                        <span class='input-group-addon'>
                             <i class='ace-icon fa fa-calendar'></i>
                        </span>
                </div>";
}

?>
<div class="page-content-my">
    <!--    <div class="main-content">
            <div class="main-content-inner">-->
    <style>
        table.table tr, th {
            text-align: center;
        }

        table.table th {
            background-color: #f5f5f5;
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

        .modal-dialog {
            width: 450px;

        }

        .form-group {
            margin-bottom: 5px;
        }

        .table_my {
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

        .table_my td {
            padding: 2px;
        }

    </style>
    <div class="container-fluid" style="padding-left: 8px; padding-right: 8px;">
        <?php
        if (isset($error['error_']) && isset($error['error_text'])) { ?>
            <div class="alert alert-danger" style="text-align: center; margin: 8px 8px 5px 8px;">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <strong> <i class="ace-icon fa fa-times"></i>
                    <?= $error['error_'] ?>
                </strong>
                <?= $error['error_text'] ?>
            </div>
        <?php } else if (isset($success['success_']) && isset($success['success_text'])) { ?>
            <div class="alert alert-success" style="text-align: center; margin: 8px 8px 5px 8px;">
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
                <?= $add_otdr ?>
                <div class="panel-body" style="padding: 0px 5px 5px 5px;">

                    <div class="row">
                        <div class="col-lg-12 widget-container-col">
                            <!-- #section:custom/widget-box.options.transparent -->

                            <?php foreach ($fiber_info as $otdr => $head_name): ?>
                                <div class="widget-box transparent">
                                    <div class="widget-header widget-header-small"
                                         style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                                        <i class="ace-icon fa fa-hdd-o"></i>&nbsp;
                                        <h6 class="widget-title" style="line-height: 5px; font-weight: bold;">
                                            <?= $head_name['otdr_name'] ?> | IMEI:<?= $head_name['otdr_imei'] ?>
                                        </h6>
                                        <div class="widget-toolbar "
                                             style="padding: 0 0px 0 5px; margin-right: 5px;     line-height: 20px;">
                                            <a href="#" data-action="collapse"
                                               style="font-size: 12px; line-height: 20px;">
                                                <i class="ace-icon fa fa-chevron-up"></i></a>
                                        </div>
                                    </div>
                                    <div class="widget-body">
                                        <div class="widget-main" style="padding: 20px 0px 5px 0px;">
                                            <table class="table-info">
                                                <tbody>
                                                <tr class="thin-border-bottom">
                                                    <?php foreach ($fiber_info as $ot => $vall): ?>
                                                        <?php if ($vall['id_otdr'] == $head_name['id_otdr']): ?>
                                                            <?php if ($vall['fibers'] != NULL): ?>
                                                                <?php $td = 0;
                                                                foreach ($vall['fibers'] as $item => $name): ?>
                                                                    <td style="font-weight: bold;"
                                                                        id="<?= $name['id_fiber'] ?>">
                                                                        <span> <?= $name["fiber_name"] ?></span> <br>
                                                                        <img style="margin-left: 3px;"
                                                                             src="styleace/images/alarm_green/alarm_green_light.png"
                                                                             alt="Все хорошо" width="46" height="46">
                                                                        <br>
                                                                        <label>
                                                                            <input
                                                                                name="switch-field-<?= $name['id_fiber'] ?>"
                                                                                id="fiberSwitch_<?= $name['id_fiber'] ?>"
                                                                                class="ace ace-switch ace-switch-4 fiberSwitch"
                                                                                type="checkbox"

                                                                            >
                                                                            <span class="lbl"
                                                                                  style="margin: 1px;"> </span>
                                                                        </label>
                                                                    </td>
                                                                    <?php $td++;
                                                                    if ($td == 8) break; ?>
                                                                <?php endforeach ?>
                                                            <?php else: ?>
                                                                <div class="alert alert-danger"
                                                                     style="text-align: center; margin-bottom: 8px;">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="alert">
                                                                        <i class="ace-icon fa fa-times"></i>
                                                                    </button>
                                                                    <strong> <i class="ace-icon fa fa-times"></i>
                                                                        Внимание!
                                                                    </strong>
                                                                    Оптическая линия у
                                                                    <b> <?= $head_name['otdr_name'] ?> </b> не
                                                                    обнаружена. "Инфо о приборе" -> "Добавить ОЛ"
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
                            <?php endforeach ?>

                        </div> <!-- widget-box.options.transparent -->
                        <!-- /section:custom/widget-box.options.transparent -->
                    </div>
                </div>
            </div> <!--widget box-->
            <!-- Информация о событии -->
            <div class="widget-box transparent" style="margin-top: 15px;">
                <div class="widget-header widget-header-small"
                     style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                    <i class="ace-icon fa fa-bell-o small"></i>&nbsp;<h6 class="widget-title"
                                                                         style="line-height: 5px; font-weight: bold;">
                        Информация о событиях</h6>
                </div>
                <div class="widget-body">
                    <div class="widget-main padding-12 no-padding-left no-padding-right">
                        <table class="table table-bordered " style="margin-bottom: 2px;">
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
                                    <td><?php if($alarm['ackstatus'] == 't')
                                            echo "Обработано";
                                        else
                                            echo "Не обработано"; ?></td>
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
                    </div>
                </div>
            </div><!-- widget-boxtransparent -->

        </div>
    </div>
</div> <!-- contetnt-->
<!-- Добавление прибора - модальное окно -->


<div id="my-modal" class="modal fade " tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="padding: 10px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="lighter blue no-margin">Добавление рефлектометра</h3>
            </div>
            <!--action="mainpage/add_otdr/"-->
            <form method="post" action="mainpage/add_otdr/" class="form-horizontal" id="validation-form"
                  accept-charset="utf-8" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-5 no-padding-right">Наименование прибора:</label>
                        <div class="col-xs-12 col-sm-7">
                            <div class="clearfix">
                                <input type="text" id="otdr_name" name="otdr_name" class="col-xs-12 col-sm-12"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-5 no-padding-right">IMEI прибора:</label>
                        <div class="col-xs-12 col-sm-7">
                            <div class="clearfix">
                                <input type="text" id="otdr_imei" name="otdr_imei" class="col-xs-12 col-sm-12"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-5 no-padding-right">Otdr_active:</label>
                        <div class="col-xs-12 col-sm-7" style="margin-top: 7px;">
                            <div class="clearfix">
                                <?php echo form_checkbox($otdr_act); ?><span class="lbl"> true / false </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-5 no-padding-right">Дата поверки:</label>
                        <div class="col-xs-12 col-sm-7">
                            <?php calendar('otdr_poverka', $poverka); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-5 no-padding-right">Otdr_ports_count:</label>
                        <div class="col-xs-12 col-sm-7">
                            <div class="clearfix">
                                <input type="number" id="otdr_ports_count" name="otdr_ports_count"
                                       class="col-xs-12 col-sm-12"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-sm-5 no-padding-right">Otdr_active:</label>
                        <div class="col-xs-12 col-sm-7" style="margin-top: 7px;">
                            <div class="clearfix">
                                <?php echo form_checkbox($otdr_cert); ?><span class="lbl"> true / false </span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer" style="padding-bottom: 12px;">
                    <button data-bb-handler="success" id="save" type="submit" name="submit_otdr_form"
                            class="btn btn-sm btn-success">
                        Добавить
                    </button>
                    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                        <font face="arial"> Закрыть</font>
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>    <!-- /.modal-dialog -->
<!-- Удаление прибора - модальное окно -->
<div id="my-modal_del" class="modal fade" tabindex="-1">
    <div class="modal-dialog" style=" width: 650px;">
        <div class="modal-content">
            <div class="modal-header" style="padding: 10px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="lighter blue no-margin">Удаление рефлектометра</h3>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" style="margin-bottom: 2px;">
                    <tbody>
                    <tr style="font-weight: bold">
                        <td>Имя прибора:</td>
                        <td>IMEI прибора:</td>
                        <td>Otdr_active</td>
                        <td>Otdr_ports_count</td>
                        <td>Otdr_cert</td>
                        <td>Дата поверки</td>
                        <td></td>
                    </tr>
                    <?php foreach ($fiber_info as $otdr => $mod_name): ?>
                        <tr>
                            <td>
                                <?= $mod_name['otdr_name'] ?>
                            </td>
                            <td><?= $mod_name['otdr_imei'] ?></td>
                            <td>
                                <?= $mod_name['otdr_active'] ?>
                            </td>
                            <td>
                                <?= $mod_name['otdr_ports_count'] ?>
                            </td>
                            <td>
                                <?= $mod_name['otdr_cert'] ?>
                            </td>
                            <td>
                                <?= $mod_name['otdr_poverka'] ?>
                            </td>
                            <td class="center">
                                <div class="hidden-sm btn-group" style="width: 100%; color:red;">
                                    <?= anchor('mainpage/delete_otdr/' . $mod_name['id_otdr'], '<button class="btn btn-white btn-danger btn-sm" style="border-width: 0px; width:100%; color: #cb2626 !important;">
                                    <i class="ace-icon fa fa-trash-o bigger-90"></i>Удалить
                                    </button>');
                                    ?>
                                </div>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div> <!--/.modal-content -->
    </div>
</div>    <!-- /.modal-dialog_del -->
<!--<script src="styleace/components/jquery-validation/dist/jquery.validate.min.js"></script>-->
<script src="styleace/components/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="styleace/components/autosize/dist/autosize.js"></script>
<script src="styleace/components/jquery-validation/dist/jquery.validate.js"></script>
<script src="styleace/assets/js/form_validation.js"></script>

<script type="text/javascript">

    $('#otdr_poverka').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    
</script>
</div> <!-- main contetnt-->
