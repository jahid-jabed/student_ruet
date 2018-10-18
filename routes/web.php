<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'uses' => 'MyController@index'
]);

Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);

Route::post('/gallery/add', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@galleryAddNewImage',
    'as' => 'add.image'
]);

Route::get('/course/materials/add', [
    
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@addMaterials',
    'as' => 'add.department.materials'
]);

Route::post('/course/materials/upload', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@uploadMaterials',
    'as' => 'upload.materials'
]);


Route::get('/dashboard', [
    
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@viewDash',
    'as' => 'default.dashboard'
]);

Route::get('/profile', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@viewProfile',
    'as' => 'student.profile'
]);

Route::get('/add/image', [
    
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@AddDefaultImage',
    'as' => 'default_gallery'
]);

Route::post('/edit/student/image', [
    
    'middleware' => ['auth'],
    'uses' => 'HomeController@EditStudentImage',
    'as' => 'edt.student_image'
]);

Route::get('/gallery/{filename}', [
   'uses' => 'MyController@getGalleryImage',
    'as' => 'get.image'
]);

Route::get('/head/{filename}', [
   'uses' => 'MyController@getHeadImage',
    'as' => 'image.head'
]);

Route::get('/student/{filename}', [
   'uses' => 'HomeController@getStudentImage',
    'as' => 'image.student'
]);

Route::get('/file/{filename}', [
   'uses' => 'MyController@getMaterials',
    'as' => 'get.materials'
]);

//Route::get('/arch/student', [
//   'uses' => 'MyController@getStudentARCH',
//    'as' => 'arch.student'
//]);

Route::get('/home/arch', [
   'uses' => 'MyController@getHomeARCH',
    'as' => 'arch.home'
]);

//Route::get('/becm/student', [
//   'uses' => 'MyController@getStudentBECM',
//    'as' => 'becm.student'
//]);

Route::get('/home/becm', [
   'uses' => 'MyController@getHomeBECM',
    'as' => 'becm.home'
]);

//Route::get('/ce/student', [
//   'uses' => 'MyController@getStudentCE',
//    'as' => 'ce.student'
//]);

Route::get('/home/ce', [
   'uses' => 'MyController@getHomeCE',
    'as' => 'ce.home'
]);

//Route::get('/cfpe/student', [
//   'uses' => 'MyController@getStudentCFPE',
//    'as' => 'cfpe.student'
//]);

Route::get('/home/cfpe', [
   'uses' => 'MyController@getHomeCFPE',
    'as' => 'cfpe.home'
]);

Route::get('/home/chem', [
   'uses' => 'MyController@getHomeCHEM',
    'as' => 'chem.home'
]);

//Route::get('/cse/student', [
//   'uses' => 'MyController@getStudentCSE',
//    'as' => 'cse.student'
//]);

Route::get('/home/cse', [
   'uses' => 'MyController@getHomeCSE',
    'as' => 'cse.home'
]);

//Route::get('/ece/student', [
//   'uses' => 'MyController@getStudentECE',
//    'as' => 'ece.student'
//]);

Route::get('/home/ece', [
   'uses' => 'MyController@getHomeECE',
    'as' => 'ece.home'
]);

//Route::get('/eee/student', [
//   'uses' => 'MyController@getStudentEEE',
//    'as' => 'eee.student'
//]);

Route::get('/home/eee', [
   'uses' => 'MyController@getHomeEEE',
    'as' => 'eee.home'
]);

//Route::get('/ete/student', [
//   'uses' => 'MyController@getStudentETE',
//    'as' => 'ete.student'
//]);

Route::get('/home/ete', [
   'uses' => 'MyController@getHomeETE',
    'as' => 'ete.home'
]);

//Route::get('/gce/student', [
//   'uses' => 'MyController@getStudentGCE',
//    'as' => 'gce.student'
//]);

Route::get('/home/gce', [
   'uses' => 'MyController@getHomeGCE',
    'as' => 'gce.home'
]);

Route::get('/home/hum', [
   'uses' => 'MyController@getHomeHUM',
    'as' => 'hum.home'
]);

//Route::get('/ipe/student', [
//   'uses' => 'MyController@getStudentIPE',
//    'as' => 'ipe.student'
//]);

Route::get('/home/ipe', [
   'uses' => 'MyController@getHomeIPE',
    'as' => 'ipe.home'
]);

Route::get('/home/math', [
   'uses' => 'MyController@getHomeMATH',
    'as' => 'math.home'
]);

//Route::get('/me/student', [
//   'uses' => 'MyController@getStudentME',
//    'as' => 'me.student'
//]);

Route::get('/home/me', [
   'uses' => 'MyController@getHomeME',
    'as' => 'me.home'
]);

//Route::get('/mse/student', [
//   'uses' => 'MyController@getStudentMSE',
//    'as' => 'mse.student'
//]);

Route::get('/home/mse', [
   'uses' => 'MyController@getHomeMSE',
    'as' => 'mse.home'
]);

//Route::get('/mte/student', [
//   'uses' => 'MyController@getStudentMTE',
//    'as' => 'mte.student'
//]);

Route::get('/home/mte', [
   'uses' => 'MyController@getHomeMTE',
    'as' => 'mte.home'
]);

