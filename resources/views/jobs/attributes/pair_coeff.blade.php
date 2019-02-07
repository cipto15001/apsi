@component('jobs.attributes.template')
    @slot('name')
        pair_coeff
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--3-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[pair_coeff][I]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">I</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--3-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[pair_coeff][J]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">J</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[pair_coeff][args]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">args</label>
            </div>
        </div>
    </div>
@endcomponent

