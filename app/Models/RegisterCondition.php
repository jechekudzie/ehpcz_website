<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterCondition extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function register_category()
    {
        return $this->belongsTo(RegisterCategory::class);
    }

}
