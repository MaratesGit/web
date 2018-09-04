<?php 
    $pd = $system['ssh_man'];
    $pds = $system['ssh_work'];
        if($pd == 'f'){
            $ssh_man = array("f" => 'Выключить', "t" => 'Включить');
        } else {
            $ssh_man = array("t" => 'Включить', "f" => 'Выключить');
        }
        if($pds == 'f'){
            $ssh = array("f" => 'Выключить', "t" => 'Включить');
        } else {
            $ssh = array("t" => 'Включить', "f" => 'Выключить');
        }
?>    
<style>
    .page-content-my{
        margin-top: 5px;
        margin-bottom: 20px;
    } 
    .table{
        table-layout: auto; 
    }
    table.table tr,th{
        text-align: center;

    }
    table.table th{

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
    .table-network{
        table-layout: auto;
        border: none;
        width: 400px;
        max-width: 70%;
        margin-bottom: 20px;
    }
    .alert{
        margin-bottom: 5px;
        padding: 10px;
    }
</style>

<div class="page-content-my">
            <div class="container-fluid" style="padding-left: 8px; padding-right: 8px;">
                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-left: 8px; padding-right: 8px;">	
                    <div class="widget-box" style="margin-top: 9px">    
                        <div class="widget-header widget-header-small" style="color:#555">
                            <h5 class="widget-title" style="font-weight: bold;"><i class="fa fa-cog" style="margin-top: 8px;"></i> Информация о системе </h5>
<!--                            <span class="widget-toolbar" style="line-height: 31px;">
                                                     <a href="#" data-action="collapse">
                                                         <i class="ace-icon bigger-130 fa fa-chevron-up"></i>
                                                     </a>
                                <a href="#" data-action="close">
                                    <i class="ace-icon bigger-130 fa fa-times"></i>
                                </a>
                            </span>-->
                        </div>
                        <div class="panel-body" style="padding: 5px;">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li>
                                        <a data-toggle="tab" href="#tab7" aria-expanded="true">
                                            <i class="dark ace-icon fa fa-tachometer bigger-110"></i>
                                            Система</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab1" aria-expanded="false">
                                            <i class="dark ace-icon  fa fa-external-link bigger-110"></i>
                                            Настройки сети</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab2" aria-expanded="false">
                                            <i class="dark ace-icon fa fa-key bigger-110"></i>
                                            Компоненты лицензии</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab3" aria-expanded="false">
                                            <i class="dark ace-icon fa fa-inbox"></i>
                                            Состав ПАК</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab4" aria-expanded="false">
                                            <i class="dark ace-icon fa fa-book"></i>
                                            Журнал событий</a>
                                    </li>

                                    <li>
                                        <a data-toggle="tab" href="#tab6" aria-expanded="false">
                                            <i class="dark ace-icon fa fa-user bigger-110"></i>
                                            Настройки пользователя
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div  id="tab7" class="tab-pane"> <!-- settings -->
                                        <div class="widget-body">
                                            <div class="widget-main" style="padding-left: 52px; padding-right: 52px;">
                                                <dl id="dt-list-1" >
                                                    <h4 style="color:#007FBB">Система мониторинга волоконно-оптических линий связи  v. 0.1.0 </h4><br>
                                                    <dd>Сертификат ФСТЭК №___________ 
                                                        <a href="#" data-toggle="modal" class="pink"> <i class="ace-icon fa fa-eye bigger-110 purple"></i></a>
                                                    </dd>
                                                    <dd>Свидетельство о поверке №___________ 
                                                        <a href="#"><i class="ace-icon fa fa-eye bigger-110 purple"></i></a>
                                                    </dd>
                                                    <dd></dd><br>
                                                    <table class="table table-bordered table-striped">
                                                        <thead class="thin-border-bottom">
                                                            <tr>
                                                                <th> Имя </th>
                                                                <th> Срок действия </th>
                                                                <th> Осталось </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if ($otdr_info != NULL): ?>
                                                                <?php foreach ($otdr_info as $it): ?>  
                                                            
                                                           
                                                            <tr>
                                                                <td><span class="label label-success" style="float:left;">
                                                                        <i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
                                                                    </span> <?= $it['otdr_name']?>
                                                                </td>
                                                                <td>
                                                                    02.03.2016 - 02.03.2017
                                                                </td>
                                                                <td>
                                                                    30 дней
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                           <?php else: ?> 
                                                            <tr>
                                                                <td><span class="label label-success" style="float:left;">
                                                                        <i class="ace-icon fa fa-exclamation-triangle bigger-120"></i>
                                                                    </span> не обнаружено
                                                                </td>
                                                                <td>
                                                                    не обнаружено
                                                                </td>
                                                                <td>
                                                                    не обнаружено
                                                                </td>
                                                            </tr>
                                                            <?php endif ?>
                                                            
                                                        </tbody>
                                                    </table>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="widget-box">
                                                                <div class="widget-header widget-header-flat">
                                                                    <h4 class="widget-title smaller">Лицензионное соглашение</h4>
                                                                </div>
                                                                <div class="widget-body">
                                                                    <div class="widget-main">
                                                                        <dl id="dt-list-1" class="">
                                                                            <dt>БЛАБЛАБЛА</dt>
                                                                            <dd>МНОГО БУКВ</dd>
                                                                        </dl>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </dl>
                                            </div>
                                        </div>		
                                    </div>
                                    <!-- TCP/IP -->
                                    <div id="tab1" class="tab-pane">
                                        <form class="form-horizontal " style="margin-top: 15px; margin-left: 20%;">
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">IP адрес:</label>
                                                <div class="input-group col-xs-3">
                                                    <input class="ajax_tcp form-control"  value="<?=$system['ipaddr_work']?>" id="ipaddr_work" id_system ="<?=$system['id_system']?>" >
                                                    <!--<input type="text" class="form-control"  value="10.10.10.10">-->
<!--                                                    <span class="input-group-btn">
                                                        <button class="btn btn-default" type="button" style="border:none; line-height: 1.6; margin-left: 0px;" > 
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i></button>
                                                    </span>-->
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">Маска подсети:</label>
                                                <div class="input-group col-xs-3">
                                                    <input class="ajax_tcp form-control"  value="<?=$system['netmask']?>" id="netmask" id_system ="<?=$system['id_system']?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">Шлюз по умолчанию:</label>
                                                <div class="input-group col-xs-3">
                                                    <input class="ajax_tcp form-control"  value="<?=$system['gw']?>" id="gw" id_system ="<?=$system['id_system']?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">DNS сервер:</label>
                                                <div class="input-group col-xs-3">
                                                    <input class="ajax_tcp form-control"  data-inputmask="'alias': 'ip'" value="<?=$system['dns']?>" id="dns" id_system ="<?=$system['id_system']?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">DNS_2 сервер:</label>
                                                <div class="input-group col-xs-3">
                                                    <input class="ajax_tcp form-control"  value="<?=$system['dns2']?>" id="dns2" id_system ="<?=$system['id_system']?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">Доменное имя: </label>
                                                <div class="input-group col-xs-3">
                                                    <input class="ajax_tcp form-control"  value="<?=$system['domain_name']?>" id="domain_name" id_system ="<?=$system['id_system']?>" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">SSH: </label>
                                                <div class="input-group col-xs-3">
                                                     <?php echo form_dropdown("ssh_work", $ssh, '','class="ajax_tcp form-control" id="ssh_work" id_system ="1" style="width: 100%; margin-bottom: 2px;"'); ?>   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">SSH_man: </label>
                                                <div class="input-group col-xs-3">
                                                     <?php echo form_dropdown("ssh_man", $ssh_man, '','class="ajax_tcp form-control" id="ssh_man" id_system ="1" style="width: 100%; margin-bottom: 2px;"'); ?>   
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="tab2" class="tab-pane">
                                        <div class="widget-body">
                                            <div class="widget-main" style="padding-left: 52px; padding-right: 52px;">
                                                <h4 style="color:#007FBB">
                                                    Активные компоненты лицензии
                                                </h4>
                                                <div class="alert alert-info">
                                                    Базовая лицензия для ООО ОАО АОА "ПиХ"
                                                    <br>
                                                </div>
                                                <div class="alert alert-info">
                                                    Отключение волокна при аварии
                                                    <br>
                                                </div>
                                                <div class="alert alert-warning">
                                                    Картография
                                                    <br>
                                                </div>
                                                <div class="alert alert-info">
                                                    Уведомление по sms/e-mail
                                                    <br>
                                                </div>
                                                <div class="alert alert-info">
                                                    Лицензия на техническую поддержку
                                                    <br>
                                                </div>
                                                <div class="alert alert-warning">
                                                    Сертифицированная
                                                    <br>
                                                </div>
                                                <div class="alert alert-info">
                                                    Рефлектометричсекий модуль IMEI 123123123
                                                    <br>
                                                </div>
                                                <div class="alert alert-info">
                                                    Рефлектометричсекий модуль IMEI 123123123
                                                    <br>
                                                </div>
                                                <div class="alert alert-info">
                                                    Длины волн 1550, 1625
                                                    <br>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                    <div id="tab3" class="tab-pane">
                                        <div class="widget-body">
                                            <div class="widget-main" style="padding-left: 52px; padding-right: 52px;">
                                                <div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <a href="#faq-1-1" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false"  style="background-color: #f5f5f5;">
                                                                <i class="pull-right ace-icon fa fa-chevron-left" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>
                                                                <span>  
                                                                    <i class="pull-right red ace-icon fa fa-exclamation-triangle bigger-130" data-rel="tooltip" title="Истек период ТП"></i>
                                                                </span>
                                                                <i class="ace-icon fa fa-laptop bigger-120"></i>
                                                                &nbsp; Программное обеспечение NAME_PO 
                                                            </a>

                                                        </div>
                                                        <div class="panel-collapse collapse" id="faq-1-1" aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <dl style="margin-bottom: 10px;">
                                                                    <dd><span style="color:#007FBB">Версия ПО:</span> 1.1 </dd>
                                                                    <dd><span style="color:#007FBB">ОС:</span> AstraLinux "Смоленск" ядро 2.6</dd>
                                                                    <dd><span style="color:#007FBB">Код технической поддержки:</span> ___________ </dd>
                                                                    <dd><span style="color:#007FBB">Срок окончания ТП:</span> 11.11.2111 г. </dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                                    <?php foreach ($otdr_info as $item): ?>  
                                                                                                                        
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <a href="#<?= $item['id_otdr']?>" data-parent="#faq-list-1" data-toggle="collapse" class="accordion-toggle collapsed" aria-expanded="false" style="background-color: #f5f5f5;">
                                                                <i class="ace-icon fa fa-chevron-left pull-right" data-icon-hide="ace-icon fa fa-chevron-down" data-icon-show="ace-icon fa fa-chevron-left"></i>
                                                                <span>  
                                                                    <i class="pull-right warning ace-icon fa fa-exclamation-triangle bigger-130" style="color: #F7D05B" data-rel="tooltip" title="Требуется обновление..."></i>
                                                                </span>                        
                                                                <i class="ace-icon fa fa-hdd-o bigger-130"></i>
                                                                &nbsp; <?= $item['otdr_name']?> IMEI:<?= $item['otdr_imei']?>   
                                                              
                                                            </a>
                                                        </div> 
                                                           
                                                        <div class="panel-collapse collapse" id="<?= $item['id_otdr']?>" aria-expanded="false">
                                                            <?php foreach ($puls as $itm_p => $it): ?> 
                                                                <?php if ($item['id_otdr'] == $it['id_otdr']): ?>
                                                                  
                                                            <div class="panel-body">
                                                                   <dl style="margin-bottom: 10px;">
                                                                    <dd><span style="color:#007FBB"> Длительность импульса:</span> &nbsp;<?= $it['value_pd']?> ,nm</dd>
                                                                    <dd><span style="color:#007FBB"> Диапазон:</span>&nbsp;<?= $it['value_rl']?> ,m</dd>
                                                                    <dd><span style="color:#007FBB"> Длина волны:</span>&nbsp;<?= $it['value_wl']?> ,nm</dd>
                                                                    <dd><span style="color:#007FBB"> Время накопления:</span>&nbsp;<?= $it['value_ta']?> </dd>
                                                                    <dd><span style="color:#007FBB"> Свидетельство о поверке:</span>&nbsp; № _____________ </dd> 
                                                                </dl>
                                                            </div>
                                                                <?php endif ?>
                                                            <?php endforeach ?> 
                                                        </div>
                                                            
                                                    </div>
                                                    <?php endforeach ?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="tab4" class="tab-pane">
                                        <div class="widget-main" style="padding-left: 52px; padding-right: 52px;">
                                            <dl>
                                                <h4 style="color:#007FBB">Настройки данных в журнале событий </h4><br>
                                            </dl>
                                        </div>                                
                                    </div>
                                    <div id="tab6" class="tab-pane">
                                        <div class="widget-body">
                                            <div class="widget-main" style="padding-left: 52px; padding-right: 52px;">
                                                 
                                                
                                                            <div id="user-profile-1" class="user-profile row">
                                                                <div class="col-xs-12 col-sm-3 center">
                                                                    <div>
                                                                        <!-- #section:pages/profile.picture -->
                                                                        <span class="profile-picture">
                                                                            <img id="avatar" class="editable img-responsive" alt="АВАТАР" src="styleace/assets/avatars/profile-pic.jpg" />
                                                                        </span>

                                                                        <!-- /section:pages/profile.picture -->
                                                                        <div class="space-4"></div>

                                                                        <div class="width-80 label label-info label-xlg ">
                                                                            <div class="inline position-relative">
                                                                                &nbsp;
                                                                                <span class="white">Иванов В.В.</span> 
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="space-6"></div>


                                                                    <!-- /section:pages/profile.contact -->
                                                                    <div class="hr hr12 dotted"></div>

                                                                    <!-- #section:custom/extra.grid -->

                                                                    <!-- /section:custom/extra.grid -->

                                                                </div>

                                                                <div class="col-xs-12 col-sm-9">

                                                                    <div class="space-12"></div>

                                                                    <!-- #section:pages/profile.info -->
                                                                    <div class="profile-user-info profile-user-info-striped">
                                                                       <div class="profile-info-row">
                                                                            <div class="profile-info-name"> Пользователь </div>

                                                                            <div class="profile-info-value">
                                                                                <span class="editable" id="username">Иванов В.В. </span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name"> Местоположение </div>

                                                                            <div class="profile-info-value">
                                                                                <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                                                <span class="editable" id="country">Россия</span>
                                                                                <span class="editable" id="city">Санкт-Петербург</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name"> Дата рождения </div>

                                                                            <div class="profile-info-value">
                                                                                <span class="editable" id="signup">2010/06/20</span>
                                                                            </div>
                                                                        </div>


                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name"> Характеристика</div>

                                                                            <div class="profile-info-value">
                                                                                <span class="editable" id="about">Норм пацан</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="profile-info-row">
                                                                            <div class="profile-info-name"> Логин </div>

                                                                            <div class="profile-info-value">
                                                                                <span class="editable" id="login">Ivanov </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- /section:pages/profile.info -->
                                                                    <div class="space-10"></div>


                                                                    <div class="hr hr2 hr-double"></div>

                                                                    <div class="space-6"></div>


                                                                </div>
                                                            </div>
                                                       
                                            </div> <!-- widget_main -->
                                        </div>		
                                    </div>
                                </div>

                            </div> <!-- tab content -->
                        </div>
                    </div><!-- /panel_body -->
                </div> <!--widget box-->
            </div>
    </div> <!-- contetnt-->
    <script>
        
$('.ajax_tcp').change(function () {
    spisok = $(this).val();
    name = $(this).attr('id');
    //  arr = name.split('_');
    id_system = $(this).attr('id_system');
    $.ajax({
        type:"post",
        url: "Ajax/ajax_tcp_property/" + name + "/" + id_system ,
        data:"spisok=" + spisok,
        response:'text',
        dataType: 'text'
    }).success(function ($data) {
//                    if($data == -1){
//                        alert('Войдите под своим пользователем!');
//                    }else if($data == -2){
//                        alert('У Вас не хватает прав доступа!');
//                    }
                          
//                          sd =$('january').val();
//                          alert(spisok);

})
            .fail(function () {
                alert('Ошибка');
            });
});

        </script>
</div> <!-- main contetnt-->
