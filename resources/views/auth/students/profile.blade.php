@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1 w3-border w3-round">
        <div class="row w3-aqua">
            
            <div class="col-md-12 w3-center">
                <br>
                @if(Storage::disk('students')->has($info->roll.'.jpg'))
                <a onclick="document.getElementById('edt_image').style.display='block'">
                    <img src="{{ route('image.student', ['filename' => $info->roll.'.jpg']) }}"  style="height: 150px; width: 150px; border-radius: 75px;">
                </a>
                @else
                <a onclick="document.getElementById('edt_image').style.display='block'">
                    <img src="{{ asset('images/default.bmp') }}"  style="height: 150px; width: 150px; border-radius: 75px;">
                </a>
                @endif
                <br><a onclick="document.getElementById('edt_image').style.display='block'" class="w3-transparent w3-xxlarge w3-text-white"><i class="fa fa-edit"></i></a>
                    <h2 style="font-family: monospace;">About {{ $info->name }}</h2>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-10 col-md-offset-1 w3-border w3-round">
        <br>
        <table class="w3-table w3-striped w3-bordered w3-border">
            <tr>
                <th class="col-md-4"><h4>Name</h4></th>
                <td class="col-md-8">
                    <h4>{{ $info->name }}<button onclick="myFunction('edt_name')" class="btn btn-primary w3-right">Edit&emsp;<span class="fa fa-edit"></span></button></h4>
                </td>
            </tr>
        </table>
        <div id="edt_name" class="{{ $tabName == 'edt_name' ? 'w3-show ' : '' }}w3-animate-zoom w3-sand col-md-12 w3-border w3-bordered w3-accordion-content {{ !empty($tabName) && $tabName == 'edt_name' ? 'w3-show' : ''}}">
            <br>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('edt.name') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="w3-left col-md-3 control-label">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $info->name }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-3 w3-right">
                        <button type="submit" class="btn btn-primary">
                            Save&emsp;<span class="fa fa-save"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="w3-table w3-striped w3-light-grey w3-bordered w3-border">
            <tr>
                <th class="col-md-4"><h4>Student ID</h4></th>
                <td class="col-md-8"><h4>{{ $info->roll }}<button onclick="myFunction('edt_roll')" class="btn btn-primary w3-right">Edit&emsp;<span class="fa fa-edit"></span></button></h4></td>
            </tr>
        </table>
        <div id="edt_roll" class="{{ $tabName == 'edt_roll' ? 'w3-show' : '' }} w3-animate-zoom w3-sand col-md-12 w3-border w3-bordered w3-accordion-content">
            <br>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('edt.roll') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('roll') ? ' has-error' : '' }}">
                    <label for="name" class="w3-left col-md-3 control-label">Student ID</label>
                    <div class="col-md-6">
                        <input id="roll" type="text" class="form-control" name="roll" value="{{ $info->roll }}" required autofocus>

                        @if ($errors->has('roll'))
                            <span class="help-block">
                                <strong>{{ $errors->first('roll') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-3 w3-right">
                        <button type="submit" class="btn btn-primary">
                            Save&emsp;<span class="fa fa-save"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="w3-table w3-striped w3-bordered w3-border">
            <tr>
                <th class="col-md-4"><h4>Blood Group</h4></th>
                <td class="col-md-8"><h4>{{ $info->blood }}<button onclick="myFunction('edt_blood')" class="btn btn-primary w3-right">Edit&emsp;<span class="fa fa-edit"></span></button></h4></td>
            </tr>
        </table>
        <div id="edt_blood" class="{{ $tabName == 'edt_blood' ? 'w3-show' : '' }} w3-animate-zoom w3-sand col-md-12 w3-border w3-bordered w3-accordion-content">
            <br>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('edt.blood') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('blood') ? ' has-error' : '' }}">
                    <label for="blood" class="col-md-3 control-label">Blood Group</label>

                    <div class="col-md-6">
                        <select class="form-control" name="blood">
                            <option value="" disabled selected>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>

                        @if ($errors->has('blood'))
                            <span class="help-block">
                                <strong>{{ $errors->first('blood') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            Save&emsp;<span class="fa fa-save"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="w3-table w3-light-grey w3-striped w3-bordered w3-border">
            <tr>
                <th class="col-md-4"><h4>Mobile</h4></th>
                <td class="col-md-8"><h4>{{ $info->mobile }}<button onclick="myFunction('edt_mobile')" class="btn btn-primary w3-right">Edit&emsp;<span class="fa fa-edit"></span></button></h4></td>
            </tr>
        </table>
        <div id="edt_mobile" class="{{ $tabName == 'edt_mobile' ? 'w3-show' : '' }} w3-animate-zoom w3-sand col-md-12 w3-border w3-bordered w3-accordion-content">
            <br>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('edt.mobile') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                    <label for="mobile" class="col-md-3 control-label">Mobile No.</label>

                    <div class="col-md-6">
                        <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $info->mobile }}" required autofocus>

                        @if ($errors->has('mobile'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            Save&emsp;<span class="fa fa-save"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="w3-table w3-striped w3-bordered w3-border">
            <tr>
                <th class="col-md-4"><h4>Email</h4></th>
                <td class="col-md-8">
                    <h4>{{ $info->email }}<button onclick="myFunction('edt_email')" class="btn btn-primary w3-right">Edit&emsp;<span class="fa fa-edit"></span></button></h4>
                </td>
            </tr>
        </table>
        <div id="edt_email" class="{{ $tabName == 'edt_email' ? 'w3-show' : '' }} w3-animate-zoom w3-sand col-md-12 w3-border w3-bordered w3-accordion-content">
            <br>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('edt.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-3 control-label">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $info->email }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            Save&emsp;<span class="fa fa-save"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="w3-table w3-light-grey w3-striped w3-bordered w3-border">
            <tr>
                <th class="col-md-4"><h4>Present Address</h4></th>
                <td class="col-md-8"><h6 style="font-family: console;">{{ $info->pre_add }}<button onclick="myFunction('edt_pre_add')" class="btn btn-primary w3-right">Edit&emsp;<span class="fa fa-edit"></span></button></h6></td>
            </tr>
        </table>
        <div id="edt_pre_add" class="{{ $tabName == 'edt_pre_add' ? 'w3-show' : '' }} w3-animate-zoom w3-sand col-md-12 w3-border w3-bordered w3-accordion-content">
            <br>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('edt.pre_add') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('pre_add') ? ' has-error' : '' }}">
                    <label for="pre_add" class="col-md-3 control-label">Present Address</label>

                    <div class="col-md-6">
                        <textarea id="pre_add" type="text" class="form-control" name="pre_add" value="" required autofocus>{{ $info->pre_add }}</textarea>

                        @if ($errors->has('pre_add'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pre_add') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            Save&emsp;<span class="fa fa-save"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <table class="w3-table w3-striped w3-bordered w3-border">
            <tr>
                <th class="col-md-4"><h4>Permanent Address</h4></th>
                <td class="col-md-8"><h6 style="font-family: console;">{{ $info->per_add }}<button onclick="myFunction('edt_per_add')" class="btn btn-primary w3-right">Edit&emsp;<span class="fa fa-edit"></span></button></h6></td>
            </tr>
        </table>
        <div id="edt_per_add" class="{{ $tabName == 'edt_per_add' ? 'w3-show' : '' }} w3-animate-zoom w3-sand col-md-12 w3-border w3-bordered w3-accordion-content">
            <br>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('edt.per_add') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('per_add') ? ' has-error' : '' }}">
                    <label for="pre_add" class="col-md-3 control-label">Permanent Address</label>

                    <div class="col-md-6">
                        <textarea id="per_add" type="text" class="form-control" name="per_add" value="" required autofocus>{{ $info->per_add }}</textarea>

                        @if ($errors->has('per_add'))
                            <span class="help-block">
                                <strong>{{ $errors->first('per_add') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            Save&emsp;<span class="fa fa-save"></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <br>
    </div>
    
    <div class="modal w3-animate-zoom" id="edt_image" role="dialog">
      <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header w3-blue">
                  <button type="button" onclick="document.getElementById('edt_image').style.display='none'" class="close w3-xlarge w3-btn-floating" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title w3-xlarge">Update</h4>
              </div>
              <div class="modal-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ route('edt.student_image') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="image_file" class="col-md-3 control-label">Profile Image</label>
                            <div class="col-md-6">
                                <div class="form-control"><input type="file" name="image_file" class="" id="image_file"></div>
                            </div>
                            <div class="col-md-3 w3-right">
                                <button type="submit" class="btn btn-primary">
                                    Upload&emsp;<span class="fa fa-upload"></span>
                                </button>
                            </div>
                        </div>
                    </form>
              </div>
              <div class="modal-footer w3-light-grey">
                  <button type="button" onclick="document.getElementById('edt_image').style.display='none'" class="btn btn-primary" data-dismiss="modal">Close</button>
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