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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.terminal/2.0.1/css/jquery.terminal.min.css" rel="stylesheet"/>

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
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">code</i>
                    </div>
                    <div class="content">
                        <div><h3>Console</h3></div>
                    </div>
                </div>
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
                                            style="font-size: 30px;">&nbsp;Web CLI</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="body" style="min-height: 800px; padding: 0">
                        {{ csrf_field() }}
                        <div id="webcli"></div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.terminal/2.0.1/js/jquery.terminal.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var URL = 'http://localhost:8000/api/webcli/'
            var workspaceId = JSON.parse("{{ json_encode($workspace->id) }}")
            var _token = $("input[name='_token']").val()
            $('#webcli').terminal(function(command) {
                if (command !== '') {
                    // try {
                        var result = "Error: unknown error occured."
                        var splittedCommand = command.split(" ");

                        // do not allow absolute path command
                        if (splittedCommand[1].charAt(0) == '/') {
                            result = 'Error: cannot access with absolute path.'
                        } else {
                            $.ajax({
                                type: 'POST',
                                url: URL + workspaceId + '/do_command',
                                data: {
                                    _token: _token,
                                    command: command
                                },
                                success: function(data) {
                                    result = data;
                                },
                                async: false
                            })
                        }

                        this.echo(result) 
                        // $.post(, {command: command, _token: _token}, function(data) {
                        //     console.log("ini di dalam post")
                        //     console.log($('#webcli'))
                        //     $('#webcli').echo('jembod')
                        // });
                        // this.echo(new String("hai"))
                        // var result = window.eval(command);
                        // if (result !== undefined) {
                        //     this.echo(new String(result));
                        // }
                    // } catch(e) {
                    //     this.error(new String("Error"));
                    // }
                } else {
                   this.echo('');
                }
            }, {
                greetings: '======================\nx   Larapsi WebCLI   x\n======================',
                name: 'js_demo',
                height: 800,
                prompt: 'js> '
            });
        })
    </script>
@endpush
