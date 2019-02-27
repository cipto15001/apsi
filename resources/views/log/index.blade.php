@extends('layouts.app')

@section('main-content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Output</h2>
        </div>
        <!-- Select -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Antrian "Squeue"
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="form-group" style="padding-left: 20px; padding-right: 20px;">
                              <label for="comment">Antrian Anda</label>
                              <textarea class="form-control" rows="10" style="overflow-y: auto;">{{ $squeueResult }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                       <h2>
                            Log
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="form-group" style="padding-left: 20px; padding-right: 20px;">
                              <label for="comment">Log Anda pada file log.lammps</label>
                              <textarea class="form-control" rows="20" style="overflow-y: auto;">{{ $errorLogResult }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- #END# Select -->
    </div>
@endsection

@push('scripts')
@endpush
