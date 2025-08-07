<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Btp App users</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/users/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/users/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    @include('layouts.users.inc.users-sidebar')
    <!--  sidebar -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  navbar -->
            @include('layouts.users.inc.users-navbar')
            <div class="container-fluid">
                    @yield('content')
                <!--  footer -->
                @include('layouts.users.inc.users-footer')
            </div>
        </div>
  </div>
  <script src="{{ asset('assets/users/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/users/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/users/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/users/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/users/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/users/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('assets/users/js/dashboard.js') }}"></script>
</body>

</html>