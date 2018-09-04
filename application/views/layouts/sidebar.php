<!-- #section:basics/sidebar -->
<div id="sidebar" class="sidebar responsive ace-save-state" >
  
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-thumb-tack ace-save-state" data-icon1="ace-icon fa fa-thumb-tack" data-icon2="ace-icon fa fa-thumb-tack fa-rotate-90"></i>
    </div>
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
	</script>

<ul class="nav nav-list" id="slider-menu-pro">  <!--  id="menu"  м-р А. Дудкин  -->
    <li class="menu-item"> 
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-list-alt"></i>
            <span class="menu-text"> Рефлектомодули </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>        
        <ul  class="submenu" >
            
            <?php foreach ($fiber_info as $OTDRs => $val): ?>  
                <li class="submenu-item">
                    <a href="#0" class="dropdown-toggle" >  
                        <i class="menu-icon fa fa-caret-right"></i>
                        <span class="menu-text"><i class="ace-icon fa fa-hdd-o"></i> <?= $val['otdr_name']?> </span>
                        <!--  <b class="arrow fa fa-angle-down"></b>-->
                    </a>   
                    <ul class="submenu" >
                
                            <?php foreach ($val['fibers'] as $ke => $va): ?>
                                <li>
                                    <a href="optikainfo/optikainfo/<?= $va['id_fiber'] ?>">
                                    &nbsp;<i class="ace-icon fa fa-dot-circle-o"></i>
                                    &nbsp;<?= $va['fiber_name'] ?>
                                    </a>
                                </li>
                            <?php endforeach ?> 
                        <li>
                            <a href="otdrpage/otdrinfo/<?= $val["id_otdr"]?>">
                            &nbsp;<i class="ace-icon fa fa-info"></i>
                            &nbsp; Инфо о приборе
                            </a>
                        </li>
                    </ul>
                </li> 
            <?php endforeach; ?>
        </ul>
    </li>
</ul> <!--/.nav-list -->  
    <!-- #section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
    function setcookie(a, b, c) {
    
        if (c) {
            var d = new Date();
            d.setTime(d.getTime()+c);
        }
        if(a && b)
            document.cookie = a + '=' + b + ';path=/' + (c ? '; expires=' + d.toUTCString() : '');
        else
            return false;
    }

    function getcookie(a) {
        var b = new RegExp(a + '=([^;]){1,}');
        var c = b.exec(document.cookie);
               
        if (c)
            c = c[0].split('=');
        else
            return false;
        return c[1] ? c[1] : false;
    }

    var nav = $("#slider-menu-pro");
    var menu_items = $(nav).find('li.menu-item');
    var opened_items = (getcookie("MENU") ? getcookie("MENU") : "-1,-1,-1").split(',');
   
    //setcookie("MENU", "-1,-1,-1", 30 * 3600 * 24 * 1000); Сброс
   
    $(nav).find("a").click(function(e) {
        if ($(this).attr('href').split('#').length < 2) {
            link_index = $(this).parent().parent().find('li').index($(this).parent());
            
            if (setcookie("MENU", opened_items[0] + "," + opened_items[1] + "," + link_index, 30 * 3600 * 24 * 1000)) return;
        } else {
            e.preventDefault();

            var menu = $(this).parent();
            var submenu_items = $(menu).parent().find('li.submenu-item');
            var menu_index = -1;
            var submenu_index = -1;
            var link_index = -1;

            if ($(menu).parent().hasClass('nav')) menu_index = $(menu_items).index(menu);

            if ($(menu).parent().hasClass('submenu')) {
                menu_index = $(menu_items).index($(menu).parent().parent());
                submenu_index = $(submenu_items).index(menu);
            }
            
            opened_items = [menu_index, submenu_index, link_index];

            setcookie("MENU", menu_index + "," + submenu_index + "," + link_index, 30 * 3600 * 24 * 1000);
        }
    });

    if (opened_items[0] != "-1") 
        $('#slider-menu-pro li.menu-item').eq(opened_items[0]).addClass('open').find('ul.submenu').eq(0).addClass('nav-show').show();

    if (opened_items[1] != "-1")
        $('#slider-menu-pro li.menu-item').eq(opened_items[0]).find('li.submenu-item').eq(opened_items[1]).addClass('open').find('ul.submenu').eq(0).addClass('nav-show').show();
    
    if (opened_items[2] != "-1")
        $('#slider-menu-pro li.menu-item').eq(opened_items[0]).find('li.submenu-item').eq(opened_items[1]).find('ul.submenu').eq(0).find('li').eq(opened_items[2]).addClass('active');

</script>  
</div>




