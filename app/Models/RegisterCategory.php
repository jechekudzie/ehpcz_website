<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function practitioner_professions()
    {
        return $this->hasMany(PractitionerProfession::class);
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

    public function practitioner_profession_registers()
    {
        return $this->hasMany(PractitionerProfessionRegister::class);
    }

    public function register_requirements()
    {
        return $this->hasMany(RegisterRequirement::class);
    }

    public function register_conditions()
    {
        return $this->hasMany(RegisterCondition::class);
    }


    //Create
    public function add_register_conditions($register_condition)
    {
        return $this->register_conditions()->create($register_condition);
    }


}
