<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = ['text', 'user_id', 'food_id'];

    public function food(){
        return $this->belongsTo(Food::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
