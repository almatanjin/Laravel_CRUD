<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class InternDelete extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id,Request $request)
    {
        $intern = Intern::findOrFail($id);

        File::Delete(public_path()."/upload/intern/",$intern->image);
        $intern->delete();

        return redirect()->route('interns.index')->with('success','Employee deleted successfully.');
    }
}
