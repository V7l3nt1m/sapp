<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'nome',
        'email',
        'palavra_passe',
    ];

    protected $hidden = ['
    palavra_passe
    '];
}
