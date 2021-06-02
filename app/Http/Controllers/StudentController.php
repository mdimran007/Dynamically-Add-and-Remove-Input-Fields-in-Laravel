<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function myDashoard() {

        $allstudent = Student::all();
        return view('dashboard', ['allstudent' => $allstudent]);

    }


    public function addNew(Request $request) {
        
        
        //dd($request->all());

    

        foreach ($request->std_name as $key => $std_name) {
            $mydata = new Student();
            $mydata->std_name = $request->std_name[$key];
            $mydata->university = $request->university[$key];
            $mydata->subject = $request->subject[$key];
            $mydata->cgpa = $request->cgpa[$key];
            $mydata->gender = $request->gender[$key];
            $mydata->save();
        }

        return redirect('/dashboard')->with('sucessMsg', 'Students Add Successfully');

    }

    public function updateStudent($id = null) {

        if (!is_null($id)){
            $student = Student::find($id);
            if ($student != '') {
                return view('studentupdate', ['student' => $student]);
            } else {
                return view('errors.404');
            }
        }else{
            return view('errors.404');
        }
       
        

    }

    public function updateStudentAction(Request $request)
    {
        //dd($request->all());
        $dataEntry = Student::find($request->id);
        $dataEntry->std_name = $request->std_name;
        $dataEntry->university = $request->university;
        $dataEntry->subject = $request->subject;
        $dataEntry->cgpa = $request->cgpa;
        $dataEntry->gender = $request->gender;
        $dataEntry->save();
        return redirect('/dashboard')->with('message', 'Data Update Successfully.');
    }

    public function deleteStudent($id)
    {
        $studentDelete = Student::find($id);
        $studentDelete->delete();
        return redirect('/dashboard')->with('message', 'Delete Successfully');
    }




}
