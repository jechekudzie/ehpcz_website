<div>
    <div class="card-body">
        <div class="vstack gap-2">
            <div class="border rounded border-dashed p-2">
                @if($practitioner->practitioner_requirements)
                    @foreach($practitioner->practitioner_requirements as $practitioner_requirement)
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm">
                                    <div
                                        class="avatar-title bg-light text-secondary rounded fs-24">
                                        <i class="ri-folder-zip-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="fs-13 mb-1">
                                    <a href="#"
                                       class="text-body text-truncate d-block">{{$practitioner_requirement->requirement->name}}
                                    </a>
                                </h5>
                                <div>@if($practitioner_requirement->file == null){{'Upload Document'}}@endif</div>
                            </div>
                            <div class="flex-shrink-0 ms-2">
                                <div class="d-flex gap-1">

                                    <div class="dropdown">
                                        <button class="btn btn-icon text-muted btn-sm fs-18 dropdown"
                                                type="button" aria-expanded="false"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModalgrid{{$practitioner_requirement->id}}"
                                        >
                                            <i class="ri-upload-2-fill"></i>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            @if($practitioner->practitioner_requirements)
                @foreach($practitioner->practitioner_requirements as $practitioner_requirement)
                    <div wire:ignore.self class="modal fade" id="exampleModalgrid{{$practitioner_requirement->id}}" tabindex="-1"
                         aria-labelledby="exampleModalgridLabel"
                         aria-modal="true">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="exampleModalgridLabel">{{$practitioner_requirement->requirement->name}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="save({{$practitioner_requirement->id}})" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-3">

                                            <div class="col-xxl-6">
                                                <div>
                                                    <label for="file" class="form-label">File</label>
                                                    <input type="file" wire:model="photo" class="form-control" id="photo">
                                                </div>
                                            </div>


                                            @error('photo') <span class="error">{{ $message }}</span> @enderror
                                            <div wire:loading wire:target="photo">Uploading...</div>

                                            <div
                                                x-data="{ isUploading: false, progress: 0 }"
                                                x-on:livewire-upload-start="isUploading = true"
                                                x-on:livewire-upload-finish="isUploading = false"
                                                x-on:livewire-upload-error="isUploading = false"
                                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                                            >
                                                <!-- File Input -->
                                                <input type="file" wire:model="photo">

                                                <!-- Progress Bar -->
                                                <div x-show="isUploading">
                                                    <progress max="100" x-bind:value="progress"></progress>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-left">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div><!--end row-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            {{--<div class="mt-2 text-center">
                <button type="button" class="btn btn-success">View more</button>
            </div>--}}
        </div>
    </div>
</div>
