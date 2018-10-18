@extends('layouts.app')

@section('title')
    RESULT
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
                    <h3 class="dropdown-submenu">
                        Upload Result
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="{{ URL::to('importResult') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Department</label>
                            <div class="col-md-6">
                                <select class="form-control" name="department">
                                    <option value="ARCH">ARCH</option>
                                    <option value="BECM">BECM</option>
                                    <option value="CE">CE</option>
                                    <option value="CFPE">CFPE</option>
                                    <option value="CSE">CSE</option>
                                    <option value="ECE">ECE</option>
                                    <option value="EEE">EEE</option>
                                    <option value="ETE">ETE</option>
                                    <option value="GCE">GCE</option>
                                    <option value="IPE">IPE</option>
                                    <option value="ME">ME</option>
                                    <option value="MSE">MSE</option>
                                    <option value="MTE">MTE</option>
                                    <option value="URP">URP</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('examination') ? ' has-error' : '' }}">
                            <label for="examination" class="col-md-4 control-label">Examination Year</label>

                            <div class="col-md-6">
                                <input id="examination" type="text" class="form-control" name="examination" value="{{ old('examination') }}" required>

                                @if ($errors->has('examination'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('examination') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">Year</label>
                            <div class="col-md-6">
                                <select class="form-control" name="year">
                                    <option value="1st">1st</option>
                                    <option value="2nd">2nd</option>
                                    <option value="3rd">3rd</option>
                                    <option value="4th">4th</option>
                                    <option value="5th">5th</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="semester" class="col-md-4 control-label">Semester</label>
                            <div class="col-md-6">
                                <label class="radio-inline">
                                    <input type="radio" name="semester" value="Odd">Odd Semester
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="semester" value="Even">Even Semester
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="import_file" class="col-md-4 control-label">Result File</label>
                            <div class="col-md-6">
                                <div class="form-control"><input type="file" name="import_file" class="" id="import_file"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary w3-right">
                                    Upload&emsp;<span class="fa fa-upload"></span>
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