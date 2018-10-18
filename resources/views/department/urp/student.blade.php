@extends('layouts.app')

@section('title')
    URP RUET
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default w3-hover-shadow" style="font-family: optima">
                <div class="panel-heading w3-blue"><h2>Current Students</h2></div>
<!--                <div style="height: 500px; overflow: auto;">-->
                <div>
                    <table class="w3-table w3-striped w3-bordered w3-card-4 w3-accordion">
                        <tr>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Search by series..." id="SeriesInput" onkeyup="SeriesFunction()">
                          </td>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Search by student id..." id="IDInput" onkeyup="IDFunction()">
                          </td>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Search by name..." id="NameInput" onkeyup="NameFunction()">
                          </td>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Search by email..." id="EmailInput" onkeyup="EmailFunction()">
                          </td>
                      </tr>
                    </table>
                </div>
                <div style="max-height: 500px; overflow: auto;">
                <table class="w3-table w3-striped w3-border w3-bordered w3-card-4 w3-accordion w3-large" id="myTable">
                  <thead>
                      <tr class="w3-indigo">
                          <th>
                              S.L.
                          </th>
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
                  <thead>
                  <tbody id="people">
                      <?php $count = 1;?>
                  @foreach($users as $user)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $user->series }}</td>
                        <td>{{ $user->roll }}</td>
                        <td>{{ $user->name }}</td>
                        <td><a href="{{ route('new.mail', ['roll' => $user->roll]) }}" target="_blank">{{ $user->email }}</a></td>
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
    //Search by Series
    function SeriesFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("SeriesInput");
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
    
    //Search by Student ID
    function IDFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("IDInput");
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
    
    //Search by Name
    function NameFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("NameInput");
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
    
    //Search by Email
    function EmailFunction() {
      var input, filter, table, tr, td, i;
      input = document.getElementById("EmailInput");
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

</script>

@endsection