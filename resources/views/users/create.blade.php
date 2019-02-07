@extends('layouts.app')

@section('content')
    <div class="page-content" style="height:2000px">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col" style="margin-left: 20px; margin-right: 20px; margin-top: 40px;">
                <div class="mdl-card mdl-card--border mdl-shadow--2dp" style="width: 100%">
                    <div style="padding-top: 30px;">
                        <form action="{{ route('users.store') }}" method="POST" style="text-align: center" id="form-users">
                            {{ csrf_field() }}
                            <input type="hidden" name="type" value="edit">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="name" type="text" id="input_name">
                                <label class="mdl-textfield__label" for="input_name">Name</label>
                            </div>
                            <br>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="email" type="email" id="input_email">
                                <label class="mdl-textfield__label" for="input_email">Email</label>
                            </div>
                            <br>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="password" type="password" id="input_password">
                                <label class="mdl-textfield__label" for="input_password">Password</label>
                            </div>
                        </form>
                        <div class="mdl-card__actions mdl-card--border"
                             style="padding-top: 40px; border-top: 0px; text-align: center; padding-bottom: 30px;">
                            <a href="{{ route('users.index') }}" class="mdl-button mdl-js-button mdl-button--primary mdl-js-ripple-effect">CANCEL</a>
                            <button type="submit" form="form-users" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect"
                                    style="margin-left: 10%">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

