<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Etudians extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'etudient';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'Nom',
        'Prenom',
        'CNE',
        'CNI',
        'Sexe',
        'Date_naissance',
        'Pays',
        'Diplome_acces',
        'Serie_bac',
        'Date_inscription',
        'Specialite_diplome',
        'Mention_bac',
        'Etablissement_bac',
        'Pourcentage_bourse',
        'apogee',
        'image',
    ];

    public function getAuthPassword()
    {
        return $this->apogee; // Utilise 'apogee' comme mot de passe
    }
   
    public function inscription()
    {
        return $this->hasOne(Inscription::class, 'apogee');
    }
    protected $hidden = ['apogee', 'remember_token'];
}
