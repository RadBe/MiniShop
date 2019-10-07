<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('admin/images/favicon.ico')}}">

    <title>Лалала</title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor_components/bootstrap/dist/css/bootstrap.css')}}">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{asset('admin/main/css/bootstrap-extend.css')}}?v={{time()}}">

    <!-- theme style -->
    <link rel="stylesheet" href="{{asset('admin/main/css/master_style.css')}}">

    <!-- Fab Admin skins -->
    <link rel="stylesheet" href="{{asset('admin/main/css/skins/_all-skins.css')}}?v={{time()}}">

    <!-- Vector CSS -->
    <link href="{{asset('admin/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />

    <!-- Morris charts -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor_components/morris.js/morris.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">

    <header class="main-header">
        <a href="{{route('admin')}}" class="logo">
            <b class="logo-mini">
                <span class="light-logo"><img src="{{asset('admin/images/logo-light.png')}}" alt="logo"></span>
                <span class="dark-logo"><img src="{{asset('admin/images/logo-dark.png')}}" alt="logo"></span>
            </b>
            <span class="logo-lg">
		  <img src="{{asset('admin/images/logo-light-text.png')}}" alt="logo" class="light-logo">
	  	  <img src="{{asset('admin/images/logo-dark-text.png')}}" alt="logo" class="dark-logo">
	  </span>
        </a>
        <nav class="navbar navbar-static-top">

        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li><a href="{{route('admin.category.index')}}">
                        <i class="fas fa-stream"></i> <span>Категории</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a></li>
                <li><a href="{{route('admin.product.index')}}">
                        <i class="fas fa-stream"></i> <span>Товары</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a></li>
                <li><a href="{{route('admin.order.index')}}">
                        <i class="fas fa-stream"></i> <span>Заказы</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a></li>
                <li><a href="{{route('admin.review.index')}}">
                        <i class="fas fa-stream"></i> <span>Отзывы</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a></li>
            </ul>
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Главная</a></li>
                <li class="breadcrumb-item active">Доска</li>
            </ol>
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right d-none d-sm-inline-block">
            <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                <!-- TODO: footer -->
            </ul>
        </div>
        &copy; 2019 <a href="https://www.multipurposethemes.com/">Multi-Purpose Themes</a>. All Rights Reserved.
    </footer>
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="{{asset('admin/assets/vendor_components/jquery/dist/jquery.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/assets/vendor_components/jquery-ui/jquery-ui.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- popper -->
<script src="{{asset('admin/assets/vendor_components/popper/dist/popper.min.js')}}"></script>

<!-- Bootstrap 4.0-->
<script src="{{asset('admin/assets/vendor_components/bootstrap/dist/js/bootstrap.js')}}"></script>

<!-- ChartJS -->
<script src="{{asset('admin/assets/vendor_components/chart.js-master/Chart.min.js')}}"></script>

<!-- Slimscroll -->
<script src="{{asset('admin/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- FastClick -->
<script src="{{asset('admin/assets/vendor_components/fastclick/lib/fastclick.js')}}"></script>

<!-- peity -->
<script src="{{asset('admin/assets/vendor_components/jquery.peity/jquery.peity.js')}}"></script>

<!-- Morris.js charts -->
<script src="{{asset('admin/assets/vendor_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor_components/morris.js/morris.min.js')}}"></script>

<!-- Fab Admin App -->
<script src="{{asset('admin/main/js/template.js')}}"></script>

<!-- Fab Admin dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/main/js/pages/dashboard.js')}}"></script>

<!-- Fab Admin for demo purposes -->
<script src="{{asset('admin/main/js/demo.js')}}"></script>

<!-- Vector map JavaScript -->
<script src="{{asset('admin/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('admin/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('admin/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-us-aea-en.js')}}"></script>

</body>
</html>