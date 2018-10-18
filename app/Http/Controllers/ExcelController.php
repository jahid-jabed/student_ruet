<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Data;
use App\User;
use App\ResultSheet;
use Illuminate\Support\Facades\Auth;
use DB;
use Excel;
class ExcelController extends Controller
{
	public function importExport()
	{
		return view('importExport');
	}
	public function downloadExcel($type)
	{
		$data = Data::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	public function importExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$info = Excel::load($path, function($reader) {
			})->get();
			if(!empty($info) && $info->count()){
				foreach ($info as $key => $value) {
//					$insert[] = [
//                                        'roll' => $value->student_id,
//                                        'name' => $value->name,
//                                        'department' => $value->department,
//                                        'email' => $value->email,
//                                        'mobile' => $value->mobile,
//                                        'blood' => $value->blood_group,
//                                        'pre_add' => $value->present_address,
//                                        'per_add' => $value->permanent_address
//                                        ];
                                        $data = Data::all()->where('roll', $value->roll)->first();
                                        if($data)
                                        {
                                            $data->roll = $value->roll;
                                            $data->name = $value->name;
                                            $data->department = $value->department;
                                            $data->email = $value->email;
                                            $data->mobile = $value->mobile;
                                            $data->blood = $value->blood_group;
                                            $data->pre_add = $value->present_address;
                                            $data->per_add = $value->permanent_address;
                                            $data->update();
                                            $msg = 'Data updated successfully!';
                                        }
                                        else
                                        {
                                            $data = new Data();
                                            $data->roll = $value->roll;
                                            $data->name = $value->name;
                                            $data->series = substr($value->roll, 0, 2)+2000;
                                            $data->department = $value->department;
                                            $data->email = $value->email;
                                            $data->mobile = $value->mobile;
                                            $data->blood = $value->blood_group;
                                            $data->pre_add = $value->present_address;
                                            $data->per_add = $value->permanent_address;
                                            $data->save();
                                            $msg = 'Data inserted sucessfully!';
                                        }
                                        
				}
//				if(!empty($insert)){
//					DB::table('data')->insert($insert);
//					dd('Insert Record successfully.');
//				}
			}
		}
		return view('importExport', ['msg' => $msg]);
	}
        public function importResult(Request $request)
        {
            $this->validate($request, [
                'examination' => 'required',
                'semester' => 'required',
            ]);
            if(Auth::user()->department == 'default'){
                $department = $request['department'];
            }
            else{
                $department = Auth::user()->department;
            }
            if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$info = Excel::load($path, function($reader) {
			})->get();
			if(!empty($info) && $info->count()){
				foreach ($info as $key => $value) {
					$insert[] = [
                                        'roll' => $value->roll_no,
                                        'name' => $value->name,
                                        'gp' => $value->gp,
                                        'earned_credit' => $value->earned_credit,
                                        'gpa' => $value->gpa,
                                        'total_earned_credit' => $value->total_earned_credit,
                                        'cgpa' => $value->cgpa,
                                        'failed' => $value->failed_subject,
                                        'x_graded' => $value->x_graded,
                                        'department' => $department,
                                        'examination' => $request['examination'],
                                        'year' => $request['year'],
                                        'semester' => $request['semester']
                                            
                                        ];
                                        
				}
				if(!empty($insert)){
					DB::table('result_sheets')->insert($insert);
					$msg = 'Insert Record successfully!';
				}
			}
		}
                if(Auth::user()->department == 'default')
                {
                    return view('dashboard.result.upload', ['msg' => $msg]);
                }
		else {
                    return view('dashboard.result.default_upload', ['msg' => $msg]);
                }
        }
}