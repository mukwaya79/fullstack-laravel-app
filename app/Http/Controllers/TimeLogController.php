<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\TimeLog;

use App\Models\User;

class TimeLogController extends Controller
{
    //
    function index(){
       
        return view('page.dashboard');
    }
    function store(Request $request){
       $request->user()->timelogs()->create([
           'time_in'=>$request->time_in,
           'date'=>$request->date,
           
           
       ]);
       return redirect()->route('dashboard2');
    }

    function timeout(Request $request){
      $id= auth()->user()->id;

      DB::table('timelogs')->where('user_id',$id)->update([

          'time_out'=>$request->time_out,
      ]);

       return view('page.dashboard2');
    }

    function report(){
        //$time = Timelog::paginate(3);
        $data = array(
            'info' => DB::table('timelogs')->get(),
            'list' =>DB::table('users')->get()
        );
        return view('page.report',$data);
    }
}
