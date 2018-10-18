@extends('layouts.app')

@section('title')
    MTE RUET
@endsection

@section('content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
            <ul class="w3-ul w3-border w3-bordered">
                <li class="w3-indigo w3-xlarge w3-center">STUDENT</li>
                <li class="w3-hover-shadow">
                    <a href="{{ route('department.student',['department' => 'MTE']) }}" class="w3-text-black btn">Current Students</a>
                </li>
                @if(Storage::disk('materials')->has('Syllabus-MTE.pdf'))
                <li class="w3-hover-shadow">
                    <a href="{{ route('get.materials', ['filename' => 'Syllabus-MTE.pdf']) }}" target="_blank" class="w3-text-black btn">Syllabus</a>
                </li>
                @else
                <li class="w3-hover-shadow">
                    <a href="#" class="w3-text-black btn">Syllabus</a>
                </li>
                @endif
                @if(Storage::disk('materials')->has('Routine-MTE.pdf'))
                <li class="w3-hover-shadow">
                    <a href="{{ route('get.materials', ['filename' => 'Routine-MTE.pdf']) }}" target="_blank" class="w3-text-black btn">Class Routine</a>
                </li>
                @else
                <li class="w3-hover-shadow">
                    <a href="#" class="w3-text-black btn">Class Routine</a>
                </li>
                @endif
                <li class="w3-hover-shadow">
                    <a href="{{ route('exam.list', ['department' => 'MTE']) }}" target="_blank" class="w3-text-black btn">Semester Result</a>
                </li>
                @if(Storage::disk('materials')->has('CourseRegistration-MTE.pdf'))
                <li class="w3-hover-shadow">
                    <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-MTE.pdf']) }}" target="_blank" class="w3-text-black btn">Course Registration</a>
                </li>
                @else
                <li class="w3-hover-shadow">
                    <a href="#" class="w3-text-black btn">Course Registration</a>
                </li>
                @endif
                @if(Storage::disk('materials')->has('FormFillUp-MTE.pdf'))
                <li class="w3-hover-shadow">
                    <a href="{{ route('get.materials', ['filename' => 'FormFillUp-MTE.pdf']) }}" target="_blank" class="w3-text-black btn">Exam FormFillUp</a>
                </li>
                @else
                <li class="w3-hover-shadow">
                    <a href="#" class="w3-text-black btn">Exam Form Fill Up</a>
                </li>
                @endif
            </ul>
        </div>
        
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w3-right">
            <ul class="w3-ul w3-border w3-bordered">
                <li class="w3-indigo w3-xlarge w3-center">MTE RUET</li>
                <li class="w3-hover-shadow"><a href="#about" class="w3-text-black btn">About MTE RUET</a></li>
                <li class="w3-hover-shadow"><a href="#" class="w3-text-black btn">Link 1</a></li>
                <li class="w3-hover-shadow"><a href="#" target="_blank" class="w3-text-black btn">Link 2</a></li>
                <li class="w3-hover-shadow"><a href="#" class="w3-text-black btn">Link 3</a></li>
                <li class="w3-hover-shadow"><a data-toggle="modal" href="#online_course" class="w3-text-black btn">Online Course</a></li>
                <li class="w3-hover-shadow"><a href="#contact" data-toggle="modal" class="w3-text-black btn">Contact</a></li>
            </ul>
        </div>
        
        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">&nbsp;</div>
        
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <?php $count = 0;?>
            @foreach($images as $image)
                @if($image->department == 'MTE')
                    <div class="w3-display-container mySlides w3-card w3-hover-shadow">
                        <img src="{{ route('get.image', ['filename' => $image->image_caption.'-'.$image->department.'.jpg']) }}" style="width: 100%; height: 335px;">
                        <div>
                            <div class="w3-animated w3-animate-zoom w3-display-bottomleft w3-large w3-container w3-padding-16" style="background-color:rgba(235,81,0,0.5);color:#ffffff;">
                              {{ $image->image_caption }}
                            </div>
                        </div>
                    </div> 
                    <?php $count = $count+1;?>
                @endif
            @endforeach
            <div class="w3-container w3-large w3-text-white w3-display-bottomright">
                <?php $count = 0;?>
                @foreach($images as $image)
                    @if($image->department == 'MTE')
                        <?php $count = $count+1;?>
                    <a class="w3-badge demo w3-border w3-transparent w3-hover-white"  style="text-decoration: none" onclick="currentDiv({{ $count }})">{{ $count }}</a>
                    @endif
                @endforeach
            </div>
            @if(!$count)
                <div class="w3-display-container w3-card w3-hover-shadow">
                    <img src="{{ asset('images/default.png') }}" style="width:100%; height: 335px;">
                </div>
            @endif
            
            <a class="w3-btn-floating w3-border w3-transparent w3-hover-blue-grey" style="position:absolute;top:45%;left:0; text-decoration: none" onclick="plusDivs(-1)">❮</a>
            <a class="w3-btn-floating w3-border w3-transparent w3-hover-blue-grey" style="position:absolute;top:45%;right:0; text-decoration: none" onclick="plusDivs(1)">❯</a>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">&nbsp;</div>
    </div>
    <br>
    <br> 
    <div class="row">
        <div class="col-md-7">
            <div id="about" class="panel panel-default w3-hover-shadow">
                <div class="panel-heading w3-blue row"><h3>About MTE RUET</h3></div>
                <div class="panel-body w3-light-grey row"  style="height: 200px; text-align: justify; overflow: auto;">
                    <p class="w3-large" style="font-family: optima">
                        Mechatronics is a design process that includes a combination 
                        of mechanical engineering, electrical engineering, 
                        telecommunications engineering, control engineering and 
                        computer engineering.Mechatronics is a multidisciplinary 
                        field of engineering, that is to say, it rejects splitting 
                        engineering into separate disciplines.
                    </p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-1">
            <div class="panel panel-default w3-hover-shadow">
                <div class="panel-heading w3-blue row"><h3>Head of MTE RUET</h3></div>
                <div class="panel-body w3-light-grey row"  style="height: 200px; overflow:auto;">
                    <div class="col-md-6">
                        @if(Storage::disk('head')->has('Head-0-'.$head->department.'.jpg'))
                        <img src="{{ route('image.head', ['filename' => 'Head-0-'.$head->department.'.jpg']) }}" style="width:100%">
                        @else
                        <img src="{{ asset('images/head.png') }}" style="width:100%">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <p><h3>{{$head->name}}</h3><h4 style="font-family: monospace">{{ $head->designation }}</h4></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Modal -->
<div class="modal w3-animate-zoom" id="online_course" role="dialog">
      <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header w3-blue">
                  <button type="button" class="close w3-xlarge w3-btn-floating" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title w3-xlarge">Online Course</h4>
              </div>
              <div class="modal-body">
                  <p class="w3-large" style="font-family: monospace">The Online course program will start soon.</p>
              </div>
              <div class="modal-footer w3-light-grey">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
          </div>

      </div>
</div>
 
 
 <div class="modal w3-animate-zoom" id='contact' role="dialog">
      <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header w3-blue">
                  <button type="button" class="close w3-xlarge w3-btn-floating fa fa-times" data-dismiss="modal"></button>
                  <h4 class="modal-title w3-xlarge">Contact</h4>
              </div>
               
                <div>
                    <p class="h4"><span class="fa fa-address-card-o"></span>&emsp;Dept. of Mechatronics Engineering (MTE),<br>
                       &emsp;&emsp;Rajshahi University of Engineering & Technology (RUET),<br>
                       &emsp;&emsp;Kazla, Rajshahi-6204, Bangladesh.<br><br>
                       <span class="fa fa-fax"></span>&emsp;+88 (0721) 750105&emsp;&emsp;&emsp;&emsp;
                       <span class="fa fa-phone"></span>&emsp;+88 (721) 750742-3, 751320-1<br><br>
                       <span class="fa fa-internet-explorer"></span>&emsp;<a href="http://mte.ruet.ac.bd/" target="_blank">http://mte.ruet.ac.bd/</a>&emsp;&emsp;&emsp;
                       <span class="fa fa-envelope-o"></span>&emsp;<a href="https://mail.google.com/mail/u/0/#inbox?compose=new" target="_blank">mte@ruet.ac.bd</a>
                   </p>
               </div>
              <div class="modal-footer w3-light-grey">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
          </div>

      </div>
</div>


<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white"; 
}
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none"; 
    }
    for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";
    dots[myIndex-1].className += " w3-white";
    setTimeout(carousel, 4000);
}
</script>
@endsection


