@component('jobs.attributes.template')
    @slot('name')
        pair_style
    @endslot

    <div class="mdl-grid key-val-pair">
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[pair_style][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[pair_style][style][]" required>
                        <option></option>
                        <option value="none">none</option>
                        <option value="hybrid">hybrid</option>
                        <option disabled value="hybrid/overlay">hybrid/overlay</option>
                        <option value="zero">zero</option>
                        <option value="adp">adp</option>
                        <option value="airebo">airebo</option>
                        <option disabled value="airebo/morse">airebo/morse</option>
                        <option value="beck">beck</option>
                        <option value="body">body</option>
                        <option value="bop">bop</option>
                        <option value="born">born</option>
                        <option disabled value="born/coul/long">born/coul/long</option>
                        <option disabled value="born/coul/long/cs">born/coul/long/cs</option>
                        <option disabled value="born/coul/msm">born/coul/msm</option>
                        <option disabled value="born/coul/wolf">born/coul/wolf</option>
                        <option value="brownian">brownian</option>
                        <option disabled value="brownian/poly">brownian/poly</option>
                        <option value="buck">buck</option>
                        <option disabled value="buck/coul/cut">buck/coul/cut</option>
                        <option disabled value="buck/coul/long">buck/coul/long</option>
                        <option disabled value="buck/coul/long/cs">buck/coul/long/cs</option>
                        <option disabled value="buck/coul/msm">buck/coul/msm</option>
                        <option disabled value="buck/long/coul/long">buck/long/coul/long</option>
                        <option value="colloid">colloid</option>
                        <option value="comb">comb</option>
                        <option value="comb3">comb3</option>
                        <option disabled value="coul/cut">coul/cut</option>
                        <option disabled value="coul/debye">coul/debye</option>
                        <option disabled value="coul/dsf">coul/dsf</option>
                        <option disabled value="coul/long">coul/long</option>
                        <option disabled value="coul/long/cs">coul/long/cs</option>
                        <option disabled value="coul/msm">coul/msm</option>
                        <option disabled value="coul/streitz">coul/streitz</option>
                        <option disabled value="coul/wolf">coul/wolf</option>
                        <option value="dpd">dpd</option>
                        <option disabled value="dpd/tstat">dpd/tstat</option>
                        <option value="dsmc">dsmc</option>
                        <option value="eam">eam</option>
                        <option disabled value="eam/alloy">eam/alloy</option>
                        <option disabled value="eam/fs">eam/fs</option>
                        <option value="eim">eim</option>
                        <option value="gauss">gauss</option>
                        <option value="gayberne">gayberne</option>
                        <option disabled value="gran/hertz/history">gran/hertz/history</option>
                        <option disabled value="gran/hooke">gran/hooke</option>
                        <option disabled value="gran/hooke/history">gran/hooke/history</option>
                        <option disabled value="hbond/dreiding/lj">hbond/dreiding/lj</option>
                        <option disabled value="hbond/dreiding/morse">hbond/dreiding/morse</option>
                        <option value="kim">kim</option>
                        <option value="lcbop">lcbop</option>
                        <option disabled value="line/lj">line/lj</option>
                        <option disabled value="lj/charmm/coul/charmm">lj/charmm/coul/charmm</option>
                        <option disabled value="lj/charmm/coul/charmm/implicit">lj/charmm/coul/charmm/implicit</option>
                        <option disabled value="lj/charmm/coul/long">lj/charmm/coul/long</option>
                        <option disabled value="lj/charmm/coul/msm">lj/charmm/coul/msm</option>
                        <option disabled value="lj/class2">lj/class2</option>
                        <option disabled value="lj/class2/coul/cut">lj/class2/coul/cut</option>
                        <option disabled value="lj/class2/coul/long">lj/class2/coul/long</option>
                        <option disabled value="lj/cubic">lj/cubic</option>
                        <option disabled value="lj/cut">lj/cut</option>
                        <option disabled value="lj/cut/coul/cut">lj/cut/coul/cut</option>
                        <option disabled value="lj/cut/coul/debye">lj/cut/coul/debye</option>
                        <option disabled value="lj/cut/coul/dsf">lj/cut/coul/dsf</option>
                        <option disabled value="lj/cut/coul/long">lj/cut/coul/long</option>
                        <option disabled value="lj/cut/coul/long/cs">lj/cut/coul/long/cs</option>
                        <option disabled value="lj/cut/coul/msm">lj/cut/coul/msm</option>
                        <option disabled value="lj/cut/dipole/cut">lj/cut/dipole/cut</option>
                        <option disabled value="lj/cut/dipole/long">lj/cut/dipole/long</option>
                        <option disabled value="lj/cut/tip4p/cut">lj/cut/tip4p/cut</option>
                        <option disabled value="lj/cut/tip4p/long">lj/cut/tip4p/long</option>
                        <option disabled value="lj/expand">lj/expand</option>
                        <option disabled value="lj/gromacs">lj/gromacs</option>
                        <option disabled value="lj/gromacs/coul/gromacs">lj/gromacs/coul/gromacs</option>
                        <option disabled value="lj/long/coul/long">lj/long/coul/long</option>
                        <option disabled value="lj/long/dipole/long">lj/long/dipole/long</option>
                        <option disabled value="lj/long/tip4p/long">lj/long/tip4p/long</option>
                        <option disabled value="lj/smooth">lj/smooth</option>
                        <option disabled value="lj/smooth/linear">lj/smooth/linear</option>
                        <option disabled value="lj96/cut">lj96/cut</option>
                        <option value="lubricate">lubricate</option>
                        <option disabled value="lubricate/poly">lubricate/poly</option>
                        <option value="lubricateU">lubricateU</option>
                        <option disabled value="lubricateU/poly">lubricateU/poly</option>
                        <option value="meam">meam</option>
                        <option disabled value="mie/cut">mie/cut</option>
                        <option value="morse">morse</option>
                        <option disabled value="nb3b/harmonic">nb3b/harmonic</option>
                        <option disabled value="nm/cut">nm/cut</option>
                        <option disabled value="nm/cut/coul/cut">nm/cut/coul/cut</option>
                        <option disabled value="nm/cut/coul/long">nm/cut/coul/long</option>
                        <option disabled value="peri/eps">peri/eps</option>
                        <option disabled value="peri/lps">peri/lps</option>
                        <option disabled value="peri/pmb">peri/pmb</option>
                        <option disabled value="peri/ves">peri/ves</option>
                        <option value="polymorphic">polymorphic</option>
                        <option value="reax">reax</option>
                        <option value="rebo">rebo</option>
                        <option value="resquared">resquared</option>
                        <option value="snap">snap</option>
                        <option value="soft">soft</option>
                        <option value="sw">sw</option>
                        <option value="table">table</option>
                        <option value="tersoff">tersoff</option>
                        <option disabled value="tersoff/mod">tersoff/mod</option>
                        <option disabled value="tersoff/zbl">tersoff/zbl</option>
                        <option disabled value="tip4p/cut">tip4p/cut</option>
                        <option disabled value="tip4p/long">tip4p/long</option>
                        <option disabled value="tri/lj">tri/lj</option>
                        <option value="vashishta">vashishta</option>
                        <option value="yukawa">yukawa</option>
                        <option disabled value="yukawa/colloid">yukawa/colloid</option>
                        <option value="zbl">zbl</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col values" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 28px;">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[pair_style][args][]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">args</label>
            </div>
        </div>
    </div>

    {{-- without argument--}}

    <template id="pair_style-values-none">
    </template>
    <template id="pair_style-values-adp">
    </template>
    <template id="pair_style-values-comb">
    </template>
    <template id="pair_style-values-lcbop">
    </template>
    <template id="pair_style-values-meam">
    </template>
    <template id="pair_style-values-polymorphic">
    </template>
    <template id="pair_style-values-snap">
    </template>
    <template id="pair_style-values-sw">
    </template>
    <template id="pair_style-values-tersoff">
    </template>

    {{-- with text argument --}}

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'hybrid',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'airebo',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'beck',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'Rc',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'body',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'cutoff',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'bop',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'born',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'brownian',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'buck',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'colloid',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'cutoff',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'comb3',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'dpd',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'dsmc',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'eam',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'eim',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'gauss',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'cutoff',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'gayberne',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'kim',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'lubricate',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'lubricateU',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'morse',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'reax',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'rebo',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'resquared',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'cutoff',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'soft',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'cutoff',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'table',
        'param_name'  => 'pair_style',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'vashishta',
        'param_name'  => 'pair_style',
        'attribute_name' => 'args',
        'value_label' => 'args',
        ])



    {{-- with multiple text argument --}}
    @php
        $zero = [
        'values_name' => 'zero',
        'param_name'  => 'pair_style',
        'loop' =>2,
        'data' => 
            [
                [ 
                    'attribute_name' => 'cutoff',
                    'value_label' => 'cutoff'
                ],
                [ 
                    'attribute_name' => 'nocoeff',
                    'value_label' => 'nocoeff'
                ]
            ]
        ];
        $yukawa = [
        'values_name' => 'yukawa',
        'param_name'  => 'pair_style',
        'loop' =>2,
        'data' => 
            [
                [ 
                    'attribute_name' => 'kappa',
                    'value_label' => 'kappa'
                ],
                [ 
                    'attribute_name' => 'cutoff',
                    'value_label' => 'cutoff'
                ]
            ]
        ];
        $zbl = [
        'values_name' => 'zbl',
        'param_name'  => 'pair_style',
        'loop' =>2,
        'data' => 
            [
                [ 
                    'attribute_name' => 'inner',
                    'value_label' => 'inner'
                ],
                [ 
                    'attribute_name' => 'outer',
                    'value_label' => 'outer'
                ]
            ]
        ];
    @endphp

    @include('jobs.attributes.attributes_values_multiple', $zero)
    @include('jobs.attributes.attributes_values_multiple', $yukawa)
    @include('jobs.attributes.attributes_values_multiple', $zbl)

@endcomponent

@push('scripts')
    <script>
        $(document).ready(function () {
            $('body').on('change', 'select[name="parameters[pair_style][style][]"]', function (e) {
                attrName = $(this).val();
                template = $('#pair_style-values-' + attrName).clone().html();
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
