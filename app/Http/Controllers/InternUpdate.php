<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class InternUpdate extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function __invoke(Intern $intern, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'field' => 'required',
            'image'=> 'sometimes|image:gif,png,jpg,jpeg'
        ]);
        if ($validator->passes()){
            //save data

            $intern = Intern::find($intern->id);
            $intern->name = $request->name;
            $intern->email = $request->email;
            $intern->field = $request->field;
            $intern->address = $request->address;
            // $student->name = $request->name;
           
            $intern->save();
            
            if($request->image){

                $oldimage = $intern->image;
                
                $ex = $request->image->getClientOriginalExtension();

                $newfilename = time().".".$ex;
                $request->image->move(public_path()."/upload/intern/",$newfilename);
                $intern->image = $newfilename;
                $intern->save();
                File::Delete(public_path()."/upload/intern/",$oldimage);
                
            }

            

            

            return redirect()->route('interns.index')->with('success','Employee added successfully.');

        }
        else{
            //return with errors

            return redirect( route('intern.create'))->withErrors($validator)->withInput();
        }
    }
}
