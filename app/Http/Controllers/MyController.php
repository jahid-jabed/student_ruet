<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\gallery;
use App\User;
use App\Data;
use App\Head;
use Illuminate\Support\Facades\Mail;
use App\ResultSheet;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class MyController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();
        $head = Head::all()->where('vice_chancellor', 1)->first();
        if($head)
        {
            return view('home', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('home', ['images' => $gallery, 'head' => $head]);
        }
        
    }
    
    public function testHome()
    {
        $result = new ResultSheet;
        $result->semester = 'EVEN';
        return view('mail_results', ['result' => $result]);
    }
        
    public function getGalleryImage($filename)
    {
        $file = Storage::disk('gallery')->get($filename);
        return new Response($file, 200);
    }
    
    public function getHeadImage($filename)
    {
        $file = Storage::disk('head')->get($filename);
        return new Response($file, 200);
    }
    
    public function getStudentImage($filename)
    {
        $file = Storage::disk('students')->get($filename);
        return new Response($file, 200);
    }
    
    public function getMaterials($filename)
    {
        
        $file = Storage::disk('materials')->get($filename);
        return new Response($file, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
        
    }
    
//    public function getStudentARCH()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'ARCH')->get();
//        return view('department.arch.student', ['users' => $users]);
//    }
    
    public function getHomeARCH()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'ARCH')
                ->first();
        if($head)
        {
            return view('department.arch.arch', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.arch.arch', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentBECM()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'BECM')->get();
//        return view('department.becm.student', ['users' => $users]);
//    }
//    
    public function getHomeBECM()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'BECM')
                ->first();
        if($head)
        {
            return view('department.becm.becm', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.becm.becm', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentCE()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'CE')->get();
//        return view('department.ce.student', ['users' => $users]);
//    }
    
    public function getHomeCE()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'CE')
                ->first();
        if($head)
        {
            return view('department.ce.ce', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.ce.ce', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentCFPE()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'CFPE')->get();
//        return view('department.cfpe.student', ['users' => $users]);
//    }
    
    public function getHomeCFPE()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'CFPE')
                ->first();
        if($head)
        {
            return view('department.cfpe.cfpe', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.cfpe.cfpe', ['images' => $gallery, 'head' => $head]);
        }
    }
    
    public function getHomeCHEM()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'CHEM')
                ->first();
        if($head)
        {
            return view('department.chem.chem', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.chem.chem', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentCSE()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'CSE')->get();
//        return view('department.cse.student', ['users' => $users]);
//    }
    
    public function getHomeCSE()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'CSE')
                ->first();
        if($head)
        {
            return view('department.cse.cse', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.cse.cse', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentECE()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'ECE')->get();
//        return view('department.ece.student', ['users' => $users]);
//    }
    
    public function getHomeECE()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'ECE')
                ->first();
        if($head)
        {
            return view('department.ece.ece', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.ece.ece', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentEEE()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'EEE')->get();
//        return view('department.eee.student', ['users' => $users]);
//    }
    
    public function getHomeEEE()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'EEE')
                ->first();
        if($head)
        {
            return view('department.eee.eee', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.eee.eee', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentETE()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'ETE')->get();
//        return view('department.ete.student', ['users' => $users]);
//    }
    
    public function getHomeETE()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'ETE')
                ->first();
        if($head)
        {
            return view('department.ete.ete', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.ete.ete', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentGCE()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'GCE')->get();
//        return view('department.gce.student', ['users' => $users]);
//    }
    
    public function getHomeGCE()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'GCE')
                ->first();
        if($head)
        {
            return view('department.gce.gce', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.gce.gce', ['images' => $gallery, 'head' => $head]);
        }
    }
    
    public function getHomeHUM()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'HUM')
                ->first();
        if($head)
        {
            return view('department.hum.hum', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.hum.hum', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentIPE()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'IPE')->get();
//        return view('department.ipe.student', ['users' => $users]);
//    }
    
    public function getHomeIPE()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'IPE')
                ->first();
        if($head)
        {
            return view('department.ipe.ipe', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.ipe.ipe', ['images' => $gallery, 'head' => $head]);
        }
    }
    
    public function getHomeMATH()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'MATH')
                ->first();
        if($head)
        {
            return view('department.math.math', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.math.math', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentME()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'ME')->get();
//        return view('department.me.student', ['users' => $users]);
//    }
    
    public function getHomeME()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'ME')
                ->first();
        if($head)
        {
            return view('department.me.me', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.me.me', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentMSE()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'MSE')->get();
//        return view('department.mse.student', ['users' => $users]);
//    }
    
    public function getHomeMSE()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'MSE')
                ->first();
        if($head)
        {
            return view('department.mse.mse', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.mse.mse', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentMTE()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'MTE')->get();
//        return view('department.mte.student', ['users' => $users]);
//    }
    
    public function getHomeMTE()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'MTE')
                ->first();
        if($head)
        {
            return view('department.mte.mte', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.mte.mte', ['images' => $gallery, 'head' => $head]);
        }
    }
    
    public function getHomePHY()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'PHY')
                ->first();
        if($head)
        {
            return view('department.phy.phy', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.phy.phy', ['images' => $gallery, 'head' => $head]);
        }
    }
    
//    public function getStudentURP()
//    {
//        $users = Data::orderBy('roll', 'asc')->where('department', 'URP')->get();
//        return view('department.urp.student', ['users' => $users]);
//    }
    
    public function getHomeURP()
    {
        $gallery = Gallery::all();
        $head = Head::all()
                ->where('vice_chancellor', 0)
                ->where('department', 'URP')
                ->first();
        if($head)
        {
            return view('department.urp.urp', ['images' => $gallery, 'head' => $head]);
        }
        else {
            $head = new Head();
            $head['department'] = 'XYZ';
            $head['name'] = 'Mr X';
            $head['designation'] = 'Professor';
            return view('department.urp.urp', ['images' => $gallery, 'head' => $head]);
        }
    }
    
    public function getExcel()
    {
        return view('importExport', ['msg' => null]);
    }
    
   public function adminRegister() {
        
        return view('auth.admin_register');
    }
    
    public function getStudent($department)
    {
        $users = Data::orderBy('roll', 'asc')->where('department', $department)->get();
        return view('department.student', ['users' => $users, 'department' => $department]);
    }
}

