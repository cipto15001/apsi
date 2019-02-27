@extends('layouts.app')

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
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-teal">
                    <h2>
                        Convert PNG to CVT
                    </h2>
                    <small>Make sure you upload to "resources" folder, output will be saved to "input" folder</smal>
                </div>
                <div class="body">
                    <form id="convert-form" action="" method="POST">
                        {{ csrf_field() }}
                        <label for="upload">Select Job</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select id="select-job" class="form-control show-tick" data-workspace-id="{{ $workspace->id }}" name="job_id" class="form-control show-tick" required>
                                    <option value="select-job" selected>Select jobs...</option>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}">{{ $job->key }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label for="upload">Select File</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select id="select-file" class="form-control show-tick" name="input" required>                                        
                                </select>
                            </div>
                        </div>
                        <label for="output">File Name</label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="form-line">
                                    <input id="output" name="output" type="text" class="form-control" placeholder="Output file Name, default input file name">
                                </div>
                                <span class="input-group-addon">.lmp</span>
                            </div>
                        </div>
                        <button type="submit" class="btn bg-teal m-t-15 waves-effect"><i class="material-icons">cached</i><span>Convert</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        let PORT = window.location.port
        let BASE_URL = window.location.protocol + '//' + window.location.hostname
        if (PORT != '')
            BASE_URL = BASE_URL + ':' + PORT

        $('#select-job').change(function() {
            let jobId = $(this).val()
            
            if (jobId !== 'select-job') {
                let workspaceId = $(this).attr('data-workspace-id')

                $('#convert-form').attr('action', BASE_URL + '/workspaces/' + workspaceId + '/png2cvt/' + jobId + '/doConvert')

                $.ajax({
                    type: 'GET',
                    url: BASE_URL + "/workspaces/" + workspaceId + '/jobs/' + jobId + '/getFiles',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        $('#select-file').empty();
                        for (let i = 0; i < data.length; i++) {
                            let option = '<option value="' + data[i] + '">' + data[i] + '</option>'
                            $('#select-file').append(option)
                        }
                    },                  
                    error: function(error) {
                        console.error(error)
                    }      
                })
            }
        })
    })
</script>
@endpush
