<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // R
    
    
    protected $fillable = [        
        'name',
        'photo',
        'manufacturer',
        'releasedate',
        'description'
    ];

    //Relac
    public function games()
    {
        return $this->hasMany('App\Models\Game');
    }

    public function scopeNames($categories, $query){
        if(trim($query)){
            $categories->where('name', 'LIKE',"%$query%")
                ->orWhere('manufacturer','LIKE',"%$query%");
        }
    }
}
