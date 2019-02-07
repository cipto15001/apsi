@component('jobs.attributes.template')
    @slot('name')
        create_atoms
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[create_atoms][type]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">type</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[create_atoms][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[create_atoms][style]" required>
                        <option></option>
                        <option value="box">box</option>
                        <option value="region">region</option>
                        <option value="single">single</option>
                        <option value="random">random</option>
                    </select>
                </label>
            </div>
        </div>
    </div>
@endcomponent

