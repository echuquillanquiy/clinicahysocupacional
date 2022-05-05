<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded= ['id'];
    protected $withCount = ['applicants'];

    const BORRADOR = 1;
    const PUBLICADO = 2;

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function place(){
        return $this->belongsTo(Place::class);
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    //RELACION UNO A MUCHOS INVERSA
    public function requirements(){
        return $this->hasMany(Requirement::class);
    }

    public function benefits(){
        return $this->hasMany(Benefit::class);
    }

    public function interviewer(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //RELACION UNO A MUCHOS POLIMORFICA

    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //RELACION MUCHOS A MUCHOS

    public function applicants(){
        return $this->belongsToMany(User::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
