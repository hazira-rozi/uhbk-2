<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware;
use Illuminate\Http\Request;
use DB;
Use Illuminate\Support\Facades\Validator;
use App\Http\Requests;



/**
 * Created by PhpStorm.
 * User: Hazira
 * Date: 13/03/2017
 * Time: 12:35
 */
class UserController extends Controller
{
    protected $redirectTo = '/index';
    public function index(){
        $users = DB::select('select * from users');
        return view('data/user_list',['users'=>$users]);
    }

    public function show($id) {
        $users = DB::select('select * from student where id = ?',[$id]);
        return view('stud_update',['users'=>$users]);
    }

    public function counts() {
        $count_users = DB::table('users')->count( 'where status = nonactice');
        return $count_user;
    }

    public function block($name){
        $users = DB::table('users')
                    ->where('name',$name)
                    ->update([
                        'status' => 'blocked',]);
        return redirect('showUser')->with('message', "Pembekuan akun")
                                    ->with('object',"pengguna")
                                    ->with('mtype', "danger")
                                    ->with('action', "diblokir")
                                    ->with('obj', $name);
    }
    public function unblock($name){
        $users = DB::table('users')
                    ->where('name',$name)
                    ->update([
                        'status' => 'active',]);
        return redirect('showUser')->with('message', "Pengaktifan")
                                    ->with('object',"pengguna")
                                    ->with('mtype', "success")
                                    ->with('action', "diaktifkan")
                                    ->with('obj', $name);
    }
    
    public function delete($name){
        $users = DB::table('users')
                    ->where('name',$name)
                    ->delete();
        return redirect('showUser')
            ->with('message', "Penghapusan")
            ->with('object',"Pengguna")
            ->with('mtype', "danger")
            ->with('action', "dihapus")
            ->with('obj', $name);
    }

    public function token() {
        $tokens = DB::select('select * from tokens');
        return view('data/token',['tokens'=>$tokens]);
    }
    public function token_print($name) {
        $tokens = DB::select('select * from tokens where name=?',[$name]);
        return view('print/token',['tokens'=>$tokens]);
    }


    public function edit(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
//            'nisn' => 'required|max:30',
            'fullname' => 'required|max:255',
//            'class' => 'required|max:255',
//            'tahunmasuk' => 'required|max:4|min:4',
            'image' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('profile-editform')
                ->withErrors($validator)
                ->withInput();
        }
        else{DB::table('users')
            ->where('id', Auth::User()->id)
            ->update([
                'name' => $request->input('name'),
                'fullname' => $request->input('fullname'),
                'image' => $request->input('image'),]);
            return redirect('index')->with('message',"Profile Updated Successfully");}


    }

}
/*
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function validator(array $data)
    {
        $data = $request->input::all(Request $request);
        return Validator::make($data, [
            'name' => 'required|max:255',
            'nisn' => 'required|max:30|unique:users',
            'fullname' => 'required|max:255',
            'class' => 'required|max:255',
            'tahunmasuk' => 'required|max:4|min:4',
            'email' => 'required|email|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
/*
    protected function edit (array $data)
    {
        //$data = Request::all();
        DB::table('users')
            ->where('id', Auth::User()->id)
            ->update([
                    'name' => $data['name'],
                    'nisn' => $data['nisn'],
                    'fullname' => $data['fullname'],
                    'class' => $data['class'],
                    'tahunmasuk' => $data['tahunmasuk'],
                    'email' => $data['email'],]);

    }
}
