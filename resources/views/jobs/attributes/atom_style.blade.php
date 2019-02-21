@component('jobs.attributes.template')
    @slot('name')
        atom_style
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[atom_style][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[atom_style][style]" required>
                        <option></option>
                        <option value="angle">angle</option>
                        <option value="atomic">atomic</option>
                        <option value="body">body</option>
                        <option value="bond">bond</option>
                        <option value="charge">charge</option>
                        <option value="dipole">dipole</option>
                        <option value="dpd">dpd</option>
                        <option value="edpd">edpd</option>
                        <option value="mdpd">mdpd</option>
                        <option value="tdpd">tdpd</option>
                        <option value="electron">electron</option>
                        <option value="ellipsoid">ellipsoid</option>
                        <option value="full">full</option>
                        <option value="line">line</option>
                        <option value="meso">meso</option>
                        <option value="molecular">molecular</option>
                        <option value="peri">peri</option>
                        <option value="smd">smd</option>
                        <option value="sphere">sphere</option>
                        <option value="template">template</option>
                        <option value="tri">tri</option>
                        <option value="wavepacket">wavepacket</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[atom_style][args]" type="text" id="input_name" form="form-attribute">
                <label class="mdl-textfield__label" for="input_name">args</label>
            </div>
        </div>
    </div>
@endcomponent
