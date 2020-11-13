<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/static/js/jquery.js"></script>
    <!-- <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="https://cdn.bootcss.com/bootbox.js/4.4.0/bootbox.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- favicon
		============================================ -->


<!-- icheck JS
        ============================================ -->
<script src="/static/js/icheck/icheck.min.js"></script>
<script src="/static/js/icheck/icheck-active.js"></script>
<!-- 表单的js结束 -->
    <link rel="shortcut icon" type="image/x-icon" href="/static/img/favicon.ico">
    
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/owl.carousel.css">
    <link rel="stylesheet" href="/static/css/owl.theme.css">
    <link rel="stylesheet" href="/static/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="/static/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/static/css/calendar/fullcalendar.print.min.css">
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/editor/select2.css">
    <link rel="stylesheet" href="/static/css/editor/datetimepicker.css">
    <link rel="stylesheet" href="/static/css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="/static/css/editor/x-editor-style.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="/static/css/data-table/bootstrap-editable.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="/static/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/responsive.css">

    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/modals.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="/static/css/form/all-type-forms.css">

    <!-- modernizr JS
		============================================ -->
    <script src="/static/js/vendor/modernizr-2.8.3.min.js"></script>
    
    <!-- jquery
        ============================================ -->
    <!-- <script src="/static/js/jquery.min.js"></script> -->
    
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="/"><img class="main-logo" src="/static/img/logo/logo.png" alt="" /></a>
                <strong><img src="/static/img/logo/logosn.png" alt="" /></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar" style="height: 100%">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li>
                            <a href="/">
                                <i class="fa big-icon fa-home icon-wrap"></i>
                                <span class="mini-click-non">首页</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow" href="index.html">
                                <i class="fa big-icon fa-files-o icon-wrap"></i>
								   <span class="mini-click-non">题库</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="{{url('/question/danadd')}}"><i class="fa" aria-hidden="true"></i> <span class="mini-sub-pro">添加单选题</span></a></li>
                                <li><a title="Dashboard v.2" href="{{url('/question/duoadd')}}"><i class="fa" aria-hidden="true"></i> <span class="mini-sub-pro">添加多选题</span></a></li>
                                <li><a title="Dashboard v.3" href="{{url('/question/jianadd')}}"><i class="fa" aria-hidden="true"></i> <span class="mini-sub-pro">添加简答题</span></a></li>
                                <li><a title="Dashboard v.3" href="{{url('/question/index')}}"><i class="fa" aria-hidden="true"></i> <span class="mini-sub-pro">展示页面</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="/teacher" aria-expanded="false"><i class="fa big-icon fa-envelope icon-wrap"></i> <span class="mini-click-non">讲师审核模块</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="/teacher"><i class="fa fa-inbox sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">讲师注册展示</span></a></li>
                                <li><a title="Inbox" href="/teacher/indexis"><i class="fa fa-inbox sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">讲师审核展示</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fa big-icon fa-flask icon-wrap"></i> <span class="mini-click-non">课程</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="/course/type/create"><i class="fa fa-map-marker sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">课程分类添加</span></a></li>
                                <li><a title="Google Map" href="/course/create"><i class="fa fa-map-marker sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">课程添加</span></a></li>
                                <li><a title="Data Maps" href="/course/index"><i class="fa fa-map-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">课程展示</span></a></li>
                                <li><a title="Data Maps" href="/course/section/create"><i class="fa fa-map-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">章程添加</span></a></li>
                                <li><a title="Data Maps" href="/course/knob/create"><i class="fa fa-map-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">节添加</span></a></li>
                                <li><a title="Data Maps" href="/course/hour/create"><i class="fa fa-map-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">课时添加</span></a></li>
                                <li><a title="Data Maps" href="/course/video/create"><i class="fa fa-map-o sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">视频添加</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="fa big-icon fa-pie-chart icon-wrap"></i> <span class="mini-click-non">考试</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="File Manager" href="{{url('/exam/add')}}"><i class="fa fa-folder sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">添加考题</span></a></li>
                                <li><a title="Blog" href="{{url('/exam/index')}}"><i class="fa fa-square sub-icon-mg" aria-hidden="true"></i> <span class="mini-sub-pro">考试展示</span></a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a class="has-arrow" href="javascript:;" aria-expanded="false">
                                <i class="fa big-icon fa-desktop icon-wrap"></i>
                                <span class="mini-click-non">管理员模块</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li>
                                    <a class="has-arrow" href="javascript:;" aria-expanded="false">
                                        <i class="fa fa-television sub-icon-mg"></i>
                                        <span class="mini-click-non">管理员管理</span>
                                    </a>
                                    <ul class="submenu-angle" aria-expanded="false">
                                        <li>
                                            <a title="Basic Form Elements" href="{{url('admin/create')}}">
                                                <i class="fa fa-pencil sub-icon-mg" aria-hidden="true"></i>
                                                <span class="mini-sub-pro">管理员添加</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Advance Form Elements" href="{{url('admin')}}">
                                                <i class="fa big-icon fa-table icon-wrap" aria-hidden="true"></i>
                                                <span class="mini-sub-pro">管理员展示</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:;" aria-expanded="false">
                                        <i class="fa fa-heart-o sub-icon-mg"></i>
                                        <span class="mini-click-non">角色管理</span>
                                    </a>
                                    <ul class="submenu-angle" aria-expanded="false">
                                        <li>
                                            <a title="Basic Form Elements" href="{{url('roles/create')}}">
                                                <i class="fa fa-pencil sub-icon-mg" aria-hidden="true"></i>
                                                <span class="mini-sub-pro">角色添加</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Advance Form Elements" href="{{url('roles')}}">
                                                <i class="fa big-icon fa-table icon-wrap" aria-hidden="true"></i>
                                                <span class="mini-sub-pro">角色展示</span>
                                            </a>
                                        </li>
                                    </ul>
                                <li>
                                    <a class="has-arrow" href="javascript:;" aria-expanded="false">
                                        <i class="fa fa-circle sub-icon-mg"></i>
                                        <span class="mini-click-non">权限管理</span>
                                    </a>
                                    <ul class="submenu-angle" aria-expanded="false">
                                        <li>
                                            <a title="Basic Form Elements" href="{{url('power/create')}}">
                                                <i class="fa fa-pencil sub-icon-mg" aria-hidden="true"></i>
                                                <span class="mini-sub-pro">权限添加</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Advance Form Elements" href="{{url('power')}}">
                                                <i class="fa big-icon fa-table icon-wrap" aria-hidden="true"></i>
                                                <span class="mini-sub-pro">权限展示</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="javascript:;" aria-expanded="false">
                                        <i class="fa fa-object-ungroup sub-icon-mg"></i>
                                        <span class="mini-click-non">管理员角色管理</span>
                                    </a>
                                    <ul class="submenu-angle" aria-expanded="false">
                                        <li>
                                            <a title="Basic Form Elements" href="{{url('admin_role/create')}}">
                                                <i class="fa fa-pencil sub-icon-mg" aria-hidden="true"></i>
                                                <span class="mini-sub-pro">管理员赋值角色</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Advance Form Elements" href="{{url('admin_role')}}">
                                                <i class="fa big-icon fa-table icon-wrap" aria-hidden="true"></i>
                                                <span class="mini-sub-pro">管理员角色展示</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="mailbox.html" aria-expanded="false">
                                        <i class="fa fa-pie-chart sub-icon-mg"></i>
                                        <span class="mini-click-non">角色权限管理</span>
                                    </a>
                                    <ul class="submenu-angle" aria-expanded="false">
                                        <li>
                                            <a title="Basic Form Elements" href="{{url('role_power/create')}}">
                                                <i class="fa fa-pencil sub-icon-mg" aria-hidden="true"></i>
                                                <span class="mini-sub-pro">角色赋值权限</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Advance Form Elements" href="{{url('role_power')}}">
                                                <i class="fa big-icon fa-table icon-wrap" aria-hidden="true"></i>
                                                <span class="mini-sub-pro">角色权限展示</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="/static/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <span class="fa fa-tasks"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="/" class="nav-link">首页</a>
                                                </li>
                                                <li class="nav-item"><a href="/question/index" class="nav-link">题库</a>
                                                </li>
                                                <li class="nav-item"><a href="/course/index" class="nav-link">课程</a>
                                                </li>
                                                <li class="nav-item"><a href="/teacher/indexis" class="nav-link">讲师审核</a>
                                                </li>
                                                <li class="nav-item"><a href="/exam/index" class="nav-link">考试</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" role="button" class="nav-link dropdown-toggle">
                                                        <i class="fa fa-user adminpro-user-rounded header-riht-inf" aria-hidden="true"></i>
                                                        <span class="admin-name">{{session('admin_info')->admin_name}}</span>
                                                        <i class="fa adminpro-icon adminpro-down-arrow"></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item nav-setting-open">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <span class="glyphicon glyphicon-log-out" id="loginOut"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.html">Dashboard v.1</a></li>
                                                <li><a href="index-1.html">Dashboard v.2</a></li>
                                                <li><a href="index-3.html">Dashboard v.3</a></li>
                                                <li><a href="product-list.html">Product List</a></li>
                                                <li><a href="product-edit.html">Product Edit</a></li>
                                                <li><a href="product-detail.html">Product Detail</a></li>
                                                <li><a href="product-cart.html">Product Cart</a></li>
                                                <li><a href="product-payment.html">Product Payment</a></li>
                                                <li><a href="analytics.html">Analytics</a></li>
                                                <li><a href="widgets.html">Widgets</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="mailbox.html">Inbox</a>
                                                </li>
                                                <li><a href="mailbox-view.html">View Mail</a>
                                                </li>
                                                <li><a href="mailbox-compose.html">Compose Mail</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#others" href="#">Miscellaneous <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="others" class="collapse dropdown-header-top">
                                                <li><a href="file-manager.html">File Manager</a></li>
                                                <li><a href="contacts.html">Contacts Client</a></li>
                                                <li><a href="projects.html">Project</a></li>
                                                <li><a href="project-details.html">Project Details</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                                <li><a href="404.html">404 Page</a></li>
                                                <li><a href="500.html">500 Page</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="google-map.html">Google Map</a>
                                                </li>
                                                <li><a href="data-maps.html">Data Maps</a>
                                                </li>
                                                <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                                </li>
                                                <li><a href="x-editable.html">X-Editable</a>
                                                </li>
                                                <li><a href="code-editor.html">Code Editor</a>
                                                </li>
                                                <li><a href="tree-view.html">Tree View</a>
                                                </li>
                                                <li><a href="preloader.html">Preloader</a>
                                                </li>
                                                <li><a href="images-cropper.html">Images Cropper</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="bar-charts.html">Bar Charts</a>
                                                </li>
                                                <li><a href="line-charts.html">Line Charts</a>
                                                </li>
                                                <li><a href="area-charts.html">Area Charts</a>
                                                </li>
                                                <li><a href="rounded-chart.html">Rounded Charts</a>
                                                </li>
                                                <li><a href="c3.html">C3 Charts</a>
                                                </li>
                                                <li><a href="sparkline.html">Sparkline Charts</a>
                                                </li>
                                                <li><a href="peity.html">Peity Charts</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="static-table.html">Static Table</a>
                                                </li>
                                                <li><a href="data-table.html">Data Table</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="formsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="login.html">Login</a>
                                                </li>
                                                <li><a href="register.html">Register</a>
                                                </li>
                                                <li><a href="lock.html">Lock</a>
                                                </li>
                                                <li><a href="password-recovery.html">Password Recovery</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            @php
                $url_name=request()->route()->getName();
            @endphp
            @if($url_name=='indexs')
                <div class="breadcome-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcome-list">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="breadcome-heading">
                                                <form role="search" class="">
                                                    <input type="text" placeholder="Search..." class="form-control">
                                                    <a href=""><i class="fa fa-search"></i></a>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <ul class="breadcome-menu">
                                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                                </li>
                                                <li><span class="bread-blod">Dashboard V.1</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($url_name=="question")

            @elseif($url_name=='teacher')

            @elseif($url_name=='indexis')

           
            @else
                <div class="breadcome-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcome-list single-page-breadcome">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="breadcome-heading">
                                                <form role="search" class="">
                                                    <input type="text" placeholder="Search..." class="form-control">
                                                    <a href=""><i class="fa fa-search"></i></a>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <ul class="breadcome-menu">
                                                <li><a href="">Home</a> <span class="bread-slash">/</span>
                                                </li>
                                                <li><span class="bread-blod">Data Table</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
        </div>


            @yield("content")

        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; 2020.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    {{--隐藏 点击触发 开始--}}
    <div class="modal-bootstrap modal-login-form" style="display: none">
        <a id="success" class="zoomInDown mg-t" href="#" data-toggle="modal" data-target="#zoomInDown1">Modal Login Form</a>
    </div>
    {{--隐藏 点击触发 结束--}}
    <div id="zoomInDown1" class="modal modal-adminpro-general modal-zoomInDown fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <div class="modal-login-form-inner">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="basic-login-inner modal-basic-inner">
                                    <h3>在线教育-后台系统提示语：</h3>
                                    <p>Online Education-Background System Prompt:</p>
                                    <form action="javascript:;">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <label id="prompt"></label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <div class="login-horizental">
                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit" id="jump"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  

