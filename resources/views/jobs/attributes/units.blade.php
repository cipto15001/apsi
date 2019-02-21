@component('jobs.attributes.template')
    @slot('name')
        units
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col" style="display: inline-block">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[units][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[units][style]" required>
                        <option></option>
                        <option value="lj">lj</option>
                        <option value="real">real</option>
                        <option value="metal">metal</option>
                        <option value="si">si</option>
                        <option value="cgs">cgs</option>
                        <option value="electron">electron</option>
                        <option value="micro">micro</option>
                        <option value="nano">nano</option>
                    </select>
                </label>
            </div>
        </div>
    </div>
@endcomponent

