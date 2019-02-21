@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('styles/select2.min.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('styles/material.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/palette.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/polyfill/dialog-polyfill.css') }}">
@endpush

@section('main-content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>CONFIRM COMMAND FOR {{ $job_name }} JOB</h2>
                </div>
                <div class="body">
                    <form action="{{ route('workspaces.jobs.store', $workspace) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="title" value="{{ $job_name }}">
                        <div class="form-group">
                            <div class="form-line" style="font-family: Consolas">
                            <textarea name="input_script" rows="10" class="form-control no-resize auto-growth"
                                      placeholder="Please type what you want... And please don't forget the ENTER key press multiple times :)">{{ $params }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-lg btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>CLI</h1>
                <form action="#" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="job_name" value="{{ $job_name }}">
                    <textarea name="parameters" id="" cols="70" rows="10">{{ $params }}</textarea>
                    <br>
                    <input type="submit">
                </form>
            </div>
        </div>
    </div> -->
@endsection

@push('scripts')
    <script src="{{ asset('scripts/select2.min.js') }}"></script>
    <script>
    </script>
@endpush