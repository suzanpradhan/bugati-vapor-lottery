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
        $lotteries = Lottery::orderBy('id','desc')->paginate(10);
        return view('dashboard.pages.lottery.lists', compact('lotteries'));
    }

    public function create(Request $request) 
    {
        if ($request->isMethod('get'))
        {
            $isExist = Lottery::where('is_active', 1)->exists();
            if($isExist)
            {
                return redirect()->route('admin.lottery.lists')->with('error-message', 'Close the open lottery first to create new lottery.');
            }
            return view('dashboard.pages.lottery.create');
        }

        if ($request->isMethod('POST')) 
        {
            $request->validate([
                'title' => 'required',
                'date' => 'required'
            ]);

            DB::beginTransaction();

            try {
                $lottery = new Lottery();
                $lottery->title = $request->title;
                $lottery->from_date = $request->from_date;
                $lottery->to_date = $request->to_date;
                $lottery->is_active = 1;
                $lottery->save(); // saving code

                DB::commit();
                return redirect()->route('admin.lottery.lists')->with('success','Lottery has been created successfully.');
            } catch (\Exception $e) {
                DB::rollback();
                $this->error = 'Ops! looks like we had some problem';
                // $this->error = $e->getMessage();
                return redirect()->route('admin.lottery.create')->with('error-message', $this->error);
            }
        }
    }

    public function update(Request $request, $id) 
    {
        $lottery = Lottery::find($id);

        if(!$lottery)
        {
            return redirect()->back()->with('error-message', "Action denied!");
        }

        if ($request->isMethod('get'))
        {
            return view('dashboard.pages.lottery.update', compact('lottery'));
        }

        if ($request->isMethod('POST')) 
        {
            $request->validate([
                'title' => 'required',
                'date' => 'required'
            ]);

            DB::beginTransaction();

            try {
                $lottery->title = $request->title;
                $lottery->from_date = $request->from_date;
                $lottery->to_date = $request->to_date;
                $lottery->save(); // saving code

                DB::commit();
                return redirect()->route('admin.lottery.lists')->with('success','Lottery has been updated successfully.');
            } catch (\Exception $e) {
                DB::rollback();
                $this->error = 'Ops! looks like we had some problem';
                // $this->error = $e->getMessage();
                return redirect()->route('admin.lottery.create')->with('error-message', $this->error);
            }
        }
    }

    public function changeStatus($id)
    {
        $lottery = Lottery::find($id);

        if(!$lottery)
        {
            return redirect()->back()->with('error-message', "Action denied!");
        }

        if(count($lottery->applicants))
        {
            return redirect()->back()->with('error-message', "Action denied! current lottery has active members.");
        }

        $lottery->is_active = $lottery->is_active ? 0:1;
        $lottery->save();

        return redirect()->back()->with('success', "Lottery status updated.");
    }

    public function delete($id)
    {
        $lottery = Lottery::find($id);

        if(!$lottery)
        {
            return redirect()->back()->with('error-message', "Action denied!");
        }

        if(count($lottery->applicants))
        {
            return redirect()->back()->with('error-message', "Action denied! current lottery has active members.");
        }

        $lottery->delete();

        return redirect()->back()->with('success', "Lottery deleted successfully.");
    }

    public function applicants($id)
    {
        $lottery = Lottery::find($id);

        if(!$lottery)
        {
            return redirect()->back()->with('error-message', "Action denied!");
        }

        return view('dashboard.pages.lottery.applicants', compact('lottery'));
    }
}
