@extends('layouts.app')

@section('main-content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>EDIT JOB</h2>
                    <small>REMEMBER! This script will be executed from your root folder, so you can always access your
                        other file directly with "input/other_file.lmp"
                    </small>
                </div>
                <div class="body">
                    <label for="title">Title</label>
                    <form action="{{ route('workspaces.jobs.update', [$workspace, $job->key]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <div class="form-line">
                                <input name="name" type="text" id="title" class="form-control" required
                                       placeholder="Enter job title" value="{{ $job->name }}">
                            </div>
                        </div>
                        <label for="title">Input Script</label>
                        <div class="form-group">
                            <div class="form-line" style="font-family: Consolas">
                            <textarea name="input_script" rows="1" class="form-control no-resize auto-growth"
                                      placeholder="Please type what you want... And please don't forget the ENTER key press multiple times :)">{{ $job->input_script }}</textarea>
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
@endsection

@push('scripts')
    <script src="{{ asset('vendors/autosize/autosize.js') }}"></script>
    <script>
        autosize($('textarea.auto-growth'));
    </script>
@endpush

