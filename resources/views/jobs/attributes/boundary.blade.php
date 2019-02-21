@component('jobs.attributes.template')
    @slot('name')
        boundary
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col" style="display: inline-block">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[boundary][x]"
                       style="font-size: 0.75em; color: #b0b0b0">x
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[boundary][x]">
                        <option></option>
                        <option value="p">p</option>
                        <option value="f">f</option>
                        <option value="s">s</option>
                        <option value="m">m</option>
                        <option value="fs">fs</option>
                        <option value="fm">fm</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col" style="display: inline-block">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[boundary][y]"
                       style="font-size: 0.75em; color: #b0b0b0">y
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[boundary][y]">
                        <option></option>
                        <option value="p">p</option>
                        <option value="f">f</option>
                        <option value="s">s</option>
                        <option value="m">m</option>
                        <option value="fs">fs</option>
                        <option value="fm">fm</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--4-col" style="display: inline-block">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[boundary][z]"
                       style="font-size: 0.75em; color: #b0b0b0">z
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[boundary][z]">
                        <option></option>
                        <option value="p">p</option>
                        <option value="f">f</option>
                        <option value="s">s</option>
                        <option value="m">m</option>
                        <option value="fs">fs</option>
                        <option value="fm">fm</option>
                    </select>
                </label>
            </div>
        </div>
    </div>
@endcomponent

