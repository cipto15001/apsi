@extends('layouts.app')

@section('content')
    <div class="page-content" style="height:2000px">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col" style="margin-left: 20px; margin-right: 20px; margin-top: 40px;">
                <div class="mdl-card mdl-card--border mdl-shadow--2dp" style="width: 100%">
                    <div style="padding-top: 30px;">
                        <form action="{{ route('simulations.update', $simulation->id) }}" method="POST" style="text-align: center" id="form-users">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="title" type="text" id="input_name" value="{{ $simulation->title }}">
                                <label class="mdl-textfield__label" for="input_name">Simulation Name</label>
                            </div>
                            <br>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="description" type="text" id="input_email" value="{{ $simulation->description }}">
                                <label class="mdl-textfield__label" for="input_email">Description</label>
                            </div>
                            <br>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="image" type="text" id="input_password" value="{{ $simulation->image }}">
                                <label class="mdl-textfield__label" for="input_password">Image</label>
                            </div>
                        </form>
                        <div class="mdl-card__actions mdl-card--border"
                             style="padding-top: 40px; border-top: 0px; text-align: center; padding-bottom: 30px;">
                            <a href="{{ route('simulations.index') }}" class="mdl-button mdl-js-button mdl-button--primary mdl-js-ripple-effect">CANCEL</a>
                            <button type="submit" form="form-users" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect"
                                    style="margin-left: 10%">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

