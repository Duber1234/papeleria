<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <?php if (@$title) {
        echo "<title>$title</title >";
    } else {
        echo "<title>Neo Billing</title >";
    }
    ?>
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x1f52" href="<?php echo base_url(); ?>assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/' . LTR . '/bootstrap.css'); ?>">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fonts/icomoon.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/' . LTR . '/bootstrap-extended.css') . APPVER; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/' . LTR . '/app.css') . APPVER; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/' . LTR . '/colors.css'); ?>">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/' . LTR . '/core/menu/menu-types/vertical-menu.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/' . LTR . '/core/menu/menu-types/vertical-overlay-menu.css'); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/' . LTR . '/core/colors/palette-gradient.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/custom/datepicker.min.css') . APPVER ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/custom/jquery.dataTables.css') . APPVER ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/custom/summernote-bs4.css') . APPVER; ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/custom/select2.min.css') . APPVER; ?>">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/' . LTR . '/style.css') . APPVER; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/' . LTR . '/custom.css') . APPVER; ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/custom/style.css') . APPVER; ?>">
    <!-- END Custom CSS-->

    <script src="<?php echo base_url(); ?>assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>


    <script src="<?php echo base_url(); ?>assets/portjs/raphael.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/portjs/morris.min.js" type="text/javascript"></script>


    <script src="<?php echo base_url('assets/myjs/datepicker.min.js') . APPVER; ?>"></script>
    <script src="<?php echo base_url('assets/myjs/summernote-bs4.min.js') . APPVER; ?>"></script>
    <script src="<?php echo base_url('assets/myjs/select2.min.js') . APPVER; ?>"></script>


    <script type="text/javascript">var baseurl = '<?php echo base_url() ?>';</script>

</head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns"
      class="vertical-layout vertical-menu 2-columns  fixed-navbar"><span id="hdata"
                                                                          data-df="<?php echo $this->config->item('dformat2'); ?>"
                                                                          data-curr="<?php echo $this->config->item('currency'); ?>"></span>

<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
				
                <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a>
                </li>
                <li class="nav-item"><a href="<?php echo base_url() ?>dashboard/" class="navbar-brand nav-link"><img
                                alt="branding logo" src="<?php echo base_url(); ?>userfiles/theme/logo-header.png"
                                data-expand="<?php echo base_url(); ?>userfiles/theme/logo-header.png"
                                data-collapse="<?php echo base_url(); ?>assets/images/logo/logo-80x80.png"
                                class="brand-logo height-50"></a></li>
                <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile"
                                                                    class="nav-link open-navbar-container"><i
                                class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
				
            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav">
                    <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i
                                    class="icon-menu5"> </i></a></li>
                    <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i
                                    class="icon icon-expand2"></i></a></li>
                    <li class="nav-item hidden-sm-down"><input type="text" placeholder="<?php echo $this->lang->line('Search Customer') ?>" id="head-customerbox" class="nav-link menu-search form-control round"/></li>
                </ul>
                <div id="head-customerbox-result" class="dropdown dropdown-notification"></div>
                <ul class="nav navbar-nav float-xs-right">

                    <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown"
                                                                           class="nav-link nav-link-label"><i
                                    class="ficon icon-bell4"></i><span
                                    class="tag tag-pill tag-default tag-danger tag-default tag-up"
                                    id="taskcount">0</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0"><span
                                            class="grey darken-2"><?php echo $this->lang->line('Pending Tasks') ?></span>
                                </h6>
                            </li>
                            <li class="list-group scrollable-container" id="tasklist"></li>
                            <li class="dropdown-menu-footer"><a href="<?php echo base_url('manager/todo') ?>"
                                                                class="dropdown-item text-muted text-xs-center"><?php echo $this->lang->line('Manage tasks') ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown"
                                                                           class="nav-link nav-link-label"><i
                                    class="ficon icon-mail6"></i><span
                                    class="tag tag-pill tag-default tag-info tag-default tag-up"><?php  ?></span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0"><span
                                            class="grey darken-2"><?php echo $this->lang->line('Messages') ?></span>
                                </h6>
                            </li>
                            <li class="list-group scrollable-container">


                                

                            </li>
                            <li class="dropdown-menu-footer"><a href="<?php echo base_url('messages') ?>"
                                                                class="dropdown-item text-muted text-xs-center"><?php echo $this->lang->line('Read all messages') ?></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item">
                        <div class="dropdown-menu dropdown-menu-right"><a href="<?php echo base_url(); ?>user/profile"
                                                                          class="dropdown-item"><i
                                        class="icon-head"></i><?php echo $this->lang->line('Profile') ?></a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo base_url('user/logout'); ?>" class="dropdown-item"><i
                                        class="icon-power3"></i> <?php echo $this->lang->line('Logout') ?></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- ////////////////////////////////////////////////////////////////////////////-->


<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-static menu-dark menu-accordion menu-shadow" id="side">
    <!-- main menu header-->
    <div class="main-menu-header">
        <div>
            <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle "
                                 src="<?php echo base_url('userfiles/employee/') ?>">
                             </span>
                <a data-toggle="dropdown" class="dropdown-toggle block" href="#" aria-expanded="false">
                    <span class="clear white">  <span
                                class="text-xs"><?php ?><b
                                    class="caret"></b></span> </span> </a>
                <ul class="dropdown-menu animated m-t-xs">
                    <li>
                        </li>

                      <li class=" divider">
                    </li>
                    <li>
                        <a href="<?php echo base_url('user/logout'); ?>">&nbsp;<?php echo $this->lang->line('Logout'); ?></a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

            <li class="nav-item <?php if ($this->uri->segment(1) == "dashboard") {
                echo 'active';
            } ?>">
                <a href="<?php echo base_url(); ?>"> <i class="icon-dashboard"></i><span
                            class="menu-title">Principal Gloria a Dios</span></a>
            </li>
<!--- HEAD ----->

            

       
			<!--apertura-->
			
                <li class="navigation-header"><span
                            data-i18n="nav.category.support">Cobranza</span><i
                            data-toggle="tooltip"
                            data-placement="right"
                            data-original-title="Sales"
                            class="icon-ellipsis icon-ellipsis"></i>
                </li>
                <li class="nav-item has-sub <?php if ($this->uri->segment(1) == "productos" OR $this->uri->segment(1) == "quote") {
                    echo ' open';
                } ?>">
                    <a href=""> <i class="icon-plus"></i> <span
                                class="menu-title">Ventas
						
						<!-- MENU FACTURACION-->
						
                    <i class="icon-arrow"></i></span></a>
                    <ul class="menu-content">
						<li>
                            <a href="<?php echo base_url(); ?>productos/agregar">Agregar Productos</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>invoices/apertura">Apertura</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>invoices/apertura">Apertura</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-sub <?php if ($this->uri->segment(1) == "invoices" OR $this->uri->segment(1) == "quote") {
                    echo ' open';
                } ?>">
                    <a href=""> <i class="icon-plus"></i> <span
                                class="menu-title">Ventas 2
                        
                        <!-- MENU FACTURACION-->
                        
                    <i class="icon-arrow"></i></span></a>
                    <ul class="menu-content">
                        <li>
                            <a href="<?php echo base_url(); ?>invoices/apertura">Apertura</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>invoices/apertura">Apertura</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>invoices/apertura">Apertura</a>
                        </li>
                    </ul>
                </li>
			
        </ul>
		
		
    </div>
    <!-- /main menu content-->
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
    <div id="rough"></div>
</div>
<!-- / main menu-->