<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionCpd extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function register_category()
    {
        return $this->belongsTo(RegisterCategory::class);
    }
}
