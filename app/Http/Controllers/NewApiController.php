<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewApiController extends Controller
{
    public function index(Request $request){
        if ($request->election==='1' || $request->election==='2'){
            $users = DB::table('users')
                ->where('election', '=', $request->election)
                ->select('id','state_id','city_id','election','resume','phone','mobile','name','image','deleted_at')
                ->get();
        }
        if ($request->election==='3'||$request->election==='4'){
        $users = DB::table('users')
            ->where('election', '=', $request->election)
            ->where('state_id', '=', $request->state_id)
            ->where('city_id', '=', $request->city_id)
            ->select('id','state_id','city_id','election','resume','phone','mobile','name','image','deleted_at')
            ->get();
        }
        return $users;
    }
}
