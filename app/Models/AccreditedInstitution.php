<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccreditedInstitution extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
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
    public function scopeAccreditedInstitutions($query, $qualification_id)
    {
        return $query->where('qualification_id',$qualification_id)->get();
    }
}
