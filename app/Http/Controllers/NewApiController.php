<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewApiController extends Controller
{
    public function index(Request $request){
        $xa = $this->validate($request,[
            'state'=>'required',
            'city'=>'required',
        ]);
        $users = DB::table('user')
            ->where('state', '=', $request->state)
            ->where('city', '=', $request->city)
            ->get();
        return $users;
    }
}
