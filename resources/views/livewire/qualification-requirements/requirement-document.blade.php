<div>
    <div class="card-body">
        <div class="vstack gap-2">
            @if (session('message'))
                <div class="alert alert-primary dark alert-dismissible fade show" role="alert">
                    <strong>Message
                        ! </strong> {{session('message')}}
                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                </div>
            @endif
            @error('photo') <span class="error">{{ $message }}</span> @enderror
            <div class="row">
                @if($practitioner_profession_qualification->qualification_requirements)
                    @foreach($practitioner_profession_qualification->qualification_requirements as $qualification_requirement)
                        <div class="col-md-4 col-lg-4">
                            <div class="border rounded border-dashed p-2">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-sm">
                                            <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                <i class="ri-folder-zip-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="fs-13 mb-1">
                                            <a href="#"
                                               class="text-body text-truncate d-block">{{$qualification_requirement->requirement->name}}</a>
                                        </h5>
                                        <div>
                                            @if($qualification_requirement->document == null)
                                                {{'upload'}}
                                            @else
                                                <a href="{{Storage::url($qualification_requirement->document)}}"
                                                   target="_blank">View</a>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="flex-shrink-0 ms-2">
                                        <div class="d-flex gap-1">
                                            <button wire:click="save({{$qualification_requirement->id}})" type="button"
                                                    class="btn btn-icon text-muted btn-sm fs-18"><i
                                                    class="ri-upload-2-line"></i>
                                            </button>
                                            <div class="dropdown">
                                                <button class="btn btn-icon text-muted btn-sm fs-18 dropdown"
                                                        type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill"></i>
                                                </button>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <form wire:submit.prevent="updatedPhoto"
                                                              enctype="multipart/form-data">
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                @csrf
                                                                <input wire:model="photo" id="photo"
                                                                       class="form-control-sm"
                                                                       type="file"/>

                                                            </a>

                                                        </form>
                                                    </li>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    @endforeach
                @endif
            </div>

        </div>
    </div>
</div>
