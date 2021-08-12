<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;
use App\Http\Requests\WordRequest;
use App\Models\Words;
use Doctrine\Inflector\Rules\Word;

class AdminController extends Controller
{
    //View dashboard
    public function dashboard()
    {
        return view("admin.dashboard");
    }
    //View на таблице
    public function allWords(){
        $words['words'] = DB::table('words')
            ->join('users', 'users.id', '=', 'words.user_id')
            ->get();
        $words['user']= User::all();
        return view('admin.words',$words);
    }
    //Для добавления слов
    public function newWord(WordRequest $req){
        $newWord = new Words();
    	$newWord->tajik = $req->input('tj_word');
        $newWord->english = $req->input('en_word');
        $newWord->user_id = $req->input('id_users');
        
        $newWord->save();
    	return redirect()->route('all-words');
    }
    //Удаление слов
    public function deleteWords($id)
    {
        Words::find($id)->delete();
        return redirect()->route('all-words');
        
    }
    //Для измнения слов
    public function updateWord(WordRequest $req){
        $word = Words::find($req->words);
    	$word->tajik = $req->tj_word;   
    	$word->english = $req->tj_word;   
        $word->save();
    	return redirect()->route('all-words');
    }

    //view для добавления слова
    public function viewUpdate()
    {
        return view("admin.addWord");
    }
    
    //view для пользователя
    public function users(){
        $users['users'] = DB::table('users')
            ->join('roles', 'users.id_role', '=', 'roles.role_id')
            ->get();
        $users['roles'] = Role::all();
        return view('admin.user',$users);
    }


    //Изменения роль пользователя 
    public function updateUser(Request $req){
        $user = User::find($req->input("user"));
    	$user->id_role = $req->input('role');   
        $user->save();
    	return redirect()->route('users');
    }

    //Удаления пользователя
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('users');
        
    }

    //Для показания добавленнего слово пользователья
    public function myWords($id)
    {
        $myWords = DB::table('words')
            ->where('user_id', $id)
            ->get();
        return view('admin.myWords',['myWords'=>$myWords]);
        
    }
    
}
