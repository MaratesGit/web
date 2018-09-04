<style>
    .page-content-my{
        margin-top: 5px;
        margin-bottom: 20px;
    } 
    
</style>

<div class="page-content-my">
<!--    <div class="main-content">
        <div class="main-content-inner">-->
    <style>
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
            margin-bottom: 20px;
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
        
    </style>
    <div class="container-fluid" style="padding-left: 8px; padding-right: 8px;">
    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-left: 8px; padding-right: 8px;">	
 	<div class="widget-box" style="margin-top: 9px">    
            <div class="widget-header widget-header-small" style="color:#555">
                 <h5 class="widget-title" style="font-weight: bold;"><i class=" fa fa-tasks"></i> &nbsp;Информация о событиях</h5>
            </div>
            <div class="panel-body" style="padding: 5px;">
                        <div class="row">
                            <div class="col-lg-12 widget-container-col">
                                
    <!-- Информация о событии -->   
                    <div class="widget-box transparent" style="margin-top: 15px;">
                                    <div class="widget-header widget-header-small" style="border-top: 3px solid #6fb3e0; border-radius: 4px;background: #f0f0f0; color:black; min-height: 20px; padding-left: 5px;">
                                            <i class="ace-icon fa fa-bell-o small"></i>&nbsp;<h6 class="widget-title" style="line-height: 5px; font-weight: bold;">Логи событий</h6>
                                    </div>
<!--                                    <div class="widget-header widget-header-flat">
                                        <i class="ace-icon fa fa-bell-o"></i>
                                        <h5 class="widget-title lighter" style="font-weight: bold;">Информация о событиях</h5>
                                        <div class="widget-toolbar ">
                                            <a href="#" data-action="collapse">
                                                <i class="ace-icon fa fa-chevron-up"></i></a>
                                        </div>
                                    </div>-->
                                    <div class="widget-body">
                                        <div class="widget-main padding-12 no-padding-left no-padding-right">
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
                                                            }else{
                                                                    echo "Не обработано"; 
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
                                            </div>
					</div>
                                    </div><!-- widget-boxtransparent -->
                                
                                </div> <!-- widget-box.options.transparent -->

                                <!-- /section:custom/widget-box.options.transparent -->
                            </div>

                        </div>	

                </div> <!--widget box-->
        </div>
</div>
</div> <!-- contetnt-->

<!--    </div>  main contetnt iner-->
</div> <!-- main contetnt-->
