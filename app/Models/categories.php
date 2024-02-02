<?php

namespace App\Models;
use App\Models\video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $fillable = [
        'id',
        'title_category'
    ];
    public function video() {
        return $this->belongsTo(video::class,'users','id');
    }
}
