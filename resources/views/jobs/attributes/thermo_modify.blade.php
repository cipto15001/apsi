@component('jobs.attributes.template')
    @slot('name')
        thermo_modify
    @endslot

    <div class="mdl-grid key-val-pair">
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[thermo_modify][keyword]"
                       style="font-size: 0.75em; color: #b0b0b0">keyword
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[thermo_modify][keyword][]" required>
                        <option></option>
                        <option disabled value="lost">lost</option>
                        <option disabled value="lost/bond">lost/bond</option>
                        <option disabled value="norm">norm</option>
                        <option disabled value="flush">flush</option>
                        <option disabled value="line">line</option>
                        <option disabled value="format">format</option>
                        <option value="temp">temp</option>
                        <option disabled value="press">press</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col values" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px;">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[thermo_modify][value][]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">value</label>
            </div>
        </div>
    </div>

    <template id="thermo_modify-values-create">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px;">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[thermo_modify][args][]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">args</label>
        </div>
    </template>
@endcomponent

@push('scripts')
    <script>
        // $(document).ready(function () {
        //     $('body').on('change', 'select[name="parameters[thermo_modify][style][]"]', function (e) {
        //         attrName = $(this).val();
        //         template = $('#thermo_modify-values-' + attrName).clone().html();
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

