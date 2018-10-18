<?php

namespace App\Http\Controllers;

use Request as PassRequest;
use Illuminate\Http\Request;
use App\Mail\SendResults;
use App\Jobs\JobSendResults;
use App\User;
use App\Data;
use App\gallery;
use App\Head;
use Illuminate\Support\Facades\Mail;
use App\ResultSheet;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function viewProfile()
    {
        $data = Data::all()->where('roll', Auth::user()->user_id)->first();
        if($data){
            return view('auth.students.profile', ['info' => $data, 'tabName' => 'home']);
        }
        else {
            $data = new Data();
            $data->name = Auth::user()->name;
            $data->roll = Auth::user()->user_id;
            $data->series = substr(Auth::user()->user_id, 0, 2)+2000;
            $data->mobile = Auth::user()->mobile;
            $data->email = Auth::user()->email;
            $data->department = Auth::user()->department;
            $data->blood = "N/A";
            $data->save();
            return view('auth.students.profile', ['info' => $data, 'tabName' => 'home']);
        }
    }
    
    public function viewDash()
    {
        if(Auth::user()->department == 'default'){
            return view('dashboard.default_admin');
        }
        else{
            $department = Auth::user()->department;
            return view('dashboard.admin', ['department' => $department]);
        }
        
    }
    
    public function AddDefaultImage() {
        if(Auth::user()->department == 'default')
        {
            $msg = null;
            return view('dashboard.gallery.gallery', ['msg' => $msg]);
        }
        else{
            $msg = null;
            return view('dashboard.gallery.default_gallery', ['msg' => $msg]);
        }
        
    }
    
    public function galleryAddNewImage(Request $request)
    {
        $this->validate($request, [
            'image_caption' => 'required',
        ]);
        
        $gallery = new Gallery();
        $gallery->image_caption = $request['image_caption'];
        if($request['department']){
            $gallery->department = $request['department'];
        }
        else {
            $gallery->department = Auth::user()->department;
        }
        
        
        $gallery->save();
        
        $file = $request->file('image_file');
        $filename = $request['image_caption'].'-'.$gallery->department.'.jpg';
        if($file){
            Storage::disk('gallery')->put($filename, File::get($file));
        }
        $msg = 'Uploaded Suceesfully!';
        return redirect()->back()->with($msg);
    }
    
    public function EditStudentImage(Request $request)
    {
        $file = $request->file('image_file');
        $filename = Auth::user()->user_id.'.jpg';
        if($file){
            Storage::disk('students')->put($filename, File::get($file));
        }
        return redirect()->back();
    }
    
    public function sendSMS()
    {
        
        Nexmo::message()->send([
            'to' => '8801680404053',
            'from' => 'RUET',
            'text' => 'Test SMS!'
        ]);
        
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
    
    public function addMaterials()
    {
        $msg = null;
        if(Auth::user()->department == 'default')
        {
            return view('dashboard.materials.upload', ['msg' => $msg]);
        }
        else
        {
            return view('dashboard.materials.default_upload', ['msg' => $msg]);
        }
    }
    
    public function uploadMaterials(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);
        
        if(Auth::user()->department == 'default')
        {
            $department = $request['department'];
        }
        else
        {
            $department = Auth::user()->department;
        }
        
        
        $file = $request->file('file');
        $filename = $request['file_type'].'-'.$department.'.pdf';
        if($file){
            Storage::disk('materials')->put($filename, File::get($file));
        }
        
        $msg = 'Uploaded Succesfully!';
        if(Auth::user()->department == 'default')
        {
            return view('dashboard.materials.upload', ['msg' => $msg]);
        }
        else
        {
            return view('dashboard.materials.default_upload', ['msg' => $msg]);
        }
    }
    
    public function uploadDepartmentResult()
    {
        $msg = null;
        if(Auth::user()->department == 'default')
        {
            return view('dashboard.result.upload', ['msg' => $msg]);
        }
        else
        {
            return view('dashboard.result.default_upload', ['msg' => $msg]);
        }
    }
    
    public function changeHeads()
    {
        $msg = null;
        if(Auth::user()->department == 'default')
        {
            return view('dashboard.heads.head', ['msg' => $msg]);
        }
        else
        {
            return view('dashboard.heads.default_head', ['msg' => $msg]);
        }
    }
    
    public function addHeads(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'file' => 'required',
        ]);
        
        if(Auth::user()->department == 'default')
        {
            $vice_chancellor = $request['vice_chancellor'];
            $department = $request['department'];
            
            if($vice_chancellor == '1')
            {
                $head = Head::where('vice_chancellor', $vice_chancellor)->first();
                if($head)
                {
                    $head->name = $request['name'];
                    $head->designation = $request['designation'];
                    $head->department = $department;
                    $head->vice_chancellor = $vice_chancellor;
                    $head->update();
                    $msg = 'Upadated Successfully!';
                }
                else
                {
                    $head = new Head();
                    $head->name = $request['name'];
                    $head->designation = $request['designation'];
                    $head->department = $department;
                    $head->vice_chancellor = $vice_chancellor;
                    $head->save();
                    $msg = 'Added Successfully!';
                }
                
            }
            else {
                $head = Head::where('department', $department)->where('vice_chancellor', $vice_chancellor)->first();
                if($head)
                {
                    $head->name = $request['name'];
                    $head->designation = $request['designation'];
                    $head->department = $department;
                    $head->vice_chancellor = $vice_chancellor;
                    $head->update();
                    $msg = 'Upadated Successfully!';
                }
                else
                {
                    $head = new Head();
                    $head->name = $request['name'];
                    $head->designation = $request['designation'];
                    $head->department = $department;
                    $head->vice_chancellor = $vice_chancellor;
                    $head->save();
                    $msg = 'Added Successfully!';
                }
            }
        }
        else
        {
            $vice_chancellor = 0;
            $department = Auth::user()->department;
            
            $head = Head::where('department', $department)->where('vice_chancellor', $vice_chancellor)->first();
            if($head)
            {
                $head->name = $request['name'];
                $head->designation = $request['designation'];
                $head->department = $department;
                $head->vice_chancellor = $vice_chancellor;
                $head->update();
                $msg = 'Upadated Successfully!';
            }
            else
            {
                $head = new Head();
                $head->name = $request['name'];
                $head->designation = $request['designation'];
                $head->department = $department;
                $head->vice_chancellor = $vice_chancellor;
                $head->save();
                $msg = 'Added Successfully!';
            }
        }
        
        
        
        $file = $request->file('file');
        $filename = 'Head-'.$vice_chancellor.'-'.$department.'.jpg';
        if($file){
            Storage::disk('head')->put($filename, File::get($file));
        }
        
        if(Auth::user()->department == 'default')
        {
            return view('dashboard.heads.head', ['msg' => $msg]);
        }
        else
        {
            return view('dashboard.heads.default_head', ['msg' => $msg]);
        }
    }
    
    public function examList($department)
    {
        $exams = ResultSheet::select('year', 'semester', 'examination')
                ->groupBy('year')
                ->groupBy('semester')
                ->groupBy('examination')
                ->where('department', $department)
                ->where('publish', 1)
                ->get();
        
        return view('department.exam', ['exams' => $exams, 'department' => $department]);
    }
    
    public function resultSheet($department, $year, $semester, $examination)
    {
        $exams = ResultSheet::all()
                ->where('year', $year)
                ->where('semester', $semester)
                ->where('examination', $examination)
                ->where('department', $department);
        
        return view('department.result', ['exams' => $exams, 'department' => $department]);
    }
    
    public function resultPublish($department)
    {
        $exams = ResultSheet::select('year', 'semester', 'examination')
                ->groupBy('year')
                ->groupBy('semester')
                ->groupBy('examination')
                ->where('department', $department)
                ->where('publish', 0)
                ->get();
        return view('dashboard.result.publish', ['exams' => $exams, 'department' => $department]);
    }
    
    public function resultMail($department)
    {
        $exams = ResultSheet::select('year', 'semester', 'examination')
                ->groupBy('year')
                ->groupBy('semester')
                ->groupBy('examination')
                ->where('department', $department)
                ->where('publish', 1)
                ->get();
        return view('dashboard.result.sending_mail', ['exams' => $exams, 'department' => $department]);
    }
    
    public function publishResult($department, $year, $semester, $examination)
    {
        $exams1 = ResultSheet::all()
                ->where('year', $year)
                ->where('semester', $semester)
                ->where('examination', $examination)
                ->where('department', $department)
                ->where('publish', 0);
        
        foreach ($exams1 as $exam){
            $exam->publish = 1;
            $exam->update();
        }
        $exams = ResultSheet::select('year', 'semester', 'examination')
                ->groupBy('year')
                ->groupBy('semester')
                ->groupBy('examination')
                ->where('department', $department)
                ->where('publish', 0)
                ->get();
        return view('dashboard.result.publish', ['exams' => $exams, 'department' => $department]);
    }
    
    public function mailResult($department, $year, $semester, $examination)
    {
        $exams1 = ResultSheet::all()
                ->where('year', $year)
                ->where('semester', $semester)
                ->where('examination', $examination)
                ->where('department', $department)
                ->where('publish', 1);
        
        foreach ($exams1 as $exam){
            $data = Data::all()->where('roll', $exam->roll)->first();
            dispatch(new JobSendResults($data, $exam));
//            Mail::to($data->email, $data->name)->queue(new SendResults($exam));
//            Mail::queue('mail_results', ['result' => $exam] , function($message) use($data)
//            {
//                $message->to($data->email, $data->name)->subject('Fake Results!');
//            });
        }
        $exams = ResultSheet::select('year', 'semester', 'examination')
                ->groupBy('year')
                ->groupBy('semester')
                ->groupBy('examination')
                ->where('department', $department)
                ->where('publish', 1)
                ->get();
        Session::flash('flash_message', 'All email queued to send!');
        Session::flash('flash_type', 'alert-success');
        return view('dashboard.result.sending_mail', ['exams' => $exams, 'department' => $department]);
    }
    
    public function userResults()
    {
        $results = ResultSheet::all()
                ->where('roll', Auth::user()->user_id)
                ->where('publish', 1);
        
        return view('auth.students.results',['results' => $results]);
    }
    
    public function getStudentImage($filename)
    {
        $file = Storage::disk('students')->get($filename);
        return new Response($file, 200);
    }
    
    public function mySettings() {
        $data = Data::all()->where('roll', Auth::user()->user_id)->first();
        if($data){
            return view('auth.students.settings', ['tabName' => 'home', 'msg' => null, 'info' => $data]);
        }
        else {
            $data = new Data();
            $data->name = Auth::user()->name;
            $data->roll = Auth::user()->user_id;
            $data->series = substr(Auth::user()->user_id, 0, 2)+2000;
            $data->mobile = Auth::user()->mobile;
            $data->email = Auth::user()->email;
            $data->department = Auth::user()->department;
            $data->blood = "N/A";
            $data->save();
            return view('auth.students.settings', ['tabName' => 'home', 'msg' => null, 'info' => $data]);
        }
    }
    
    public function passwordChange(Request $request) {
        $user = Auth::user();

        $validation = Validator::make(PassRequest::all(), [

          'old-password' => 'hash:' . $user->password,
          'password' => 'required|different:old-password|confirmed'
        ]);

        if ($validation->fails()) {
            $data = Data::all()->where('roll', Auth::user()->user_id)->first();
            if($data){
                return view('auth.students.settings', ['tabName' => 'reset_pass', 'msg' => null, 'info' => $data])->withErrors($validation->errors());
            }
            else {
                $data = new Data();
                $data->name = Auth::user()->name;
                $data->roll = Auth::user()->user_id;
                $data->series = substr(Auth::user()->user_id, 0, 2)+2000;
                $data->mobile = Auth::user()->mobile;
                $data->email = Auth::user()->email;
                $data->department = Auth::user()->department;
                $data->blood = "N/A";
                $data->save();
                return view('auth.students.settings', ['tabName' => 'home', 'msg' => null, 'info' => $data]);
            }
        }

        $user->password = Hash::make(PassRequest::input('password'));
        $user->save();
        $data = Data::all()->where('roll', Auth::user()->user_id)->first();
        if($data){
            return view('auth.students.settings', ['tabName' => 'reset_pass', 'msg' => 'Your new password is now set!', 'info' => $data])->withErrors($validation->errors());
        }
        else {
            $data = new Data();
            $data->name = Auth::user()->name;
            $data->roll = Auth::user()->user_id;
            $data->series = substr(Auth::user()->user_id, 0, 2)+2000;
            $data->mobile = Auth::user()->mobile;
            $data->email = Auth::user()->email;
            $data->department = Auth::user()->department;
            $data->blood = "N/A";
            $data->save();
            return view('auth.students.settings', ['tabName' => 'home', 'msg' => 'Your new password is now set!', 'info' => $data]);
        }
    }
    
    public function editName(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);
        
        $user = User::all()->where('user_id', Auth::user()->user_id)->first();
        $user->name = $request['name'];
        $user->update();
        
        $data = Data::all()->where('roll', Auth::user()->user_id)->first();
        $data->name = $request['name'];
        $data->update();
        
        return redirect()->back()->with('tabName', 'edt_name');
    }
    
    public function editRoll(Request $request) {
        $this->validate($request, [
            'roll' => 'required|min:000000|numeric|max:9999999',
        ]);
        
        $user = User::all()->where('user_id', Auth::user()->user_id)->first();
        $user->user_id = $request['roll'];
        $user->series = substr($request['roll'], 0, 2)+2000;
        $user->update();
        
        $data = Data::all()->where('roll', Auth::user()->user_id)->first();
        $data->roll = $request['roll'];
        $data->series = substr($request['roll'], 0, 2)+2000;
        $data->update();
        
        return redirect()->back()->with('tabName', 'edt_name');
    }
    
    public function editBlood(Request $request) {
        $this->validate($request, [
            'blood' => 'required',
        ]);
        
        $data = Data::all()->where('roll', Auth::user()->user_id)->first();
        $data->blood = $request['blood'];
        $data->update();
        
        return redirect()->back()->with('tabName', 'edt_blood');
    }
    
    public function editMobile(Request $request) {
        $this->validate($request, [
            'mobile' => 'required|numeric',
        ]);
        
        $user = User::all()->where('user_id', Auth::user()->user_id)->first();
        $user->mobile = $request['mobile'];
        $user->update();
        
        $data = Data::all()->where('roll', Auth::user()->user_id)->first();
        $data->mobile = $request['mobile'];
        $data->update();
        
        return redirect()->back()->with('tabName', 'edt_mobile');
    }
    
    public function editEmail(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users|unique:data',
        ]);
        
        $user = User::all()->where('user_id', Auth::user()->user_id)->first();
        $user->email = $request['email'];
        $user->update();
        
        $data = Data::all()->where('roll', Auth::user()->user_id)->first();
        $data->email = $request['email'];
        $data->update();
        
        return redirect()->back()->with('tabName', 'edt_email');
    }
    
    public function editPreAdd(Request $request) {
        $this->validate($request, [
            'pre_add' => 'required|min:4',
        ]);
        
        $data = Data::all()->where('roll', Auth::user()->user_id)->first();
        $data->pre_add = $request['pre_add'];
        $data->update();
        
        return redirect()->back()->with('tabName', 'edt_pre_add');
    }
    
    public function editPerAdd(Request $request) {
        $this->validate($request, [
            'per_add' => 'required|min:4',
        ]);
        
        $data = Data::all()->where('roll', Auth::user()->user_id)->first();
        $data->per_add = $request['per_add'];
        $data->update();
        
        return redirect()->back()->with('tabName', 'edt_per_add');
    }
    
    public function newMail($roll) {
         $data = Data::all()->where('roll', $roll)->first();
        return view('emails.form', ['to_email' => $data->email, 'to_name' => $data->name]);
    }
    
    public function sendComposeEmail(Request $request) {
        $this->validate($request, [
            'to_email' => 'required',
            'sub' => 'required|min:4',
            'mail_body' => 'required|min:100',
        ]);
        
        Mail::raw($request['mail_body'], function ($message) use($request){
            $message->to($request['to_email'])->subject($request['sub']);
        });
        Session::flash('flash_message', 'Successfully email send!');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
    }
    
    public function approveStudent() {
        
        
        if(Auth::user()->department == 'default')
        {
            $students = User::all()
                ->where('admin', 0)
                ->where('valid', 0);
            return view('auth.notapproved', ['students' => $students]);
        }
        else
        {
            $students = User::all()
                ->where('department', Auth::user()->department)
                ->where('valid', 0)
                ->where('admin', 0);
        
            return view('auth.notapproved', ['students' => $students]);
        }
            
    }
    
    public function approveDepartmentStudent() {
        
        $students = User::all()
                ->where('department', Auth::user()->department)
                ->where('valid', 0)
                ->where('admin', 0);
        
        return view('auth.notapproved', ['students' => $students]);
    }
    
    public function approveNow($roll) {
         $user = User::all()->where('user_id', $roll)->first();
         $user->valid = 1;
         $user->update();
        Session::flash('flash_message', 'Successfully added with student id '.$roll.'!');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
    }
    
    public function removeNow($roll) {
         $user = User::all()->where('user_id', $roll)->first();
         $user->delete();
        Session::flash('flash_message', 'Successfully remove '.$roll.'!');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
    }
    
    public function removeOne() {
        
        
        if(Auth::user()->department == 'default')
        {
            $students = Data::all();
            return view('students.remove_one', ['students' => $students]);
        }
        else
        {
            $students = Data::all()
                ->where('department', Auth::user()->department);
        
            return view('students.remove_one', ['students' => $students]);
        }
            
    }
    
    public function removeSeries() {
        
        
        if(Auth::user()->department == 'default')
        {
            $students = Data::select('series')
                    ->groupBy('series')
                    ->get();
            return view('students.remove_series', ['students' => $students]);
        }
        else
        {
            $students = Data::select('series')
                    ->groupBy('series')
                    ->where('department', Auth::user()->department)
                    ->get();
        
            return view('students.remove_series', ['students' => $students]);
        }
            
    }
    
    public function removeNowOne($roll) {
         $user = User::all()->where('user_id', $roll)->first();
         if($user)
         {
             $user->delete();
         }
         $data = Data::all()->where('roll', $roll)->first();
         $data->delete();
        Session::flash('flash_message', 'Successfully remove '.$roll.'!');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
    }
    
    public function removeNowSeries($series) {
        if(Auth::user()->department == 'default'){
            $user = User::all()->where('series', $series);
            if($user)
            {
                foreach ($user as $id) {
                    User::all()->where('series', $series)->first()->delete();
                }
            }
            $data = Data::all()->where('series', $series);
            foreach ($data as $id) {
                Data::all()->where('series', $series)->first()->delete();
            }
        }
        else{
            $user = User::all()
                    ->where('department', Auth::user()->department)
                    ->where('series', $series);
            if($user)
            {
                foreach ($user as $id) {
                    User::all()
                        ->where('department', Auth::user()->department)
                        ->where('series', $series)
                        ->first()
                        ->delete();
                }
            }
            $data = Data::all()
                    ->where('department', Auth::user()->department)
                    ->where('series', $series);
            foreach ($data as $id) {
                Data::all()
                    ->where('department', Auth::user()->department)
                    ->where('series', $series)
                    ->first()
                    ->delete();
            }
        }
        Session::flash('flash_message', 'Successfully remove '.$series.' series!');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
    }
    
    public function approveAdmin() {
        
        $admin = User::all()
                ->where('admin', 1)
                ->where('valid', 0);
        
        return view('auth.admin_approve', ['admin' => $admin]);
    }
    
    public function removeAdmin() {
        
        $admin = User::all()
                ->where('admin', 1)
                ->where('valid', 1);
        
        return view('auth.admin_remove', ['admin' => $admin]);
    }
    
    public function approveThisAdmin($id, $department) {
        
        $user = User::all()
                ->where('admin', 1)
                ->where('valid', 1)
                ->where('department', $department)
                ->first();
        
        if($user)
        {
            Data::all()->where('roll', $user->user_id)
                ->first()
                ->delete();
            
            $user->delete();
        }
        
         $ad = User::all()->where('user_id', $id)->first();
         $ad->valid = 1;
         $ad->admin = 1;
         $ad->update();
        Session::flash('flash_message', 'Successfully added admin with id '.$id.'!');
        Session::flash('flash_type', 'alert-success');
        return redirect()->back();
    }
    
    public function courseRegistration() {
        
        return view('course_registration.cse.registration', ['tabName' => '1st-odd']);
    }
    
}
