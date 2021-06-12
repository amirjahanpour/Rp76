<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewApiController extends Controller
{
    public function index(Request $request){
        if ($request->election==='1' || $request->election==='2'){
            $users = DB::table('users')
                ->where('deleted_at', '=', null)
                ->where('election', '=', $request->election)
                ->select('id','name','phone','mobile','resume','email','image','image_two','image_three','image_four','image_five')
                ->get();
        }

        if ($request->election==='3'||$request->election==='4'){
        $users = DB::table('users')
            ->where('deleted_at', '=', null)
            ->where('is_admin', '=', null)
            ->where('election', '=', $request->election)
            ->where('state_id', '=', $request->state_id)
            ->where('city_id', '=', $request->city_id)
            ->select('id','name','phone','mobile','resume','email','image','image_two','image_three','image_four','image_five')
            ->get();
        }
        return $users;
    }
//$users_IMAGE = DB::table('users')
//->where('deleted_at', '=', null)
//->where('election', '=', $request->election)
//->select()
//->get();
}
