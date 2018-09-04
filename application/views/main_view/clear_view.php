<style>
    .row_button{
        float: right;
        margin-top: 5px;
        margin-bottom: 5px;
        margin-right: 0px;
    }
    .page-content-my{
        margin-top: 5px;
        margin-bottom: 20px;
    } 
    .hr_my{
        margin-top: 5px;
        margin-bottom: 5px;
        border: 0;
        border-top: 1px solid #eeeeee;
    }
    .modal-dialog{
        width: 450px;
    }
    .form-group{
            margin-bottom: 5px;
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
        text-align: left;
    }
    .table_my td{
        padding: 2px;
        }
</style>
<?php
$otdr_act = array('name' => 'otdr_active', 'value' => '1', 'checked' => true, 'class' => 'ace');
$otdr_cert = array('name' => 'otdr_cert', 'value' => '1', 'checked' => true, 'class' => 'ace');

if (!isset($poverka))
    $poverka = '';
if (!isset($add_otdr))
    $add_otdr = '';

function calendar($name, $value = '') {
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
    <div class="container-fluid" style="padding-left: 8px; padding-right: 8px;">
        <?php
            if (isset($error['error_']) && isset($error['error_text'])) { ?>
                <div class="alert alert-danger"  style="text-align: center; margin: 8px 8px 5px 8px;">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong> <i class="ace-icon fa fa-times"></i>
                    <?= $error['error_'] ?>
                    </strong>
                    <?= $error['error_text'] ?>
                </div>
        <?php } else if (isset($success['success_']) && isset($success['success_text'])){ ?> 
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
        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-left: 8px; padding-right: 8px; text-align: center;">	
            <!--            <div class="widget-box" style="margin-top: 9px">    -->
            <hr class="hr_my">
            <div class="row" style="margin-right: 0px;">
                    <?= $add_otdr ?>
<!--<span style="font-weight: bold; text-align: center; font-size: 18px; color: #c91d1d ">Устройство не обнаружено</span><br><br><br>-->    
            </div><hr class="hr_my">
            <div class="alert alert-danger" style="margin-top: 8px;">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <strong> <i class="ace-icon fa fa-times"></i>
                    Внимание!
                </strong>
                    Устройство не обнаружено.Нажмите кнопку "Добавить ОР"
            </div>
        </div>
    </div>
</div>
<div id="my-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="padding: 10px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="lighter blue no-margin">Добавление рефлектометра</h3>
            </div>
            <form  method="post" action="mainpage/add_otdr/" class="form-horizontal" id="validation-form" accept-charset="utf-8" enctype="multipart/form-data">    
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-5 no-padding-right">Наименование прибора:</label>
                    <div class="col-xs-12 col-sm-7">
                        <div class="clearfix">
                            <input type="text" id="otdr_name" name="otdr_name" class="col-xs-12 col-sm-12" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-5 no-padding-right">IMEI прибора:</label>
                    <div class="col-xs-12 col-sm-7">
                        <div class="clearfix">
                            <input type="text" id="otdr_imei" name="otdr_imei" class="col-xs-12 col-sm-12" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-5 no-padding-right">Otdr_active:</label>
                    <div class="col-xs-12 col-sm-7" style="margin-top: 7px;">
                        <div class="clearfix">
                            <?php echo form_checkbox($otdr_act);?><span class="lbl"> true / false </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-5 no-padding-right">Дата поверки:</label>
                    <div class="col-xs-12 col-sm-7">
                            <?php calendar('otdr_poverka', $poverka);  ?>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-5 no-padding-right">Otdr_ports_count:</label>
                    <div class="col-xs-12 col-sm-7">
                        <div class="clearfix">
                            <input type="number" id="otdr_ports_count" name="otdr_ports_count" class="col-xs-12 col-sm-12" />
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
            <div class="modal-footer" style="padding-bottom: 2px;">
                <button data-bb-handler="success" id="save" type="submit" name="submit_otdr_form" class="btn btn-sm btn-success">
                    Добавить
                </button>
                <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                    <font face="arial"> Закрыть</font>
                </button></p>
            </div></form>
        </div><!-- /.modal-content -->
    </div>
</div>	<!-- /.modal-dialog -->
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
</div>
