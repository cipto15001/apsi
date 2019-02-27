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
                                <form action="">
                                    <select name="jobKey" class="form-control show-tick">
                                        <option value="">-- Select Jobs --</option>
                                        @foreach ($workspace->jobs as $job)
                                            <option {{ request('jobKey') == $job->key ? 'selected' : '' }} value="{{ $job->key }}">{{ $job->key }}</option>
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
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Image Preview
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <select id="image_select" class="form-control show-tick">
                                    <option value="">-- Select Image --</option>
                                    @foreach ($images as $image)
                                        <option value="{{ $image }}">{{ $image }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="align-center" style="min-height: 300px">
                                <img id="image_preview" hidden alt="llenn" width="500" height="333">
                            </div>
                            {{--<div class="align-right">--}}
                                {{--<button style="margin-right: 20px;" type="button"--}}
                                        {{--class="btn bg-pink m-t-15 waves-effect"><i class="material-icons">save</i><span>Download</span>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <iframe src="{{ $url }}" width="100%" height="500px"></iframe></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Video Preview
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div style="min-height: 388px" class="align-center">
                                <br><br><br>
                                @if (request()->filled('jobKey'))
                                    <video width="550" controls src="{{ route('workspaces.files.video', $workspace) . '?file=' . request('jobKey'). '/rendered_video/' . request('jobKey') . '_rendered.mp4' }}">
                                    </video>
                                @else
                                    <video width="550" controls>
                                    </video>
                                @endif

                            </div>
                            <div class="align-right">
                                <button style="margin-right: 20px;" type="button"
                                        class="btn bg-pink m-t-15 waves-effect"><i class="material-icons">save</i><span>Download</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Select -->
    <input type="hidden" name="image-url" value="{{ route('workspaces.files.image', $workspace) }}">
@endsection

@push('scripts')
    <script>
        $('#image_select').change(function () {
            let url = $('input[name="image-url"]').val() + '?file=' + $('select[name=jobKey]').val() + '/rendered_images/' + $(this).val() ;
            console.log(url);
            if ($(this).val() !== '') {
                $('#image_preview').attr('src', url).removeAttr('hidden');
            }
        })
    </script>
@endpush
