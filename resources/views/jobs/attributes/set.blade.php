@component('jobs.attributes.template')
    @slot('name')
        set
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[set][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[set][style][]" required>
                        <option></option>
                        <option disabled value="atom">atom</option>
                        <option disabled value="type">type</option>
                        <option disabled value="mol">mol</option>
                        <option value="group">group</option>
                        <option disabled value="region">region</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[set][ID]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">ID</label>
            </div>
        </div>
    </div>

    <div class="mdl-grid key-val-pair">
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[set][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[set][keyword][]" required>
                        <option></option>
                        <option value="type">type</option>
                        <option disabled value="type/fraction">type/fraction</option>
                        <option disabled value="mol">mol</option>
                        <option disabled value="x">x</option>
                        <option disabled value="y">y</option>
                        <option disabled value="z">z</option>
                        <option disabled value="charge">charge</option>
                        <option disabled value="dipole">dipole</option>
                        <option disabled value="dipole/random">dipole/random</option>
                        <option disabled value="quat">quat</option>
                        <option disabled value="quat/random">quat/random</option>
                        <option disabled value="diameter">diameter</option>
                        <option disabled value="shape">shape</option>
                        <option disabled value="length">length</option>
                        <option disabled value="tri">tri</option>
                        <option disabled value="theta">theta</option>
                        <option disabled value="theta/random">theta/random</option>
                        <option disabled value="angmom">angmom</option>
                        <option disabled value="omega">omega</option>
                        <option disabled value="mass">mass</option>
                        <option disabled value="density">density</option>
                        <option disabled value="density/disc">density/disc</option>
                        <option disabled value="volume">volume</option>
                        <option disabled value="image">image</option>
                        <option disabled value="bond">bond</option>
                        <option disabled value="angle">angle</option>
                        <option disabled value="dihedral">dihedral</option>
                        <option disabled value="improper">improper</option>
                        <option disabled value="meso/e">meso/e</option>
                        <option disabled value="meso/cv">meso/cv</option>
                        <option disabled value="meso/rho">meso/rho</option>
                        <option disabled value="smd/contact/radius">smd/contact/radius</option>
                        <option disabled value="smd/mass/density">smd/mass/density</option>
                        <option disabled value="dpd/theta">dpd/theta</option>
                        <option disabled value="edpd/temp">edpd/temp</option>
                        <option disabled value="edpd/cv">edpd/cv</option>
                        <option disabled value="cc">cc</option>
                        <option disabled value="i_name">i_name</option>
                        <option disabled value="d_name">d_name</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col values" style="display: inline-block;">
        </div>
    </div>

    <template id="set-values-type">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[set][args][]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">value</label>
        </div>
    </template>
@endcomponent

@push('scripts')
    <script>
        $(document).ready(function () {
            $('body').on('change', 'select[name="parameters[set][keyword][]"]', function (e) {
                attrName = $(this).val();
                template = $('#set-values-' + attrName).clone().html();
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

