<?php

namespace App\Http\Livewire\QualificationRequirements;

use App\Models\Practitioner;
use App\Models\PractitionerProfessionQualification;
use App\Models\PractitionerRequirement;
use App\Models\QualificationRequirement;
use Illuminate\Support\Facades\Storage;
use Kapouet\Notyf\Traits\Livewire\WithNotyf;
use Livewire\Component;
use Livewire\WithFileUploads;

class RequirementDocument extends Component
{

    use WithFileUploads;
    use WithNotyf;

    public $practitioner_profession_qualification;
    public $photo;
    public $requirement_id;
    public $path_to_store;

    public function updatedPhoto()
    {

        $path = $this->photo->store('qualification_documents', 'public');

        $this->path_to_store = $path;

    }

    public function save($requirement)
    {
        $this->validate([
            'photo' => 'required',
        ]);

        $this->requirement_id = $requirement;
        $qualification_requirement = QualificationRequirement::find($this->requirement_id);

        if (Storage::disk('public')->exists($qualification_requirement->document)) {

            Storage::disk('public')->delete($qualification_requirement->document);
        }

        $qualification_requirement->update([
            'document' => $this->path_to_store
        ]);

        $this->reload_practitioner();
        $this->photo = null;


        session()->flash('message', $qualification_requirement->requirement->name. ' successfully uploaded');
    }


    public function reload_practitioner()
    {

        $this->practitioner_profession_qualification = PractitionerProfessionQualification::find($this->practitioner_profession_qualification->id);
    }


    public function render()
    {
        return view('livewire.qualification-requirements.requirement-document');
    }
}
