<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'photo',
        'document',
        'fullname',
        'gender', 
        'birthdate',
        'photo',
        'phone',
        'email',
        'password',    
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function games()
    {
        return $this->hasMany('App\Models\Game');
    }

    public function collections()
    {
        return $this->hasMany('App\Models\Collection');
    }

    public function scopeNames($users, $q){
        if(trim($q)){
            $users->where('fullname', 'LIKE', "%$q%")->orWhere('email', 'LIKE', "%$q%");
        }
    }
    
}
