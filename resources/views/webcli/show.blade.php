@extends('layouts.app')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.terminal/2.0.1/css/jquery.terminal.min.css" rel="stylesheet"/>
@endpush

@section('the-menu')
    <div class="block-header">
        <h2>SERVICES</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                    <a href="{{ route('workspaces.show', $workspace) }}" class="info-box-link">
                        <div class="info-box bg-teal hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">dashboard</i>
                            </div>
                            <div class="content">
                                <div><h3>Workspace</h3></div>
                            </div>
                        </div>
                    </a>
                </div>
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
                            <h3>Png
                                <small><span style="color: #E91E63">to</span></small>
                                cvt
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
            <a href="{{ route('render.index', $workspace) }}" class="info-box-link">
                <div class="info-box bg-brown hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">videocam</i>
                    </div>
                    <div class="content">
                        <div><h3>Render</h3></div>
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
@endsection

@section('main-content')
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
            let PORT = window.location.port
            let BASE_URL = window.location.protocol + '//' + window.location.hostname
            if (PORT != '')
                BASE_URL = BASE_URL + ':' + PORT
            BASE_URL = BASE_URL + '/api/webcli/'
            let workspaceId = JSON.parse("{{ json_encode($workspace->id) }}")
            let _token = $("input[name='_token']").val()
            $('#webcli').terminal(function(command) {
                if (command !== '') {
                    // try {
                        let result = "Error: unknown error occured."
                        let splittedCommand = command.split(" ");
			
			if (splittedCommand.length == 1 && (splittedCommand[0] == 'ls' || splittedCommand[0] == 'cd')) {
		  	    splittedCommand.push('./')
			    $.ajax({
                              	    type: 'POST',
                               	    url: BASE_URL + workspaceId + '/do_command',
                               	    data: {
                                    	_token: _token,
                                    	command: splittedCommand.join(' ')
                                    },
                                    success: function(data) {
                                    	result = data;
                                    },
                                    async: false
			        })
			} else if (splittedCommand.length == 1 && (splittedCommand[0] != 'ls' && splittedCommand[0] != 'cd')) {
		            $.ajax({
                              	    type: 'POST',
                               	    url: BASE_URL + workspaceId + '/do_command',
                               	    data: {
                                    	_token: _token,
                                    	command: splittedCommand.join(' ')
                                    },
                                    success: function(data) {
                                    	result = data;
                                    },
                                    async: false
			        })

			} else {
                        // do not allow absolute path command
                            if ((splittedCommand[1].charAt(0) == '/' && splittedCommand[1].split('/')[1] != 'scratch')
                                 && (splittedCommand[1].charAt(0) == '/' && splittedCommand[1].split('/')[1] != 'tmp')) {
                        	    result = 'Error: permission denied.'
			    } else {
                            	$.ajax({
                              	    type: 'POST',
                               	    url: BASE_URL + workspaceId + '/do_command',
                               	    data: {
                                    	_token: _token,
                                    	command: splittedCommand.join(' ')
                                    },
                                    success: function(data) {
                                    	result = data;
                                    },
                                    async: false
			        })
			    }
                        }

                        this.echo(result)
                        // $.post(, {command: command, _token: _token}, function(data) {
                        //     console.log("ini di dalam post")
                        //     console.log($('#webcli'))
                        // });
                        // this.echo(new String("hai"))
                        // let result = window.eval(command);
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
