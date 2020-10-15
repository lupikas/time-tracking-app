<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class task extends Model
{
    use HasFactory;
    protected $guarded = [];

public static function getTasks(){

    $userId = Auth::id();
    $records = DB::table('tasks')->where('user_id', $userId)->select('id','title','minutes','created_at')->get()->toArray();
    return $records;

   }
 }
