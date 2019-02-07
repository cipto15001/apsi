@component('jobs.attributes.template')
    @slot('name')
        dimension
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col" style="display: inline-block">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[dimension][N]"
                       style="font-size: 0.75em; color: #b0b0b0">N
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[dimension][N]" required>
                        <option></option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </label>
            </div>
        </div>
    </div>
@endcomponent

