@component('jobs.attributes.template')
    @slot('name')
        neighbor
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[neighbor][skin]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">skin</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[neighbor][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[neighbor][style]" required>
                        <option></option>
                        <option value="bin">bin</option>
                        <option value="nsq">nsq</option>
                        <option value="multi">multi</option>
                    </select>
                </label>
            </div>
        </div>
    </div>
@endcomponent

