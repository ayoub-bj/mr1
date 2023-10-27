<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accomplissement extends Model
{
    protected $fillable = [
        'employe_id', 'date_accomplissement', 'date_fin_tache', 'description'
    ];

    // Relation avec le modèle Employe
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

    // Événements de modèle pour mettre à jour les statistiques après chaque modification
    
}
