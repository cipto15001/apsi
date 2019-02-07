@extends('layouts.app')

@push('styles')
    <style>
        a.info-box-link {
            text-decoration: none;
        }

        a .info-box {
            cursor: pointer;
        }

        a .info-box h3 {
            text-decoration: none;
        }

        .info-box h3 {
            font-size: 1.8rem !important;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            line-height: 60px !important;
        }

        .info-box .icon i {
            line-height: 60px;
            font-size: 3.5rem;
        }

        .info-box .content {
            padding-top: 0;
        }

        .info-box {
            height: 60px !important;
        }
    </style>
@endpush

@section('main-content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>SERVICES</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('workspaces.jobs.index', $workspace) }}" class="info-box-link">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div><h3>JOBS</h3></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('workspaces.png2cvt.index', $workspace) }}" class="info-box-link">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">cached</i>
                        </div>
                        <div class="content">
                            <div>
                                <h3>PNG
                                    <small><span style="color: #E91E63">to</span></small>
                                    CVT
                                </h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('workspaces.cli', $workspace) }}" class="info-box-link">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">code</i>
                        </div>
                        <div class="content">
                            <div><h3>Console</h3></div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('workspaces.output.index', $workspace) }}" class="info-box-link">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">open_in_new</i>
                        </div>
                        <div class="content">
                            <div><h3>Output</h3></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2><i class="material-icons">folder</i><span
                                            style="font-size: 30px;">&nbsp;Folder Manager</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="body" style="min-height: 800px; padding: 0">
                        <iframe src="{{ $url }}" frameborder="0" width="100%" height="1000"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# CPU Usage -->
    </div>
@endsection

@section('non-main-content')
@endsection

@push('scripts')

    <script src="{{ asset('vendors/autosize/autosize.js') }}"></script>
    <script>
        autosize($('textarea.auto-growth'));
    </script>
@endpush
