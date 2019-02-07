@component('jobs.attributes.template')
    @slot('name')
        timestep
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[timestep][dt]" type="text" id="input_name">
                <label class="mdl-textfield__label" for="input_name">dt</label>
            </div>
        </div>
    </div>
@endcomponent
