@extends('layouts.app')

@section('title')
    Settings
@endsection

@section('content')
<div class="container">
  <ul class="nav nav-justified nav-pills w3-aqua">
      <li class="{{ empty($tabName) || $tabName == 'home' ? 'active' : '' }}"><a data-toggle="tab" href="#home" class="w3-border w3-bordered">Home&emsp;<span class="fa fa-home"></span></a></li>
      <li class="{{ empty($tabName) || $tabName == 'profile' ? 'active' : '' }}"><a data-toggle="tab" href="#profile" class="w3-border w3-bordered">Profile&emsp;<span class="fa fa-user-circle"></span></a></li>
      <li class="{{ empty($tabName) || $tabName == 'notification' ? 'active' : '' }}"><a data-toggle="tab" href="#notification" class="w3-border w3-bordered">Notifications&emsp;<span class="fa fa-bell"></span></a></li>
      <li class="{{ empty($tabName) || $tabName == 'reset_pass' ? 'active' : '' }}"><a data-toggle="tab" href="#reset_pass" class="w3-border w3-bordered">Password&emsp;<i class="fa fa-unlock-alt"></i></a></li>
  </ul>

  <div class="tab-content">
      <br>
    <div id="home" class="tab-pane fade w3-border w3-bordered w3-card w3-round w3-light-grey {{ !empty($tabName) && $tabName == 'home' ? 'active in' : '' }}">
        <div class="w3-container">
            <div class="w3-center">
                <img src="{{ asset('images/under_construction.png') }}" style="width:60%; height: 300px;">
            </div>
        </div>
    </div>
      
    <div id="profile" class="container tab-pane fade w3-border w3-bordered w3-card w3-round w3-light-grey {{ !empty($tabName) && $tabName == 'profile' ? 'active in' : '' }}">
        <div class="col-md-12 w3-border w3-round">
            <div class="row w3-aqua">

                <div class="col-md-12 w3-center">
                    <br>
                    @if(Storage::disk('students')->has($info->roll.'.jpg'))
                    <a>
                        <img src="{{ route('image.student', ['filename' => $info->roll.'.jpg']) }}"  style="height: 150px; width: 150px; border-radius: 75px;">
                    </a>
                    @else
                    <a>
                        <img src="{{ asset('images/default.bmp') }}"  style="height: 150px; width: 150px; border-radius: 75px;">
                    </a>
                    @endif
                    <h2 style="font-family: monospace;">About {{ $info->name }}&emsp;<a href="{{ route('student.profile') }}" class="w3-xxlarge btn btn-toolbar"><span class="fa fa-edit"></span></a></h2>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-12 w3-border w3-round">
            <br>
            <table class="w3-table w3-striped w3-white w3-bordered w3-border">
                <tr>
                    <th class="col-md-4"><h4>Name</h4></th>
                    <td class="col-md-8">
                        <h4>{{ $info->name }}</h4>
                   </td>
                </tr>
            </table>

            <table class="w3-table w3-striped w3-bordered w3-border">
                <tr>
                    <th class="col-md-4"><h4>Student ID</h4></th>
                    <td class="col-md-8"><h4>{{ $info->roll }}</h4></td>
                </tr>
            </table>

            <table class="w3-table w3-striped w3-white w3-bordered w3-border">
                <tr>
                    <th class="col-md-4"><h4>Blood Group</h4></th>
                    <td class="col-md-8"><h4>{{ $info->blood }}</h4></td>
                </tr>
            </table>

            <table class="w3-table w3-striped w3-bordered w3-border">
                <tr>
                    <th class="col-md-4"><h4>Mobile</h4></th>
                    <td class="col-md-8"><h4>{{ $info->mobile }}</h4></td>
                </tr>
            </table>

            <table class="w3-table w3-striped w3-white w3-bordered w3-border">
                <tr>
                    <th class="col-md-4"><h4>Email</h4></th>
                    <td class="col-md-8">
                        <h4>{{ $info->email }}</h4>
                    </td>
                </tr>
            </table>

            <table class="w3-table w3-striped w3-bordered w3-border">
                <tr>
                    <th class="col-md-4"><h4>Present Address</h4></th>
                    <td class="col-md-8"><h6 style="font-family: console;">{{ $info->pre_add }}</h6></td>
                </tr>
            </table>

            <table class="w3-table w3-striped w3-white w3-bordered w3-border">
                <tr>
                    <th class="col-md-4"><h4>Permanent Address</h4></th>
                    <td class="col-md-8"><h6 style="font-family: console;">{{ $info->per_add }}</h6></td>
                </tr>
            </table>
            <br>
        </div>
    </div>
    <div id="notification" class="tab-pane fade w3-border w3-bordered w3-card w3-round w3-light-grey {{ !empty($tabName) && $tabName == 'notification' ? 'active in' : '' }}">
        <div class="w3-container">
            <div class="w3-center">
                <img src="{{ asset('images/under_construction.png') }}" style="width:60%; height: 300px;">
            </div>
        </div>
    </div>
    <div id="reset_pass" class="tab-pane fade w3-card w3-border w3-bordered w3-round {{ !empty($tabName) && $tabName == 'reset_pass' ? 'active in' : '' }}">
        <br>
        <div class="w3-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            @if($msg)
                            <p class="w3-text-green">{{ $msg }}</p>
                            @endif
                            <div class="panel-heading w3-aqua"><h3>Reset Password</h3></div>

                            <div class="panel-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form class="form-horizontal" role="form" method="POST" action="{{ route('password.change') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('old-password') ? ' has-error' : '' }}">
                                        <label for="old-password" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">
                                            <input id="old-password" type="password" class="form-control" name="old-password" required>

                                            @if ($errors->has('old-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('old-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">New Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label for="password-confirm" class="col-md-4 control-label">Confirm New Password</label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Reset&emsp;<span class="fa fa-lock"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>
<script>
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    } 
</script> 
@endsection
