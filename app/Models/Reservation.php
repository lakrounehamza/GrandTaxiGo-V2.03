<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=['statut','id_passager','id_trajet'];
        public function    user(){
        return $this->belongsTO(User::class);
    }
}
