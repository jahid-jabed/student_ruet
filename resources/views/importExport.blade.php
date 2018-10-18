@extends('layouts.app')

@section('title')
    STUDENT
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
                        Add Student
                        <a href="#" data-externlink="false" data-toggle="dropdown" class="dropdown-toggle btn btn-primary w3-right">
                                Download&emsp;<span class="fa fa-download"></span>
                        </a>
                            <ul class="dropdown-menu menu_level_1 w3-border w3-bordered w3-ul">
                                <li class="w3-hover-shadow">
                                    <a href="{{ URL::to('downloadExcel/xls') }}" class="w3-transparent">
                                        XLS
                                    </a>
                                </li>
                                <li class="w3-hover-shadow">
                                    <a href="{{ URL::to('downloadExcel/xlsx') }}" class="w3-transparent">
                                        XLSX
                                    </a>
                                </li>
                                <li class="w3-hover-shadow">
                                    <a href="{{ URL::to('downloadExcel/csv') }}" class="w3-transparent">
                                        CSV
                                    </a>
                                </li>
                            </ul>
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="import_file" class="col-md-4 control-label">Excel File</label>
                            <div class="col-md-6">
                                <div class="form-control"><input type="file" name="import_file" class="" id="import_file"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary w3-right">
                                    Import File&emsp;<span class="fa fa-upload"></span>
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