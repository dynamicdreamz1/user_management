<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | @yield('page_title') </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('theme/adminlte/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('theme/adminlte/css/ionicons.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('theme/adminlte/css/icheck-bootstrap.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('theme/adminlte/css/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme/adminlte/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('styles')
</head>
<body @yield('bodytag')>

@yield('content')

<!-- jQuery -->
<script src="{{ asset('theme/adminlte/js/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('theme/adminlte/js/bootstrap.bundle.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('theme/adminlte/js/toastr.min.js') }}"></script>
<script>
    @if(Session::has('toastr'))
        var type = "{{ Session::get('type') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('toastr') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('toastr') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('toastr') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('toastr') }}");
                break;
        }
    @endif
</script>
<!-- AdminLTE App -->
<script src="{{ asset('theme/adminlte/js/adminlte.min.js') }}"></script>

@yield('scripts')

</body>
</html>
