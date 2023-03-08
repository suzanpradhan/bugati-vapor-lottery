<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodesController extends Controller
{
    public function lists() 
    {
        return view('dashboard.pages.codes.lists');
    }

    public function generate(Request $request) 
    {
        if ($request->isMethod('get'))
        {
            return view('dashboard.pages.codes.generate');
        }

        if ($request->isMethod('POST')) 
        {
            // $this->validator($request->all())->validate();
            // event(new Registered($user = $this->create($request->all())));
            // return $this->registered($request, $user)
            //     ?: redirect($this->redirectPath());
            dd($request->all());
        }
    }
}
