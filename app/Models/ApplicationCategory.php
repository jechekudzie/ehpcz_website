<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public function create_application($application)
    {
        return $this->applications()->create($application);
    }



    //practitioner application

    public function practitioner_applications()
    {
        return $this->hasMany(PractitionerApplication::class);
    }
}
