<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = [
        'employe_id', 'date_absence', 'motif', 'type_absence', 'justificatif', 'heure_debut_absence', 'heure_fin_absence'
    ];

    // Relation avec le modèle Employe
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

    
}
