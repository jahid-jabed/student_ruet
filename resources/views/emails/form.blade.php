@extends('layouts.app')

@section('title')
    Email
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>New Message</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('send.compose') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('to_email') ? ' has-error' : '' }}">
                            <label for="to_email" class="col-md-3 control-label">To</label>

                            <div class="col-md-9">
                                <input id="to_email" type="email" class="form-control" name="to_email" value="{{ $to_email }}" required autofocus>

                                @if ($errors->has('to_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('to_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('sub') ? ' has-error' : '' }}">
                            <label for="sub" class="col-md-3 control-label">Subject</label>

                            <div class="col-md-9">
                                <input id="sub" type="text" class="form-control" name="sub" value="{{ old('sub') }}" required autofocus>

                                @if ($errors->has('sub'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sub') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('mail_body') ? ' has-error' : '' }}">
                            <label for="mail_body" class="col-md-3 control-label">Mail Body</label>

                            <div class="col-md-9">
                                <textarea id="mail_body" type="text" class="form-control" name="mail_body" value="" style="height: 150px; font-family: optima;" required autofocus>
{{ $to_name }},




--
{{ Auth::user()->name }}
{{ Auth::user()->department }}, RUET.
Student ID: {{ Auth::user()->user_id }}
                                </textarea>

                                @if ($errors->has('mail_body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mail_body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    Send&emsp;<span class="fa fa-envelope"></span>
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