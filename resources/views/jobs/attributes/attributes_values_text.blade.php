<template id="{{ $param_name }}-values-{{ $values_name }}">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 28px;">
            <input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[{{ $param_name }}][{{ $attribute_name }}][]" type="text" id="input_name" form="form-attribute" required>
            <label class="mdl-textfield__label" for="input_name">{{ $value_label }}</label>
        </div>
</template>