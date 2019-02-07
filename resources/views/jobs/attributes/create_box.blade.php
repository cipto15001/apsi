@component('jobs.attributes.template')
    @slot('name')
        create_box
    @endslot

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[create_box][N]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">N</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[create_box][region-ID]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">region-id</label>
            </div>
        </div>
    </div>
@endcomponent

