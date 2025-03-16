<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable = ['user_id', 'recommedation'];
    protected $with = ['user'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
