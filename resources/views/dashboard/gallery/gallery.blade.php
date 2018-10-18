@extends('layouts.app')

@section('title')
    ADMIN
@endsection

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if($msg)
            <div class="w3-text-green">
                {{ $msg }}
            </div>
            @endif
            <div class="panel panel-default w3-hover-shadow">
                <div class="panel-heading"><h3>Adding Image to Gallery</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('add.image') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Department</label>
                            <div class="col-md-6">
                                <select class="form-control" name="department">
                                    <option value="default">NULL</option>
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
                        
                        <div class="form-group">
                            <label for="image_file" class="col-md-4 control-label">Image File</label>
                            <div class="col-md-6">
                                <div class="form-control"><input type="file" name="image_file" class="" id="image_file"></div>
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('image_caption') ? ' has-error' : '' }}">
                            <label for="image_caption" class="col-md-4 control-label">Caption</label>

                            <div class="col-md-6">
                                <input id="image_caption" type="text" class="form-control" name="image_caption" value="{{ old('image_caption') }}" required>

                                @if ($errors->has('image_caption'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image_caption') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary w3-right">
                                    Add Image&emsp;<span class="fa fa-upload"></span>
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