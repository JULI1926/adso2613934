<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'title',
        'image',
        'developer',
        'releasedate',
        'category_id',
        'user_id',
        'price',
        'genre',
        'slider',
        'description'
    ];

    public function games()
    {
        return $this->hasMany('App\Models\User');
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function collection()
    {
        return $this->belongsTo('App\Models\Collection');
    }

    // public function scopeNames($games, $query){
    //     if(trim($query)){
    //         $games->where('title', 'LIKE',"%$query%")
    //             ->orWhere('developer','LIKE',"%$query%");
    //     }
    // }

    public function scopeNames($games, $query){
        if(trim($query)){
            $games->where('title', 'LIKE',"%$query%")
                ->orWhere('developer','LIKE',"%$query%");
        }
    }
}
