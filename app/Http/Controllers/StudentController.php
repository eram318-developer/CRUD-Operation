<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

  

    public function store(Request $request){
       // dd($request->input());

       $request->validate([
        'name'=>'required',
        'email'=>'required|email'
       ]);
       $student=new Student();
       $student->student_name=$request->name;
       $student->student_email=$request->email;
       $student->save();

       return redirect()->route('index')->with('success','Data is added successsfully');
    }
   
    public function index(){
        $all_infos =Student::all();
        // dd($all_infos);
        return view('home',compact('all_infos'));
    }
    public function edit($id){
        $students_data=Student::where('id',$id)->first();
        return view('edit',compact('students_data'));
    }
    public function update(Request $request,$id){
       
        $request->validate([
            'name'=>'required',
            'email'=>'required|email'
           ]);
           $student=Student::where('id',$id)->first();
           $student->student_name=$request->name;
           $student->student_email=$request->email;
           $student->update();
    
           return redirect()->route('index')->with('success','Data is updated successsfully');
          // dd($request->input());
    }

    public function delete($id){
        $info=Student::where('id',$id)->first();
        $info->delete();
        return redirect()->back()->with('success','Data is deleted successfully');
    }
}
