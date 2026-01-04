<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }} | </title>
<!-- Bootstrap -->

    <link href="{{asset('admin-panel/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
 

    <!-- Custom Theme Style -->
    <link href="{{asset('admin-panel/css/custom.min.css')}}" rel="stylesheet">
  </head>


  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      
          @include('admin-panel.layouts.sidebar')


        <!-- top navigation -->
          @include('admin-panel.layouts.navbar')
       
        <!-- /top navigation -->

     @yield('content')

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            {{ env('APP_NAME') }} - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('admin-panel/js/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('admin-panel/js/bootstrap.min.js')}}"></script>
   
    <!-- Custom Theme Scripts -->
    <script src="{{asset('admin-panel/js/custom.min.js')}}"></script>
	@stack('scripts')
  </body>
</html>
