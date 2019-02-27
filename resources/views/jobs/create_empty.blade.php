@extends('layouts.app')

@section('main-content')
    <div class="mdl-grid" id="card-layout">
        <div class="mdl-cell mdl-cell--12-col" id="tittle-menu">
            <center>
                <h4>Choose one of this Simulation Set</h4>
            </center>
        </div>
        @foreach (\App\Simulation::with('upload')->get() as $simulation)
            <div class="col-md-3 col-sm-12 col-lg-3">
                    <div class="card">
                            <div class="header">
                                <img class="card-img-top" src="{{ asset('img/water.png') }}" alt="Card image cap">
                            </div>
                            <div class="body bg-amber">
                                <h4>SPH</h4>
                                <p class="align-left">{{ $simulation->description }}</p>
                            </div>
                            <div class="body bg-amber p-t--0 ">
                                <a class="p-t-0" href="{{ route('workspaces.jobs.edit_template', [$workspace, $simulation->slug]) }}" target="_blank">
                                    <button type="button" class="btn bg-indigo waves-effect" data-toggle="tooltip" data-placement="top" title="Write Job With Template">
                                        <i class="material-icons">dvr</i>
                                    </button>
                                </a>
                                <a href="{{ route('workspaces.jobs.edit_in_editor', [$workspace, $simulation->slug]) }}" target="_blank">
                                    <button type="button" class="btn bg-indigo  waves-effect" data-toggle="tooltip" data-placement="top" title="Write Job With Editor">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </a>
                                <a href="{{ route('workspaces.jobs.create_gui', [$workspace, $simulation->slug]) }}" target="_blank">
                                    <button type="button" class="btn bg-indigo waves-effect" data-toggle="tooltip" data-placement="top" title="Write Job With GUI">
                                        <i class="material-icons">touch_app</i>
                                    </button>
                                </a>
                            </div>
                        </div>
            </div>
        @endforeach
    </div>
@endsection
@push('scripts')
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
