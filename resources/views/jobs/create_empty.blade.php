@extends('layouts.app')

@section('main-content')
    <div class="mdl-grid" id="card-layout">
        <div class="mdl-cell mdl-cell--12-col" id="tittle-menu">
            <center>
                <h4>Choose one of this Simulation Set</h4>
            </center>
        </div>
        @foreach (\App\Simulation::with('upload')->get() as $simulation)
            <div class="mdl-cell mdl-cell--6-col">
                <center>
                    <div class="menu-card-square mdl-card mdl-shadow--2dp" style="background: none; box-shadow: none; border: nonekk">
                        <img src="{{ $simulation->image }}" alt="">
                        Image Placeholder : {{ $simulation->image }}
                        <br>
                        Description : {{ $simulation->description }}
                    </div>
                    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                       href="{{ route('workspaces.jobs.edit_template', [$workspace, $simulation->slug]) }}">
                        {{ $simulation->title }}
                    </a>
                </center>
            </div>
        @endforeach
    </div>
@endsection
