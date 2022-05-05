<!-- BEGIN: Vendor JS-->
<script src="{{ asset('theme/app-assets/vendors/js/vendors.min.js') }}"></script>

<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('theme/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('theme/app-assets/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/js/core/app.min.js') }}"></script>
<script src="{{ asset('theme/app-assets/js/scripts/customizer.min.js') }}"></script>
<script src="{{ asset('css/sweetalerts/sweetalert2.min.js') }}"></script>

<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

<script>
    $(window).on('load',  function(){
        if (feather) {
            feather.replace({ width: 14, height: 14 });
        }
    })
</script>

@livewireScripts
