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
                                <form id="form-delete" action="{{ route('workspaces.jobs.delete', [$workspace->id, $job->key]) }}" method="POST" style="display: inline;">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <a href="javascript:{}" onclick="document.getElementById('form-delete').submit();"><i class="material-icons" id="tt1">highlight_off</i></a>
                                    {{-- <button type="submit"><i class="material-icons" id="tt1">highlight_off</i></button> --}}
                                </form>
                                <a href="{{ route('workspaces.jobs.edit', [$workspace->id, $job->key]) }}"><i class="material-icons">create</i></a>
                                <a href=""><i class="material-icons">error_outline</i></a>
                                <a href="{{ route('workspaces.jobs.run', [$workspace->id, $job->key]) }}" data-toggle="tooltip" data-placement="top" title="Run"><i class="material-icons">play_circle_outline</i></a>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
@endpush
