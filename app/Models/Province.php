<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Relationships
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function practitioner_contacts(){
        return $this->hasMany(PractitionerContact::class);
    }

    public function practitioner_employments(){
        return $this->hasMany(PractitionerEmployment::class);
    }

}
