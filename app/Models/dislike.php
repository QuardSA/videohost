<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dislike extends Model
{
    protected $fillable = ['id_video', 'id_user'];
}
