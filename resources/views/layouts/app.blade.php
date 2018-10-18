<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/favicon.png') }}"/>
     
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('/css/fontawesome.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script type="text/javascript">
        tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
        tmonth=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

        function GetClock(){
            var d=new Date();
            var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();
            if(nyear<1000) nyear+=1900;
            document.getElementById('clockbox').innerHTML=""+ndate+" "+tmonth[nmonth]+", "+nyear+"";
        }

        window.onload=function(){
        GetClock();
        setInterval(GetClock,1000);
        }
    </script>
    <script src="{{ asset('/js/app.js') }}"></script>
    
    <!--Online Styles, Scripts-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    
    <style>
        .nav-affix {
            background-color: #377d06;
            width: 100%;
            top: 0;
            z-index: 8;
        }
        

        .retroshadow {
            text-transform: uppercase;
            color: white;
            letter-spacing: .05em;
            text-shadow: 1px 1px 0px #d5d5d5, 2px 2px 0px rgba(0, 0, 0, 2), 3px 3px 0px rgba(0, 0, 0, 102);
        }
        
    </style>
    
    <script>
        $(function() {
           $(window).scroll(function() {
              if($(window).scrollTop() >= 130) {  
                 $('#nav-affix').removeClass('hidden');
                 $('#nav-affix-hidden').addClass('hidden');
                 $('#nav-affix').fadeIn('fast');
              }else{
                 $('#nav-affix-hidden').removeClass('hidden');
                 $('#nav-affix').fadeOut('fast');
              }
           });
        });
        
    </script>
    
<script>
/* Custom filtering function which will search data in column four between two values */
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseFloat( $('#min').val(), 10 );
        var max = parseFloat( $('#max').val(), 10 );
        var age = parseFloat( data[0] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    var table = $('#example').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
} );
</script>
    


    
</head>
<body style="background-image: url({{ URL::asset('images/body-bg7.png') }}); color:#333; opacity: 1; ">
    <nav class="navbar" id="top-menu" style="background-color: #377d06;">
        <div class="container">
            <div class="row">
                <br>
                <!-- Heading -->
                <div class="navbar-header col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <ul class="w3-ul w3-animate-zoom">
                        <li></li>
                        <li></li>
                        <li class="w3-center">
                            <a href="" target="_blank" style="text-decoration:none;" class="retroshadow w3-text-white w3-large">@yield('title')</a>
                        </li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                
                <!-- Branding Image -->
                <div class="navbar-header col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <img src="{{ asset('images/ruet.png') }}" style="size: auto; width: 100%;">
                </div>
                
                <!-- Date -->
                <div class="navbar-header col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <ul class="w3-ul w3-animate-zoom">
                        <li></li>
                        <li></li>
                        <li class="w3-center">
                            <span class="w3-large w3-text-white retroshadow" id="clockbox" style="font-family: monospace"></span>
                        </li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="nav" id="nav-affix-hidden">
                    <ul class="nav nav-tabs navbar-toggle">
                        @if (Auth::guest())
                        <li role="presentation"><a href="{{ url('/login') }}" class="w3-indigo w3-text-white btn btn-primary"><span class="fa fa-sign-in"></span></a></li>                        
                        <li>&nbsp;</li>
                        <li role="presentation"><a href="{{ url('/register') }}" class="w3-indigo w3-text-white btn btn-primary"><span class="fa fa-user-plus"></span></a></li>
                        @endif
                        @if (Auth::user())
                        <li class="dropdown-navmenu" style="background-color: #377d06">
                                <a href="#" title="{{ Auth::user()->name }}" class="dropdown-toggle w3-indigo btn btn-primary" data-toggle="dropdown" data-externlink="false" style="background-color: #377d06">
                                    <span class="fa fa-user-circle"></span>
                                </a>

                                <ul class="w3-indigo dropdown-menu menu_level_1">
                                    <li class="first">
                                        
                                        <a href="{{ route('student.profile') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-user-circle"></span>&emsp;Profile
                                        </a>
                                    </li>
                                    @if (Auth::user() and Auth::user()->admin)
                                    <li>
                                        <a href="{{ route('default.dashboard') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-globe"></span>&emsp;Dashboard
                                        </a>
                                    </li>
                                    @endif
                                    @if (Auth::user()->admin == 0)
                                    <li>
                                        <a href="{{ route('user.results') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-graduation-cap"></span>&emsp;Results
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('settings') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-gear"></span>&emsp;Settings
                                        </a>
                                    </li>
                                    <li class="last">
                                        <a class="w3-indigo w3-small" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            <span class="fa fa-sign-out"></span>&emsp;Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li>&nbsp;</li>
                        <li role="presentation"><a href="{{ url('/home') }}" class="w3-indigo w3-text-white btn btn-primary"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li>&nbsp;</li>
                        <li>
                            <table class="w3-table w3-border">
                                <tr>
                                    <td class="w3-center">
                                        <a href="#small-menu" style="text-decoration:none;" class="w3-text-white retroshadow">STUDENT</a>
                                    </td>
                                </tr>
                            </table>
                        </li>
                    </ul>
                    <ul class="nav nav-tabs w3-darkgreen collapse navbar-collapse" style="width: auto; border-bottom: #377d06">
                        <li role="presentation"><a href="{{ url('/home') }}" class="w3-indigo w3-text-white btn btn-primary"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li>&nbsp;</li>
                        <li role="presentation" class="dropdown-navmenu" style="width: 10%">
                            <a href="#" data-externlink="false" data-toggle="dropdown" title="Faculty of Applied Science & Engineering" class="w3-indigo dropdown-toggle w3-text-white btn btn-primary">
                                ASE
                            </a>
                            <ul class="w3-indigo dropdown-menu menu_level_1">
                                <li class="first">
                                    <a href="{{ route('chem.home') }}" class="w3-indigo w3-small" title="Department of Chemistry">
                                        CHEM
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('hum.home') }}" class="w3-indigo w3-small" title="Department of Humanity">
                                        HUM
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('math.home') }}" class="w3-indigo w3-small" title="Department of Mathematics">
                                        MATH
                                    </a>
                                </li>
                                <li class="last">
                                    <a href="{{ route('phy.home') }}" class="w3-indigo w3-small" title="Department of Physics">
                                        PHY
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>&nbsp;</li>
                        <li role="presentation" class="dropdown-navmenu" style="width: 10%">
                            <a href="#" data-externlink="false" data-toggle="dropdown" title="Faculty of Civil Engineering" class="w3-indigo dropdown-toggle w3-text-white btn btn-primary">
                                CE
                            </a>
                            <ul class="w3-indigo dropdown-menu menu_level_1">
                                <li class="first">
                                    <a href="{{ route('arch.home') }}" class="w3-indigo w3-small" title="Department of Architecture">
                                        ARCH
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('becm.home') }}" class="w3-indigo w3-small" title="Department of Building Engineering & Construction Management">
                                        BECM
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('ce.home') }}" class="w3-indigo w3-small" title="Department of Civil Engineering">
                                        CE
                                    </a>
                                </li>
                                <li class="last">
                                    <a href="{{ route('urp.home') }}" class="w3-indigo w3-small" title="Department of Urban & Regional Planning">
                                        URP
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>&nbsp;</li>
                        <li role="presentation" class="dropdown-navmenu" style="width: 10%">
                            <a href="#" data-externlink="false" data-toggle="dropdown" title="Faculty of Electrical & Computer Engineering" class="w3-indigo dropdown-toggle w3-text-white btn btn-primary">
                                ECE
                            </a>
                            <ul class="w3-indigo dropdown-menu menu_level_1">
                                <li class="first">
                                    <a href="{{ route('cse.home') }}" class="w3-indigo w3-small" title="Department of Computer Science & Engineering">
                                        CSE
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('ece.home') }}" class="w3-indigo w3-small" title="Department of Electrical & Computer Engineering">
                                        ECE
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('eee.home') }}" class="w3-indigo w3-small" title="Department of Electrical & Electronic Engineering">
                                        EEE
                                    </a>
                                </li>
                                <li class="last">
                                    <a href="{{ route('ete.home') }}" class="w3-indigo w3-small" title="Department of Electronics & Telecommunication Engineering">
                                        ETE
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>&nbsp;</li>
                        <li role="presentation" class="dropdown-navmenu" style="width: 10%">
                            <a href="#" data-externlink="false" data-toggle="dropdown" title="Faculty of Mechanical Engineering" class="w3-indigo dropdown-toggle w3-text-white btn btn-primary">
                                ME
                            </a>
                            <ul class="w3-indigo dropdown-menu menu_level_1">
                                <li class="first">
                                    <a href="{{ route('cfpe.home') }}" class="w3-indigo w3-small" title="Department of Chemical & Food Processing Engineering">
                                        CFPE
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('gce.home') }}" class="w3-indigo w3-small" title="Department of Glass & Ceramic Engineering">
                                        GCE
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('ipe.home') }}" class="w3-indigo w3-small" title="Department of Industrial & Production Engineering">
                                        IPE
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('me.home') }}" class="w3-indigo w3-small" title="Department of Mechanical Engineering">
                                        ME
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('mse.home') }}" class="w3-indigo w3-small" title="Department of Material Science & Engineering">
                                        MSE
                                    </a>
                                </li>
                                <li class="last">
                                    <a href="{{ route('mte.home') }}" class="w3-indigo w3-small" title="Department of Mechatronics Engineering">
                                        MTE
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        @if (Auth::guest())
                        <li role="presentation" class="w3-right"><a href="{{ url('/register') }}" class="w3-indigo w3-text-white btn btn-primary">Sign Up&emsp;<span class="fa fa-user-plus"></span></a></li>
                        <li class="w3-right">&nbsp;</li>
                        <li role="presentation" class="w3-right"><a href="{{ url('/login') }}" class="w3-indigo w3-text-white btn btn-primary">Sign In&emsp;<span class="fa fa-sign-in"></span></a></li>                        
                        @endif
                        @if (Auth::user())
                        <li class="dropdown-navmenu w3-right" style="background-color: #377d06">
                                <a href="#" class="dropdown-toggle w3-indigo btn btn-primary" data-toggle="dropdown" data-externlink="false" style="background-color: #377d06">
                                    {{ Auth::user()->name }}&emsp;<span class="caret"></span>
                                </a>

                                <ul class="w3-indigo dropdown-menu menu_level_1">
                                    <li class="first">
                                        
                                        <a href="{{ route('student.profile') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-user-circle"></span>&emsp;Profile
                                        </a>
                                    </li>
                                    @if (Auth::user() and Auth::user()->admin)
                                    <li>
                                        <a href="{{ route('default.dashboard') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-globe"></span>&emsp;Dashboard
                                        </a>
                                    </li>
                                    @endif
                                    @if (Auth::user()->admin == 0)
                                    <li>
                                        <a href="{{ route('user.results') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-graduation-cap"></span>&emsp;Results
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('settings') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-gear"></span>&emsp;Settings
                                        </a>
                                    </li>
                                    <li class="last">
                                        <a class="w3-indigo w3-small" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            <span class="fa fa-sign-out"></span>&emsp;Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <ul></ul>
                </div>
            </div>
        </div>
    </nav>
    
    <nav class="navbar nav-affix hidden" id="nav-affix" data-spy="affix">
            <div class="container">
            <div class="row">
                <div class="nav">
                    
                    <ul class="nav nav-tabs navbar-toggle" style="width: auto; border-bottom: #377d06">
                        @if (Auth::guest())
                        <li role="presentation"><a href="{{ url('/login') }}" class="w3-indigo w3-text-white btn btn-primary"><span class="fa fa-sign-in"></span></a></li>                        
                        <li>&nbsp;</li>
                        <li role="presentation"><a href="{{ url('/register') }}" class="w3-indigo w3-text-white btn btn-primary"><span class="fa fa-user-plus"></span></a></li>
                        @endif
                        @if (Auth::user())
                        <li class="dropdown-navmenu" style="background-color: #377d06">
                            <a href="#" title="{{ Auth::user()->name }}" class="dropdown-toggle w3-indigo btn btn-primary" data-toggle="dropdown" data-externlink="false" style="background-color: #377d06">
                                    <span class="fa fa-user-circle"></span>
                            </a>

                                <ul class="w3-indigo dropdown-menu menu_level_1">
                                    <li class="first">
                                        
                                        <a href="{{ route('student.profile') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-user-circle"></span>&emsp;Profile
                                        </a>
                                    </li>
                                    @if (Auth::user() and Auth::user()->admin)
                                    <li>
                                        <a href="{{ route('default.dashboard') }}" class="w3-indigo w3-small">
                                                <span class="fa fa-globe"></span>&emsp;Dashboard
                                        </a>
                                    </li>
                                    @endif
                                    @if (Auth::user()->admin == 0)
                                    <li>
                                        <a href="{{ route('user.results') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-graduation-cap"></span>&emsp;Results
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('settings') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-gear"></span>&emsp;Settings
                                        </a>
                                    </li>
                                    <li class="last">
                                        <a class="w3-indigo w3-small" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            <span class="fa fa-sign-out"></span>&emsp;Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li>&nbsp;</li>
                        <li role="presentation"><a href="{{ url('/home') }}" class="w3-indigo w3-text-white btn btn-primary"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li>&nbsp;</li>
                        <li>
                            <table class="w3-table w3-border">
                                <tr>
                                    <td class="w3-center">
                                        <a href="#small-menu" style="text-decoration:none;" class="w3-text-white retroshadow">STUDENT</a>
                                    </td>
                                </tr>
                            </table>
                        </li>
                    </ul>
                    <ul></ul>
                    <ul class="nav nav-tabs w3-darkgreen collapse navbar-collapse" style="width: auto; border-bottom: #377d06">
                        <li>
                            <table class="w3-table w3-border">
                                <tr>
                                    <td class="w3-center">
                                        <a href="" target="_blank" style="text-decoration:none;" class="w3-text-white w3-large retroshadow">@yield('title')</a>
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li role="presentation"><a href="{{ url('/home') }}" class="w3-indigo w3-text-white btn btn-primary"><span class="glyphicon glyphicon-home"></span></a></li>
                        <li>&nbsp;</li>
                        <li role="presentation" class="dropdown-navmenu" style="width: 10%">
                            <a href="#" data-externlink="false" data-toggle="dropdown" title="Faculty of Applied Science & Engineering" class="w3-indigo dropdown-toggle w3-text-white btn btn-primary">
                                ASE
                            </a>
                            <ul class="w3-indigo dropdown-menu menu_level_1">
                                <li class="first">
                                    <a href="{{ route('chem.home') }}" class="w3-indigo w3-small" title="Department of Chemistry">
                                        CHEM
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('hum.home') }}" class="w3-indigo w3-small" title="Department of Humanity">
                                        HUM
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('math.home') }}" class="w3-indigo w3-small" title="Department of Mathematics">
                                        MATH
                                    </a>
                                </li>
                                <li class="last">
                                    <a href="{{ route('phy.home') }}" class="w3-indigo w3-small" title="Department of Physics">
                                        PHY
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>&nbsp;</li>
                        <li role="presentation" class="dropdown-navmenu" style="width: 10%">
                            <a href="#" data-externlink="false" data-toggle="dropdown" title="Faculty Civil Engineering" class="w3-indigo dropdown-toggle w3-text-white btn btn-primary">
                                CE
                            </a>
                            <ul class="w3-indigo dropdown-menu menu_level_1">
                                <li class="first">
                                    <a href="{{ route('arch.home') }}" class="w3-indigo w3-small" title="Department of Architecture">
                                        ARCH
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('becm.home') }}" class="w3-indigo w3-small" title="Department of Building Engineering & Construction Management">
                                        BECM
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('ce.home') }}" class="w3-indigo w3-small" title="Department of Civil Engineering">
                                        CE
                                    </a>
                                </li>
                                <li class="last">
                                    <a href="{{ route('urp.home') }}" class="w3-indigo w3-small" title="Department of Urban & Regional Planning">
                                        URP
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>&nbsp;</li>
                        <li role="presentation" class="dropdown-navmenu" style="width: 10%">
                            <a href="#" data-externlink="false" data-toggle="dropdown" title="Faculty of Electrical & Computer Engineering" class="w3-indigo dropdown-toggle w3-text-white btn btn-primary">
                                ECE
                            </a>
                            <ul class="w3-indigo dropdown-menu menu_level_1">
                                <li class="first">
                                    <a href="{{ route('cse.home') }}" class="w3-indigo w3-small" title="Department of Computer Science & Engineering">
                                        CSE
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('ece.home') }}" class="w3-indigo w3-small" title="Department of Electrical & Computer Engineering">
                                        ECE
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('eee.home') }}" class="w3-indigo w3-small" title="Department of Electrical & Electronic Engineering">
                                        EEE
                                    </a>
                                </li>
                                <li class="last">
                                    <a href="{{ route('ete.home') }}" class="w3-indigo w3-small" title="Department of Electronics & Telecommunication Engineering">
                                        ETE
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>&nbsp;</li>
                        <li role="presentation" class="dropdown-navmenu" style="width: 10%">
                            <a href="#" data-externlink="false" data-toggle="dropdown" title="Faculty of Mechanical Engineering" class="w3-indigo dropdown-toggle w3-text-white btn btn-primary">
                                ME
                            </a>
                            <ul class="w3-indigo dropdown-menu menu_level_1">
                                <li class="first">
                                    <a href="{{ route('cfpe.home') }}" class="w3-indigo w3-small" title="Department of Chemical & Food Processing Engineering">
                                        CFPE
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('gce.home') }}" class="w3-indigo w3-small" title="Department of Glass & Ceramic Engineering">
                                        GCE
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('ipe.home') }}" class="w3-indigo w3-small" title="Department of Industrial & Production Engineering">
                                        IPE
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('me.home') }}" class="w3-indigo w3-small" title="Department of Mechanical Engineering">
                                        ME
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('mse.home') }}" class="w3-indigo w3-small" title="Department of Material Science & Engineering">
                                        MSE
                                    </a>
                                </li>
                                <li class="last">
                                    <a href="{{ route('mte.home') }}" class="w3-indigo w3-small" title="Department of Mechatronics Engineering">
                                        MTE
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        @if (Auth::guest())
                        <li role="presentation" class="w3-right"><a href="{{ url('/register') }}" class="w3-indigo w3-text-white btn btn-primary">Sign Up&emsp;<span class="fa fa-user-plus"></span></a></li>
                        <li class="w3-right">&nbsp;</li>
                        <li role="presentation" class="w3-right"><a href="{{ url('/login') }}" class="w3-indigo w3-text-white btn btn-primary">Sign In&emsp;<span class="fa fa-sign-in"></span></a></li>                        
                        @endif
                        @if (Auth::user())
                        <li class="dropdown-navmenu w3-right" style="background-color: #377d06">
                                <a href="#" class="dropdown-toggle w3-indigo btn btn-primary" data-toggle="dropdown" data-externlink="false" style="background-color: #377d06">
                                    {{ Auth::user()->name }}&emsp;<span class="caret"></span>
                                </a>

                                <ul class="w3-indigo dropdown-menu menu_level_1">
                                    <li class="first">
                                        
                                        <a href="{{ route('student.profile') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-user-circle"></span>&emsp;Profile
                                        </a>
                                    </li>
                                    @if (Auth::user() and Auth::user()->admin)
                                    <li>
                                        <a href="{{ route('default.dashboard') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-globe"></span>&emsp;Dashboard
                                        </a>
                                    </li>
                                    @endif
                                    @if (Auth::user()->admin == 0)
                                    <li>
                                        <a href="{{ route('user.results') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-graduation-cap"></span>&emsp;Results
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('settings') }}" class="w3-indigo w3-small">
                                            <span class="fa fa-gear"></span>&emsp;Settings
                                        </a>
                                    </li>
                                    <li class="last">
                                        <a class="w3-indigo w3-small" href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            <span class="fa fa-sign-out"></span>&emsp;Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                    <ul></ul>
                </div>
            </div>
        </div>
    </nav>
    @if ( Session::has('flash_message') )
        <div class="w3-center alert {{ Session::get('flash_type') }}">
              <h4 style="font-family: monospace;">{{ Session::get('flash_message') }}</h4>
        </div>
    @endif
    @yield('content')
    <br><br>
    <div class="footer-menu" id="small-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-4">
                    <h3 title="Faculty of Applied Science & Engineering">ASE</h3>
                    <ul class="social">
                        <li> <a href="{{ route('chem.home') }}">CHEM</a> </li>
                        <li> <a href="{{ route('hum.home') }}">HUM</a> </li>
                        <li> <a href="{{ route('math.home') }}">MATH</a> </li>
                        <li> <a href="{{ route('phy.home') }}">PHY</a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-4">
                    <h3 title="Faculty Civil Engineering">CE</h3>
                    <ul class="social">
                        <li> <a href="{{ route('arch.home') }}">ARCH</a> </li>
                        <li> <a href="{{ route('becm.home') }}">BECM</a> </li>
                        <li> <a href="{{ route('ce.home') }}">CE</a> </li>
                        <li> <a href="{{ route('urp.home') }}">URP</a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-4">
                    <h3 title="Faculty of Electrical & Computer Engineering">ECE</h3>
                    <ul class="social">
                        <li> <a href="{{ route('cse.home') }}">CSE</a> </li>
                        <li> <a href="{{ route('ece.home') }}">ECE</a> </li>
                        <li> <a href="{{ route('eee.home') }}">EEE</a> </li>
                        <li> <a href="{{ route('ete.home') }}">ETE</a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-4">
                    <h3 title="Faculty of Mechanical Engineering">ME</h3>
                    <ul class="social">
                        <li> <a href="{{ route('cfpe.home') }}">CFPE</a> </li>
                        <li> <a href="{{ route('gce.home') }}">GCE</a> </li>
                        <li> <a href="{{ route('ipe.home') }}">IPE</a> </li>
                        <li> <a href="{{ route('me.home') }}">ME</a> </li>
                        <li> <a href="{{ route('mse.home') }}">MSE</a> </li>
                        <li> <a href="{{ route('mte.home') }}">MTE</a> </li>
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-4 ">
                    <h3>STUDENT</h3>
                    
                    <ul class="social">
                         @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><i class="fa fa-sign-in"></i></a></li>
                        <li><a href="{{ url('/register') }}"><i class="fa fa-user-plus"></i></a></li>                        
                        @endif
                        @if (Auth::user())
                        <li><a href="{{ route('student.profile') }}"><i class="fa fa-user-circle"></i></a></li>
                        @if (Auth::user() and Auth::user()->admin)
                        <li>
                            <a href="{{ route('default.dashboard') }}"><i class="fa fa-globe"></i></a>
                        </li>
                        @endif
                        @if (Auth::user()->admin == 0)
                        <li>
                            <a href="{{ route('user.results') }}">
                                <i class="fa fa-graduation-cap"></i>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('settings') }}">
                                <i class="fa fa-gear"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-4">
                    <h3>SOCIAL</h3>
                    <ul class="social">
                        <li><a href="#"><i class=" fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-stack-overflow"></i></a></li>
                        <li><a href="#"><i class="fa fa-wikipedia-w"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <br><br><br>    
    <div class="footer">
        <div class="container">
            <ul class="w3-ul"><li class="retroshadow w3-text-white">Copyright <span class="fa fa-copyright"></span> Students of <a href="http://cse.ruet.ac.bd" target="_blank" style="text-decoration:none;" class="w3-text-white">CSE RUET</a></li></ul>
        </div>
    </div> 
    
</body>
<!-- jquery smooth scroll to id's -->   
<script>
$(function() {
  $('a[href*="#"]:not([href="#"]):not([data-toggle="modal"]):not([data-toggle="tab"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
</script>
</html>