</body>

</html>

<script>
    $(function(){
        var _with="{{session('msg')}}"
        //判断
        if(_with!=''){
            //触发alert弹框
            $('#success').trigger('click')
            //删除标签
            $('.modal-basic-inner ').find('form').remove()
            //提示语
            $('.modal-basic-inner ').append('<h3>'+_with+'</h3>')
        }

        /**
         * 退出登录
         */
        $(document).on('click','#loginOut',function(){
            //跳转
            location.href='/loginOut'
        })
    })
</script>

 <!-- jquery
        ============================================ -->
    <script src="/static/js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="/static/js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="/static/js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="/static/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="/static/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="/static/js/owl.carousel.min.js"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="/static/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="/static/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="/static/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/static/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="/static/js/metisMenu/metisMenu.min.js"></script>
    <script src="/static/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
        ============================================ -->
    <!-- <script src="/static/js/morrisjs/raphael-min.js"></script>
    <script src="/static/js/morrisjs/morris.js"></script>
    <script src="/static/js/morrisjs/morris-active.js"></script> -->
    <!-- morrisjs JS
        ============================================ -->
    <script src="/static/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="/static/js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="/static/js/calendar/moment.min.js"></script>
    <script src="/static/js/calendar/fullcalendar.min.js"></script>
    <script src="/static/js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="/static/js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="/static/js/main.js"></script>

       <!-- 表格的js开始 -->
