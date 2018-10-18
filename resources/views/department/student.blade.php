@extends('layouts.app')

@section('title')
    {{ $department }} RUET
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default w3-hover-shadow" style="font-family: optima">
                <div class="panel-heading w3-blue"><h2>Current Students</h2></div>

                <div style="max-height: auto; overflow: auto;">
                <table  id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                      <tr class="w3-indigo">
                        
                        <th>
                            Series
                        </th>
                        <th>
                            Student ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                    </tr>
                  </thead>
                  <tfoot>
                      <tr class="w3-indigo">
                          
                        <th>
                            Series
                        </th>
                        <th>
                            Student ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                    </tr>
                  </tfoot>
                  <tbody id="people">
                  @foreach($users as $user)
                    <tr>
                        <td>{{ $user->series }}</td>
                        <td>{{ $user->roll }}</td>
                        <td>{{ $user->name }}</td>
                        <td><a href="{{ route('new.mail', ['roll' => $user->roll]) }}" target="_blank">{{ $user->email }}</a></td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection