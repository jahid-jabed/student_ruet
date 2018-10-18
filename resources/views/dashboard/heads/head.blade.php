@extends('layouts.app')

@section('title')
    DASHBOARD
@endsection

@section('content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if($msg)
            <div class="w3-text-green">
                {{ $msg }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        Vice-Chancellor/Heads of Department
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('add.heads') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('vice_chancellor') ? ' has-error' : '' }}">
                            <label for="vice_chancellor" class="col-md-4 control-label">Tittle</label>
                            <div class="col-md-6">
                                <select class="form-control" name="vice_chancellor">
                                    <option value="1">Vice-Chancellor</option>
                                    <option value="0">Head of Department</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="designation" class="col-md-4 control-label">Designation</label>
                            <div class="col-md-6">
                                <select class="form-control" name="designation">
                                    <option value="Professor">Professor</option>
                                    <option value="Associate Professor">Associate Professor</option>
                                    <option value="Assistant Professor">Assistant Professor</option>
                                    <option value="Lecturer">Lecturer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Department</label>
                            <div class="col-md-6">
                                <select class="form-control" name="department">
                                    <option value="ARCH">ARCH</option>
                                    <option value="BECM">BECM</option>
                                    <option value="CE">CE</option>
                                    <option value="CFPE">CFPE</option>
                                    <option value="CHEM">CHEM</option>
                                    <option value="CSE">CSE</option>
                                    <option value="ECE">ECE</option>
                                    <option value="EEE">EEE</option>
                                    <option value="ETE">ETE</option>
                                    <option value="GCE">GCE</option>
                                    <option value="HUM">HUM</option>
                                    <option value="IPE">IPE</option>
                                    <option value="MATH">MATH</option>
                                    <option value="ME">ME</option>
                                    <option value="MSE">MSE</option>
                                    <option value="MTE">MTE</option>
                                    <option value="PHY">PHY</option>
                                    <option value="URP">URP</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-md-4 control-label">Avatar</label>
                            <div class="col-md-6">
                                <div class="form-control"><input type="file" name="file" class="" id="file"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary w3-right">
                                    Add&emsp;<span class="fa fa-user-plus"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection