@component('jobs.attributes.template')
    @slot('name')
        mass
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[mass][I]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">I</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[mass][value]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">value</label>
            </div>
        </div>
    </div>
@endcomponent

