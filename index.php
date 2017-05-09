<!DOCTYPE html>
<html>
<head>

    <!-- Title -->
    <title>AFix</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template"/>
    <meta name="keywords" content="AFix"/>
    <meta name="author" content="Basheir"/>
    <link rel="icon" href="images/favicon.ico">
    <!-- Styles -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="style/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="style/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="style/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
    <link href="style/assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
    <link href="style/assets/plugins/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="style/assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="style/assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="style/assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="style/assets/css/progressBar/css/style.css">
    <link rel="stylesheet" href="style/assets/css/ihover.css">
    <link href="style/assets/css/stylesUploadFile.css" rel="stylesheet">
    <link rel="stylesheet" href="js/plugins/EasyAutocomplete/easy-autocomplete.min.css">
    <link rel="stylesheet" href="js/plugins/EasyAutocomplete/easy-autocomplete.themes.css">
    <link href="style/assets/css/ggpopover.min.css" rel="stylesheet"/>
    <link href="js/plugins/waitMe/waitMe.css" rel="stylesheet"/>
    <link href="js/plugins/toolbar/jquery.toolbar.css" rel="stylesheet"/>
    <link href="js/plugins/notie/notie.css" rel="stylesheet"/>
    <link href="js/plugins/noty/animate.css" rel="stylesheet"/>
    <link href="bower_components/bootstrap3-dialog/src/css/bootstrap-dialog.css" rel="stylesheet"/>
    <link rel="stylesheet" href="style/assets/css/Mycss.css">
</head>


<body class="page-header-fixed waitMe_body">
<div class="waitMe_container img" style="background:#fff">
    <div style="background:url('images/loadingBody.gif')"></div>
</div>


<div class="overlay"></div>


<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
    <h3><span class="pull-left">قائمة العملاء</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i
            class="fa fa-times"></i></a></h3>
    <div id="listCustemers" class="slimscroll">
        <!--List Custemers-->
    </div>
</nav>


<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
    <h3><span class="pull-left"></span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i
            class="fa fa-angle-right"></i></a></h3>
    <div class="slimscroll chat">

    </div>
    <div class="chat-write">
        <form class="form-horizontal" action="javascript:void(0);">
            <input type="text" class="form-control" placeholder="Say something">
        </form>
    </div>
</nav>


<!--// Search Form Headrs-->


