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
                        Upload Course Materials
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('upload.materials') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('file_type') ? ' has-error' : '' }}">
                            <label for="file_type" class="col-md-4 control-label">File Type</label>
                            <div class="col-md-6">
                                <select class="form-control" name="file_type">
                                    <option value="Syllabus">Syllabus</option>
                                    <option value="Routine">Class Routine</option>
                                    <option value="CourseRegistration">Course Registration Form</option>
                                    <option value="FormFillUp">Exam Form Fill Up</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file" class="col-md-4 control-label">File</label>
                            <div class="col-md-6">
                                <div class="form-control"><input type="file" name="file" class="" id="file"></div>
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