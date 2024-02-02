<?php

namespace App\Models;

use App\Models\video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dislike extends Model
{
    protected $fillable = ['id_video', 'id_user'];

    public function video() {
        return $this->hasMany(video::class, 'id_video', 'id');
    }
}