<main class="page-content content-wrap">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box">
                <a href="index.php" class="logo-text"><span>4Tech</span></a>
            </div><!-- Logo Box -->

            <div class="topmenu-outer">


                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="javascript:void(0);"
                               class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                        </li>

                        <li>
                            <a href="javascript:void(0);"
                               class="waves-effect waves-button waves-classic toggle-fullscreen"><i
                                    class="fa fa-expand"></i></a>
                        </li>


                        <li class="dropdown" loading="true" id="loadNotfctionBdg">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                               data-toggle="dropdown">
                                <i class="fa fa-bell"></i><span id="dropdownMenuNotfctionBdg"
                                                                class="badge badge-success pull-right">0</span></a>
                            <ul class="dropdown-menu title-caret dropdown-lg" role="menu">

                                <li class="dropdown-menu-list slimscroll tasks">
                                    <ul id="dropdownMenuNotfction" class="list-unstyled">

                                    </ul>
                                </li>
                                <li class="drop-all"><a href="#" class="text-center">اجهزة تحتاج صيانة</a></li>
                            </ul>

                        </li>


                        <!--تنبيهات المهممة-->

                        <li class="dropdown" loading="true" id="loadImportant">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                               data-toggle="dropdown">
                                <i id="importantEye" class="fa fa-eye"></i><span id="dropdownMenuBdgImportant"
                                                                                 class="badge badge-success pull-right">0</span></a>
                            <ul class="dropdown-menu title-caret dropdown-lg" role="menu">

                                <li class="dropdown-menu-list slimscroll tasks">
                                    <ul id="dropdownMenuImportant" class="list-unstyled">

                                    </ul>
                                </li>
                                <li class="drop-all"><a href="#" class="text-center">اجهزة مهمة</a></li>
                            </ul>
                        </li>


                        <!-- وصلت المعرض-->

                        <li class="dropdown" loading="true" id="loadInshowRoom">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                               data-toggle="dropdown">
                                <i class="fa  fa-ambulance fa-2"></i>
                                <span id="dropdownMenuBdgInshowRoom" class="badge badge-success pull-right">0</span>
                            </a>
                            <ul class="dropdown-menu title-caret dropdown-lg" role="menu">

                                <li class="dropdown-menu-list slimscroll tasks">
                                    <ul id="dropdownMenuInshowRoom" class="list-unstyled">

                                    </ul>
                                </li>
                                <li class="drop-all"><a href="#" class="text-center">اجهز وصلت المعرض</a></li>
                            </ul>

                        </li>




                        <!--اكبر من تاريخ ثلاثون يوم -->

                        <li class="dropdown" loading="true" id="loadMaxDate">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                               data-toggle="dropdown">
                                <i class="fa fa-calendar-o fa-2"></i>
                                <span id="dropdownMenuBdgMaxDate" class="badge badge-success pull-right">0</span>
                            </a>
                            <ul class="dropdown-menu title-caret dropdown-lg" id="listMAxDate" role="menu">

                                <li class="dropdown-menu-list slimscroll tasks">
                                    <ul id="dropdownMenuMaxDate" class="list-unstyled">

                                    </ul>
                                </li>
                                <li id="jsonMaxDate" class="drop-all"><a href="#" class="text-center">تاريخها تعدى 25
                                    <يوم></يوم>
                                </a></li>
                                <input type="text" id="amount" readonly
                                       style="border:0; color:#f6931f; font-weight:bold;">
                                <div id="slider-range-min"></div>

                            </ul>


                        </li>


                    </ul>

                    <ul class="nav navbar-nav navbar-center">
                        <!--صندوق البحث-->
                        <li>
                            <div class="nav nav-justified " id="searchbar">

                                <form class="navbar-form" role="search">
                                    <div class="input-group">

                                        <input type="text" class="form-control text-uppercase" name="searchID" id="searchID">
                                        <input type="text" class="form-control hidden" value="n" name="searchBy" id="searchBy" >


                                        <span class="input-group-btn" id="clearSearch">
			                            <a class="btn btn-default text-muted" href="#" title="Clear"><i class="glyphicon glyphicon-remove"></i> </a>

	                                    </span>
                                        <div class="input-group-btn" id="serachLoading">
                                            <button type="button" id="TitleBtnSearch"
                                                    class="btn btn-search btn-success">
                                                <span class="glyphicon glyphicon-user"></span>
                                                <span class="label-icon">الاسم</span>
                                            </button>
                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li>
                                                    <a href="#" datas='n'>
                                                        <span class="glyphicon glyphicon-user"></span>
                                                        <span class="label-icon">الاسم</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" datas='m'>
                                                        <span class="glyphicon glyphicon-modal-window"></span>
                                                        <span class="label-icon">هاتف</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" datas='s'>
                                                        <span class="glyphicon  glyphicon-barcode"></span>
                                                        <span class="label-icon">سيريال</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" datas='r'>
                                                        <span class="glyphicon glyphicon-pushpin"></span>
                                                        <span class="label-icon">رقم مرجعي</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </li>

                        <!--صندوق البحث-->


                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic"
                               id="showRight">
                                <i class="menu-icon glyphicon glyphicon-user"></i>
                            </a>
                        </li>
                    </ul>


                    <!-- Nav -->
                </div><!-- Top Menu -->
            </div>
        </div>
    </div><!-- Navbar -->
    <div class="page-sidebar sidebar">
        <div class="page-sidebar-inner slimscroll">
            <div class="sidebar-header">
                <div class="sidebar-profile">
                    <a href="javascript:void(0);" id="profile-menu-link">
                        <div class="sidebar-profile-image">
                            <img src="icons/afix.png" class="img-circle img-responsive"
                                 alt="">
                        </div>
                        <div class="sidebar-profile-details">
                            <span>AFix</span>
                        </div>
                    </a>
                </div>
            </div>
            <ul class="menu accordion-menu">

                <li><a onclick="AddNewCustemer();" href="#AddNewCustemer" class="waves-effect waves-button"><span
                        class="menu-icon glyphicon glyphicon-home"></span>
                    <p>عميل جديد</p></a></li>
                <li><a onclick="showDevicesIsNotFinsh();" href="#showDevicesIsNotFinsh"
                       class="waves-effect waves-button"><span
                        class="menu-icon glyphicon glyphicon-user"></span>
                    <p>حالة الاجهزة</p></a></li>


                <li><a onclick="AddNewDevices();" href="#AddNewDevices" class="waves-effect waves-button"><span
                        class="menu-icon glyphicon glyphicon-briefcase"></span>
                    <p>نوع جهاز</p></a></li>

                <li><a onclick="getListTypeDevices();" href="#getListTypeDevices"
                       class="waves-effect waves-button"><span
                        class="menu-icon glyphicon glyphicon-briefcase"></span>
                    <p>عرض انواع الاجهزة</p></a></li>

                <li><a onclick="getChart();" href="#getChart" class="waves-effect waves-button"><span
                        class="menu-icon glyphicon glyphicon-stats"></span>
                    <p>عرض بياني</p></a></li>

                <li><a onclick="mysqlBackUp();" href="#getChart" class="waves-effect waves-button"><span
                        class="menu-icon glyphicon glyphicon-stats"></span>
                    <p>نسخ احتياطي</p></a></li>
                 <li><a onclick="loadTrack();" href="#getTrackNumber" class="waves-effect waves-button"><span
                                        class="menu-icon glyphicon glyphicon-stats"></span>
                                    <p>توليد بوليصة شحن</p></a></li>


            </ul>
        </div><!-- Page Sidebar Inner -->
    </div><!-- Page Sidebar -->
    <div class="page-inner">
        <div id="titlePage"></div>

        <div id="ContenerHeadr"  class="row hideElment">
            <div class="input-group">
                <input type="text" class="form-control" name="trackNumber" placeholder="اضف رقم البوليصة" aria-describedby="basic-addon2">
                <span onclick="addTracks();" class="btn input-group-addon">اضافة للبوليصة</span>
                <span onclick="removeTracks();" class="btn input-group-addon">حذف الكل</span>
            </div>
            <br/>
        </div>


        <div id="Contener" class="row">


        </div><!-- Row -->


        <div class="page-footer">
            <p class="no-s">2016</p>
        </div>
    </div><!-- Page Inner -->
