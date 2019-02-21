@component('jobs.attributes.template')
    @slot('name')
        neigh_modify
    @endslot

    <div class="key-val-pair-wrapper">
        <div class="mdl-grid key-val-pair">
            <div class="mdl-cell mdl-cell--4-col" style="display: inline-block;">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="parameters[neigh_modify][keyword][]"
                           style="font-size: 0.75em; color: #b0b0b0">keyword
                        <select data-type="options" class="input-attribute select2 keys" form="form-attribute"
                                name="parameters[neigh_modify][keyword][]" required>
                            <option></option>
                            <option value="delay">delay</option>
                            <option value="every">every</option>
                            <option value="check">check</option>
                            <option value="once">once</option>
                            <option value="cluster">cluster</option>
                            <option value="include">include</option>
                            <option value="exclude">exclude</option>
                            <option value="page">page</option>
                            <option value="one">one</option>
                            <option value="binsize">binsize</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--6-col values" style="display: block;">
            </div>
        </div>
    </div>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col" style="display: inline-block;">
            <button class="mdl-button mdl-js-button mdl-button--fab micro-fab add-attribute"
                    style="margin-right: 20px; float: right">
                <i class="material-icons">add</i>
            </button>
        </div>
    </div>

    <template id="neigh_modfy-keywords">
        <div class="mdl-grid key-val-pair">
            <div class="mdl-cell mdl-cell--4-col" style="display: inline-block;">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label for="parameters[neigh_modify][keyword][]"
                           style="font-size: 0.75em; color: #b0b0b0">keyword
                        <select data-type="options" class="input-attribute select2 keys" form="form-attribute"
                                name="parameters[neigh_modify][keyword][]" required>
                            <option></option>
                            <option value="delay">delay</option>
                            <option value="every">every</option>
                            <option value="check">check</option>
                            <option value="once">once</option>
                            <option value="cluster">cluster</option>
                            <option value="include">include</option>
                            <option value="exclude">exclude</option>
                            <option value="page">page</option>
                            <option value="one">one</option>
                            <option value="binsize">binsize</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="mdl-cell mdl-cell--6-col values" style="display: block;">
            </div>
            <div class="mdl-cell mdl-cell--2-col" style="display: block;">
                <button class="mdl-button mdl-js-button mdl-button--fab micro-fab remove-attribute"
                        style="margin-right: 20px;">
                    <i class="material-icons">remove</i>
                </button>
            </div>
        </div>
    </template>

    <template id="neigh_modify-values-delay">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[neigh_modify][keyword][]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">N</label>
        </div>
    </template>

    <template id="neigh_modify-values-every">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[neigh_modify][keyword][]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">M</label>
        </div>
    </template>

    <template id="neigh_modify-values-check">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label for="parameters[neigh_modify][keyword][]"
                   style="font-size: 0.75em; color: #b0b0b0">check
                <select data-type="options" class="input-attribute select2" form="form-attribute"
                        name="parameters[neigh_modify][keyword][]" required>
                    <option></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </label>
        </div>
    </template>

    <template id="neigh_modify-values-once">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label for="parameters[neigh_modify][keyword][]"
                   style="font-size: 0.75em; color: #b0b0b0">once
                <select data-type="options" class="input-attribute select2" form="form-attribute"
                        name="parameters[neigh_modify][keyword][]" required>
                    <option></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </label>
        </div>
    </template>

    <template id="neigh_modify-values-cluster">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label for="parameters[neigh_modify][keyword][]"
                   style="font-size: 0.75em; color: #b0b0b0">cluster
                <select data-type="options" class="input-attribute select2" form="form-attribute"
                        name="parameters[neigh_modify][keyword][]" required>
                    <option></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </label>
        </div>
    </template>
@endcomponent

@push('scripts')
    <script>
        $(document).ready(function () {
            $('body').on('change', 'select[name="parameters[neigh_modify][keyword][]"].keys', function (e) {
                attrName = $(this).val();
                template = $('#neigh_modify-values-' + attrName).clone().html();
                $(this).parents('.key-val-pair').find('.values').html(Mustache.render(template))

                $(this).parents('.key-val-pair').find('.values select.select2').select2({
                    placeholder: 'select',
                    width: '100%',
                    theme: 'material',
                    minimumResultsForSearch: Infinity
                });

                componentHandler.upgradeDom();
            });

            $('body').on('click', '.add-attribute', function (e) {
                html = $('template#neigh_modfy-keywords').clone().html();
                $(this).parents('.mdl-grid').siblings('.key-val-pair-wrapper').append(html)

                $(this).parents('.mdl-grid').siblings('.key-val-pair-wrapper').find('.select2').select2({
                    placeholder: 'select',
                    width: '100%',
                    theme: 'material',
                    minimumResultsForSearch: Infinity
                });
            });

            $('body').on('click', '.remove-attribute', function () {
                $(this).parents('.key-val-pair').remove();
            });
        });
    </script>
@endpush

