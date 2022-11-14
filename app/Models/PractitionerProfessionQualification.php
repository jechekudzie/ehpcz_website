<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PractitionerProfessionQualification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function practitioner_profession()
    {
        return $this->belongsTo(PractitionerProfession::class);
    }

    public function register_category()
    {
        return $this->belongsTo(RegisterCategory::class);
    }

    public function qualification_category()
    {
        return $this->belongsTo(QualificationCategory::class);
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function accredited_institution()
    {
        return $this->belongsTo(AccreditedInstitution::class);
    }


    public function application_status()
    {
        return $this->belongsTo(ApplicationStatus::class);
    }

    public function qualification_requirements()
    {
        return $this->hasMany(QualificationRequirement::class);
    }


    //add
    public function add_qualification_requirements($requirement)
    {
        return $this->qualification_requirements()->create($requirement);
    }
}
