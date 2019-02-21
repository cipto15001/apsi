 <template id="{{ $param_name }}-values-{{ $values_name }}">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
	   <label for="parameters[{{ $param_name }}][{{ $attribute_name }}][]"
	       <select data-type="options" class="input-attribute select2" form="form-attribute"
	               name="parameters[{{ $param_name }}][{{ $attribute_name }}][]" required>
	           <option></option>
	           <option value="yes">Yes</option>
	           <option value="no">No</option>
	       </select>
	   </label>
	</div>
</template>