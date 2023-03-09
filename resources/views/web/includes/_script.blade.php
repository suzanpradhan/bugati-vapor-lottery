<!-- plugins:js -->
<script src="{{asset('dashboard/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<script src="{{asset('dashboard/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

<script>
    $(document).ready(function() {
        toastr.options = {
            "positionClass": "toast-top-right",
            "progressBar": true,
            "closeButton":true,
        }

        @if (Session::has('success'))
            toastr.success("{{ session('success') }}")
        @endif

        @if (Session::has('error-message'))
            toastr.error("{{ session('error-message') }}")
        @endif
    });
</script>

@stack('extra-scripts')