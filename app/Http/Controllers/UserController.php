<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Http\UploadFile;


class UserController extends Controller
{
    public function index(){
         $users = UserModel::all();

         return view('user.index') -> with(['users' => $users]);  
    }

    public function store(Request $request){
        $user = new UserModel();

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/user/' , $filename);
            $user->photo = $filename;
        }else{
            return '<h1 style="text-align:center;">Please upload a file:( press <a href="http://127.0.0.1:8000/user/form">here</a> to go to the form page</h1>';
        }
        
        $user->save();
        return '<h1 style = "text-align:center;">You have successfully submitted!<br> To go to the form press <a href="http://127.0.0.1:8000/user/form">this link</a></h1>';
    }
}