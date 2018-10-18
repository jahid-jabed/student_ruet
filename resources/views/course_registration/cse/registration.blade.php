@extends('layouts.app')

@section('title')
    Course Registration
@endsection

@section('content')
<script>
    //VueJs
    new Vue({
    el: '#1st-odd',

    data: {
      item: []
    },

    computed: {
      totalCredit() {
          return this.item.reduce((total, item) => {
            return total + Number(item.credit);
          }, 0);
        },

        totalFee() {
          return this.item.reduce((total, item) => {
            return total + Number(item.fee);
          }, 0);
        }
    },
});
</script>

<div class="container">
  <ul class="nav nav-justified nav-pills w3-aqua">
      <li class="{{ empty($tabName) || $tabName == '1st-odd' ? 'active' : '' }}"><a data-toggle="tab" href="#1st-odd" class="w3-border w3-bordered w3-center">1st Year<br/>Odd Semester</a></li>
      <li class="{{ empty($tabName) || $tabName == '1st-even' ? 'active' : '' }}"><a data-toggle="tab" href="#1st-even" class="w3-border w3-bordered w3-center">1st Year<br/>Even Semester</a></li>
      <li class="{{ empty($tabName) || $tabName == '2nd-odd' ? 'active' : '' }}"><a data-toggle="tab" href="#2nd-odd" class="w3-border w3-bordered w3-center">2nd Year<br/>Odd Semester</a></li>
      <li class="{{ empty($tabName) || $tabName == '2nd-even' ? 'active' : '' }}"><a data-toggle="tab" href="#2nd-even" class="w3-border w3-bordered w3-center">2nd Year<br/>Even Semester</a></li>
      <li class="{{ empty($tabName) || $tabName == '3rd-odd' ? 'active' : '' }}"><a data-toggle="tab" href="#3rd-odd" class="w3-border w3-bordered w3-center">3rd Year<br/>Odd Semester</a></li>
      <li class="{{ empty($tabName) || $tabName == '3rd-even' ? 'active' : '' }}"><a data-toggle="tab" href="#3rd-even" class="w3-border w3-bordered w3-center">3rd Year<br/>Even Semester</a></li>
      <li class="{{ empty($tabName) || $tabName == '4th-odd' ? 'active' : '' }}"><a data-toggle="tab" href="#4th-odd" class="w3-border w3-bordered w3-center">4th Year<br/>Odd Semester</a></li>
      <li class="{{ empty($tabName) || $tabName == '4th-even' ? 'active' : '' }}"><a data-toggle="tab" href="#4th-even" class="w3-border w3-bordered w3-center">4th Year<br/>Even Semester</a></li>
  </ul>

  <div class="tab-content">
      <br>
    <div id="1st-odd" class="tab-pane fade w3-border w3-bordered w3-card w3-round w3-light-grey {{ !empty($tabName) && $tabName == '1st-odd' ? 'active in' : '' }}">
        <div class="w3-container">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <br><br>
                <table class="w3-table w3-striped w3-border w3-bordered w3-accordion w3-large" id="myTable">
                  <thead>
                      <tr class="w3-indigo">
                        <th class="w3-left">
                            Course No.
                        </th>
                        <th>
                            Course Title
                        </th>
                        <th>
                            Credit
                        </th>
                        <th class="w3-right">
                            Registration Fee (Tk.)
                        </th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>
                              <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="cse1100"> CSE 1100
                                    </label>
                               </div>
                          </td>
                          <td>
                              Computer Fundamentals and Ethics
                          </td>
                          <td>
                              1.50
                          </td>
                          <td class="w3-right">
                              50.00&emsp;
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="cse1100"> CSE 1101
                                    </label>
                               </div>
                          </td>
                          <td>
                              Computer Programming
                          </td>
                          <td v-model="item">
                              3.00
                          </td>
                          <td class="w3-right" v-model="item">
                              30.00&emsp;
                          </td>
                      </tr>
                      <tr class="w3-aqua">
                          <td> </td>
                          <td>Total</td>
                          <td>{{ item }}</td>
                          <td class="w3-right">{{ item }}&emsp;</td>
                      </tr>
                  </tbody>
                </table>
                <br>
                <div class="form-group">
                    <div class="col-md-12 col-md-offset-10">
                        <button type="submit" class="btn btn-primary">
                            Submit&emsp;<i class="fas fa-chevron-circle-right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
      
    <div id="1st-even" class="container tab-pane fade w3-border w3-bordered w3-card w3-round w3-light-grey {{ !empty($tabName) && $tabName == '1st-even' ? 'active in' : '' }}">
        <div class="w3-container">
            <div class="w3-center">
                <img src="{{ asset('images/under_construction.png') }}" style="width:60%; height: 300px;">
            </div>
        </div>
    </div>
    <div id="2nd-odd" class="tab-pane fade w3-border w3-bordered w3-card w3-round w3-light-grey {{ !empty($tabName) && $tabName == '2nd-odd' ? 'active in' : '' }}">
        <div class="w3-container">
            <div class="w3-center">
                <img src="{{ asset('images/under_construction.png') }}" style="width:60%; height: 300px;">
            </div>
        </div>
    </div>
    <div id="2nd-even" class="tab-pane fade w3-card w3-border w3-bordered w3-round {{ !empty($tabName) && $tabName == '2nd-even' ? 'active in' : '' }}">
        <div class="w3-container">
            <div class="w3-center">
                <img src="{{ asset('images/under_construction.png') }}" style="width:60%; height: 300px;">
            </div>
        </div>
        </div>
      <div id="3rd-odd" class="tab-pane fade w3-border w3-bordered w3-card w3-round w3-light-grey {{ !empty($tabName) && $tabName == '3rd-odd' ? 'active in' : '' }}">
        <div class="w3-container">
            <div class="w3-center">
                <img src="{{ asset('images/under_construction.png') }}" style="width:60%; height: 300px;">
            </div>
        </div>
    </div>
    <div id="3rd-even" class="tab-pane fade w3-card w3-border w3-bordered w3-round {{ !empty($tabName) && $tabName == '3rd-even' ? 'active in' : '' }}">
        <div class="w3-container">
            <div class="w3-center">
                <img src="{{ asset('images/under_construction.png') }}" style="width:60%; height: 300px;">
            </div>
        </div>
        </div>
      <div id="4th-odd" class="tab-pane fade w3-border w3-bordered w3-card w3-round w3-light-grey {{ !empty($tabName) && $tabName == '4th-odd' ? 'active in' : '' }}">
        <div class="w3-container">
            <div class="w3-center">
                <img src="{{ asset('images/under_construction.png') }}" style="width:60%; height: 300px;">
            </div>
        </div>
    </div>
    <div id="4th-even" class="tab-pane fade w3-card w3-border w3-bordered w3-round {{ !empty($tabName) && $tabName == '4th-even' ? 'active in' : '' }}">
        <div class="w3-container">
            <div class="w3-center">
                    <!--<img src="{{ asset('images/under_construction.png') }}" style="width:60%; height: 300px;">-->
            </div>
        </div>
        </div>
      
     </div>
</div>
<script>
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else { 
            x.className = x.className.replace(" w3-show", "");
        }
    } 
    
    

</script> 
@endsection
