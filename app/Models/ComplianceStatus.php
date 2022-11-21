<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplianceStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function practitioner_professions()
    {
        return $this->hasMany(PractitionerProfession::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

}