Route::get('/home/phy', [
   'uses' => 'MyController@getHomePHY',
    'as' => 'phy.home'
]);

//Route::get('/urp/student', [
//   'uses' => 'MyController@getStudentURP',
//    'as' => 'urp.student'
//]);

Route::get('/home/urp', [
   'uses' => 'MyController@getHomeURP',
    'as' => 'urp.home'
]);

Route::get('/{department}/student', [
   'uses' => 'MyController@getStudent',
    'as' => 'department.student'
]);

//excel
Route::get('/excel', [
   'uses' => 'MyController@getExcel',
    'as' => 'excel'
]);

Route::get('/sms', [
   'uses' => 'HomeController@sendSMS',
    'as' => 'sms'
]);

Route::get('importExport', 'ExcelController@importExport');
Route::get('downloadExcel/{type}', 'ExcelController@downloadExcel');
Route::post('importExcel', 'ExcelController@importExcel');


//Route::get('/dashboard/upload/result', [
//   'uses' => 'HomeController@uploadResult',
//    'as' => 'upload.result'
//]);

Route::get('/upload/result', [
   'uses' => 'HomeController@uploadDepartmentResult',
    'as' => 'upload.department.result'
]);

Route::post('importResult', 'ExcelController@importResult');

Route::get('/change/heads', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@changeHeads',
    'as' => 'change.heads'
]);

Route::post('/add/heads', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@addHeads',
    'as' => 'add.heads'
]);

Auth::routes();

Route::get('/home', 'MyController@index');

Route::get('/examination/{department}', [
    'uses' => 'HomeController@examList',
    'as' => 'exam.list'
]);

Route::get('/result/{department}/{year}/{semester}/{examination}', [
    
    'middleware' => ['auth'],
    'uses' => 'HomeController@resultSheet',
    'as' => 'result.sheet'
]);

Route::get('/{department}/result/publish', [
    
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@resultPublish',
    'as' => 'result.publish'
]);

Route::get('/{department}/result/mail', [
    
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@resultMail',
    'as' => 'result.mail'
]);

Route::get('/{department}/result/{year}/{semester}/{examination}', [
    
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@publishResult',
    'as' => 'publish.result'
]);

Route::get('/{department}/mail/result/{year}/{semester}/{examination}', [
    
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@mailResult',
    'as' => 'mail.result'
]);

Route::get('/results', [
    
    'uses' => 'HomeController@userResults',
    'as' => 'user.results'
]);

Route::get('/test-home', [
    'uses' => 'MyController@testHome',
    'as' => 'test.home'
]);


Route::get('/settings', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@mySettings',
    'as' => 'settings'
]);

Route::post('/change/password', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@passwordChange',
    'as' => 'password.change'
]);

Route::post('/edit/name', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@editName',
    'as' => 'edt.name'
]);

Route::post('/edit/roll', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@editRoll',
    'as' => 'edt.roll'
]);

Route::post('/edit/blood', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@editBlood',
    'as' => 'edt.blood'
]);

Route::post('/edit/mobile', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@editMobile',
    'as' => 'edt.mobile'
]);

Route::post('/edit/email', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@editEmail',
    'as' => 'edt.email'
]);

Route::post('/edit/pressent-address', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@editPreAdd',
    'as' => 'edt.pre_add'
]);

Route::post('/edit/permanent-address', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@editPerAdd',
    'as' => 'edt.per_add'
]);


Route::get('/compose/{roll}', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@newMail',
    'as' => 'new.mail'
]);

Route::post('/send/compose-email', [
    'middleware' => ['auth'],
    'uses' => 'HomeController@sendComposeEmail',
    'as' => 'send.compose'
]);

Route::get('/approve', [
    
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@approveStudent',
    'as' => 'approve.student'
]);

Route::get('/approve_students', [
    
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@approveDepartmentStudent',
    'as' => 'approve.department.student'
]);

Route::get('/approve/{roll}', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@approveNow',
    'as' => 'approve.now'
]);

Route::get('/remove/{roll}', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@removeNow',
    'as' => 'remove.now'
]);

Route::get('/one_by_one/remove', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@removeOne',
    'as' => 'remove.one'
]);

Route::get('/by_series/remove', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@removeSeries',
    'as' => 'remove.series'
]);

Route::get('/one_by_one/remove/{roll}', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@removeNowOne',
    'as' => 'remove.now.one'
]);

Route::get('/by_series/remove/{series}', [
    'middleware' => ['auth', 'admin'],
    'uses' => 'HomeController@removeNowSeries',
    'as' => 'remove.now.series'
]);

Route::get('/admin/register', [
    'uses' => 'MyController@adminRegister',
    'as' => 'admin.register'
]);

Route::get('/admin/approve', [
    'uses' => 'HomeController@approveAdmin',
    'as' => 'approve.admin'
]);

Route::get('/admin/remove', [
    'uses' => 'HomeController@removeAdmin',
    'as' => 'remove.admin'
]);

Route::get('/admin/approve/{id}/{department}', [
    'uses' => 'HomeController@approveThisAdmin',
    'as' => 'approve.this.admin'
]);

Route::get('/course-registration', [
    'uses' => 'HomeController@courseRegistration',
    'as' => 'cReg'
]);