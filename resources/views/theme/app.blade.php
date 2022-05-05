<!DOCTYPE html>

<html class="loading" lang="es" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard ecommerce - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    @include('theme.styles')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern footer-static pace-done navbar-sticky menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
@include('theme.header')
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('theme.sidebar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Customizer-->
<div class="customizer d-none d-md-block"><a class="customizer-toggle d-flex align-items-center justify-content-center" href="javascript:void(0);"><i class="spinner" data-feather="settings"></i></a><div class="customizer-content">
        <!-- Customizer header -->
        <div class="customizer-header px-2 pt-1 pb-0 position-relative">
            <h4 class="mb-0">Theme Customizer</h4>
            <p class="m-0">Customize & Preview in Real Time</p>

            <a class="customizer-close" href="javascript:void(0);"><i data-feather="x"></i></a>
        </div>

        <hr />

        <!-- Styling & Text Direction -->
        <div class="customizer-styling-direction px-2">
            <p class="font-weight-bold">Skin</p>
            <div class="d-flex">
                <div class="custom-control custom-radio mr-1">
                    <input
                        type="radio"
                        id="skinlight"
                        name="skinradio"
                        class="custom-control-input layout-name"
                        checked
                        data-layout=""
                    />
                    <label class="custom-control-label" for="skinlight">Light</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input
                        type="radio"
                        id="skinbordered"
                        name="skinradio"
                        class="custom-control-input layout-name"
                        data-layout="bordered-layout"
                    />
                    <label class="custom-control-label" for="skinbordered">Bordered</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input
                        type="radio"
                        id="skindark"
                        name="skinradio"
                        class="custom-control-input layout-name"
                        data-layout="dark-layout"
                    />
                    <label class="custom-control-label" for="skindark">Dark</label>
                </div>
                <div class="custom-control custom-radio">
                    <input
                        type="radio"
                        id="skinsemidark"
                        name="skinradio"
                        class="custom-control-input layout-name"
                        data-layout="semi-dark-layout"
                    />
                    <label class="custom-control-label" for="skinsemidark">Semi Dark</label>
                </div>
            </div>
        </div>

        <hr />

        <!-- Menu -->
        <div class="customizer-menu px-2">
            <div id="customizer-menu-collapsible" class="d-flex">
                <p class="font-weight-bold mr-auto m-0">Menu Collapsed</p>
                <div class="custom-control custom-control-primary custom-switch">
                    <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch" />
                    <label class="custom-control-label" for="collapse-sidebar-switch"></label>
                </div>
            </div>
        </div>
        <hr />

        <!-- Layout Width -->
        <div class="customizer-footer px-2">
            <p class="font-weight-bold">Layout Width</p>
            <div class="d-flex">
                <div class="custom-control custom-radio mr-1">
                    <input type="radio" id="layout-width-full" name="layoutWidth" class="custom-control-input" checked />
                    <label class="custom-control-label" for="layout-width-full">Full Width</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input type="radio" id="layout-width-boxed" name="layoutWidth" class="custom-control-input" />
                    <label class="custom-control-label" for="layout-width-boxed">Boxed</label>
                </div>
            </div>
        </div>
        <hr />

        <!-- Navbar -->
        <div class="customizer-navbar px-2">
            <div id="customizer-navbar-colors">
                <p class="font-weight-bold">Navbar Color</p>
                <ul class="list-inline unstyled-list">
                    <li class="color-box bg-white border selected" data-navbar-default=""></li>
                    <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                    <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
                    <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                    <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                    <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                    <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                    <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
                </ul>
            </div>

            <p class="navbar-type-text font-weight-bold">Navbar Type</p>
            <div class="d-flex">
                <div class="custom-control custom-radio mr-1">
                    <input type="radio" id="nav-type-floating" name="navType" class="custom-control-input" checked />
                    <label class="custom-control-label" for="nav-type-floating">Floating</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input type="radio" id="nav-type-sticky" name="navType" class="custom-control-input" />
                    <label class="custom-control-label" for="nav-type-sticky">Sticky</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input type="radio" id="nav-type-static" name="navType" class="custom-control-input" />
                    <label class="custom-control-label" for="nav-type-static">Static</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="nav-type-hidden" name="navType" class="custom-control-input" />
                    <label class="custom-control-label" for="nav-type-hidden">Hidden</label>
                </div>
            </div>
        </div>
        <hr />

        <!-- Footer -->
        <div class="customizer-footer px-2">
            <p class="font-weight-bold">Footer Type</p>
            <div class="d-flex">
                <div class="custom-control custom-radio mr-1">
                    <input type="radio" id="footer-type-sticky" name="footerType" class="custom-control-input" />
                    <label class="custom-control-label" for="footer-type-sticky">Sticky</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input type="radio" id="footer-type-static" name="footerType" class="custom-control-input" checked />
                    <label class="custom-control-label" for="footer-type-static">Static</label>
                </div>
                <div class="custom-control custom-radio mr-1">
                    <input type="radio" id="footer-type-hidden" name="footerType" class="custom-control-input" />
                    <label class="custom-control-label" for="footer-type-hidden">Hidden</label>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End: Customizer-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
@include('theme.footer')
<!-- END: Footer-->


@include('theme.scripts')

@yield('scriptWork')
</body>
<!-- END: Body-->

<!--   Tue, 19 Jan 2021 12:05:50 GMT -->
</html>
