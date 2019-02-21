@extends('layouts.app')

@section('main-content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-teal">
                        <h2>
                            Convert PNG to CVT
                        </h2>
                        <smal>Make sure you upload to "resources" folder, output will be saved to "input" folder</smal>
                    </div>
                    <div class="body">
                        <form action="{{ route('workspaces.png2cvt.do_convert', $workspace) }}" method="POST">
                            {{ csrf_field() }}
                            <label for="upload">File Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="input" class="form-control show-tick" required>
                                        @foreach ($files as $file)
                                            <option value="{{ $file }}">{{ $file }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label for="output">File Name</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input id="output" name="output" type="text" class="form-control" placeholder="Output file Name, default input file name">
                                    </div>
                                    <span class="input-group-addon">.lmp</span>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-teal m-t-15 waves-effect"><i class="material-icons">cached</i><span>Convert</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
