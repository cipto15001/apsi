@component('jobs.attributes.template')
    @slot('name')
        lattice
    @endslot

    <div class="mdl-grid key-val-pair">
        <div class="mdl-cell mdl-cell--4-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[lattice][style][]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[lattice][style][]" required>
                        <option></option>
                        <option value="none">none</option>
                        <option value="sc">sc</option>
                        <option value="bcc">bcc</option>
                        <option value="fcc">fcc</option>
                        <option value="hcp">hcp</option>
                        <option value="diamond">diamond</option>
                        <option value="sq">sq</option>
                        <option value="sq2">sq2</option>
                        <option value="hex">hex</option>
                        <option value="custom">custom</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[lattice][scale][]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">scale</label>
            </div>
        </div>
    </div>

    <div class="key-val-pair-wrapper">

    </div>

    {{--<div class="mdl-grid">--}}
        {{--<div class="mdl-cell mdl-cell--12-col" style="display: inline-block;">--}}
            {{--<button class="mdl-button mdl-js-button mdl-button--fab micro-fab add-attribute"--}}
                    {{--style="margin-right: 20px; float: right">--}}
                {{--<i class="material-icons">add</i>--}}
            {{--</button>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<template id="neigh_modfy-keywords">--}}
        {{--<div class="mdl-grid key-val-pair">--}}
            {{--<div class="mdl-cell mdl-cell--4-col" style="display: inline-block;">--}}
                {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">--}}
                    {{--<label for="parameters[lattice][keyword][]"--}}
                           {{--style="font-size: 0.75em; color: #b0b0b0">keyword--}}
                        {{--<select data-type="options" class="input-attribute select2" form="form-attribute" --}}
                                {{--name="parameters[lattice][keyword][]" required>--}}
                            {{--<option></option>--}}
                            {{--<option value="delay">delay</option>--}}
                            {{--<option value="every">every</option>--}}
                            {{--<option value="check">check</option>--}}
                            {{--<option value="once">once</option>--}}
                            {{--<option value="cluster">cluster</option>--}}
                            {{--<option value="include">include</option>--}}
                            {{--<option value="exclude">exclude</option>--}}
                            {{--<option value="page">page</option>--}}
                            {{--<option value="one">one</option>--}}
                            {{--<option value="binsize">binsize</option>--}}
                        {{--</select>--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="mdl-cell mdl-cell--6-col values" style="display: block;">--}}
            {{--</div>--}}
            {{--<div class="mdl-cell mdl-cell--2-col" style="display: block;">--}}
                {{--<button class="mdl-button mdl-js-button mdl-button--fab micro-fab remove-attribute"--}}
                        {{--style="margin-right: 20px;">--}}
                    {{--<i class="material-icons">remove</i>--}}
                {{--</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</template>--}}

    {{--<template id="lattice-values-delay">--}}
        {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">--}}
            {{--<input class="mdl-textfield__input input-attribute" data-type="text"--}}
                   {{--name="parameters[lattice][values][]" type="text" id="input_name" form="form-attribute" required>--}}
            {{--<label class="mdl-textfield__label" for="input_name">N</label>--}}
        {{--</div>--}}
    {{--</template>--}}

    {{--<template id="lattice-values-every">--}}
        {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">--}}
            {{--<input class="mdl-textfield__input input-attribute" data-type="text"--}}
                   {{--name="parameters[lattice][values][]" type="text" id="input_name" form="form-attribute" required>--}}
            {{--<label class="mdl-textfield__label" for="input_name">M</label>--}}
        {{--</div>--}}
    {{--</template>--}}

    {{--<template id="lattice-values-check">--}}
        {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">--}}
            {{--<label for="parameters[lattice][keyword][]"--}}
                   {{--style="font-size: 0.75em; color: #b0b0b0">check--}}
                {{--<select data-type="options" class="input-attribute select2" form="form-attribute" --}}
                        {{--name="parameters[lattice][values][]" required>--}}
                    {{--<option></option>--}}
                    {{--<option value="yes">Yes</option>--}}
                    {{--<option value="no">No</option>--}}
                {{--</select>--}}
            {{--</label>--}}
        {{--</div>--}}
    {{--</template>--}}

    {{--<template id="lattice-values-once">--}}
        {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">--}}
            {{--<label for="parameters[lattice][keyword][]"--}}
                   {{--style="font-size: 0.75em; color: #b0b0b0">once--}}
                {{--<select data-type="options" class="input-attribute select2" form="form-attribute" --}}
                        {{--name="parameters[lattice][values][]" required>--}}
                    {{--<option></option>--}}
                    {{--<option value="yes">Yes</option>--}}
                    {{--<option value="no">No</option>--}}
                {{--</select>--}}
            {{--</label>--}}
        {{--</div>--}}
    {{--</template>--}}

    {{--<template id="lattice-values-cluster">--}}
        {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">--}}
            {{--<label for="parameters[lattice][keyword][]"--}}
                   {{--style="font-size: 0.75em; color: #b0b0b0">cluster--}}
                {{--<select data-type="options" class="input-attribute select2" form="form-attribute" --}}
                        {{--name="parameters[lattice][values][]" required>--}}
                    {{--<option></option>--}}
                    {{--<option value="yes">Yes</option>--}}
                    {{--<option value="no">No</option>--}}
                {{--</select>--}}
            {{--</label>--}}
        {{--</div>--}}
    {{--</template>--}}
@endcomponent

@push('scripts')
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('body').on('change', 'select[name="parameters[lattice][keyword][]"]', function (e) {--}}
                {{--attrName = $(this).val();--}}
                {{--template = $('#lattice-values-' + attrName).clone().html();--}}
                {{--$(this).parents('.key-val-pair').find('.values').html(Mustache.render(template))--}}

                {{--$(this).parents('.key-val-pair').find('.select2').select2({--}}
                    {{--placeholder: 'select',--}}
                    {{--width: '100%',--}}
                    {{--theme: 'material',--}}
                    {{--minimumResultsForSearch: Infinity--}}
                {{--});--}}

                {{--componentHandler.upgradeDom();--}}
            {{--});--}}

            {{--$('body').on('click', '.add-attribute', function (e) {--}}
                {{--html = $('template#neigh_modfy-keywords').clone().html();--}}
                {{--$(this).parents('.mdl-grid').siblings('.key-val-pair-wrapper').append(html)--}}

                {{--$(this).parents('.mdl-grid').siblings('.key-val-pair-wrapper').find('.select2').select2({--}}
                    {{--placeholder: 'select',--}}
                    {{--width: '100%',--}}
                    {{--theme: 'material',--}}
                    {{--minimumResultsForSearch: Infinity--}}
                {{--});--}}
            {{--});--}}

            {{--$('body').on('click', '.remove-attribute', function () {--}}
                {{--$(this).parents('.key-val-pair').remove();--}}
            {{--})--}}
        {{--});--}}
    {{--</script>--}}
@endpush

