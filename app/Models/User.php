<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'img',
        'payment',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function foods(){
        return $this->hasMany(Food::class);
    }

    public function foodsBasket() {
        return $this->belongsToMany(Food::class)
            ->withPivot( 'number', 'status')
            ->withTimestamps();
    }

    public function foodsWithStatus($status){
        return $this->belongsToMany(Food::class)
            ->wherePivot('status', $status)
            ->withPivot('number', 'status')
            ->withTimestamps();
    }

    public function foodsBought(){
        return $this->belongsToMany(Food::class)
            ->withPivot('number', 'status')
            ->withTimestamps();
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function foodsLiked() {
        return $this->belongsToMany(Food::class, 'likes')
            ->withTimestamps();
    }
}
