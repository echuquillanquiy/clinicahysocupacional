<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MediHub - Medical & Health Template">

    <!-- ========== Page Title ========== -->
    <title>Red Clínicas H&S</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('webPage/assets/img/favicon.png') }}" type="image/x-icon">

    @include('webPage.includes.styles')
</head>

<body>

<!-- Preloader Start -->
<div class="se-pre-con"></div>
<!-- Preloader Ends -->

<!-- Header
============================================= -->
@include('webPage.includes.header')
<!-- End Header -->

<!-- Start Banner
============================================= -->
@include('webPage.includes.slider')
<!-- End Banner -->



<!-- Start About
============================================= -->
@include('webPage.includes.about')
<!-- End About -->

<!-- Start Services
============================================= -->
@include('webPage.includes.services')
<!-- End Services -->

<!-- Start Doctors Tips
============================================= -->
@include('webPage.includes.places')
<!-- End Doctors Tips -->

<!-- Start Fun Factor
============================================= -->
<!-- End Fun Factor -->

<!-- Start Blog
============================================= -->
@include('webPage.includes.works')
<!-- End Blog -->

<!-- Start Footer
============================================= -->
@include('webPage.includes.footer')
<!-- End Footer -->

@include('webPage.includes.scripts')

</body>
</html>
