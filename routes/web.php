<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\UserModel;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('user', [UserController::class, 'index']); 
Route::get('user/form', function(){
     return view('user.form'); 
});

Route::get('/user/add', function () {
    DB::table('users_info')->insert([
       'name'=>'Inabat',
       'surname' => 'Aimukhanbetova',
       'email' => '190103477@stu.sdu.edu.kz',
       'photo' => 'C:\Users\Asus\Desktop\logo.png'
    ]);
});
Route::post('user/form', [UserController::class, 'store'])->name('add-user'); 
Route::get('email/sending', [MailController::class, 'send']);