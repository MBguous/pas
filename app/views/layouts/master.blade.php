<html ng-app="tppasApp">
  <head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mahesh Bura">

    {{ HTML::style('assets/css/bootstrap.css') }}
    {{ HTML::style('assets/css/main.css') }}
    {{ HTML::style('assets/css/table.css') }}
    <!-- {{ HTML::style('assets/css/font-style.css') }} -->
    {{ HTML::style('font-awesome/css/font-awesome.min.css') }}
    <!-- {{ HTML::style('assets/css/flexslider.css') }} -->
    <!-- {{ HTML::style('assets/css/slider.css') }} -->

    <style type="text/css">
      @font-face {
        font-family: 'Aller';
        src: url(assets/fonts/Aller_Rg.ttf);
      }
      body {
        padding-top: 60px;
      }
      .dropdown#avatar .btn-default{
        background-color: #222222;
        border-color: 0;
        border: 0;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png"> -->

    <!-- Google Fonts call. Font Used Open Sans & Raleway -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"> -->



<script type="text/javascript">
// $(document).ready(function () {

//     $("#btn-blog-next").click(function () {
//       $('#blogCarousel').carousel('next')
//     });
//      $("#btn-blog-prev").click(function () {
//       $('#blogCarousel').carousel('prev')
//     });

//      $("#btn-client-next").click(function () {
//       $('#clientCarousel').carousel('next')
//     });
//      $("#btn-client-prev").click(function () {
//       $('#clientCarousel').carousel('prev')
//     });
    
// });

//  $(window).load(function(){

//     $('.flexslider').flexslider({
//         animation: "slide",
//         slideshow: true,
//         start: function(slider){
//           $('body').removeClass('loading');
//         }
//     });  
// });

</script>


    
  </head>
  <body ng-controller="tppasCtrl">
  
    <!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">
            {{ HTML::image('assets/img/tpc_icon_sm.png') }} Payroll & Attendance System
          </a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="{{ $home_active }}">{{ HTML::linkAction('HomeController@index', 'Home') }}</li>
              <li class="{{ $emp_active }}">{{ HTML::linkRoute('employees.index', 'Employees') }}</li>
              <li class="{{ $att_active }}">{{ HTML::linkRoute('attendances.index', 'Attendance') }}</li>
              <li class="{{ $roster_active }}">{{ HTML::linkRoute('rosters.index', 'Roster') }}</li>
              <li class="">{{ HTML::linkRoute('rosters.index', 'Payroll') }}</li>
              <li class="{{ $reports_active }}">{{ HTML::linkRoute('reports.index', 'Reports') }}</li>
             
              @if(!Auth::check())
                <li class="{{ $login_page }}">{{ HTML::linkAction('AuthController@getLogin', 'Log in') }}</li>
              @else
                <li>
                <div class="dropdown" id="avatar">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                    {{ HTML::image('assets/img/face36x36.jpg') }}
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1">
                      <strong>{{ $logged_user->first_name }} {{ $logged_user->last_name }}</strong>
                      <br/>
                    </li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href={{ action('AuthController@getLogout') }}>Log out</a></li>
                  </ul>                    
                </div>
                </li>
              <!-- <li><a href={{ action('AuthController@getLogout') }}><i class="icon-user icon-white"></i> Log out</a></li> -->
              @endif
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">
      @yield('content')
    </div>

    <footer id="footerwrap">
        <footer class="clearfix"></footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                <p>{{ HTML::image('assets/img/tpc_icon.png') }}</p>
                <p>&copy; {{ date('Y') }}</p>
                </div>

            </div><!-- /row -->
        </div><!-- /container -->       
    </footer><!-- /footerwrap -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/bootstrap-slider.js') }}
    {{ HTML::script('assets/js/angular.min.js') }}
    {{ HTML::script('assets/js/alljquery.js') }}
    
    {{ HTML::script('assets/js/bootstrap.js') }}
    {{ HTML::script('assets/js/lineandbars.js') }}

    {{ HTML::script('assets/js/dash-charts.js') }}
    {{ HTML::script('assets/js/gauge.js') }}

    
    <!-- NOTY JAVASCRIPT -->
    <!-- {{ HTML::script('assets/js/noty/jquery.noty.js') }}
    {{ HTML::script('assets/js/noty/layouts/top.js') }}
    {{ HTML::script('assets/js/noty/layouts/topLeft.js') }}
    {{ HTML::script('assets/js/noty/layouts/topRight.js') }}
    {{ HTML::script('assets/js/noty/layouts/topCenter.js') }} -->
    
    <!-- You can add more layouts if you want -->
    {{ HTML::script('assets/js/noty/themes/default.js') }}
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
    {{ HTML::script('http://code.highcharts.com/highcharts.js') }}
    {{ HTML::script('assets/js/jquery.flexslider.js') }}

    {{ HTML::script('assets/js/admin.js') }}
  
</body>
</html>