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
                            Select Jobs
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <form action="{{ route('render.do_render', $workspace) }}" method="POST">
                                    {{ csrf_field() }}
                                    <select name="jobKey" class="form-control show-tick">
                                        <option value="">-- Select Jobs --</option>
                                        @foreach ($workspace->jobs as $job)
                                            <option value="{{ $job->key }}">{{ $job->key }}</option>
                                        @endforeach
                                    </select>
                                    <div class="pull-right">
                                        <button style="margin-right: 20px;" type="submit"
                                                class="btn btn-lg btn-block bg-pink m-t-15 waves-effect">
                                            <span>Select</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Select -->
    </div>
    <input type="hidden" name="image-url" value="{{ route('workspaces.files.image', $workspace) }}">
@endsection

