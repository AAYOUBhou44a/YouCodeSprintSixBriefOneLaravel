<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'content', 'city', 'street', 'user_id'];
    // Note : Pas besoin de mettre 'updated_at' dans fillable, 
    // Laravel le gère automatiquement.
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function responses(){
        return $this->hasMany(Response::class);
    }
    public function favorites(){
        return $this->hasMany(Favorite::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
