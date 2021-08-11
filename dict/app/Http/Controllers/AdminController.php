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
    public function dashboard()
    {
        return view("admin.dashboard");
    }
    public function allWords(){
        $words['words'] = DB::table('words')
            ->join('users', 'words.user_id', '=', 'users.id')
            ->get();
        $words['user']= User::all();
        return view('admin.words',$words);
    }
    public function newWord(WordRequest $req){
        $newWord = new Words();
    	$newWord->tajik = $req->input('tj_word');
        $newWord->english = $req->input('en_word');
        $newWord->user_id = $req->input('id_users');
        
        $newWord->save();
    	return redirect()->route('all-words');
    }
    public function addUser()
    {
        return view("admin.user");
    }
    
    public function users(){
        $users['users'] = DB::table('users')
            ->join('roles', 'users.id_role', '=', 'roles.role_id')
            ->get();
        $users['roles'] = Role::all();
        return view('admin.user',$users);
    }

    

    /*public function myWords($id){
        $words = DB::table('words')
            ->join('users', 'users.id', '=', 'words.user_id')
            ->find($id);
        return view('admin.myWords',['words'=>$words]); 
    }*/

    public function updateUser(Request $req){
        $user = User::find($req->input("user"));
    	$user->id_role = $req->input('role');   
        $user->save();
    	return redirect()->route('users');
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('users');
        
    }

    public function myWords($id)
    {
        $myWords = DB::table('words')
            ->where('user_id', $id)
            ->get();
        return view('admin.myWords',['myWords'=>$myWords]);
        
    }
    /*
    public function valuesUpdate(Request $req){ 
        $orders['orders']  = DB::table('orders')
        ->join('rates', 'orders.id_rate', '=', 'rates.id_rate')
        ->join('type_cargos', 'orders.id_type_cargo', '=', 'type_cargos.id_types_cargo')
        ->join('type_deli', 'orders.id_option', '=', 'option.id_option')
        ->join('countries', 'orders.id_country_send', '=', 'countries.id_country')
        ->join('countries as c1', 'orders.id_country_rec', '=', 'c1.id_country')
        ->join('cities', 'orders.id_town_send', '=', 'cities.id_city')
        ->join('cities as s', 'orders.id_town_rec', '=', 's.id_city')
        ->find($req->input("orders"));
        return view('admin.view-order',$orders);
    }
    public function updateOrder(Request $req){
        $order = Order::find($req->input("orders"));
    	$order->tel_send = $req->input('tell_send');
        $order->tel_rec = $req->input('tell_rec');
        $order->fullname_send = $req->input('fullname_send');
        $order->fullname_rec = $req->input('fullname_rec');
        $order->desc_cargo = $req->input('desc_cargo');
        $order->id_status = $req->input('status');
        
        $order->save();
    	return redirect()->route('admin-order');
    }

        public function userUpdateGet($id){
            $users = new Users;
            return view('admin.updateUser',['users'=>$users->find($id)]); 
        }
        public function updateUserPost($id, Request $req){
            $user = Users::find($id);
            $user->name = $req->input('name');
            $user->mobile = $req->input('mobile');
            $user->password = $req->input('pass');
            $user->save();
            return redirect()->route('users');
        } 

        public function to_order(){
            $data['typeCargo'] = TypeCargo::all();
            $data['rate']= Rate::all();
            $data['typeDeli']= TypeDeli::all();
            $data['country']= Country::all();
            $data['city']= Sity::all();
            return view('admin.orders',$data); 
        }

        public function adminPostOrder(Request $req){
        $order = new Order();

        
    	
        //Отправитель
    	$order->fullname_send = $req->input('fullname_send');		
    	$order->id_town_send = $req->input('town_send');
    	$order->tel_send = $req->input('tell_send');
        
        //Получитель
        $order->fullname_rec = $req->input('fullname_rec');		
    	$order->id_town_rec = $req->input('town_rec');
    	$order->tel_rec = $req->input('tell_rec');

        //Адрес
    	$order->address = $req->input('address');
    
        //О грузе
        $order->id_rate = $req->input('rate');
        $order->id_type_cargo = $req->input('type_cargo');
        $order->desc_cargo = $req->input('desc_cargo');
        $order->id_option=$req->input("option");
        $order->weight = $req->input("weight");
        
        
        //Описания о заказе
        $order->desc_for_managers=$req->input("desc_order");
        
    	$order->save();
    	return redirect()->route('admin-order');
    }
    */
}