</main><!-- Page Content -->
<div class="cd-overlay"></div>


<div id="myModalImagesViewrer" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<!--ادوات التول بار الخاصة بارسال -->
<div id="toolbar-options" class="hidden">
    <a dataID="0" href="#"><i id="0" class="fa fa-phone"></i></a>
    <a dataID="1" href="#"><i id="1" class="fa fa-commenting"></i></a>
    <a dataID="2" href="#"><i id="2" class="fa fa-cloud"></i></a>
    <a dataID="3" href="#"><i id="3" class="fa fa-blind"></i></a>
</div>



<!--تحميل التمبلت-->
<?php require ('js/tpl/tpl.html'); ?>


 
<!-- Javascripts -->
<script src="style/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="style/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="js/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="style/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="style/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="style/assets/plugins/waves/waves.min.js"></script>
<script src="js/plugins/notie/notie.js"></script>
<script src="js/SimpleAjaxUploader.js"></script>
<script src="js/plugins/EasyAutocomplete/jquery.easy-autocomplete.min.js"></script>
<script src="js/plugins/jqueryTmpl/jquery.tmpl.js"></script>
<script src="js/plugins/waitMe/waitMe.js"></script>
<script src="js/plugins/move/move.min.js"></script>
<script src="js/plugins/toolbar/jquery.toolbar.js"></script>
<script src="js/plugins/clipboard/clipboard.min.js"></script>
<script src="js/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
<script src="js/plugins/navigo/navigo.min.js"></script>
<script src="bower_components/bootstrap3-dialog/src/js/bootstrap-dialog.js"></script>
<script src="bower_components/fly/src/fly.js"></script>
<script src="js/MyJs.js"></script>


</body>
</html>