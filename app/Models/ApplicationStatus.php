<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function practitioner_professions()
    {
        return $this->hasMany(PractitionerProfession::class);
    }

    public function practitioner_profession_qualifications()
    {
        return $this->hasMany(PractitionerProfessionQualification::class);
    }

    public function practitioner_applications()
    {
        return $this->hasMany(PractitionerApplication::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

}
