<div>
    <div class="card-body p-4">
        <div class="tab-content">
            <div class="tab-pane active" id="personalDetails" role="tabpanel">

                <form wire:submit.prevent="save_profession()" enctype="multipart/form-data">
                    @csrf
                    @if($step == 0)
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="title"
                                           class="form-label">Professions {{$step}} {{$profession_id}}</label>
                                    <select wire:model="profession_id" name="profession_id"
                                            class="form-control js-example-basic-single"
                                            id="profession_id" required>
                                        <option value="">Select Profession</option>
                                        @foreach($professions as $profession)
                                            <option value="{{ $profession->id }}">{{ $profession->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                        </div
                    @endif

                    @if($step == 1)

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Professions</label>
                                    <select wire:model="profession_id" name="profession_id"
                                            class="form-control js-example-basic-single"
                                            id="profession_id" required>
                                        <option value="">Select Profession</option>
                                        @foreach($professions as $profession)
                                            <option value="{{ $profession->id }}">{{ $profession->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Qualification category</label>
                                    <select wire:model="qualification_category_id" name="qualification_category_id"
                                            class="form-control js-example-basic-single"
                                            id="qualification_category_id" required>
                                        <option value="">Qualification category</option>
                                        @foreach($qualification_categories as $qualification_category)
                                            <option
                                                value="{{ $qualification_category->id }}">{{ $qualification_category->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content">
                            <a href="#" wire:click.prevent="previous_step" type="submit" class="btn btn-success">Previous</a>

                            @if($step == 1)
                                <button type="submit" class="btn btn-success">Save Professional Qualificaton</button>
                            @else
                                <a href="#" wire:click.prevent="next_step" type="submit" class="btn btn-primary">Next</a>
                            @endif
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
