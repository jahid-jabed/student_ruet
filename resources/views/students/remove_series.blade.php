@extends('layouts.app')

@section('title')
    STUDENT
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default w3-hover-shadow" style="font-family: optima">
                <div class="panel-heading w3-blue"><h2>Students</h2></div>
<!--                <div style="height: 500px; overflow: auto;">-->
                <div>
                    <table class="w3-table w3-striped w3-bordered w3-card-4 w3-accordion">
                        <tr>
                          <td>
                              <input class="w3-input w3-border w3-padding" type="text" placeholder="Search by series..." id="SeriesInput" onkeyup="SeriesFunction()">
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
                        <th class="w3-right">
                            Remove
                        </th>
                    </tr>
                  </thead>
                  <tbody id="people">
                      <?php $count = 1;?>
                  @foreach($students as $user)
                  @if($user->series)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $user->series }}</td>
                        <td class="w3-right">
                            <a href="{{ route('remove.now.series', ['series' => $user->series]) }}" class="btn btn-danger w3-center">Remove&emsp;<i class="fa fa-ban"></i></a>
                        </td>
                    </tr>
                    
                    <?php $count = $count + 1;?>
                    @endif
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
</script>

@endsection