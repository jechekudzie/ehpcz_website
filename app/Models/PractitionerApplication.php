<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PractitionerApplication extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function practitioner()
    {
        return $this->belongsTo(Practitioner::class);
    }

    public function application_category()
    {
        return $this->belongsTo(ApplicationCategory::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function application_status()
    {
        return $this->belongsTo(ApplicationStatus::class);
    }
}
