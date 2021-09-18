<script src=""></script>
<script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('backend/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
<!-- App js -->
<script src="{{ asset('backend/assets/js/app.js') }}"></script>
<script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@if (Session::has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ Session::get('success') }}',
            showConfirmButton: true,
            timer: 1500
        })
    </script>
@endif
@if (Session::has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '{{ Session::get('error') }}',
            showConfirmButton: true,
        })
    </script>
@endif
