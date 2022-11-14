<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PractitionerContact extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function practitioner(){

        return $this->belongsTo(Practitioner::class);
    }

    public function province(){

        return $this->belongsTo(Province::class);
    }

    public function city(){

        return $this->belongsTo(City::class);
    }
}
