<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retard extends Model
{
    protected $fillable = [
        'employe_id', 'date_retard', 'motif', 'minutes_retard', 'sanction', 'heure_debut_retard', 'heure_fin_retard', 'justifie'
    ];

    // Relation avec le modèle Employe
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

    // Événements de modèle pour mettre à jour les statistiques après chaque modification
    
}
