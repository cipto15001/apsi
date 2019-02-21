<!-- Create blade php -->

@extends('layouts.app')

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endpush

@section('content')
    <div class="page-content" style="height:2000px">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col" style="margin-left: 20px; margin-right: 20px; margin-top: 40px;">
                <div class="mdl-card mdl-card--border mdl-shadow--2dp" style="width: 100%">
                    <div style="padding-top: 30px;">
                        <form action="{{ route('attributes.store', $parameter) }}" method="POST" style="text-align: center"
                              id="form-users">
                            {{ csrf_field() }}
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="" type="text" id="input_name" disabled value="{{ $parameter->name }}">
                                <label class="mdl-textfield__label" for="name">Parameter Name</label>
                            </div>
                            <br>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="name" type="text" id="input_name" required>
                                <label class="mdl-textfield__label" for="name">Attribute Name</label>
                            </div>
                            <br>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <select class="mdl-textfield__input" name="type" type="text" id="input_name">
                                    <option value="text">Text</option>
                                    <option value="options">Options</option>
                                </select>
                                <label class="mdl-textfield__label" for="type">Attribute Type</label>
                            </div>
                            <br>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label hidden" id="options-enabled">
                                <label class="mdl-textfield__label" for="options">Parameter Type</label>
                                <select class="mdl-textfield__input select2" multiple name="options[]" type="text" id="input_name">
                                </select>
                            </div>
                        </form>
                        <div class="mdl-card__actions mdl-card--border"
                             style="padding-top: 40px; border-top: 0px; text-align: center; padding-bottom: 30px;">
                            <a href="{{ route('parameters.index') }}"
                               class="mdl-button mdl-js-button mdl-button--primary mdl-js-ripple-effect">CANCEL</a>
                            <button type="submit" form="form-users"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect"
                                    style="margin-left: 10%">SUBMIT
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('select[name=type]').change(function () {
            if ($(this).val() == 'options') {
                $('#options-enabled').removeClass('hidden');

                $(document).ready(function () {
                    $(".select2").select2({
                        tags: true,
                        tokenSeparators: [',', ' ']
                    })
                })
            } else {
                $('#options-enabled').addClass('hidden');
            }
        });
    </script>
@endpush

