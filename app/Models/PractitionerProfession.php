<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PractitionerProfession extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function practitioner()
    {
        return $this->belongsTo(Practitioner::class);
    }

    public function register_category()
    {
        return $this->belongsTo(RegisterCategory::class);
    }

    public function qualification_category()
    {
        return $this->belongsTo(QualificationCategory::class);
    }

    public function compliance_status()
    {
        return $this->belongsTo(ComplianceStatus::class);
    }

    public function application_status()
    {
        return $this->belongsTo(ApplicationStatus::class);
    }


    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function practitioner_profession_qualifications()
    {
        return $this->hasMany(PractitionerProfessionQualification::class);
    }

    public function practitioner_profession_registers()
    {
        return $this->hasMany(PractitionerProfessionRegister::class);
    }


    public function add_practitioner_profession_register($profession_register_category)
    {
        return $this->practitioner_profession_registers()->create($profession_register_category);
    }

}
