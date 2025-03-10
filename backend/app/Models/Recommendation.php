<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $table = 'recommendations';
    protected $fillable = ['user_id', 'recommedation'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}