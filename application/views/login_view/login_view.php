<style>
    .otstup {
    min-height: 1px;
    margin: 4px 0 11px;
    }
    .main-otstup {
    min-height: 180px;
    }
    .white-text{
    color: #FFF !important;
    font-size: 15px;
    float: left;
    margin-left: 15px;
    }
</style>

<body class="login-layout blur-login">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                <?php
            if (isset($error['error_']) && isset($error['error_text'])) { ?>
                <div class="alert alert-warning"  style="text-align: center; margin: 8px 8px 5px 8px;">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong> <i class="ace-icon fa fa-times"></i>
                    <?= $error['error_'] ?>
                    </strong>
                    <?= $error['error_text'] ?>
                </div>
                <?php }?>
                    <div class="main-otstup"></div>
                    <div class="login-container">
                        <div class="center">
                            <div class="col-md-2">
                                <img src="styleace/images/logo.png" alt="Логотип" width="66" height="66" >
                            </div>
                            <div class="col-md-10">
                                <div class="otstup"></div>
                                <div class="white-text">СИСТЕМА МОНИТОРИНГА</div>
                                <div class="white-text">ВОЛОКОННО-ОПТИЧЕСКИХ ЛИНИЙ</div>		
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="position-relative">
                                    <div id="login-box" class="login-box visible widget-box no-border">
                                        <div class="widget-body">
                                            <div class="widget-main">
                                                <h4 class="header blue lighter bigger">
                                                    <i class="ace-icon fa fa-home"></i>
                                                    Выполните вход в систему
                                                </h4>
                                                <div class="space-6"></div>

                                                <?php echo form_open("userlogin/login"); ?>
                                                
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <?php
                                                            echo form_input(array(
                                                                'name' => 'login_name',
                                                                'class' => 'form-control',
                                                                'id' => 'login_name',
                                                                'value' => set_value('login_name'),
                                                                'maxlength' => '50',
                                                                'placeholder' => 'Имя пользователя'
                                                            ));
                                                            ?>
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                    </label>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <?php
                                                            echo form_input(array(
                                                                'name' => 'password',
                                                                'class' => 'form-control',
                                                                'id' => 'password',
                                                                'value' => set_value('password'),
                                                                'type' => 'password',
                                                                'maxlength' => '50',
                                                                'placeholder' => 'Пароль'
                                                            ));
                                                            ?>
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>
                                                    <div class="space"></div>
                                                    <div class="clearfix">
                                                        <button type="submit" id="log" class="width-100 btn btn-md btn-primary">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110">Войти</span>
                                                        </button>
                                                    </div>
                                                    <div class="space-4"></div>
                                                </fieldset>
                                                <?php form_close(); ?>
                                                <div class="space-6"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            


                    </div>
                </div>
            </div>
        <!--[if !IE]> -->
        <script type="text/javascript">
                window.jQuery || document.write("<script src='styleace/assets/js/jquery.min.js'>"+"<"+"/script>");
        </script>
</body>
</html>
