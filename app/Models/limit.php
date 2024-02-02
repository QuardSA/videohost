<?php

namespace App\Models;
use App\Models\video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class limit extends Model
{
    protected $fillable = [
        'id',
        'title_limit',
    ];
    public function videos() {
        return $this->hasMany(video::class, 'limites', 'id');
    }
}
