<?php

namespace App\Models;
use App\Models\limit;
use App\Models\User;
use App\Models\like;
use App\Models\dislike;
use App\Models\categories;
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
    public function user() {
        return $this->belongsTo(User::class,'users','id');
    }
    public function limited() {
        return $this->belongsTo(limit::class, 'limites', 'id');
    }
    public function category() {
        return $this->belongsTo(categories::class, 'categories', 'id');
    }
    public function Like() {
        return $this->hasMany(like::class, 'id_video', 'id');
    }
    public function DisLike() {
        return $this->hasMany(dislike::class, 'id_video', 'id');
    }
    public function DislikesCount()
    {
        return $this->DisLike->count();

    }
    public function likesCount()
    {
        return $this->Like->count();

    }
}
