@extends('layouts.app')

@section('main-content')
    <div class="container-fluid">
        <div class="block-header">
            <button type="button" class="btn bg-blue-grey waves-effect" data-toggle="modal"
                    data-target="#addSimulation">
                <i class="material-icons">add</i><span>ADD WORKSPACE</span>
            </button>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            @foreach (\App\Workspace::limit(10)->latest()->get() as $workspace)
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                {{ $workspace->title }}
                                <small>{{ $workspace->created_at->format('d F Y') }}</small>
                            </h2>
                            {{--<ul class="header-dropdown m-r--5">--}}
                            {{--<li class="dropdown">--}}
                            {{--<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"--}}
                            {{--role="button" aria-haspopup="true" aria-expanded="false">--}}
                            {{--<i class="material-icons">more_vert</i>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu pull-right">--}}
                            {{--<li><a href="javascript:void(0);">Action</a></li>--}}
                            {{--<li><a href="javascript:void(0);">Another action</a></li>--}}
                            {{--<li><a href="javascript:void(0);">Something else here</a></li>--}}
                            {{--</ul>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                        </div>
                        <div class="body align-justify">{{ $workspace->description }}</div>
                        <div class="body">
                            <button type="button" class="btn bg-red waves-effect delete-workspace-button" data-toggle="modal"
                            data-target="#deleteSimulation" data-workspace-id="{{ $workspace->id }}">
                                <i class="material-icons">delete</i>
                                <span>Delete</span>
                            </button>
                            <a href="{{ route('workspaces.show', $workspace) }}" target="_blank">
                                <button type="button" class="btn bg-light-blue waves-effect">
                                    <i class="material-icons">launch</i>
                                    <span>Open</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- #END# Widgets -->
    <div class="body">
        <nav>
            <ul class="pager">
                <li class="previous">
                    <a href="javascript:void(0);" class="waves-effect"><span aria-hidden="true">&larr;</span> Older</a>
                </li>
                <li class="next">
                    <a href="javascript:void(0);" class="waves-effect">Newer <span aria-hidden="true">&rarr;</span></a>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('non-main-content')
    <div class="modal fade" id="addSimulation" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue-grey">
                    <h3>
                        Add Workspace
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="body">
                            {!! Form::open([
                                'url' => route('workspaces.store'),
                                'id' => 'form-workspaces-create'
                            ]) !!}
                            <label for="title">Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="title" type="text" id="title" class="form-control" required
                                           placeholder="Enter workspace title">
                                </div>
                            </div>
                            <label for="description">Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                        <textarea name="description" rows="8" class="form-control no-resize auto-growth"
                                                  required
                                                  placeholder="Please describe the workspace is what for, a simple yet straightforward will help you remember this workspace"
                                                  style="overflow: hidden; word-wrap: break-word;"></textarea>
                                </div>
                            </div>
                            <label for="description">Manager</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="manager_id" class="form-control show-tick" readonly required>
                                        <option value="">-- Please select --</option>
                                        <option selected value="{{ auth()->id() }}">{{ auth()->user()->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <label for="description">Colabolator</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="colabolator" disabled class="form-control"
                                           placeholder="Enter your name colabolator">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="form-workspaces-create" class="btn btn-link waves-effect bg-amber">Add
                    </button>
                    <button type="button" class="btn btn-link waves-effect bg-red" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteSimulation" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-blue-grey">
                        <h3>
                            Delete Workspace
                        </h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-l-0">
                            <div class="body">
                                <h5>Are you sure to delete this workspace ?</h5>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="#" id="delete-workspace-form" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button id="delete-confirm" type="submit" form="form-workspaces-create" class="btn btn-link waves-effect bg-amber">
                                Delete
                            </button>
                            <button type="button" class="btn btn-link waves-effect bg-red" data-dismiss="modal">CLOSE</button>
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
    <script>
        $(document).ready(function() {
            $('.delete-workspace-button').click(function() {
                let workspaceId = $(this).attr('data-workspace-id')
                let baseUrl = 'http://127.0.0.1:8000'
                $('#delete-workspace-form').attr('action', baseUrl + '/workspaces/' + workspaceId + '/delete')
            })
            $('#delete-confirm').click(function() {
                $('#delete-workspace-form').submit()
            })
        })
    </script>
@endpush
