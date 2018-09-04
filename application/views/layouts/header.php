<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8">
        <title> <?php echo $title_for_layout ?></title>
        <base href="<?php echo base_url(); ?>" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="styleace/assets/css/bootstrap.css" />
        <link rel="stylesheet" href="styleace/components/font-awesome/css/font-awesome.css" />
        <link rel="stylesheet" href="styleace/components/font-awesome/css/font-awesome.css" />

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="styleace/components/_mod/jquery-ui.custom/jquery-ui.custom.css" />
        <link rel="stylesheet" href="styleace/components/jquery.gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" href="styleace/components/select2/dist/css/select2.css" />
        <link rel="stylesheet" href="styleace/components/chosen/chosen.css" />
        <link rel="stylesheet" href="styleace/components/_mod/x-editable/bootstrap-editable.css" />
        <!-- text fonts -->
        <link rel="stylesheet" href="styleace/assets/css/ace-fonts.css" />
        <link rel="stylesheet" href="styleace/assets/css/ace-skins.css" />
        <link rel="stylesheet" href="styleace/assets/css/ace-rtl.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="styleace/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
        <!--[if !IE]> -->
        <script src="styleace/components/jquery/dist/jquery.js"></script>
        <script src="styleace/assets/js/jquery.cookie.js"></script> 
        <script src="styleace/components/angular/angular.js"></script>
        <!--<script src="styleace/assets/js/date-time/bootstrap-datepicker.min.js"></script>-->
        <!--<script src="styleace/js/ajax_obnovlenie.js"></script>  -->
        <!-- <![endif]-->
        <script src="styleace/components/bootbox.js/bootbox.js"></script>
        <script src="styleace/components/bootstrap/dist/js/bootstrap.js"></script>
       
        <!--[if lte IE 9]>
        <link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
        <![endif]-->
        <!--[if lte IE 9]>
          <link rel="stylesheet" href="../assets/css/ace-ie.css" />
        <![endif]-->
        <!-- ace settings handler -->
        <script src="styleace/assets/js/ace-extra.js"></script>
        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
        <!--[if lte IE 8]>
        <script src="../components/html5shiv/dist/html5shiv.min.js"></script>
        <script src="../components/respond/dest/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="no-skin">
        <!-- #section:basics/navbar.layout -->
        <div id="navbar" class="navbar navbar-default ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <div class="navbar-header pull-left">
                    <!-- #section:basics/navbar.layout.brand -->
                    <a href="mainpage" class="navbar-brand" id="clear_cookie">
                        <small> <i class="bigger-110 fa fa-bar-chart"></i>
                            <font face="arial" size="4">Система мониторинга волоконно-оптических линий </font></small> </a>

                </div>
                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="transparent">
                            <a href="migrate/to/" style="padding: 3px 4px 0px 4px;">
                                <i class="ace-icon fa fa-database " style="font-size: 22px;"></i>
                            </a>
                        </li>
                        <li class="transparent">
                            <a href="mainpage" class="clear_cookie_exit" style="padding: 4px 6px 4px 4px;" data-rel="tooltip" data-placement="bottom" title="На главную">
                                <i class="ace-icon fa fa-home " style="font-size: 24px;"></i>
                            </a>
                        </li>
                        <!-- кнопень логи -->
                        <li class="transparent" >
                            <a href="mainpage/eventsinfo" class="clear_cookie_exit" style="padding: 3px 4px 0px 4px;" data-rel="tooltip" data-placement="bottom" title="События" > 
                                <i class="ace-icon fa fa-bell icon-animated-bell " style="font-size: 21px;" ></i>
<!--                                <span class="badge badge-important">3</span>-->
                            </a>
                        </li>
                        <!-- кнопень настройки -->
                        <li class="transparent">
                            <a href="Settings/all_setting#tab_tab7" class="clear_cookie_exit" style="padding: 4px 11px 0px 4px;" data-rel="tooltip" data-placement="bottom" title="О системе">
                                <i class="ace-icon fa fa-cogs" style="font-size: 24px;"></i>
                            </a>
                        </li>
                        <!-- #section:basics/navbar.user_menu текущий пользователь -->
                        <li class="transparent">
                            <a  href="Settings/all_setting#tab_tab6" style="padding: 4px 11px 8px 8px;" data-rel="tooltip" data-placement="bottom" title="О пользователе">
                                <i class="ace-icon fa fa-user" style="font-size: 24px;"></i>
                                <?php echo $user_name ?>		
                            </a>
                        </li>
                        <!-- exit -->
                        <li class="transparent">
                            <a href="userlogin/logout" id="exit" class="clear_cookie_exit" style="padding: 5px 11px 8px 9px; border-right: 1px solid #E1E1E1;" data-rel="tooltip" data-placement="bottom" title="Выход">
                                <i class="ace-icon fa fa-sign-out" style="font-size: 26px;"></i>
                            </a>
                        </li>
                        <!-- /section:basics/navbar.user_menu -->
                    </ul>
                </div>
                <!-- /section:basics/navbar.dropdown -->
            </div><!-- /.navbar-container -->
        </div>
        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
                
            </script>