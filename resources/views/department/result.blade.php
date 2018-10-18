@extends('layouts.app')

@section('title')
    {{ $department }} RUET
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default w3-hover-shadow" style="font-family: optima">
                <div class="panel-heading w3-blue"><h2>Semester Results</h2></div>
                <div>
                    <table class="w3-table w3-striped w3-bordered w3-accordion">
                        <tr>
                            <th>
                                GP
                            </th>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Min" id="minGP">
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Max" id="maxGP">
                          </td>
                          <th>
                                GPA
                          </th>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Min" id="minGPA">
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Max" id="maxGPA">
                          </td>
                          <th>
                                CGPA
                          </th>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Min" id="minCGPA">
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Max" id="maxCGPA">
                          </td>
                        </tr>
                    </table>
                </div>
                <div style="height: auto; overflow: auto; font-family: Courier New; text-transform: uppercase;">
                    <table id="example" class="display" cellspacing="0" width="100%">
                          <thead>
                            <tr class="w3-indigo">
                              <th class="w3-center">
                                  Student Id
                              </th>
                              <th class="w3-center">
                                  Name
                              </th>
                              <th>
                                  GP
                              </th>
                              <th>
                                  GPA
                              </th>
                              <th>
                                  CGPA
                              </th>
                              <th class="w3-center">
                                  Credits
                              </th>
                              <th class="w3-center">
                                  Remarks
                              </th>
                          </tr>
                        </thead>
                        <tfoot>
                            <tr class="w3-indigo">
                              <th class="w3-center">
                                  Student Id
                              </th>
                              <th class="w3-center">
                                  Name
                              </th>
                              <th>
                                  GP
                              </th>
                              <th>
                                  GPA
                              </th>
                              <th>
                                  CGPA
                              </th>
                              <th class="w3-center">
                                  Credits
                              </th>
                              <th class="w3-center">
                                  Remarks
                              </th>
                          </tr>
                        </tfoot>
                  
                        <tbody id="people">
                          @foreach($exams as $exam)
                            <tr>
                                <td class="w3-center">
                                    <div>&nbsp;</div>
                                    <div>{{ $exam->roll }}</div>
                                </td>
                                <td class="w3-center">
                                    <div>&nbsp;</div>
                                    <div>{{ $exam->name }}</div>
                                </td>
                                <td class="w3-center">
                                    <div>&nbsp;</div>
                                    <div>{{ $exam->gp }}</div>
                                </td>
                                <td class="w3-center">
                                    <div>&nbsp;</div>
                                    <div class="w3-large">{{ $exam->gpa }}</div>
                                </td>
                                <td class="w3-center">
                                    <div>&nbsp;</div>
                                    <div class="w3-larges">{{ $exam->cgpa }}</div>
                                </td>
                                <td class="w3-center">
                                    <table class="w3-table w3-border w3-bordered w3-accordion">
                                        <tr>
                                            <th>
                                                Earned<br>Credit
                                            </th>
                                            <td>
                                                {{ $exam->earned_credit }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Total Earned<br>Credit
                                            </th>
                                            <td>
                                                {{ $exam->total_earned_credit }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td class="w3-center">
                                    <table class="w3-table w3-border w3-bordered w3-accordion">
                                        <tr>
                                            <th>
                                                Failed<br>Subjects
                                            </th>
                                            <td>
                                                {{ $exam->failed }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                X-Grade<br>Subjects
                                            </th>
                                            <td>
                                                {{ $exam->x_graded }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                          @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
/* Custom filtering function which will search data in column four between two values */
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseFloat( $('#minGP').val(), 10 );
        var max = parseFloat( $('#maxGP').val(), 10 );
        var age = parseFloat( data[2] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    var table = $('#example').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#minGP, #maxGP').keyup( function() {
        table.draw();
    } );
} );

/* Custom filtering function which will search data in column four between two values */
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseFloat( $('#minGPA').val(), 10 );
        var max = parseFloat( $('#maxGPA').val(), 10 );
        var age = parseFloat( data[3] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    var table = $('#example').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#minGPA, #maxGPA').keyup( function() {
        table.draw();
    } );
} );
/* Custom filtering function which will search data in column four between two values */
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseFloat( $('#minCGPA').val(), 10 );
        var max = parseFloat( $('#maxCGPA').val(), 10 );
        var age = parseFloat( data[4] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    var table = $('#example').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#minCGPA, #maxCGPA').keyup( function() {
        table.draw();
    } );
} );
</script>

@endsection