@extends('layouts.app')

@section('title')
    STUDENT
@endsection

@section('content')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
            <ul class="w3-ul w3-border w3-bordered">
                <li class="w3-indigo w3-xlarge w3-center">STUDENT</li>
                <li class="w3-hover-shadow dropdown-submenu">
                    <a href="#" class="w3-text-black dropdown btn" data-toggle="dropdown">Current Students</a>
                    <ul class="dropdown-menu dept-dropdown-menu menu_level_1" role="menu" style="font-family: monospace">
                        <li class="w3-center">
                            DEPARTMENTS      
                        </li>
                        <li class="dept-menu first">
                            <a href="{{ route('department.student',['department' => 'ARCH']) }}">ARCH</a>        
                        </li>

                        <li class="dept-menu">        
                            <a href="{{ route('department.student',['department' => 'BECM']) }}">BECM</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('department.student',['department' => 'CE']) }}">CE</a>        
                        </li>
                        
                        <li class="dept-menu">        
                            <a href="{{ route('department.student',['department' => 'CFPE']) }}">CFPE</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('department.student',['department' => 'CSE']) }}">CSE</a>        
                        </li>
                        
                        <li class="dept-menu">        
                            <a href="{{ route('department.student',['department' => 'ECE']) }}">ECE</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('department.student',['department' => 'EEE']) }}">EEE</a>        
                        </li>
                        
                        <li class="dept-menu">        
                            <a href="{{ route('department.student',['department' => 'ETE']) }}">ETE</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('department.student',['department' => 'GCE']) }}">GCE</a>        
                        </li>
                        
                        <li class="dept-menu">        
                            <a href="{{ route('department.student',['department' => 'IPE']) }}">IPE</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('department.student',['department' => 'ME']) }}">ME</a>        
                        </li>
                        
                        <li class="dept-menu">        
                            <a href="{{ route('department.student',['department' => 'MSE']) }}">MSE</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('department.student',['department' => 'MTE']) }}">MTE</a>        
                        </li>

                        <li class="dept-menu last">       
                            <a href="{{ route('department.student',['department' => 'URP']) }}">URP</a>        
                        </li>
                    </ul>
                </li>
                <li class="w3-hover-shadow dropdown-submenu">
                    <a href="#" target="_blank" class="w3-text-black dropdown btn" data-toggle="dropdown">Syllabus</a>
                    <ul class="dropdown-menu dept-dropdown-menu menu_level_1" role="menu"  style="font-family: monospace">
                        <li class="w3-center">
                            DEPARTMENTS     
                        </li>
                        
                        @if(Storage::disk('materials')->has('Syllabus-ARCH.pdf'))
                        <li class="dept-menu first">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-ARCH.pdf']) }}" target="_blank">ARCH</a>        
                        </li>
                        @else
                        <li class="dept-menu first">
                            <a href="#">ARCH</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Syllabus-BECM.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-BECM.pdf']) }}" target="_blank">BECM</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">BECM</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Syllabus-CE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-CE.pdf']) }}" target="_blank">CE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Syllabus-CFPE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-CFPE.pdf']) }}" target="_blank">CFPE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CFPE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Syllabus-CSE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-CSE.pdf']) }}" target="_blank">CSE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CSE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Syllabus-ECE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-ECE.pdf']) }}" target="_blank">ECE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ECE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Syllabus-EEE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-EEE.pdf']) }}" target="_blank">EEE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">EEE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Syllabus-ETE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-ETE.pdf']) }}" target="_blank">ETE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ETE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Syllabus-GCE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-GCE.pdf']) }}" target="_blank">GCE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">GCE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Syllabus-IPE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-IPE.pdf']) }}" target="_blank">IPE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">IPE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Syllabus-ME.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-ME.pdf']) }}" target="_blank">ME</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ME</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Syllabus-MSE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-MSE.pdf']) }}" target="_blank">MSE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">MSE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Syllabus-MTE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-MTE.pdf']) }}" target="_blank">MTE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">MTE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Syllabus-URP.pdf'))
                        <li class="dept-menu last">
                            <a href="{{ route('get.materials', ['filename' => 'Syllabus-URP.pdf']) }}" target="_blank">URP</a>        
                        </li>
                        @else
                        <li class="dept-menu last">
                            <a href="#">URP</a>        
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="w3-hover-shadow dropdown-submenu">
                    <a href="#" target="_blank" class="w3-text-black dropdown btn" data-toggle="dropdown">Class Routine</a>
                    <ul class="dropdown-menu dept-dropdown-menu menu_level_1" role="menu" style="font-family: monospace">
                        <li class="w3-center">
                            DEPARTMENTS     
                        </li>
                        
                        @if(Storage::disk('materials')->has('Routine-ARCH.pdf'))
                        <li class="dept-menu first">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-ARCH.pdf']) }}" target="_blank">ARCH</a>        
                        </li>
                        @else
                        <li class="dept-menu first">
                            <a href="#">ARCH</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Routine-BECM.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-BECM.pdf']) }}" target="_blank">BECM</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">BECM</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Routine-CE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-CE.pdf']) }}" target="_blank">CE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Routine-CFPE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-CFPE.pdf']) }}" target="_blank">CFPE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CFPE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Routine-CSE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-CSE.pdf']) }}" target="_blank">CSE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CSE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Routine-ECE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-ECE.pdf']) }}" target="_blank">ECE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ECE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Routine-EEE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-EEE.pdf']) }}" target="_blank">EEE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">EEE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Routine-ETE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-ETE.pdf']) }}" target="_blank">ETE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ETE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Routine-GCE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-GCE.pdf']) }}" target="_blank">GCE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">GCE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Routine-IPE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-IPE.pdf']) }}" target="_blank">IPE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">IPE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Routine-ME.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-ME.pdf']) }}" target="_blank">ME</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ME</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('Routine-MSE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-MSE.pdf']) }}" target="_blank">MSE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">MSE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Routine-MTE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-MTE.pdf']) }}" target="_blank">MTE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">MTE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('Routine-URP.pdf'))
                        <li class="dept-menu last">
                            <a href="{{ route('get.materials', ['filename' => 'Routine-URP.pdf']) }}" target="_blank">URP</a>        
                        </li>
                        @else
                        <li class="dept-menu last">
                            <a href="#">URP</a>        
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="w3-hover-shadow dropdown-submenu">
                    <a href="#" target="_blank" class="w3-text-black dropdown btn" data-toggle="dropdown">Semester Result</a>
                    <ul class="dropdown-menu dept-dropdown-menu menu_level_1" role="menu" style="font-family: monospace">
                        <li class="w3-center">
                            DEPARTMENTS      
                        </li>
                        <li class="dept-menu first">
                            <a href="{{ route('exam.list', ['department' => 'ARCH']) }}">ARCH</a>        
                        </li>

                        <li class="dept-menu">        
                            <a href="{{ route('exam.list', ['department' => 'BECM']) }}">BECM</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('exam.list', ['department' => 'CE']) }}">CE</a>        
                        </li>
                        
                        <li class="dept-menu">        
                            <a href="{{ route('exam.list', ['department' => 'CFPE']) }}">CFPE</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('exam.list', ['department' => 'CSE']) }}">CSE</a>        
                        </li>
                        
                        <li class="dept-menu">        
                            <a href="{{ route('exam.list', ['department' => 'ECE']) }}">ECE</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('exam.list', ['department' => 'EEE']) }}">EEE</a>        
                        </li>
                        
                        <li class="dept-menu">        
                            <a href="{{ route('exam.list', ['department' => 'EEE']) }}">ETE</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('exam.list', ['department' => 'GCE']) }}">GCE</a>        
                        </li>
                        
                        <li class="dept-menu">        
                            <a href="{{ route('exam.list', ['department' => 'IPE']) }}">IPE</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('exam.list', ['department' => 'ME']) }}">ME</a>        
                        </li>
                        
                        <li class="dept-menu">        
                            <a href="{{ route('exam.list', ['department' => 'MSE']) }}">MSE</a>        
                        </li>

                        <li class="dept-menu">       
                            <a href="{{ route('exam.list', ['department' => 'MTE']) }}">MTE</a>        
                        </li>

                        <li class="dept-menu last">       
                            <a href="{{ route('exam.list', ['department' => 'URP']) }}">URP</a>        
                        </li>
                    </ul>
                </li>
                <li class="w3-hover-shadow dropdown-submenu">
                    <a href="#" target="_blank" class="w3-text-black dropdown btn" data-toggle="dropdown">Course Registration</a>
                    <ul class="dropdown-menu dept-dropdown-menu menu_level_1" role="menu" style="font-family: monospace">
                        <li class="w3-center">
                            DEPARTMENTS     
                        </li>
                        
                        @if(Storage::disk('materials')->has('CourseRegistration-ARCH.pdf'))
                        <li class="dept-menu first">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-ARCH.pdf']) }}" target="_blank">ARCH</a>        
                        </li>
                        @else
                        <li class="dept-menu first">
                            <a href="#">ARCH</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('CourseRegistration-BECM.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-BECM.pdf']) }}" target="_blank">BECM</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">BECM</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('CourseRegistration-CE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-CE.pdf']) }}" target="_blank">CE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('CourseRegistration-CFPE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-CFPE.pdf']) }}" target="_blank">CFPE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CFPE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('CourseRegistration-CSE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-CSE.pdf']) }}" target="_blank">CSE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CSE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('CourseRegistration-ECE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-ECE.pdf']) }}" target="_blank">ECE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ECE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('CourseRegistration-EEE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-EEE.pdf']) }}" target="_blank">EEE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">EEE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('CourseRegistration-ETE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-ETE.pdf']) }}" target="_blank">ETE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ETE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('CourseRegistration-GCE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-GCE.pdf']) }}" target="_blank">GCE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">GCE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('CourseRegistration-IPE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-IPE.pdf']) }}" target="_blank">IPE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">IPE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('CourseRegistration-ME.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-ME.pdf']) }}" target="_blank">ME</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ME</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('CourseRegistration-MSE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-MSE.pdf']) }}" target="_blank">MSE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">MSE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('CourseRegistration-MTE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-MTE.pdf']) }}" target="_blank">MTE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">MTE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('CourseRegistration-URP.pdf'))
                        <li class="dept-menu last">
                            <a href="{{ route('get.materials', ['filename' => 'CourseRegistration-URP.pdf']) }}" target="_blank">URP</a>        
                        </li>
                        @else
                        <li class="dept-menu last">
                            <a href="#">URP</a>        
                        </li>
                        @endif
                    </ul>
                </li>
                <li class="w3-hover-shadow dropdown-submenu">
                    <a href="#" target="_blank" class="w3-text-black dropdown btn" data-toggle="dropdown">Exam Form Fill Up</a>
                    <ul class="dropdown-menu dept-dropdown-menu menu_level_1" role="menu" style="font-family: monospace">
                        <li class="w3-center">
                            DEPARTMENTS     
                        </li>
                        
                        @if(Storage::disk('materials')->has('FormFillUp-ARCH.pdf'))
                        <li class="dept-menu first">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-ARCH.pdf']) }}" target="_blank">ARCH</a>        
                        </li>
                        @else
                        <li class="dept-menu first">
                            <a href="#">ARCH</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('FormFillUp-BECM.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-BECM.pdf']) }}" target="_blank">BECM</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">BECM</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('FormFillUp-CE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-CE.pdf']) }}" target="_blank">CE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('FormFillUp-CFPE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-CFPE.pdf']) }}" target="_blank">CFPE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CFPE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('FormFillUp-CSE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-CSE.pdf']) }}" target="_blank">CSE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">CSE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('FormFillUp-ECE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-ECE.pdf']) }}" target="_blank">ECE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ECE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('FormFillUp-EEE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-EEE.pdf']) }}" target="_blank">EEE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">EEE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('FormFillUp-ETE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-ETE.pdf']) }}" target="_blank">ETE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ETE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('FormFillUp-GCE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-GCE.pdf']) }}" target="_blank">GCE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">GCE</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('FormFillUp-IPE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-IPE.pdf']) }}" target="_blank">IPE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">IPE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('FormFillUp-ME.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-ME.pdf']) }}" target="_blank">ME</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">ME</a>        
                        </li>
                        @endif
                        
                        @if(Storage::disk('materials')->has('FormFillUp-MSE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-MSE.pdf']) }}" target="_blank">MSE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">MSE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('FormFillUp-MTE.pdf'))
                        <li class="dept-menu">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-MTE.pdf']) }}" target="_blank">MTE</a>        
                        </li>
                        @else
                        <li class="dept-menu">
                            <a href="#">MTE</a>        
                        </li>
                        @endif

                        @if(Storage::disk('materials')->has('FormFillUp-URP.pdf'))
                        <li class="dept-menu last">
                            <a href="{{ route('get.materials', ['filename' => 'FormFillUp-URP.pdf']) }}" target="_blank">URP</a>        
                        </li>
                        @else
                        <li class="dept-menu last">
                            <a href="#">URP</a>        
                        </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
        
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 w3-right">
            <ul class="w3-ul w3-border w3-bordered">
                <li class="w3-indigo w3-xlarge w3-center">ACADEMICS</li>
                <li class="w3-hover-shadow"><a href="#about" class="w3-text-black btn">About RUET</a></li>
                <li class="w3-hover-shadow"><a href="{{ route('admin.register') }}" class="w3-text-black btn">Link 1</a></li>
                <li class="w3-hover-shadow"><a href="{{ route('sms') }}" target="_blank" class="w3-text-black btn">Link 2</a></li>
                <li class="w3-hover-shadow"><a href="{{ route('test.home') }}" class="w3-text-black btn">Link 3</a></li>
                <li class="w3-hover-shadow"><a data-toggle="modal" href="#online_course" class="w3-text-black btn">Online Course</a></li>
                <li class="w3-hover-shadow"><a href="#contact" data-toggle="modal" class="w3-text-black btn">Contact</a></li>
                <li class="w3-hover-shadow"><a href="{{ route('cReg') }}" target="_blank" class="w3-text-black btn">cReg</a></li>
            </ul>
        </div>
        
        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">&nbsp;</div>
        
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <?php $count = 0;?>
            @foreach($images as $image)
                @if($image->department == 'default')
                    <div class="w3-display-container mySlides w3-card w3-hover-shadow">
                        <img class="" src="{{ route('get.image', ['filename' => $image->image_caption.'-'.$image->department.'.jpg']) }}" style="width: 100%; height: 335px;">
                        <div>
                            <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-animated w3-animate-zoom" style="background-color:rgba(235,81,0,0.5);color:#ffffff;">
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
                    @if($image->department == 'default')
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
            
            <a class="w3-btn-floating w3-border w3-transparent w3-hover-blue-grey" style="position:absolute;top:45%;left:0; text-decoration: none" onclick="plusDivs(-1)">&#10094;</a>
            <a class="w3-btn-floating w3-border w3-transparent w3-hover-blue-grey" style="position:absolute;top:45%;right:0; text-decoration: none" onclick="plusDivs(1)">&#10095;</a>    
        </div>
        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">&nbsp;</div>
    </div>
    <br>
    <br> 
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div id="about" class="panel panel-default w3-hover-shadow">
                <div class="panel-heading w3-blue row"><h3>Welcome to RUET</h3></div>
                <div class="panel-body w3-light-grey row"  style="height: 200px; overflow: auto; text-align: justify;">
                    <p class="w3-large" style="font-family: optima">
                        Rajshahi University of Engineering & Technology (RUET) 
                        is the prestigious public Engineering University & center 
                        of excellence offers high quality education and research 
                        in the field of engineering and technology.<br>
                        This university comprises engineering and sciences departments’ 
                        offers under-graduate and post-graduate degrees. Every 
                        year most brilliant students are enrolled for the undergraduate 
                        program through transparent and standard admission test.
                        <a data-toggle="modal" href="#about_ruet" class="btn btn-primary w3-right">Read more</a>
                    </p>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-12 col-xs-12">
            <div class="panel panel-default w3-hover-shadow">
                <div class="panel-heading w3-blue row"><h3>Vice-Chancellor</h3></div>
                <div class="panel-body w3-light-grey row"  style="height: 200px; overflow:auto;">
                    <div class="col-md-6">
                        @if(Storage::disk('head')->has('Head-1-'.$head->department.'.jpg'))
                        <img src="{{ route('image.head', ['filename' => 'Head-1-'.$head->department.'.jpg']) }}" style="width:100%">
                        @else
                        <img src="{{ asset('images/head.png') }}" style="width:100%">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <p><h3>{{ $head->name }}</h3><h4 style="font-family: monospace">{{ $head->designation }}<br>Dept. of {{ $head->department }}</h4></p>
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
 
 <div class="modal w3-animate-zoom" id="about_ruet" role="dialog">
      <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header w3-blue">
                  <button type="button" class="close w3-xlarge w3-btn-floating" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title w3-xlarge w3-center">About RUET</h4>
              </div>
              <div class="modal-body w3-large" style="text-align: justify;">
                  <p style="font-family: optima">
                      Rajshahi University of Engineering & Technology (RUET) is the prestigious public Engineering University & center of excellence offers high quality education and research in the field of engineering and technology. RUET is well balanced urban and natural environment and convenience. Rapid globalization, industrialization, presence of problems, depletion of natural resources, environmental damage, world financial insecurity, poverty, etc are the global challenge for human being as a whole. Handling such global issues require wide range of quality people share their knowledge to cooperate and take action. RUET is the center of excellence to cultivate such talented individuals who take the lead of such issues sharing their technical knowledge and experience is the most important duty of this university. RUET not only serve for the expectation of public but also contribute to human society as a whole.
                  </p>
                  
                  <p style="font-family: optima">
                      The university comprises engineering and sciences departments’ offers under-graduate and post-graduate degrees. Every year most brilliant students are enrolled for the undergraduate program through transparent and standard admission test. About 3000 students are pursuing their higher study in this green campus including under-graduate and post-graduate with over 200 prominent faculty members of diverse field of expertise. The university also receive a significant numbers of international students are continuing their higher study in this campus.
                  </p>
                  
                  <p style="font-family: optima">
                      The faculty members and students (UG & PG) of this university engaged with qualitative research work in a multiple research fields and well equipped modern laboratory environment. The faculty members invest their most of the time in research activities jointly with foreign faculties beyond their regular academic duties. Every year the university received exiting number of research paper published by the students and faculty members in the world class high impact factor peer reviewed international journal.
                  </p>
                  
                  <p style="font-family: optima">
                      The graduates from this university is well enough to cope any challenge in the field of engineering, technology, research, leadership, management, etc on demand of national and global needs. Many of the students and faculty members receive full funded international scholarship for their higher study and appoint in world top rank universities as a quality faculty members and researchers upon completion the degree. RUET is committed to continue the progress and contributes on national and global development.   
                  </p>
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
                   <p class="h4">&nbsp;<span class="fa fa-address-card-o"></span>&emsp;Registrar,&nbsp;
                       Rajshahi University of Engineering & Technology (RUET),<br>
                       &emsp;&emsp;Kazla, Rajshahi-6204, Bangladesh.<br><br>
                       &nbsp;<span class="fa fa-fax"></span>&emsp;+88 (0721) 750105&emsp;&emsp;&emsp;&emsp;
                       <span class="fa fa-phone"></span>&emsp;+88 (721) 750742-3, 751320-1<br><br>
                       &nbsp;<span class="fa fa-internet-explorer"></span>&emsp;<a href="http://www.ruet.ac.bd" target="_blank">http://www.ruet.ac.bd</a>&emsp;&emsp;&emsp;
                       <span class="fa fa-envelope-o"></span>&emsp;<a href="https://mail.google.com/mail/u/0/#inbox?compose=new" target="_blank">registrar@ruet.ac.bd</a>
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


