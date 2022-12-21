<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable=['name', 'name_kz', 'name_ru', 'name_en', 'composition','composition_kz', 'composition_ru',
        'composition_en', 'price', 'img', 'user_id', 'category_id', 'number', 'status'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

    public function usersBasket() {
        return $this->belongsToMany(User::class)
            ->withPivot( 'number', 'status')
            ->withTimestamps();
    }

    public function usersLiked() {
        return $this->belongsToMany(User::class, 'likes')
            ->withTimestamps();
    }
}
