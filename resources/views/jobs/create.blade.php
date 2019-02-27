@extends('layouts.app')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.material.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/jobs.css') }}">

    <link rel="stylesheet" href="{{ asset('styles/material.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/palette.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/polyfill/dialog-polyfill.css') }}">

    <style type="text/css">
        .card-line, h5 {
            margin-left: 20px;
            list-style-type: none;
        }

        .card-text h6 {
            font-weight: normal;
            font-size: 9pt;
            padding-top: 20px;
            margin-left: 20px;
        }

        .mdl-card {
            min-height: initial;
        }

        .mdl-button--fab {
            height: 30px;
            min-width: 30px;
            width: 30px;
            margin-top: 8px;
        }
    </style>
@endpush

@section('main-content')
    <div class="page-content" style="height: inherit;">
        <div class="mdl-grid" style="height: inherit;">
            <div class="mdl-cell mdl-cell--12-col" style="margin-left: 20px; margin-right: 20px; margin-top: 20px;">
                <form action="#">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="job_name" form="form-attribute"
                               id="sample3" placeholder="Job Name" required>
                        <!-- <label class="mdl-textfield__label" for="sample3">Jobs Name</label> -->
                    </div>
                    <button type="submit" form="form-attribute"
                            class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"
                            style="float: right; background-color: #fdc02f">
                        <i class="material-icons" style="margin-right: 15px;">play_arrow</i> Submit
                    </button>
                </form>
            </div>
            <div class="mdl-cell mdl-cell--4-col" style="height: 500px; overflow: auto;">
                <h4>Available</h4>
                <ul class="mdl-card mdl-card--border mdl-shadow--2dp" id="available-parameters"
                    style="border-left: 2px solid #fdc02e; min-height: 60px; padding: 0; display: block; padding-bottom: 70px;">
                    @foreach($simulation->parameters->sortBy('name') as $parameter)
                        <li class="card-line" data-name="{{ $parameter->name }}">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h6 class="card-text" style="margin-top: 10px">{{ $parameter->name }}</h6>
                                </div>
                                <div class="col-sm-3">
                                    <button class="mdl-button mdl-js-button mdl-button--fab micro-fab add-parameter"
                                            style="margin-right: 10px;">
                                        <i class="material-icons">add</i>
                                    </button>  
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mdl-cell mdl-cell--4-col" style="height: 500px; overflow: auto;">
                <h4>Used</h4>
                <ul id="used-parameters" style="padding-left: 0">

                </ul>
            </div>
            <div class="mdl-cell mdl-cell--4-col" style="height: 500px; overflow: auto;">
                <h4>Parameter</h4>
                <form action="{{ route('jobs.confirm', [$workspace->id, $simulation->slug]) }}" method="POST"
                      style="text-align: center; margin-left: 20px" id="form-attribute">
                    {{ csrf_field() }}
                </form>

                <div id="parameter-attribute" class="follow-scroll">

                </div>

            </div>
        </div>
    </div>
@endsection

@section('non-main-content')
    @foreach($simulation->parameters as $parameter)
        @include('jobs.attributes.' . $parameter->name)
    @endforeach
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('vendors/mustache/mustache.min.js') }}"></script>
    <script src="{{ asset('vendors/sortable/Sortable.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var element = $('.follow-scroll'),
                originalY = element.offset().top - 64;

            // Space between element and top of screen (when scrolling)
            var topMargin = 40;

            // Should probably be set in CSS; but here just for emphasis
            element.css('position', 'relative');

            $("main").on('scroll', function () {
                var scrollTop = $("main").scrollTop();

                element.stop(false, false).animate({
                    top: scrollTop < originalY
                        ? 0
                        : scrollTop - originalY + topMargin
                }, 300);
            });

            counter = 0;

            let temp = '' +
                '<select class="form-control attribute-select">' +
                '@{{{ options }}}' +
                '</select>';

            let attrText = ''
                + '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'
                + '<input class="mdl-textfield__input input-attribute" data-type="@{{ type }}" name="parameters[@{{ parameter_name }}][@{{ attribute_name }}]" type="text" id="input_name">'
                + '<label class="mdl-textfield__label" for="input_name">@{{ attribute_name }}</label>'
                + '</div>';

            let attrSelect = ''
                + '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'
                + '<label for="parameters[@{{ parameter_name }}][@{{ attribute_name }}]" style="font-size: 0.75em; color: #b0b0b0">@{{ attribute_name }}'
                + '<select data-type="@{{ type }}" class="input-attribute select2" name="parameters[@{{ parameter_name }}][@{{ attribute_name }}]">'
                + '<option></option>'
                + '@{{{ options }}}'
                + '</select>'
                + '</label>'
                + '</div>';

            $('body').on('click', '.del-btn', function () {
                id = $(this).data('id');
                $('#attribute_' + id).remove();
                $('#parameter_' + id).remove();
            });

            $('body').on('click', '.edit-attribute', function () {
                id = $(this).data('id');
                $('.attribute-card').hide();
                $('#attribute_' + id).show();
            });

            $('body').on('click', '.used-parameter-card', function (e) {
                if ($(e.target).is(".edit-attribute") || $(e.target).is('.fas')) {
                    return
                }

                subTitle = $(this).find('.param-values');
                if (subTitle.hasClass('hidden')) {
                    subTitle.removeClass('hidden');
                } else {
                    subTitle.addClass('hidden');
                }
            });

            $('body').on('click', '.add-parameter', function () {
                counter++;
                // let options = '', item, obj, optTemplate;
                item = $(this).parents('.card-line').find('.card-text');

                paramName = $(this).parents('.card-line').data('name');
                paramTemplate = $('template#' + paramName + '-parameter').clone().html();
                $('#used-parameters').append(Mustache.render(paramTemplate, {
                    id: counter,
                }));

                attrTemplate = $('template#' + paramName + '-attribute').clone().html();
                $('#parameter-attribute').append(Mustache.render(attrTemplate, {
                    id: counter,
                }));

                let attrName = '#attribute_' + counter;
                $(attrName).find('.select2').select2({
                    placeholder: 'select',
                    width: '100%',
                    theme: 'material',
                    minimumResultsForSearch: Infinity
                });

                $(attrName).find(".select2-selection__arrow")
                    .addClass("material-icons")
                    .html("arrow_drop_down");

                componentHandler.upgradeDom();

                var el = document.getElementById('used-parameters');
                var sortable = Sortable.create(el, {
                    animation: 150
                });
            });

            // attach event listener on change when attribute added to DOM
            $(document).on('change', '.input-attribute', function () {
                parent = $(this).parents('.attribute-card');
                id = parent.data('id');

                attributes = parent.find('.input-attribute');
                values = [];
                _.each(attributes, function (attribute) {
                    val = $(attribute).val();
                    if ($(attribute).attr('data-type') == 'text') {
                        val = "<span style='color: #fdc02f;'>" + val + "</span>";
                    }
                    values.push(val);
                });

                params = _.join(values, ' ');
                if (params.replace(/(<([^>]+)>)/ig, "").length >= 16) {
                    params = "<br>" + params;
                }
                $('#parameter_' + id).find('.param-values').html(params);
            });
        });
    </script>
    <style type="text/css">
        .mdl-card {
            min-height: none;
        }
    </style>
@endpush
