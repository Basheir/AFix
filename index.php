<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Basheir">
    <link rel="icon" href="images/favicon.ico">

    <title>AFix</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/dashboard.css">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-rtl.css">


    <link rel="stylesheet" href="css/progressBar/css/style.css">
    <link rel="stylesheet" href="css/Mycss.css">
    <link rel="stylesheet" href="css/ihover.css">
    <link rel="stylesheet" href="js/sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" href="js/owlCarousel/owl.carousel.css">
    <link rel="stylesheet" href="js/owlCarousel/owl.theme.css">
    <link href="css/stylesUploadFile.css" rel="stylesheet">
    <link rel="stylesheet" href="css/easy-autocomplete.min.css">
    <link rel="stylesheet" href="css/easy-autocomplete.themes.css">
    <link href="css/ggpopover.min.css" rel="stylesheet"/>
    <link href="css/owl.carousel.css" rel="stylesheet"/>


</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">AFix</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li><a href="#AddNewCustemer" onclick="AddNewCustemer();"> اضافة عميل </a></li>
                <li><a href="#AddnewstatUsLabel" onclick="AddNewDevices();" ">اضافة نوع جهاز</a> </li>
                <li><a href="#AddnewstatUsLabel" onclick="showDevicesIsNotFinsh();" ">متابعة حالة الاجهزة</a> </li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" name="searchID" dataSearch="c" class="form-control searchClassType"
                       placeholder="Search...">

            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div id="cd-cart" class="col-sm-3 col-md-2 sidebar">


        </div>


        <div class="col-sm-9">


            <h1 class="page-header">اجهزة العملاء</h1>

            <div id="Contener" class="row placeholders">


            </div>


        </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!--اضافة جافا -->

    <script src="js/SimpleAjaxUploader.js"></script>
    <script src="js/MyJs.js" type="text/javascript"></script>
    <script src="js/notie.js" type="text/javascript"></script>
    <script src="js/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/owlCarousel/owl.carousel.min.js"></script>
    <script src="js/jquery.easy-autocomplete.min.js"></script>


</body>
</html>
