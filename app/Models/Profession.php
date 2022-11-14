<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }

    public function profession_requirements()
    {
        return $this->hasMany(ProfessionRequirement::class);
    }

    public function profession_fees()
    {
        return $this->hasMany(ProfessionFee::class);
    }

    public function profession_cpds()
    {
        return $this->hasMany(ProfessionCpd::class);
    }


    public function practitioner_professions()
    {
        return $this->hasMany(PractitionerProfession::class);
    }

}
