@component('jobs.attributes.template')
    @slot('name')
        group
    @endslot

    <div class="mdl-grid key-val-pair">
        <div class="mdl-cell mdl-cell--2-col" style="display: block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[group][ID]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">ID</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[group][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[group][style][]" required>
                        <option></option>
                        <option value="delete">delete</option>
                        <option value="clear">clear</option>
                        <option value="empty">empty</option>
                        <option value="region">region</option>
                        <option value="type">type</option>
                        <option value="id">id</option>
                        <option value="molecule">molecule</option>
                        <option value="variable">variable</option>
                        <option value="include">include</option>
                        <option value="subtract">subtract</option>
                        <option value="union">union</option>
                        <option value="intersect">intersect</option>
                        <option value="dynamic">dynamic</option>
                        <option value="static">static</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col values" style="display: inline-block;">
        </div>
    </div>

    {{-- without argument--}}

    <template id="group-values-delete">
    </template>
    <template id="group-values-clear">
    </template>
    <template id="group-values-empty">
    </template>
    <template id="group-values-static">
    </template>

    {{-- syntax : group ID style args --}}
    {{-- with text argument --}}

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'region',
        'param_name'  => 'group',
        'attribute_name' => 'args',
        'value_label' => 'region-ID',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'union',
        'param_name'  => 'group',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'substract',
        'param_name'  => 'group',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'type',
        'param_name'  => 'group',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'id',
        'param_name'  => 'group',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'molecule',
        'param_name'  => 'group',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'variable',
        'param_name'  => 'group',
        'attribute_name' => 'args',
        'value_label' => 'variable-name',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'include',
        'param_name'  => 'group',
        'attribute_name' => 'args',
        'value_label' => 'molecule',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'intersect',
        'param_name'  => 'group',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'dynamic',
        'param_name'  => 'group',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

@endcomponent

@push('scripts')
    <script>
        $(document).ready(function () {
            $('body').on('change', 'select[name="parameters[group][style][]"]', function (e) {
                attrName = $(this).val();
                template = $('#group-values-' + attrName).clone().html();
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

