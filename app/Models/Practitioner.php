<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practitioner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function identification_type()
    {
        return $this->belongsTo(IdentificationType::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function employment_status()
    {
        return $this->belongsTo(EmploymentStatus::class);
    }

    public function employment_location()
    {
        return $this->belongsTo(EmploymentLocation::class);
    }

    public function practitioner_contact()
    {
        return $this->hasOne(PractitionerContact::class);
    }

    public function practitioner_employments()
    {
        return $this->hasMany(PractitionerEmployment::class);
    }

    public function practitioner_requirements()
    {
        return $this->hasMany(PractitionerRequirement::class);
    }

    public function practitioner_professions()
    {
        return $this->hasMany(PractitionerProfession::class);
    }

    public function practitioner_applications()
    {
        return $this->hasMany(PractitionerApplication::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }


    //ADDS START HERE
    public function add_practitioner_profession($profession)
    {
        return $this->practitioner_professions()->create($profession);
    }

    public function add_practitioner_requirements($requirement)
    {
        return $this->practitioner_requirements()->create($requirement);
    }

    public function add_contact($contact)
    {
        return $this->practitioner_contact()->create($contact);
    }

    public function add_employment($employment)
    {
        return $this->practitioner_employments()->create($employment);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /*
|--------------------------------------------------------------------------
| Livewire methods
|--------------------------------------------------------------------------
*/

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()
                ->where('id', 'like', '%' . $search . '%')
                ->orWhere('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", "%{$search}%");

    }
}