<!-- data table JS
        ============================================ -->
<script src="/static/js/data-table/bootstrap-table.js"></script>
<script src="/static/js/data-table/tableExport.js"></script>
<script src="/static/js/data-table/data-table-active.js"></script>
<script src="/static/js/data-table/bootstrap-table-editable.js"></script>
<script src="/static/js/data-table/bootstrap-editable.js"></script>
<script src="/static/js/data-table/bootstrap-table-resizable.js"></script>
<script src="/static/js/data-table/colResizable-1.5.source.js"></script>
<script src="/static/js/data-table/bootstrap-table-export.js"></script>
<!--  editable JS
    ============================================ -->
<script src="/static/js/editable/jquery.mockjax.js"></script>
<script src="/static/js/editable/mock-active.js"></script>
<script src="/static/js/editable/select2.js"></script>
<script src="/static/js/editable/moment.min.js"></script>
<script src="/static/js/editable/bootstrap-datetimepicker.js"></script>
<script src="/static/js/editable/bootstrap-editable.js"></script>
<script src="/static/js/editable/xediable-active.js"></script>
<!-- Chart JS
    ============================================ -->
<script src="/static/js/chart/jquery.peity.min.js"></script>
<script src="/static/js/peity/peity-active.js"></script>
<!-- tab JS
    ============================================ -->
<script src="/static/js/tab.js"></script>
<!-- 表格的js结束 -->

<!-- 表单的js开始 -->
<!-- icheck JS
		============================================ -->
<script src="/static/js/icheck/icheck.min.js"></script>
<script src="/static/js/icheck/icheck-active.js"></script>
<!-- 表单的js结束 -->