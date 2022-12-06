<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;

class InternEdit extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $intern = Intern::find($id);
        if(!$intern)
        {
            abort('404');
        }

        return view('intern.edit',['intern'=>$intern]);
    }
}
