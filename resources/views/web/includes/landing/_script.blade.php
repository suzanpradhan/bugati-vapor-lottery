<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('landing/js/scripts.js')}}"></script>
<script>
    $(".alert").delay(5000).queue(function() {
        $(this).remove();
    });
</script>
<!-- Toastr -->
{{-- <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script> --}}

{{-- <script>
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
</script> --}}
