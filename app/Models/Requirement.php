<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function requirement_category()
    {
        return $this->belongsTo(RequirementCategory::class);
    }

    public function practitioner_requirements()
    {
        return $this->hasMany(PractitionerRequirement::class);
    }

    public function profession_requirements()
    {
        return $this->hasMany(ProfessionRequirement::class);
    }

    public function qualification_requirements()
    {
        return $this->hasMany(QualificationRequirement::class);
    }

    public function register_requirements()
    {
        return $this->hasMany(RegisterRequirement::class);
    }

}
