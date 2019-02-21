<template id="{{ $name }}-parameter">
    <li id="parameter_@{{ id }}" class="mdl-card mdl-card--border mdl-shadow--2dp used-parameter-card">
        <div class="block-text">
            <span style="line-height: 60px;">{{ $name }}</span>
            <span class="param-values" style="font-weight: normal; font-size: 0.8em"></span>
        </div>
        <button class="edit-attribute" data-id="@{{ id }}" id="button_@{{ id }}">
            <i class="fas fa-chevron-right fa-xl"></i>
        </button>
    </li>
</template>

<template id="{{ $name }}-attribute">
    <div id="attribute_@{{ id }}" data-id="@{{ id }}"
         class="mdl-card mdl-card--border mdl-shadow--2dp attribute-card">
        <div class="card-text" style="height: 60px;">
            <h5 style="margin-top: 20px;">{{ $name }}</h5>
            <br>
            <h6 style="margin-top: -40px;">Attribute</h6>
        </div>
        <div style="margin-left: 20px">
            {{ $slot }}
        </div>
        <div class="mdl-card__actions mdl-card--border"
             style="border-top: 0px; padding-top: 20px; padding-bottom: 10px;">
            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect del-btn" data-id="@{{ id }}"
               style="color: #a50303">
                Delete
            </a>
        </div>
    </div>
</template>
