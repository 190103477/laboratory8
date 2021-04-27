<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "users_info";
    protected $fillable = ['name', 'surname', 'email', 'photo'];
}
