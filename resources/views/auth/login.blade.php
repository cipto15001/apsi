<?php
/**
 * @var \Illuminate\Support\Collection $errors
 */
?>
@extends('layouts.login')

@push('style')
    <style type="text/css">
        form {
            max-width: 300px;
            margin: 0 auto;
        }

        .mdl-grid {
            margin-top: 15%;
        }
    </style>
@endpush

@section('content')
    <div class="mdl-grid mdl-grid--no-spacing">
        <div class="mdl-cell mdl-cell--4-col mdl-cell--4-offset-desktop mdl-cell--2-offset-tablet" id="login-layout">
            <div style="text-align: center;">
                <!-- logo, HtmlUnknownAttribute -->
                <!--suppress HtmlUnknownAttribute, HtmlUnknownAttribute -->
                <svg viewBox="0 0 3 2" width="100" height="128">
                    <polygon fill="#fed64f" points="0 2 0 0 2 0">
                        <animate
                                attributeName="points"
                                calcMode="spline"
                                dur="4s"
                                keySplines="
										.25 .1 .25 1;
										.25 .1 .25 1;
										.25 .1 .25 1;
										.25 .1 .25 1;
										.25 .1 .25 1;
										.25 .1 .25 1"
                                keyTimes="
										0;
										.1;
										.2;
										.3;
										.7;
										.8;
										1"
                                repeatCount="indefinite"
                                values="
										0 2 0 0 2 0;
										0 2 0 0 2 0;
										0 2 2 2 2 0;
										0 2 2 2 0 0;
										0 2 2 2 0 0;
										0 2 0 0 2 0;
										0 2 0 0 2 0"/>
                    </polygon>
                    <polygon fill="#BDBDBD" points="1 2 1 0 3 0">
                        <animate
                                attributeName="points"
                                calcMode="spline"
                                dur="4s"
                                keySplines="
										.25 .1 .25 1;
										.25 .1 .25 1;
										.25 .1 .25 1;
										.25 .1 .25 1;
										.25 .1 .25 1;
										.25 .1 .25 1;
										.25 .1 .25 1;
										.25 .1 .25 1;
										.25 .1 .25 1"
                                keyTimes="
										0;
										.1;
										.3;
										.4;
										.5;
										.6;
										.7;
										.8;
										.9;
										1"
                                repeatCount="indefinite"
                                values="
										1 2 1 0 3 0;
										2 2 0 2 2 0;
										2 2 0 2 2 0;
										2 2 0 0 2 0;
										2 2 0 0 0 2;
										2 2 2 0 0 2;
										0 0 2 0 0 2;
										0 0 2 0 0 2;
										1 0 3 0 1 2;
										1 0 3 0 1 2"/>
                    </polygon>
                </svg>
                <h4>Sign in Your Account</h4>
                <h6>Don't have an account? <span style="color: #fed64f"><a href="mailto:admin@guriang.unpad.ac.id">Contact us.</a></span>
                </h6>
            </div>
            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::open([
                'url' => route('login')
                ]) !!}
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" name="email" type="email" id="email" autocomplete="off" autofocus>
                <label class="mdl-textfield__label" for="email">Email</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield">
                <input class="mdl-textfield__input" name="password" type="password" id="password" autocomplete="off">
                <label class="mdl-textfield__label" for="password">Password</label>
            </div>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                    id="login-button" type="submit">
                Login
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
