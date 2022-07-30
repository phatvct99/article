<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ URL::asset('backend/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset ('backend/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/vendor/bootstrap-select/css/bootstrap-select.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('backend/vendor/datatables/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('backend/vendor/datatables/css/buttons.bootstrap4.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('backend/vendor/datatables/css/select.bootstrap4.css') }}">
    <link rel="stylesheet"  href="{{ URL::asset('backend/vendor/datatables/css/fixedHeader.bootstrap4.css') }}">
    <title>Tấn Phát</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        @include("backend.container.header")
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        
        @include("backend.container.sidebar")
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            @yield('content')
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ URL::asset('backend/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
        <!-- bootstap bundle js -->
        <script src="{{ URL::asset('backend/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
        <!-- slimscroll js -->
        <script src="{{ URL::asset('backend/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
        <!-- main js -->
        <script src="{{ URL::asset('backend/libs/js/main-js.js') }}"></script>
        <!-- chart chartist js -->
        <script src="{{ URL::asset('backend/vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
        <!-- sparkline js -->
        <script src="{{ URL::asset('backend/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
        <!-- morris js -->
        <script src="{{ URL::asset('backend/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
        <script src="{{ URL::asset('backend/vendor/charts/morris-bundle/morris.js') }}"></script>
        <!-- chart c3 js -->
        <script src="{{ URL::asset('backend/libs/js/dashboard-ecommerce.js') }}"></script>
        <script src="{{ URL::asset('backend/vendor/charts/c3charts/c3.min.js') }}"></script>
        <script src="{{ URL::asset('backend/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
        <script src="{{ URL::asset('backend/vendor/charts/c3charts/C3chartjs.js') }}"></script>
        <script src="{{ URL::asset('backend/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
        <script src="{{ URL::asset('backend/vendor/charts/morris-bundle/Morrisjs.js') }}"></script>
        <script src="{{ URL::asset('backend/vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
        <script src="{{ URL::asset('backend/vendor/charts/chartist-bundle/Chartistjs.js') }}"></script>
        <script src="{{ URL::asset('backend/vendor/charts/charts-bundle/Chart.bundle.js') }}"></script>
        <script src="{{ URL::asset('backend/vendor/charts/charts-bundle/chartjs.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  

        <script src="{{ URL::asset('backend/vendor/bootstrap-select/js/bootstrap-select.js') }}"></script>

        <script src="{{ URL::asset('backend/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="{{ URL::asset('backend/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ URL::asset('backend/vendor/datatables/js/data-table.js') }}"></script>
        <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        @yield('script')
        
        <script type = "text/javascript">
            var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        };
        $('#lfm').filemanager('image');
        </script>

      <script>
         CKEDITOR.replace('content', options);
      </script>

        <script>
        function countChar(val) {
            var len = val.value.length;
            if (len >= 160) {
              val.value = val.value.substring(0, 160);
            } else {
              $('#charNum').text(0 + len + '/160');
            }
      };
      </script>
</body>
 
</html>