<?php

namespace App\Http\Livewire\Practitioner;

use App\Models\PractitionerProfession;
use App\Models\Profession;
use App\Models\QualificationCategory;
use Kapouet\Notyf\Traits\Livewire\WithNotyf;
use Livewire\Component;

class Professions extends Component
{

    use WithNotyf;

    public $step = 0;

    public $practitioner;
    public $profession_id;
    public $qualification_category_id;

    //Practitioner contents
    public $practitioner_profession;

    public function previous_step()
    {
        if ($this->step > 0) {
            $this->step--;
        }

    }

    public function next_step()
    {
        if ($this->step == 0) {
            $this->validate([
                'profession_id' => 'required',
            ],
                [
                    'profession_id.required' => 'Please select a profession first',
                ]);
        }
    }

    public function save_profession()
    {
        $this->practitioner_profession = PractitionerProfession::create([
            'practitioner_id'=>$this->practitioner->id,
            'profession_id'=>$this->profession_id,
        ]);
        $this->step++;

        $this->notyfError($this->errors());
        $this->notyfSuccess($this->practitioner_profession->profession->name. ' Profession added successfully');
    }

    public function render()
    {
        return view('livewire.practitioner.professions', [
            'professions' => Profession::all(),
            'qualification_categories' => QualificationCategory::all(),
        ]);
    }
}
