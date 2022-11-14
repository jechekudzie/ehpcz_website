<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function practitioners(){
        return $this->hasMany(Practitioner::class);
    }

    public function renewal_criterias(){
        return $this->hasMany(RenewalCriteria::class);
    }
}
