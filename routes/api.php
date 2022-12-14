<?php




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/logout', [LoginController::class, 'logout']);


Route::post('/login', [LoginController::class, 'checkUser']);
//Student Functions
Route::get('/student', [StudentController::class, 'index']);

//Route::get('/createAbs', [StudentController::class, 'createAbs']);
Route::post('/totalAbsNbr', [StudentController::class, 'getTotalAbsNbr']);
Route::post('/AllAbsences', [StudentController::class, 'getAllAbsences']);


Route::post('/nonJusAbsences', [StudentController::class, 'getNonJusAbsences']);
Route::post('/totalNonJustAbsNbr', [StudentController::class, 'getNonJustifiedAbsNbr']);

Route::post('/JustAbs', [StudentController::class, 'getJusAbsences']);
Route::post('/totalJustAbsNbr', [StudentController::class, 'getJustifiedAbsNbr']);

Route::post('/totalPendJus', [StudentController::class, 'getTotalPendJusNbr']);
Route::post('/PendJus', [StudentController::class, 'getPenAbsences']);
Route::post('/NbrExcluded', [StudentController::class, 'getNbrExcludedMod']);


Route::post('/uploadImage', [StudentController::class, 'storeImage']);
Route::post('/StudentInfo', [StudentController::class, 'getStudentInfo']);
Route::post('/changeStudentInfo', [StudentController::class, 'changeStudentInfo']);
Route::get('/AllModules', [StudentController::class, 'getAllModules']);
Route::get('/sendTeacherEmail', [StudentController::class, 'sendTeacherEmail']);

//Get the list of all modules with absences
Route::post('/AllModulesAbsences', [StudentController::class, 'getModulesabsences']);

Route::post('/getExcludedModules', [StudentController::class, 'getExcludedModules']); // id : number   (student id)
Route::post('/getRecentAbs', [StudentController::class, 'getRecentAbs']);  //  id: student id
Route::post('/getStudentNotif', [StudentController::class, 'getStudentNotif']);  //  id: student id
Route::post('/unseenStudentNotifNbr', [StudentController::class, 'unseenStudentNotifNbr']);  //  id: student id
Route::post('/seeStudentNotif', [StudentController::class, 'seeStudentNotif']);  //  id: student id





//Admin Functions
Route::post('/AdminInfo', [AdminController::class, 'getAdminInfo']);
Route::post('/ChangeAdminInfo', [AdminController::class, 'changeAdminInfo']);
Route::get('/TotalStudentsNbr', [AdminController::class, 'TotalStudentsNbr']);
Route::get('/TotalTeachersNbr', [AdminController::class, 'TotalTeachersNbr']);
Route::get('/TotalModulesNbr', [AdminController::class, 'TotalModulesNbr']);
Route::get('/TotalAbsencesNbr', [AdminController::class, 'TotalAbsencesNbr']);

Route::get('/studentsList', [AdminController::class, 'studentsList']);
Route::get('/teachersList', [AdminController::class, 'teachersList']);
Route::get('/modulesList', [AdminController::class, 'modulesList']);
Route::get('/absencesList', [AdminController::class, 'absencesList']);

Route::get('/justifiedAbsences', [AdminController::class, 'justifiedAbsences']);
Route::get('/pendingAbsences', [AdminController::class, 'pendingAbsences']);
Route::get('/unjustifiedAbsences', [AdminController::class, 'unjustifiedAbsences']);

Route::delete('/deleteStudent', [AdminController::class, 'deleteStudent']);
Route::delete('/deleteTeacher', [AdminController::class, 'deleteTeacher']);
Route::delete('/deleteModule', [AdminController::class, 'deleteModule']);

Route::post('/studentInformation', [AdminController::class, 'studentInformation']);
Route::post('/teacherInformation', [AdminController::class, 'teacherInformation']);
Route::post('/moduleInformation', [AdminController::class, 'moduleInformation']);
Route::post('/absenceInformation', [AdminController::class, 'getAbsenceInfo']);

Route::post('/updateTeacherInfo', [AdminController::class, 'updateTeacherInfo']);
Route::post('/updateStudentInfo', [AdminController::class, 'updateStudentInfo']);
Route::post('/updateModuleInfo', [AdminController::class, 'updateModuleInfo']);

Route::post('/CreateTeacher', [AdminController::class, 'CreateTeacher']);
Route::post('/CreateStudent', [AdminController::class, 'CreateStudent']);
Route::post('/CreateModule', [AdminController::class, 'CreateModule']);

