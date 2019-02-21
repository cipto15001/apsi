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
                                    <video width="550" controls src="{{ route('workspaces.files.video', $workspace) . '?file=' . request('jobKey'). '/renderedVideos/0001.webm' }}">
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
    </div>
    <input type="hidden" name="image-url" value="{{ route('workspaces.files.image', $workspace) }}">
@endsection

@push('scripts')
    <script>
        $('#image_select').change(function () {
            if  ($(this).val() !== '') {
                let url = $('input[name="image-url"]').val() + '?file=' + $('select[name=jobKey]').val() + '/renderedImages/' + $(this).val() ;
                console.log(url);
                $('#image_preview').attr('src', url).removeAttr('hidden');
            }
        })
    </script>
@endpush
