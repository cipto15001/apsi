@extends('layouts.app')

@section('content')
    <div class="page-content" style="height: inherit;">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col mdl-shadow--2dp"
                 style="margin-left: 20px; margin-right: 20px; margin-top: 20px;">
                <header class="mdl-layout__header">
                    <div class="mdl-layout__header-row" style="padding-left: 40px;">
                        <span class="mdl-layout-title card-title">Users</span>
                        <div class="mdl-layout-spacer"></div>
                        <a href="{{ route('users.create') }}"
                           class="mdl-button mdl-js-button mdl-button--primary card-title">
                            NEW
                        </a>
                    </div>
                </header>
                <table class="mdl-data-table mdl-js-data-table" style="width: 100%;">
                    <thead>
                    <tr class="mdl-data-table__cell--non-numeric">
                        <th class="mdl-data-table__cell--non-numeric">#</th>
                        <th class="mdl-data-table__cell--non-numeric">E-Mail</th>
                        <th class="mdl-data-table__cell--non-numeric">Name</th>
                        <th class="mdl-data-table__cell--non-numeric">Join Date</th>
                        <th class="mdl-data-table__cell--non-numeric">Role</th>
                        <th class="mdl-data-table__cell--non-numeric">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(App\User::all() as $user)
                        <tr class="mdl-data-table__cell--non-numeric">
                            <td class="mdl-data-table__cell--non-numeric">{{ $loop->iteration }}</td>
                            <td class="mdl-data-table__cell--non-numeric">{{ $user->email }}</td>
                            <td class="mdl-data-table__cell--non-numeric">{{ $user->name }}</td>
                            <td class="mdl-data-table__cell--non-numeric">{{ $user->created_at->format('d F Y') }}</td>
                            <td class="mdl-data-table__cell--non-numeric">{{ $user->role }}</td>
                            <td class="mdl-data-table__cell--non-numeric">
                                {{-- <a href="#">
                                    <i class="fas fa-eye fa-fw fa-lg"></i>
                                </a> --}}
                                {{ Form::open([
                                    'url' => route('users.destroy', $user->id),
                                    'method' => 'delete'
                                ]) }}
                                <button type="submit" style="border: none; background: none; cursor: pointer;">
                                    <i class='material-icons'>delete</i>
                                </button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendors/mustache/mustache.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            let temp = '' +
                '<select class="form-control attribute-select">' +
                '@{{{ options }}}' +
                '</select>';
            let attrTemplate = '' +
                '<div class="mdl-card mdl-card--border mdl-shadow--2dp attribute-card">' +
                '<div class="attribute-card-title">@{{ attribute }}</div>  ' +
                '<div style="align: center; display: inline-block;">' +
                '<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect micro-fab add-attribute">' +
                '<i class="material-icons">add</i>' +
                '</button>' +
                '</div>' +
                '</div>' +
                '</div>';

            $('body').on('click', '.add-attribute', function () {
                let options = '', item, obj, optTemplate;
                item = $(this).parents('.mdl-list__item').find('.mdl-list__item-primary-content');
                obj = (item.data('values'));
                optTemplate = "<option value='@{{ value }}'>@{{ value }}</option>";
                $.each(obj, function (key, value) {
                    options += Mustache.render(optTemplate, {
                        value: value
                    })
                });

                console.log((options));

                $('#used-attribute').append(Mustache.render(attrTemplate, {
                    attribute: item.data('name'),
                    options: options
                }))
            })
        })
    </script>
@endpush
