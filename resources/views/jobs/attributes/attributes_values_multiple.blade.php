<template id="{{ $param_name }}-values-{{ $values_name }}">
  <div class="mdl-grid">
    @for($i=0;$i<$loop;$i++)
  		<div class="mdl-cell mdl-cell--{{12/$loop}}-col" style="display: inline-block">
  			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 12px;">
              	<input class="mdl-textfield__input input-attribute" data-type="text"
                     name="parameters[{{ $param_name }}][{{ $data[$i]['attribute_name'] }}][]" type="text" id="input_name" form="form-attribute" required>
              	<label class="mdl-textfield__label" for="input_name">{{ $data[$i]['value_label'] }}</label>
          	</div>
  		</div>
    @endfor
	</div>
</template>