<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Basket extends Pivot
{
    use HasFactory;

    protected $table = 'food_user';

    protected $fillable = ['food_id', 'user_id', 'number', 'status'];

    public function food(){
        return $this->belongsTo(Food::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
