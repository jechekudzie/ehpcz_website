<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function accredited_institutions()
    {
        return $this->hasMany(AccreditedInstitution::class);
    }


    public function practitioner_profession_qualifications()
    {
        return $this->hasMany(PractitionerProfessionQualification::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Livewire scoped functions
    |--------------------------------------------------------------------------
    */
    public function scopeProfessionalQualifications($query, $profession_id)
    {
        return $query->where('profession_id', $profession_id)->get();

    }
}