Route::post('/getAdminNotif', [AdminController::class, 'getAdminNotif']);  //  id: admin id
Route::post('/unseenAdminNotifNbr', [AdminController::class, 'unseenAdminNotifNbr']);  //  id: admin id
Route::post('/seeAdminNotif', [AdminController::class, 'seeAdminNotif']);  //  id: admin id


// Route::resource('/login', 'App\Http\Controllers\LoginController');


//Teacher Functions
Route::post('/TeacherInfo', [TeacherController::class, 'getTeacherInfo']);
Route::post('/ChangeTeacherInfo', [TeacherController::class, 'changeTeacherInfo']);

//Get the list of all students
Route::post('/AllStudents', [TeacherController::class, 'getAllStudents']);

//untested Teacher Absences

//
//------------comments in the right are parameters
//
Route::get('/groupsList', [TeacherController::class, 'groupsList']);
Route::post('/absentDate', [TeacherController::class, 'absentdate']);// id : number   (teacher id)
Route::post('/totalAbs', [TeacherController::class, 'totalabs']);// id : number   (teacher id)
Route::get('/totalGroups', [TeacherController::class, 'getTotalGroups']);
Route::post('/createAbs', [TeacherController::class, 'createAbs']); //(ids :array of numbers) , date , hour , num_module , num_ens (send data in raw format -JSON-)
Route::delete('/deleteAbs', [TeacherController::class, 'deleteAbs']);// id : number   (absence number)
Route::post('/getNonJusAbsences', [TeacherController::class, 'getNonJusAbsences']); // id : number   (teacher id) , date
Route::post('/getPenAbsencesEns', [TeacherController::class, 'getPenAbsencesEns']); // id : number   (teacher id) , date
Route::post('/getacceptedAbsences', [TeacherController::class, 'getacceptedAbsences']); // id : number   (teacher id) , date

Route::post('/getAllNonJusAbsences', [TeacherController::class, 'getAllNonJusAbsences']); // id : number   (teacher id) , date
Route::post('/getAllPenAbsencesEns', [TeacherController::class, 'getAllPenAbsencesEns']); // id : number   (teacher id) , date
Route::post('/getAllacceptedAbsences', [TeacherController::class, 'getAllacceptedAbsences']); // id : number   (teacher id) , date

Route::post('/exludedStudents', [TeacherController::class, 'exludedStudents']); // id : number   (teacher id)

Route::post('/studentsOfGroup', [TeacherController::class, 'studentsOfGroup']); // id : number   (group number)

Route::post('/acceptJust', [TeacherController::class, 'acceptJust']); // id : number   (Absence number)
Route::post('/rejectJust', [TeacherController::class, 'rejectJust']); // id : number   (Absence number)
Route::post('/getAbsByStudent', [TeacherController::class, 'getAbsByStudent']);  //  id_Etud ,  id_Ens
Route::post('/getTeacherRecentAbs', [TeacherController::class, 'getTeacherRecentAbs']);  //  id: number  (Teacher Number)

Route::post('/getTeacherNotif', [TeacherController::class, 'getTeacherNotif']);  //  id: teacher id
Route::post('/unseenTeacherNotifNbr', [TeacherController::class, 'unseenTeacherNotifNbr']);  //  id: teacher id
Route::post('/seeTeacherNotif', [TeacherController::class, 'seeTeacherNotif']);  //  id: teacher id

Route::post('/getacceptedAbsencesType', [TeacherController::class, 'getacceptedAbsencesType']);  //  id: teacher id ,  date , type_ens
Route::post('/getPenAbsencesEnsType', [TeacherController::class, 'getPenAbsencesEnsType']);     //  id: teacher id ,   date , type_ens
Route::post('/getNonJusAbsencesType', [TeacherController::class, 'getNonJusAbsencesType']);    //  id: teacher id ,  date , type_ens
Route::post('/getAllacceptedAbsencesType', [TeacherController::class, 'getAllacceptedAbsencesType']);    //  id: teacher id  , type_ens
Route::post('/getAllPenAbsencesEnsType', [TeacherController::class, 'getAllPenAbsencesEnsType']);    	//  id: teacher id  , type_ens
Route::post('/getAllNonJusAbsencesType', [TeacherController::class, 'getAllNonJusAbsencesType']);	 //  id: teacher id  , type_ens


