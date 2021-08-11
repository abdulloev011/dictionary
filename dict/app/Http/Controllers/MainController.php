<?php

namespace App\Http\Controllers;
use App\Models\Words;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class MainController extends Controller
{
    public function index()
    {
        $words['words'] = DB::table('words')
            ->get();
        return view('main.index',$words);
    }
    public function search(Request $request)
    {
        
            $query = $request->input('search'); 
            $search = DB::table('words')
                ->where('tajik', 'like', '%'.$query.'%')
                ->get();
            return view('main.search',compact('search'));
    }
}
