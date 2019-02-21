@extends('layouts.app')

@section('main-content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Jobs
                        <small>All jobs you have been submitted on this workspace</small>
                    </h2>
                    <ul class="header-dropdown m-r--1">
                        <li>
                            <a href="{{ route('workspaces.jobs.create_empty', $workspace) }}">
                                  <i class="material-icons">add_circle_outline</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Job Key<th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Aksi</th>
                            {{--<th>Status*</th>--}}
                            {{--<th>Action</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($workspace->jobs as $job)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th><a href="{{ route('workspaces.jobs.edit', [$workspace->id, $job->key]) }}">{{ $job->key }}</a></th>
                            <th></th>
                            <td>{{ $job->name }}</td>
                            <td>{{ $job->created_at->format('d F Y') }}</td>
{{--                            <td>{{ \App\Job::$statusNames[$job->status] }}</td>--}}
                            {{--<td>--}}
                                {{--<a href="{{ route('jobs.show', $job->key) }}">--}}
                                    {{--<button type="submit" style="border: none; background: none; cursor: pointer;">--}}
                                        {{--<i class="material-icons">remove_red_eye</i>--}}
                                    {{--</button>--}}
                                {{--</a>--}}
                                {{--@if ($job->status == 'running' || $job->status == 'queued')--}}
                                    {{--{{ Form::open([--}}
                                        {{--'url' => route('jobs.destroy', $job->id),--}}
                                        {{--'method' => 'delete'--}}
                                    {{--]) }}--}}
                                    {{--<button type="submit" style="border: none; background: none; cursor: pointer;">--}}
                                        {{--<i class='material-icons'>cancel</i>--}}
                                    {{--</button>--}}
                                    {{--{{ Form::close() }}--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            <td>
                                {{ csrf_field() }}
                                <a class="delete-job" data-workspace="{{ $workspace->id }}" data-job="{{ $job->id }}" href="#" data-toggle="tooltip" data-placement="top" title="Delete"><i class="material-icons" id="tt1">highlight_off</i></a>
                                {{-- <button type="submit"><i class="material-icons" id="tt1">highlight_off</i></button> --}}
                                <a href="{{ route('workspaces.jobs.edit', [$workspace, $job]) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="material-icons">create</i></a>
                                <a href="{{ route('workspaces.jobs.log', [$workspace, $job]) }}" data-toggle="tooltip" data-placement="top" title="Log"><i class="material-icons">error_outline</i></a>
                                {{-- <a href="" data-toggle="tooltip" data-placement="top" title="Run"><i class="material-icons">play_circle_outline</i></a> --}}
                                <span data-toggle="tooltip" data-placement="top" title="Run">
                                <a class="toggle-the-modal" data-job-key="{{ $job->key }}" data-workspace-id="{{ $workspace->id }}" data-job-id="{{ $job->id }}" data-email="{{ auth()->user()->email }}" data-toggle="modal" data-target="#myModal" title="Run" style="cursor: pointer;"><i class="material-icons">play_circle_outline</i></a>
                                </span>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Run ! -bashFile</h4>
          </div>
            <form id="run-job" method="GET" class="form-horizontal">
              <div class="modal-body">
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="sel1">Nama Partisi</label>
                    <div class="col-sm-8">
                      <select name="partition" class="form-control" id="sel1">
                        <option value="zw">zwoelfkerne</option>
                        <option value="sun" >sun</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="sel2">Jumlah Node</label>
                    <div class="col-sm-8">
                      <select name="total_node" class="form-control" id="sel2">
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="16">16</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nama Job</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="nama-job" type="text" value="nama-job" disabled>
                      <input id="job-name" name="job_name" type="hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="nama-email" type="text" name="email" placeholder="Alamat email...">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Error log file path</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="nama-error-log" type="text" name="error_log_path" placeholder="Error log path..." disabled>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Run">
              </div>
          </form>
        </div>

      </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendors/mustache/mustache.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            let temp = '' +
                '<select class="form-control attribute-select">' +
                '@{{{ options }}}' +
                '</select>';
            let attrTemplate = '' +
                '<div class="mdl-card mdl-card--border mdl-shadow--2dp attribute-card">' +
                '<div class="attribute-card-title">@{{ attribute }}</div>  ' +
                '<div style="align: center; display: inline-block;">' +
                '<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect micro-fab add-attribute">' +
                '<i class="material-icons">add</i>' +
                '</button>' +
                '</div>' +
                '</div>' +
                '</div>';

            $('body').on('click', '.add-attribute', function () {
                let options = '', item, obj, optTemplate;
                item = $(this).parents('.mdl-list__item').find('.mdl-list__item-primary-content');
                obj = (item.data('values'));
                optTemplate = "<option value='@{{ value }}'>@{{ value }}</option>";
                $.each(obj, function (key, value) {
                    options += Mustache.render(optTemplate, {
                        value: value
                    })
                });

                console.log((options));

                $('#used-attribute').append(Mustache.render(attrTemplate, {
                    attribute: item.data('name'),
                    options: options
                }))
            })
        })
    </script>
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.delete-job').click(function() {
                let result = confirm("Apakah Anda yakin ingin menghapus job ini?")
                if (result) {
                    let _token = $("input[name='_token']").val()
                    let workspace = $(this).attr('data-workspace')
                    let job = $(this).attr('data-job')
                    let baseUrl = 'http://127.0.0.1:8000'

                    console.log("Token " + _token + " workspace " + workspace + " job " + job)

                    $.ajax({
                        type: 'DELETE',
                        url: baseUrl + "/workspaces/" + workspace + '/jobs/' + job + '/delete',
                        data: {
                            _token: _token
                        },
                        dataType: 'json',
                        success: function(data) {
                            window.location.reload()
                        },                  
                        error: function(error) {
                            alert("An error occured: " + error)
                        }      
                    })
                }
            })

            $('.toggle-the-modal').click(function() {
                let jobKey = $(this).attr('data-job-key')
                let jobNameArray = jobKey.split("_").slice(6, jobKey.length)
                
                let jobName = jobNameArray.join(" ")
                let jobId = $(this).attr('data-job-id')
                let workspaceId = $(this).attr('data-workspace-id')
                let email = $(this).attr('data-email')
                let baseUrl = 'http://127.0.0.1:8000'

                $('#myModal').find('#run-job').attr('action', baseUrl + '/workspaces/' + workspaceId + '/jobs/' + jobId + '/run')
                $('#myModal').find('#nama-email').val(email)
                $('#myModal').find('#job-name').val(jobName)
                $('#myModal').find('#nama-job').val(jobName)
                $('#myModal').find('#nama-error-log').val(jobKey + "/log.lammps")
            })
        })
    </script>
@endpush
