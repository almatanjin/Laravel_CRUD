<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File as Files;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    public function index(){

        $student = Student::orderBy('id','DESC')->get();
        return view('student.list',['student' => $student]);
    }
    public function create(){
        return view('student.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'image'=> 'sometimes|image:gif,png,jpg,jpeg'
        ]);
        if ($validator->passes()){
            //save data

            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->address = $request->address;
            // $student->name = $request->name;
           
            $student->save();
            
            if($request->image){
                $ex = $request->image->getClientOriginalExtension();
                $newfilename = time().".".$ex;
                $request->image->move(public_path()."/upload/student/",$newfilename);
                $student->image = $newfilename;
                $student->save();
            }

            

            

            return redirect()->route('student.index')->with('success','Student added successfully.');

        }
        else{
            //return with errors

            return redirect( route('student.create'))->withErrors($validator)->withInput();
        }

    }
    public function edit($id)
    {
        $student = Student::find($id);

        if(!$student)
        {
            abort('404');
        }
        
        return view('student.edit',['student'=>$student]);
    }
    public function update(Student $student, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'image'=> 'sometimes|image:gif,png,jpg,jpeg'
        ]);
        if ($validator->passes()){
            //save data

            $student = Student::find($student->id);
            $student->name = $request->name;
            $student->email = $request->email;
            $student->address = $request->address;
            // $student->name = $request->name;
           
            $student->save();
            
            if($request->image){
                $oldimage = $student->image;
                $ex = $request->image->getClientOriginalExtension();
                $newfilename = time().".".$ex;
                $request->image->move(public_path()."/upload/student/",$newfilename);
                $student->image = $newfilename;
                $student->save();

                Files::Delete(public_path()."/upload/student/",$oldimage);

                
            }

            

            

            return redirect()->route('student.index')->with('success','Student updated successfully.');

        }
        else{
            //return with errors

            return redirect( route('student.edit',$student->id))->withErrors($validator)->withInput();
        }
        
    }

    public function destroy($id,Request $request){

        $student = Student::findOrFail($id);

        Files::Delete(public_path()."/upload/student/",$student->image);
        $student->delete();

        return redirect()->route('student.index')->with('success','Student deleted successfully.');
        


    }
   
}
