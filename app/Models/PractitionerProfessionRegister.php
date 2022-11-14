<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PractitionerProfessionRegister extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function practitioner_profession()
    {
        return $this->belongsTo(PractitionerProfession::class);
    }

    public function register_category()
    {
        return $this->belongsTo(RegisterCategory::class);
    }
}
