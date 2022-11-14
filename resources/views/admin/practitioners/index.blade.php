@extends('layouts.admin')
@push('head')
    <!-- Styles -->

@endpush

@livewireStyles
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Practitioners list</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item">dashboard</li>
                            <li class="breadcrumb-item active">practitioners</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <!-- Bookmark Start-->
                        <div class="bookmark">
                            <ul>

                            </ul>
                        </div>
                        <!-- Bookmark Ends-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row project-cards">

                @livewire('practitioner.index')


            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@stop
@livewireScripts

@push('scripts')
    <script src="{{asset('../assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('../assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="../assets/js/form-wizard/form-wizard-two.js"></script>
    <!-- Plugins JS Ends-->
@endpush
