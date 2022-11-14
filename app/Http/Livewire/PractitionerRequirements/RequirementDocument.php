<?php

namespace App\Http\Livewire\PractitionerRequirements;

use App\Models\Practitioner;
use App\Models\PractitionerRequirement;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class RequirementDocument extends Component
{
    use WithFileUploads;

    public $practitioner;
    public $photo;
    public $requirement_id;
    public $path_to_store;

    public function updatedPhoto()
    {

        $path = $this->photo->store('practitioner_requirements', 'public');

        $this->path_to_store = $path;

    }

    public function save($requirement)
    {
        $this->validate([
            'photo' => 'required',
        ]);

        $this->requirement_id = $requirement;
        $practitioner_requirement = PractitionerRequirement::find($this->requirement_id);

        if (Storage::disk('public')->exists($practitioner_requirement->file)) {

            Storage::disk('public')->delete($practitioner_requirement->file);
        }

        $practitioner_requirement->update([
            'file' => $this->path_to_store
        ]);

        $this->reload_practitioner();
        $this->photo = null;

        session()->flash('message', 'File successfully uploaded.');
    }


    public function reload_practitioner()
    {

        $this->practitioner = Practitioner::find($this->practitioner->id);
    }


    public function render()
    {
        return view('livewire.practitioner-requirements.requirement-document');
    }
}
