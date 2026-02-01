<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Question;
// use App\Models\User;
// pas besoin de les importer car ils sont dans le meme fichier que Like

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'question_id'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
