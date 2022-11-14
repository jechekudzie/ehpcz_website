<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationRequirement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function practitioner_profession_qualification()
    {
        return $this->belongsTo(PractitionerProfessionQualification::class);
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }
}
