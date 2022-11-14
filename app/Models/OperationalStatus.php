<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function practitioner_professions()
    {
        return $this->belongsTo(PractitionerProfession::class);
    }

}
