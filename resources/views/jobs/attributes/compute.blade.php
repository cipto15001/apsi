@component('jobs.attributes.template')
    @slot('name')
        compute
    @endslot

    <div class="mdl-grid key-val-pair">
        <div class="mdl-cell mdl-cell--6-col" style="display: block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[compute][ID]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">ID</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[compute][group-ID]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">group-ID</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[compute][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[compute][style][]" required>
                        <option></option>
                        <option disabled value="aggregate/atom">aggregate/atom</option>
                        <option disabled value="angle/local">angle/local</option>
                        <option disabled value="angmom/chunk">angmom/chunk</option>
                        <option disabled value="body/local">body/local</option>
                        <option value="bond">bond</option>
                        <option disabled value="bond/local">bond/local</option>
                        <option disabled value="centro/atom">centro/atom</option>
                        <option disabled value="chunk/atom">chunk/atom</option>
                        <option disabled value="cluster/atom">cluster/atom</option>
                        <option disabled value="cna/atom">cna/atom</option>
                        <option value="com">com</option>
                        <option disabled value="com/chunk">com/chunk</option>
                        <option disabled value="contact/atom">contact/atom</option>
                        <option disabled value="coord/atom">coord/atom</option>
                        <option disabled value="damage/atom">damage/atom</option>
                        <option disabled value="dihedral/local">dihedral/local</option>
                        <option disabled value="dilatation/atom">dilatation/atom</option>
                        <option disabled value="displace/atom">displace/atom</option>
                        <option disabled value="erotate/asphere">erotate/asphere</option>
                        <option disabled value="erotate/rigid">erotate/rigid</option>
                        <option disabled value="erotate/sphere">erotate/sphere</option>
                        <option disabled value="erotate/sphere/atom">erotate/sphere/atom</option>
                        <option disabled value="event/displace">event/displace</option>
                        <option disabled value="fragment/atom">fragment/atom</option>
                        <option disabled value="group/group">group/group</option>
                        <option value="gyration">gyration</option>
                        <option disabled value="gyration/chunk">gyration/chunk</option>
                        <option disabled value="heat/flux">heat/flux</option>
                        <option disabled value="hexorder/atom">hexorder/atom</option>
                        <option disabled value="improper/local">improper/local</option>
                        <option disabled value="inertia/chunk">inertia/chunk</option>
                        <option value="ke">ke</option>
                        <option disabled value="ke/atom">ke/atom</option>
                        <option disabled value="ke/rigid">ke/rigid</option>
                        <option value="msd">msd</option>
                        <option disabled value="msd/chunk">msd/chunk</option>
                        <option disabled value="msd/nongauss">msd/nongauss</option>
                        <option disabled value="omega/chunk">omega/chunk</option>
                        <option disabled value="orientorder/atom">orientorder/atom</option>
                        <option value="pair">pair</option>
                        <option disabled value="pair/local">pair/local</option>
                        <option value="pe">pe</option>
                        <option disabled value="pe/atom">pe/atom</option>
                        <option disabled value="plasticity/atom">plasticity/atom</option>
                        <option value="pressure">pressure</option>
                        <option disabled value="property/atom">property/atom</option>
                        <option disabled value="property/local">property/local</option>
                        <option disabled value="property/chunk">property/chunk</option>
                        <option value="rdf">rdf</option>
                        <option value="reduce">reduce</option>
                        <option disabled value="reduce/region">reduce/region</option>
                        <option disabled value="rigid/local">rigid/local</option>
                        <option value="slice">slice</option>
                        <option disabled value="sna/atom">sna/atom</option>
                        <option disabled value="snad/atom">snad/atom</option>
                        <option disabled value="snav/atom">snav/atom</option>
                        <option disabled value="stress/atom">stress/atom</option>
                        <option value="temp">temp</option>
                        <option disabled value="temp/asphere">temp/asphere</option>
                        <option disabled value="temp/body">temp/body</option>
                        <option disabled value="temp/chunk">temp/chunk</option>
                        <option disabled value="temp/com">temp/com</option>
                        <option disabled value="temp/deform">temp/deform</option>
                        <option disabled value="temp/partial">temp/partial</option>
                        <option disabled value="temp/profile">temp/profile</option>
                        <option disabled value="temp/ramp">temp/ramp</option>
                        <option disabled value="temp/region">temp/region</option>
                        <option disabled value="temp/sphere">temp/sphere</option>
                        <option value="ti">ti</option>
                        <option disabled value="torque/chunk">torque/chunk</option>
                        <option value="vacf">vacf</option>
                        <option disabled value="vcm/chunk">vcm/chunk</option>
                        <option disabled value="voronoi/atom">voronoi/atom</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col values" style="display: inline-block;">
        </div>
    </div>
    <template id="compute-values-bond">
    </template>
    <template id="compute-values-vacf">
    </template>
    <template id="compute-values-com">
    </template>
    <template id="compute-values-gyration">
    </template>

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'temp',
        'param_name'  => 'compute',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'ti',
        'param_name'  => 'compute',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'slice',
        'param_name'  => 'compute',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'reduce',
        'param_name'  => 'compute',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'rdf',
        'param_name'  => 'compute',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'pressure',
        'param_name'  => 'compute',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'pe',
        'param_name'  => 'compute',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'pair',
        'param_name'  => 'compute',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'msd',
        'param_name'  => 'compute',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'ke',
        'param_name'  => 'compute',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

@endcomponent

@push('scripts')
    <script>
        $(document).ready(function () {
            $('body').on('change', 'select[name="parameters[compute][style][]"]', function (e) {
                attrName = $(this).val();
                template = $('#compute-values-' + attrName).clone().html();
                $(this).parents('.key-val-pair').find('.values').html(Mustache.render(template));

                $(this).parents('.key-val-pair').find('.values select.select2').select2({
                    placeholder: 'select',
                    width: '100%',
                    theme: 'material',
                    minimumResultsForSearch: Infinity
                });

                componentHandler.upgradeDom();
            });
        });
    </script>
@endpush

