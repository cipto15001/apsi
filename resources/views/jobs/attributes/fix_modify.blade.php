@component('jobs.attributes.template')
    @slot('name')
        fix_modify
    @endslot

    <div class="mdl-grid key-val-pair">
        <div class="mdl-cell mdl-cell--12-col" style="display: block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[fix_modify][fix-ID]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">fix-ID</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[fix_modify][keyword]"
                       style="font-size: 0.75em; color: #b0b0b0">keyword
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[fix_modify][keyword][]" required>
                        <option></option>
                        <option value="temp">temp</option>
                        <option value="press">press</option>
                        <option value="energy">energy</option>
                        <option value="virial">virial</option>
                        <option value="respa">respa</option>
                        <option disabled value="dynamic/dof">dynamic/dof</option>
                        <option value="bodyforces">bodyforces</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col values" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px;">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[fix_modify][value][]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">value</label>
            </div>
        </div>
    </div>

    <template id="fix_modify-values-bodyforces">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label for="parameters[fix_modify][args][]"
                   style="font-size: 0.75em; color: #b0b0b0">check
                <select data-type="options" class="input-attribute select2" form="form-attribute"
                        name="parameters[fix_modify][args][]" required>
                    <option></option>
                    <option value="early">Early</option>
                    <option value="late">Late</option>
                </select>
            </label>
        </div>
    </template>


    @include('jobs.attributes.attributes_values_select', [
        'values_name' => 'virial',
        'param_name'  => 'fix_modify',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_select', [
        'values_name' => 'energy',
        'param_name'  => 'fix_modify',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'respa',
        'param_name'  => 'fix_modify',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

     @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'press',
        'param_name'  => 'fix_modify',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    <template id="fix_modify-values-create">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px;">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[fix_modify][args][]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">value</label>
        </div>
    </template>
@endcomponent

@push('scripts')
    <script>
        $(document).ready(function () {
            $('body').on('change', 'select[name="parameters[fix_modify][keyword][]"]', function (e) {
                attrName = $(this).val();
                template = $('#fix_modify-values-' + attrName).clone().html();
                $(this).parents('.key-val-pair').find('.values').html(Mustache.render(template));

                $(this).parents('.key-val-pair').find('.values select.select2').select2({
                    placeholder: 'select',
                    width: '100%',
                    theme: 'material',
                    minimumResultsForSearch: Infinity
                });

                componentHandler.upgradeDom();
            });
        });
    </script>
@endpush

