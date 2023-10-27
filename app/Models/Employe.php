<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable =
    [
        "registration_number", "fullname",
        "depart", "hire_date",
        "city", "address", "phone",'email','salary',"birthdate"
    ];
    

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function retards()
    {
        return $this->hasMany(Retard::class);
    }

    public function accomplissements()
    {
        return $this->hasMany(Accomplissement::class);
    }

    public function conges()
    {
        return $this->hasMany(Conge::class);
    }
}

