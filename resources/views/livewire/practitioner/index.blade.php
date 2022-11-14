<div>
    <!-- TailwindCSS -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <div class="col-md-12 project-list">
        <div class="card">
            <div class="row">
                <div class="col-md-6 p-0">
                    <div class="w-full flex pb-10">
                        <div class="w-5/6 mx-1">
                            <input wire:model.debounce.300ms="search" type="text"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   placeholder="Search practitioners by name, reg number, or profession ...">
                        </div>
                        <div class="w-1/6 relative mx-1">
                            <select wire:model="perPage"
                                    class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 p-0">
                    <div class="form-group mb-0 me-0"></div>
                    <a class="btn btn-primary" href="{{url
                                ('/admin/practitioners/create')}}"> <i
                            data-feather="fa fa-plus"> </i>Add new</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="top-tabContent">

                    <div class="row">
                        @foreach($practitioners as $practitioner)
                            <div class="col-xxl-4 col-lg-6">
                                <div class="project-box"><span class="badge badge-primary">Doing</span>
                                    <h6>{{$practitioner->first_name.' '.$practitioner->last_name}}</h6>
                                    <div class="media">

                                        <div class="media-body">
                                            <p>{{$practitioner->identification}}</p>
                                        </div>
                                    </div>
                                    <p>Professions.</p>
                                    <div class="row details">
                                        @if($practitioner->practitioner_professions)
                                            @foreach($practitioner->practitioner_professions as $practitioner_profession)
                                                <div class="col-6"><span>{{$practitioner_profession->profession->name}}
                                                    </span></div>
                                            @endforeach
                                        @endif

                                    </div>
                                    <div class="media mb-0">
                                        <a class="btn btn-warning btn-block"
                                           href="{{url('/admin/practitioners/'.$practitioner->id)}}"
                                        >View</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

