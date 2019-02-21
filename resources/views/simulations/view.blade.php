@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('styles/select2.min.css') }}">
@endpush

@section('content')
    <div class="page-content" style="height:2000px">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--7-col" style="margin-left: 20px; margin-top: 20px; width: 63%">
                <h4>{{ $simulation->title }}
                    <a href="{{ route('simulations.edit', $simulation->id) }}">
                        <button class="mdl-button mdl-js-button mdl-js-ripple-effect"
                                style="width: 30px; min-width: 35px; background-color: #fdc02f; padding: 0px;">
                            <i class="material-icons fa-lg" style="">edit</i>
                        </button>
                    </a>
                </h4>
                <h5>{{ $simulation->description }}</h5>
            </div>
            <div class="mdl-cell mdl-cell--4-col" style="margin-top: 20px;">
                <img src="http://placehold.it/200x200" style="float: right;">
            </div>
            <div class="mdl-cell mdl-cell--12-col" style="margin-left: 20px; margin-right: 20px; margin-top: 20px;">
                <div class="mdl-card mdl-card--border mdl-shadow--2dp"
                     style="width: 100%; height: 1024px;%; display: block;">
                    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header has-drawer is-upgraded">
                        <header class="mdl-layout__header">
                            <div class="mdl-layout__header-row" style="padding-left: 40px;">
                                <div class="mdl-layout-spacer"></div>
                                <button id="show-dialog" class="mdl-button mdl-js-button mdl-button--raised"
                                        style="background-color: #fdc02f ">
                                    <i class="fas fa-plus fa-1x"></i> &nbsp;Add
                                </button>
                            </div>
                        </header>
                        <table class="mdl-data-table mdl-js-data-table" style="width: 100%;">
                            <thead>
                            <tr class="mdl-data-table__cell--center" style="text-align: left;">
                                <th class="mdl-data-table__cell--center" style="width: 5%;">No</th>
                                <th class="mdl-data-table__cell--center" style="text-align: left;">Parameter</th>
                                <th class="mdl-data-table__cell--center" style="text-align: left;">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($simulation->parameters as $parameter)
                                <tr class="mdl-data-table__cell--center" style="text-align: left;">
                                    <td class="mdl-data-table__cell--center">{{ $loop->iteration }}</td>
                                    <td class="mdl-data-table__cell--center"
                                        style="text-align: left;">{{ $parameter->name }}</td>
                                    <td class="mdl-data-table__cell--center" style="text-align: left;">
                                        {{--<i class="fas fa-eye fa-2x"></i>--}}
                                        {!! Form::open([
                                            'url'		=> "simulations/" . $simulation->id . "/" . $parameter->id . "/detach_simul",
                                            'method'	=> 'PUT',
                                            'style' => 'display: inline-block'
                                            ]) !!}

                                        <button type="submit" style="border: none; background: none; cursor: pointer;">
                                            <i class="fas fa-window-close fa-2x"></i>
                                        </button>
                                        {!! Form::close(); !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('non-main-content')
    <div>
        {!! Form::open([
            'url'		=> "simulations/" . $simulation->id . "/update_simul",
            'method'	=> 'PUT',
            'id'		=> 'form-attach-attribute'
        ]) !!}
        <dialog class="mdl-dialog" style="width: 20%;">
            <h4 class="mdl-dialog__title">ADD</h4>
            <div class="mdl-dialog__content">
                <div class="mdl-card mdl-card--border" style="width: 100%; height: 50%;%; display: block;">
                    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header has-drawer is-upgraded">
                        @csrf
                        @foreach($parameters as $id => $parameter)
                            <p><input type="checkbox" name=parameters[] value="{{ $id }}"> &nbsp; {{ $parameter }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mdl-dialog__actions">
                <button type="submit" class="mdl-button">Submit</button>
                <button type="button" class="mdl-button close">Cancel</button>
            </div>
        </dialog>
        {!! Form::close(); !!}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('scripts/select2.min.js') }}"></script>
    <script>
        var dialog = document.querySelector('dialog');
        var showDialogButton = document.querySelector('#show-dialog');
        if (!dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        showDialogButton.addEventListener('click', function () {
            dialog.showModal();
        });
        dialog.querySelector('.close').addEventListener('click', function () {
            dialog.close();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endpush