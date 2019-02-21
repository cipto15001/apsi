@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('styles/select2.min.css') }}">
@endpush

@section('content')
    <div class="page-content" style="height:2000px">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col" style="margin-left: 20px; margin-top: 20px; width: 63%">
                <h3>Nama Job : {{ $job->name }}</h3>
                <p>Job # : {{ $job->job_number }}</p>
                <p>Nama Pembuat : {{ $job->user->name }}</p>
                <p>Email Pembuat : {{ $job->user->email }}</p>
                <p>Role Pembuat : {{ $job->user->role }}</p>
                <p>Status Job : {{ $job->status }}</p>
                <p>Key : (optional) {{ $job->key }}</p>
                <p>Dibuat : {{ $job->created_at }}</p>
                <a href="{{ route('jobs.refresh', $job->key) }}"><button>Refresh </button></a>
            </div>
            <div class="mdl-cell mdl-cell--12-col" style="margin-left: 20px; margin-right: 20px; margin-top: 20px;">
                <div class="mdl-card mdl-card--border mdl-shadow--2dp"
                     style="width: 100%; display: block;">
                    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                        <header class="mdl-layout__header">
                            <div class="mdl-layout__header-row" style="padding-left: 40px;">
                                Parameter
                                <div class="mdl-layout-spacer"></div>
                                {{--<button id="show-dialog" class="mdl-button mdl-js-button mdl-button--raised"--}}
                                        {{--style="background-color: #fdc02f ">--}}
                                    {{--<i class="fas fa-plus fa-1x"></i> &nbsp;Add--}}
                                {{--</button>--}}
                            </div>
                        </header>
                        <textarea readonly name="" id="" cols="30" rows="10">{{ trim($job->parameters) }}</textarea>
                    </div>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--12-col" style="margin-left: 20px; margin-right: 20px; margin-top: 20px;">
                <div class="mdl-card mdl-card--border mdl-shadow--2dp"
                     style="width: 100%; display: block;">
                    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                        <header class="mdl-layout__header">
                            <div class="mdl-layout__header-row" style="padding-left: 40px;">
                                Out
                                <div class="mdl-layout-spacer"></div>
                                {{--<button id="show-dialog" class="mdl-button mdl-js-button mdl-button--raised"--}}
                                {{--style="background-color: #fdc02f ">--}}
                                {{--<i class="fas fa-plus fa-1x"></i> &nbsp;Add--}}
                                {{--</button>--}}
                            </div>
                        </header>
                        <textarea readonly name="" id="" cols="30" rows="10">{{ trim($job->out) }}</textarea>
                    </div>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--12-col" style="margin-left: 20px; margin-right: 20px; margin-top: 20px;">
                <div class="mdl-card mdl-card--border mdl-shadow--2dp"
                     style="width: 100%; display: block;">
                    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                        <header class="mdl-layout__header">
                            <div class="mdl-layout__header-row" style="padding-left: 40px;">
                                Log
                                <div class="mdl-layout-spacer"></div>
                                {{--<button id="show-dialog" class="mdl-button mdl-js-button mdl-button--raised"--}}
                                {{--style="background-color: #fdc02f ">--}}
                                {{--<i class="fas fa-plus fa-1x"></i> &nbsp;Add--}}
                                {{--</button>--}}
                            </div>
                        </header>
                        <textarea readonly name="" id="" cols="30" rows="10">{{ trim($job->log) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('scripts/select2.min.js') }}"></script>
    <script>
    </script>
@endpush