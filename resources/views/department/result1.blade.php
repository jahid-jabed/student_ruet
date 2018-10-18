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
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Student Id" id="IDInput" onkeyup="IDFunction()">
                          </td>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Name" id="NameInput" onkeyup="NameFunction()">
                          </td>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="GP" id="GPInput" onkeyup="GPFunction()">
                          </td>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="GPA" id="GPAInput" onkeyup="GPAFunction()">
                          </td>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="CGPA" id="CGPAInput" onkeyup="CGPAFunction()">
                          </td>
                      </tr>
                    </table>
                </div>
                <div style="height: 600px; overflow: auto; font-family: Courier New; text-transform: uppercase;">
                <table class="w3-table w3-striped w3-border w3-bordered w3-accordion w3-large" border="2" id="myTable">
                  <thead>
                      <tr class="w3-indigo">
                          <th class="w3-center">
                              S.L.
                          </th>
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
                  <thead>
                  <tbody id="people">
                      <?php $count = 1;?>
                  @foreach($exams as $exam)
                    <tr>
                        <td class="w3-center">
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>{{ $count }}</div>
                        </td>
                        <td class="w3-center">
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>{{ $exam->roll }}</div>
                        </td>
                        <td class="w3-center">
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>{{ $exam->name }}</div>
                        </td>
                        <td class="w3-center">
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>{{ $exam->gp }}</div>
                        </td>
                        <td class="w3-center">
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>{{ $exam->gpa }}</div>
                        </td>
                        <td class="w3-center">
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>{{ $exam->cgpa }}</div>
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
    //Search by ID
    function IDFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("IDInput");
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
    
    //Search by Name
    function NameFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("NameInput");
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
    
    //Search by GP
    function GPFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("GPInput");
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
    
    //Search by GPA
    function GPAFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("GPAInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[4];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    
    //Search by CGPA
    function CGPAFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("CGPAInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[5];
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