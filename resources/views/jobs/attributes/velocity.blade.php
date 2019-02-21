@component('jobs.attributes.template')
    @slot('name')
        velocity
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--6-col" style="display: block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[velocity][group-ID]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">group-ID</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[velocity][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[velocity][style][]" required>
                        <option></option>
                        <option value="create">create</option>
                        <option value="set">set</option>
                        <option disabled value="scale">scale</option>
                        <option disabled value="ramp">ramp</option>
                        <option disabled value="zero">zero</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--12-col values" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px;">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[velocity][args][]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">args</label>
            </div>
        </div>
    </div>

    {{--<div class="mdl-grid">--}}
        {{--<div class="mdl-cell mdl-cell--6-col">--}}
            {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">--}}
                {{--<label for="parameters[velocity][keyword][]"--}}
                       {{--style="font-size: 0.75em; color: #b0b0b0">style--}}
                    {{--<select data-type="options" class="input-attribute select2" form="form-attribute" --}}
                            {{--name="parameters[velocity][style][]" required>--}}
                        {{--<option></option>--}}
                        {{--<option disabled value="dist">dist</option>--}}
                        {{--<option disabled value="sum">sum</option>--}}
                        {{--<option disabled value="mom">mom</option>--}}
                        {{--<option disabled value="rot">rot</option>--}}
                        {{--<option value="temp">temp</option>--}}
                        {{--<option disabled value="bias">bias</option>--}}
                        {{--<option disabled value="loop">loop</option>--}}
                        {{--<option disabled value="units">units</option>--}}
                    {{--</select>--}}
                {{--</label>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="mdl-cell mdl-cell--6-col">--}}
            {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px;">--}}
                {{--<input class="mdl-textfield__input input-attribute" data-type="text"--}}
                       {{--name="parameters[velocity][args][]" type="text" id="input_name" form="form-attribute" required>--}}
                {{--<label class="mdl-textfield__label" for="input_name">value</label>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <template id="velocity-values-create">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px;">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[velocity][args][]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">args</label>
        </div>
    </template>
@endcomponent

@push('scripts')
    <script>
        // $(document).ready(function () {
        //     $('body').on('change', 'select[name="parameters[velocity][style][]"]', function (e) {
        //         attrName = $(this).val();
        //         template = $('#velocity-values-' + attrName).clone().html();
        //         $(this).parents('.key-val-pair').find('.values').html(Mustache.render(template));
        //
        //         $(this).parents('.key-val-pair').find('.values select.select2').select2({
        //             placeholder: 'select',
        //             width: '100%',
        //             theme: 'material',
        //             minimumResultsForSearch: Infinity
        //         });
        //
        //         componentHandler.upgradeDom();
        //     });
        // });
    </script>
@endpush

