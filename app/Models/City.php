<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function province(){

        return $this->belongsTo(Province::class);
    }

    public function practitioner_contacts(){
        return $this->hasMany(PractitionerContact::class);
    }

    public function practitioner_employments(){
        return $this->hasMany(PractitionerEmployment::class);
    }


}
