<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Btp App Admin</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('assets/admin/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    @include('layouts.admin.inc.admin-sidebar')
    <!--  sidebar -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  navbar -->
            @include('layouts.admin.inc.admin-navbar')
            <div class="container-fluid">
                    @yield('content')
                <!--  footer -->
                @include('layouts.admin.inc.admin-footer')
            </div>
        </div>
  </div>
  <script src="{{ asset('assets/admin/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
  <script src="{{ asset('assets/admin/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/admin/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
</body>

</html>