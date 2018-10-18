@extends('layouts.app')

@section('title')
    {{ $department }} RUET
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default w3-hover-shadow" style="font-family: optima">
                <div class="panel-heading w3-blue"><h2>Publish Results</h2></div>
                <div>
                    <table class="w3-table w3-striped w3-bordered w3-card-4 w3-accordion">
                        <tr>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Search by year..." id="YearInput" onkeyup="YearFunction()">
                          </td>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Search by semester..." id="SemesterInput" onkeyup="SemesterFunction()">
                          </td>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Search by examination..." id="ExamInput" onkeyup="ExamFunction()">
                          </td>
                      </tr>
                    </table>
                </div>
                <div>
                <table class="w3-table w3-striped w3-border w3-bordered w3-card-4 w3-accordion w3-large" id="myTable">
                  <thead>
                      <tr class="w3-indigo">
                          <th>
                              S.L.
                          </th>
                        <th>
                            Year
                        </th>
                        <th>
                            Semester
                        </th>
                        <th>
                            Examination
                        </th>
                    </tr>
                  <thead>
                  <tbody id="people">
                      <?php $count = 1;?>
                  @foreach($exams as $exam)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $exam->year }}</td>
                        <td>{{ $exam->semester }}</td>
                        <td>{{ $exam->examination }}<a href="{{ route('publish.result', ['year' => $exam->year, 'semester' => $exam->semester, 'examination' => $exam->examination, 'department' => $department]) }}" class="w3-right btn btn-primary">Publish&emsp;<span class="fa fa-bullhorn"</a></td>
                    </tr>
                    <?php $count = $count + 1;?>
                  @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //Search by Year
    function YearFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("YearInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    
    //Search by Semester
    function SemesterFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("SemesterInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    
    //Search by Examination
    function ExamFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("ExamInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
</script>

@endsection