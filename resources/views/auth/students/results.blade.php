@extends('layouts.app')

@section('title')
    RESULTS
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default w3-hover-shadow" style="font-family: optima">
                <div class="panel-heading w3-blue"><h2>Semester Results</h2></div>
               
                <div style="height: 350px; overflow: auto;">
                    <?php $count = 1;?>
                  @foreach($results as $result)
                  <div class="panel panel-default" style="font-family: Courier New; text-transform: uppercase;">
                    <div class="panel-heading w3-light-grey w3-center">
                        <h4>{{ $result->year }} year {{ $result->semester }} semester examination, {{ $result->examination }}</h4>
                    </div>
                  <div class="panel-body">
                    <table class="w3-table w3-large w3-striped w3-border w3-bordered">
                        <tr>
                            <th>
                                GP
                            </th>
                            <td>
                                {{ $result->gp }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Earned Credit
                            </th>
                            <td>
                                {{ $result->earned_credit }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                GPA
                            </th>
                            <td>
                                {{ $result->gpa }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Total Earned Credit
                            </th>
                            <td>
                                {{ $result->total_earned_credit }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                CGPA
                            </th>
                            <td>
                                {{ $result->cgpa }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Failed Subjects
                            </th>
                            <td>
                                {{ $result->failed }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                X-Grade Subjects
                            </th>
                            <td>
                                {{ $result->x_graded }}
                            </td>
                        </tr>
                    </table>
                  </div>
                  </div>
                    <?php $count = $count + 1;?>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection