<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Cette tache appartient à un utilisateur
    public function user(){
        return $this->belongsTo(User::class);
    }
}
