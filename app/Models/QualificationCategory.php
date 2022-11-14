<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationCategory extends Model
{
    use HasFactory;

    public function practitioner_professions()
    {
        return $this->hasMany(PractitionerProfession::class);
    }

    public function practitioner_profession_qualifications()
    {
        return $this->hasMany(PractitionerProfessionQualification::class);
    }
}
