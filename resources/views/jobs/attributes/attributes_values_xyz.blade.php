<template id="{{ $param_name }}-values-{{ $values_name }}">
	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--4-col" style="display: inline-block">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 12px;">
            	<input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[{{ $param_name }}][{{ $attribute_name_1 }}][]" type="text" id="input_name" form="form-attribute" required>
            	<label class="mdl-textfield__label" for="input_name">{{ $value_label_1 }}</label>
        	</div>
		</div>
		<div class="mdl-cell mdl-cell--4-col" style="display: inline-block">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 12px;">
            	<input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[{{ $param_name }}][{{ $attribute_name_2 }}][]" type="text" id="input_name" form="form-attribute" required>
            	<label class="mdl-textfield__label" for="input_name">{{ $value_label_2 }}</label>
        	</div>
		</div>
		<div class="mdl-cell mdl-cell--4-col" style="display: inline-block">
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 12px;">
            	<input class="mdl-textfield__input input-attribute" data-type="text"
                   name="parameters[{{ $param_name }}][{{ $attribute_name_3 }}][]" type="text" id="input_name" form="form-attribute" required>
            	<label class="mdl-textfield__label" for="input_name">{{ $value_label_3 }}</label>
        	</div>
		</div>
	</div>
</template>