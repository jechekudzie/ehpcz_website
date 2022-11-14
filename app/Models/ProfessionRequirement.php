<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionRequirement extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function requirement()
    {
        return $this->belongsTo(Requirement::class);
    }

    public function register_category()
    {
        return $this->belongsTo(RegisterCategory::class);
    }

    public function qualification_application_requirements()
    {
        return $this->hasMany(QualificationApplicationRequirement::class);
    }

    /*
     |--------------------------------------------------------------------------
     | Livewire scoped functions
     |--------------------------------------------------------------------------
     */
    public function scopeProfessionRequirements($query, $profession_id, $register_category_id)
    {
        return $query->where('profession_id', $profession_id)
            ->where('register_category_id', $register_category_id)->get();
    }


}
