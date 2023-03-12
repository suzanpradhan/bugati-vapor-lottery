<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LotteryController extends Controller
{
    public $error; 

    public function lists() 
    {
        $lotteries = Lottery::orderBy('id','desc')->get();
        return view('dashboard.pages.lottery.lists', compact('lotteries'));
    }

    public function create(Request $request) 
    {
        if ($request->isMethod('get'))
        {
            return view('dashboard.pages.lottery.create');
        }

        if ($request->isMethod('POST')) 
        {
            $request->validate([
                'number' => 'required|integer|min:1|digits_between:1,6'
            ]);
    
            return redirect()->route('admin.code.generate')->with('success','Code has been generated successfully.');
        }
    }
}
