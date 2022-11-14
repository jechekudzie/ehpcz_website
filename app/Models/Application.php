<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function application_category()
    {
        return $this->belongsTo(ApplicationCategory::class);
    }

    public function application_requirements()
    {
        return $this->hasMany(ApplicationRequirement::class);
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function add_application_requirement($requirement)
    {
        return $this->application_requirements()->create($requirement);
    }

    //practitioner applications

    public function practitioner_applications()
    {
        return $this->hasMany(PractitionerApplication::class);
    }
}
