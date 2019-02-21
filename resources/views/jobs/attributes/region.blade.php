@component('jobs.attributes.template')
    @slot('name')
        region
    @endslot

    <div class="mdl-grid key-val-pair">
        <div class="mdl-cell mdl-cell--2-col" style="display: block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[region][ID]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">ID</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[region][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[region][keyword][]" required>
                        <option></option>
                        <option disabled value="delete">delete</option>
                        <option value="block">block</option>
                        <option disabled value="cone">cone</option>
                        <option disabled value="cylinder">cylinder</option>
                        <option disabled value="plane">plane</option>
                        <option disabled value="prism">prism</option>
                        <option disabled value="sphere">sphere</option>
                        <option disabled value="union">union</option>
                        <option disabled value="intersect">intersect</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col values" style="display: inline-block;">
        </div>
    </div>

    <template id="region-values-block">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px; width: 45%;">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[region][arg][xlo]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">xlo</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px; width: 45%;">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[region][arg][xhi]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">xhi</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px; width: 45%;">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[region][arg][ylo]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">ylo</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px; width: 45%;">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[region][arg][yhi]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">yhi</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px; width: 45%;">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[region][arg][zlo]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">zlo</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px; width: 45%;">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[region][arg][zhi]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">zhi</label>
        </div>
    </template>
@endcomponent

@push('scripts')
    <script>
        $(document).ready(function () {
            $('body').on('change', 'select[name="parameters[region][keyword][]"]', function (e) {
                attrName = $(this).val();
                template = $('#region-values-' + attrName).clone().html();
                $(this).parents('.key-val-pair').find('.values').html(Mustache.render(template))

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

