@extends('layouts.app')

@section('main-content')
    <div class="container-fluid">
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
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#select-job').change(function() {
            let jobId = $(this).val()
            
            if (jobId !== 'select-job') {
                let baseUrl = 'http://127.0.0.1:8000'
                let workspaceId = $(this).attr('data-workspace-id')

                $('#convert-form').attr('action', baseUrl + '/workspaces/' + workspaceId + '/png2cvt/' + jobId + '/doConvert')

                $.ajax({
                    type: 'GET',
                    url: baseUrl + "/workspaces/" + workspaceId + '/jobs/' + jobId + '/getFiles',
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
