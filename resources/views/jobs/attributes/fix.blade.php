@component('jobs.attributes.template')
    @slot('name')
        fix
    @endslot

    <div class="mdl-grid key-val-pair">
        <div class="mdl-cell mdl-cell--6-col" style="display: block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[fix][ID]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">ID</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 26px">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[fix][group-ID]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">group-ID</label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="parameters[fix][style]"
                       style="font-size: 0.75em; color: #b0b0b0">style
                    <select data-type="options" class="input-attribute select2" form="form-attribute"
                            name="parameters[fix][style][]" required>
                        <option></option>
                        <option value="adapt">adapt</option>
                        <option value="addforce">addforce</option>
                        <option disabled value="append/atoms">append/atoms</option>
                        <option disabled value="atom/swap">atom/swap</option>
                        <option value="aveforce">aveforce</option>
                        <option disabled value="ave/atom">ave/atom</option>
                        <option disabled value="ave/chunk">ave/chunk</option>
                        <option disabled value="ave/correlate">ave/correlate</option>
                        <option disabled value="ave/histo">ave/histo</option>
                        <option disabled value="ave/time">ave/time</option>
                        <option value="balance">balance</option>
                        <option disabled value="bond/break">bond/break</option>
                        <option disabled value="bond/create">bond/create</option>
                        <option disabled value="bond/swap">bond/swap</option>
                        <option disabled value="box/relax">box/relax</option>
                        <option value="deform">deform</option>
                        <option value="deposit">deposit</option>
                        <option value="drag">drag</option>
                        <option disabled value="dt/reset">dt/reset</option>
                        <option value="efield">efield</option>
                        <option value="ehex">ehex</option>
                        <option value="enforce2d">enforce2d</option>
                        <option value="evaporate">evaporate</option>
                        <option value="external">external</option>
                        <option value="freeze">freeze</option>
                        <option value="gcmc">gcmc</option>
                        <option value="gld">gld</option>
                        <option value="gravity">gravity</option>
                        <option value="halt">halt</option>
                        <option value="heat">heat</option>
                        <option value="indent">indent</option>
                        <option value="latte">latte</option>
                        <option value="langevin">langevin</option>
                        <option value="lineforce">lineforce</option>
                        <option value="momentum">momentum</option>
                        <option value="move">move</option>
                        <option value="msst">msst</option>
                        <option value="neb">neb</option>
                        <option value="nph">nph</option>
                        <option value="nphug">nphug</option>
                        <option disabled value="nph/asphere">nph/asphere</option>
                        <option disabled value="nph/body">nph/body</option>
                        <option disabled value="nph/sphere">nph/sphere</option>
                        <option value="npt">npt</option>
                        <option disabled value="npt/asphere">npt/asphere</option>
                        <option disabled value="npt/body">npt/body</option>
                        <option disabled value="npt/sphere">npt/sphere</option>
                        <option value="nve">nve</option>
                        <option disabled value="nve/asphere">nve/asphere</option>
                        <option disabled value="nve/asphere/noforce">nve/asphere/noforce</option>
                        <option disabled value="nve/body">nve/body</option>
                        <option disabled value="nve/limit">nve/limit</option>
                        <option disabled value="nve/line">nve/line</option>
                        <option disabled value="nve/noforce">nve/noforce</option>
                        <option disabled value="nve/sphere">nve/sphere</option>
                        <option disabled value="nve/tri">nve/tri</option>
                        <option value="nvt">nvt</option>
                        <option disabled value="nvt/asphere">nvt/asphere</option>
                        <option disabled value="nvt/body">nvt/body</option>
                        <option disabled value="nvt/sllod">nvt/sllod</option>
                        <option disabled value="nvt/sphere">nvt/sphere</option>
                        <option value="oneway">oneway</option>
                        <option disabled value="orient/bcc">orient/bcc</option>
                        <option disabled value="orient/fcc">orient/fcc</option>
                        <option value="planeforce">planeforce</option>
                        <option value="poems">poems</option>
                        <option value="pour">pour</option>
                        <option disabled value="press/berendsen">press/berendsen</option>
                        <option value="print">print</option>
                        <option disabled value="property/atom">property/atom</option>
                        <option disabled value="qeq/comb">qeq/comb</option>
                        <option disabled value="reax/bonds">reax/bonds</option>
                        <option value="restrain">restrain</option>
                        <option value="rigid">rigid</option>
                        <option disabled value="rigid/nph">rigid/nph</option>
                        <option disabled value="rigid/npt">rigid/npt</option>
                        <option disabled value="rigid/nve">rigid/nve</option>
                        <option disabled value="rigid/nvt">rigid/nvt</option>
                        <option disabled value="rigid/small">rigid/small</option>
                        <option disabled value="rigid/small/nph">rigid/small/nph</option>
                        <option disabled value="rigid/small/npt">rigid/small/npt</option>
                        <option disabled value="rigid/small/nve">rigid/small/nve</option>
                        <option disabled value="rigid/small/nvt">rigid/small/nvt</option>
                        <option value="setforce">setforce</option>
                        <option value="shake">shake</option>
                        <option value="spring">spring</option>
                        <option disabled value="spring/chunk">spring/chunk</option>
                        <option disabled value="spring/rg">spring/rg</option>
                        <option disabled value="spring/self">spring/self</option>
                        <option value="srd">srd</option>
                        <option disabled value="store/force">store/force</option>
                        <option disabled value="store/state">store/state</option>
                        <option disabled value="temp/berendsen">temp/berendsen</option>
                        <option disabled value="temp/csld">temp/csld</option>
                        <option disabled value="temp/csvr">temp/csvr</option>
                        <option disabled value="temp/rescale">temp/rescale</option>
                        <option value="tfmc">tfmc</option>
                        <option disabled value="thermal/conductivity">thermal/conductivity</option>
                        <option value="tmd">tmd</option>
                        <option value="ttm">ttm</option>
                        <option disabled value="tune/kspace">tune/kspace</option>
                        <option value="vector">vector</option>
                        <option value="viscosity">viscosity</option>
                        <option value="viscous">viscous</option>
                        <option disabled value="wall/colloid">wall/colloid</option>
                        <option disabled value="wall/gran">wall/gran</option>
                        <option disabled value="wall/harmonic">wall/harmonic</option>
                        <option disabled value="wall/lj1043">wall/lj1043</option>
                        <option disabled value="wall/lj126">wall/lj126</option>
                        <option disabled value="wall/lj93">wall/lj93</option>
                        <option disabled value="wall/piston">wall/piston</option>
                        <option disabled value="wall/reflect">wall/reflect</option>
                        <option disabled value="wall/region">wall/region</option>
                        <option disabled value="wall/srd">wall/srd</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col values" style="display: inline-block;">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top: 28px;">
                <input class="mdl-textfield__input input-attribute" data-type="text"
                       name="parameters[fix][args][]" type="text" id="input_name" form="form-attribute" required>
                <label class="mdl-textfield__label" for="input_name">args</label>
            </div>
        </div>
    </div>

    {{-- without argument--}}

    <template id="fix-values-enforce2d">
    </template>
    <template id="fix-values-freeze">
    </template>


    {{-- with text argument --}}

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'create',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'addforce',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'adapt',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

     @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'aveforce',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'balance',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'deform',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'deposit',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'drag',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'efield',
        'param_name'  => ' fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'ehex',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'evaporate',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'external',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'gcmc',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'gld',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'gravity',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])  

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'halt',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ]) 

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'heat',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ]) 

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'indent',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'latte',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ]) 

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'langevin',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ]) 

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'lineforce',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'momentum',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ]) 

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'move',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'msst',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ]) 

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'neb',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'move',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'nph',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'nphug',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'npt',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'nve',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'nvt',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'oneway',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'poems',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'pour',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'print',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'restrain',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'rigid',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'setforce',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'shake',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'spring',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'srd',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'tfmc',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'tmd',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'ttm',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'vector',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'viscosity',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    @include('jobs.attributes.attributes_values_text', [
        'values_name' => 'viscous',
        'param_name'  => 'fix',
        'attribute_name' => 'value',
        'value_label' => 'value',
        ])

    {{-- with multiple text argument --}}
    @php
        $planeforce = [
        'values_name' => 'planeforce',
        'param_name'  => 'fix',
        'loop' =>3,
        'data' => 
            [
                [ 
                    'attribute_name' => 'X',
                    'value_label' => 'X'
                ],
                [ 
                    'attribute_name' => 'Y',
                    'value_label' => 'Y'
                ],
                [ 
                    'attribute_name' => 'Z',
                    'value_label' => 'Z'
                ]
            ]
        ];
    @endphp

    @include('jobs.attributes.attributes_values_multiple', $planeforce)
    
@endcomponent

@push('scripts')
    <script>
        $(document).ready(function () {
            $('body').on('change', 'select[name="parameters[fix][style][]"]', function (e) {
                attrName = $(this).val();
                template = $('#fix-values-' + attrName).clone().html();
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

