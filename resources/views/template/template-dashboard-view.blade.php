<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="" />
    <title>Dashboard - SuperAdmin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom-select.css') }}">
</head>

<body class="sb-nav-fixed">
    @include('template.partials.navbar-view')
    <div id="layoutSidenav">
        @include('template.partials.sidenav-view')
        <div id="layoutSidenav_content">
            @yield('side-nav-content')
        </div>

    </div>
    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery/jquery-ui.min.js') }}"></script>
    @yield('script-tag')
</body>

</html>
