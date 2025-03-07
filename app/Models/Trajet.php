<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    protected $fillable = ['statut','depart','arrive','id_chauffeur'];

    public function    user(){
        return $this->belongsTO(User::class);
    }
    public function comments()
{
    return $this->hasMany(Coment::class);
}
}
