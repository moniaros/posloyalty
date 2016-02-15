<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('meta')

        <title>Don Benito's</title>

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">        

        <!-- Fonts -->
        <!--<link href='{{ asset('/css/roboto.css') }}' rel='stylesheet' type='text/css'>-->

        @yield('css')

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        @if(Auth::check())
        <nav class="navbar navbar-default">
            <div class="container-fluid">                
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Don Benito's</a>
                </div>                

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}">Sales</a></li>
                        <li><a href="{{ url('/stores') }}">Stores</a></li>
                        <li><a href="{{ url('/customers') }}">Customers</a></li>
                        <li><a href="{{ url('/rewards') }}">Rewards</a></li>
                        <li><a href="{{ url('/promo') }}">Latest Promo</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <!--                                <li><a href="#" id="action-change-company-icon"  data-toggle="modal" data-target="#change-company-icon-modal">Change Company Icon</a></li>
                                                                <li><a href="#" id="action-remove-company-icon">Remove Company Icon</a></li>-->
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>        
        @endif

        @yield('content')

        <form action="/company/icon" method="POST" enctype="multipart/form-data">
            @include('modal', [
            'id' => 'change-company-icon-modal',
            'title' => 'Change Company Icon',
            'body' => '        
            <div class="form-group">
                <input type="file" name="company_icon">
            </div>            
            ',
            'positiveButton' => 'Upload',
            'positiveButtonType' => 'submit',
            ])
        </form>

        <!-- Scripts -->
        <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/bower_components/underscore/underscore-min.js') }}"></script>

        <!--Date Picker-->
        <script src="{{ asset('/bower_components/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>        

        <!--Developer Scripts-->
        <script src="{{ asset('/js/date_utilities.js') }}"></script>
        <script src="{{ asset('/js/form/form_utilities.js') }}"></script>

        @yield('js')
    </body>
</html>
