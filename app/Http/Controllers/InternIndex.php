<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;

class InternIndex extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        // return view("intern.index");
        $intern = Intern::orderBy('id')->get();
        return view("intern.index",['intern'=> $intern]);
    }
}
