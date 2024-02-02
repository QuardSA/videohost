<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $fillable=[
        "id",
        "title_video",
        "video",
        "description",
        "users",
        "categories",
        "limites"
];
}
