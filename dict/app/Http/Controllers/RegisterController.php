<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class RegisterController extends Controller
{
    public function register(Request $req){
        $newUser = new User();
    	$newUser->tajik = $req->input('tj_word');
        $newUser->english = $req->input('en_word');
        $newUser->user_id = $req->input('id_users');
        
        $newUser->save();
    	return redirect()->route('all-words');
    }
}
