<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    protected $fillable = [
        'employe_id', 'date_debut', 'date_fin', 'motif', 'statut', 'commentaire', 'type'
    ];

    // Relation avec le modèle Employe
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

    // Événements de modèle pour mettre à jour les statistiques après chaque modification
   
}
