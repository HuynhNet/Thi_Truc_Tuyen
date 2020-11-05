<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function studentHome(){
        return view('student.index_student');
    }


    public function examOnline(){
        return view('student.exam_online');
    }


    public function checkAccount(Request $request){
        return view('student.check_account');
    }


    public function task(){

        return view('student.task');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
