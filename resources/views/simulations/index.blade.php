@extends('layouts.app')

@push('styles')
<!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css"
          integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    {{--<link rel='stylesheet prefetch' href='https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css'>--}}
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

<!-- Styles -->
    <link rel="stylesheet" href="{{ asset('styles/material.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/palette.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/polyfill/dialog-polyfill.css') }}">
@endpush

@section('main-content')
    <div class="page-content" style="height: inherit;">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp"
                 style="margin-left: 20px; margin-right: 20px; margin-top: 20px;">
                <header class="mdl-layout__header">
                    <div class="mdl-layout__header-row" style="padding-left: 40px;">
                        <span class="mdl-layout-title card-title">Simulations</span>
                        <div class="mdl-layout-spacer"></div>
                        <a href="{{ route('simulations.create') }}"
                           class="mdl-button mdl-js-button mdl-button--primary card-title">
                            NEW
                        </a>
                    </div>
                </header>
                <table class="mdl-data-table mdl-js-data-table" style="width: 100%;">
                    <thead>
                    <tr class="mdl-data-table__cell--non-numeric">
                        <th class="mdl-data-table__cell--non-numeric">#</th>
                        <th class="mdl-data-table__cell--non-numeric">Simulation</th>
                        <th class="mdl-data-table__cell--non-numeric">Parameter</th>
                        <th class="mdl-data-table__cell--non-numeric">Jobs Created</th>
                        <th class="mdl-data-table__cell--non-numeric">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($simulations as $simulation)
                        <tr class="mdl-data-table__cell--non-numeric">
                            <td class="mdl-data-table__cell--non-numeric">{{ $loop->iteration }}</td>
                            <td class="mdl-data-table__cell--non-numeric">{{ $simulation->title }}</td>
                            @if ($simulation->parameters->isEmpty())
                                <td class="mdl-data-table__cell--non-numeric">-</td>
                            @else
                                <td class="mdl-data-table__cell--non-numeric">{{ implode(",", $simulation->parameters->pluck('name')->toArray()) }}</td>
                            @endif
                            <td class="mdl-data-table__cell--non-numeric">{{ $simulation->jobs_count }}</td>
                            <td class="mdl-data-table__cell--non-numeric" style="">
                                <a href="{{ route('simulations.show', $simulation->id) }}">
                                    <button type="submit" style="border: none; background: none; cursor: pointer;">
                                        <i class="material-icons">remove_red_eye</i>
                                    </button>
                                </a>
                                {{ Form::open([
                                    'url' => route('simulations.destroy', $simulation->id),
                                    'method' => 'delete',
                                    'style' => 'display: inline-block',
                                ]) }}
                                <button type="submit"
                                        style="border: none; background: none; cursor: pointer; color: red;">
                                    <i class='material-icons'>delete</i>
                                </button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
