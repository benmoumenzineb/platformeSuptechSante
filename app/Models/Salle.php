<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;
    protected $table = 'salle';
    protected $fillable = [
        'id_salle',
        'num_salle'
    ];
}
