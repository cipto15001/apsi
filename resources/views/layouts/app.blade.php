<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>APSI</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('vendors/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('vendors/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet"> --}}

    <!-- Waves Effect Css -->
    <link href="{{ asset('vendors/node-waves/waves.css') }}" rel="stylesheet"/>

    <!-- Animation Css -->
    <link href="{{ asset('vendors/animate-css/animate.css') }}" rel="stylesheet"/>

    <!-- Morris Chart Css-->
    <link href="{{ asset('vendors/morrisjs/morris.css') }}" rel="stylesheet"/>

    <!-- Custom Css -->
    <link href="{{ asset('styles/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('styles/themes/all-themes.css') }}" rel="stylesheet"/>

    @stack('styles')
</head>

<body class="theme-amber">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>
            @php
                $texts = [
                    'Will Be Landing Soon',
                    'Harvesting Eggs',
                    'Summoning Phantoms',
                    'Howling at the Moon',
                    'Purging Heretics',
                    'Almost There'
                ];
            @endphp
            {{ array_random($texts) }}
        </p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ route('workspaces.index') }}">APSI</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                <!-- #END# Call Search -->
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->

<section>
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right">
        </ul>
        <div class="tab-content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12">
                        <div class="profile-card">
                            <div class="profile-header">&nbsp;</div>
                            <div class="profile-body">
                                <div class="image-area">
                                    <img src="{{ asset('img/user-lg.jpg') }}" alt="AdminBSB - Profile Image" />
                                </div>
                                <div class="content-area">
                                    <h3>{{ auth()->user()->name }}</h3>
                                    <p>{{ auth()->user()->email }}</p>
                                    <p>{{ ucfirst(auth()->user()->role) }}</p>
                                </div>
                            </div>
                            <div class="profile-footer">
                                <form method="POST" action="{{ route('logout') }}">
                                    <!-- <div class="pink"></div> -->
                                    {{ csrf_field() }}
                                    <button class="btn btn-success btn-block" type="button" data-toggle="modal"
                                    data-target="#changeEmail">Change Email</button>
                                    <button class="btn btn-primary btn-block" type="button" data-toggle="modal"
				    data-target="#changePassword">Change Password</button>
				    @if(auth()->user()->role == 'admin')
				    	<button class="btn btn-primary btn-block" type="button" data-toggle="modal"
                                    data-target="#addUser">Add User</button>

				    @endif
                                    <button class="btn btn-danger btn-block" type="submit">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div role="tabpanel" class="tab-pane fade in active in active">
                <ul class="demo-choose-skin">
                    <li data-theme="pink">
                        <form method="POST" action="{{ route('logout') }}">
                            <!-- <div class="pink"></div> -->
                            {{ csrf_field() }}
                            <button class="btn btn-primary btn-sm" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div> --}}
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    <div class="container-fluid">
        @yield('the-menu')
        @yield('main-content')
    </div>
</section>
<!-- #END# Page Loader -->
@yield('non-main-content')
    <div class="modal fade" id="changeEmail" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue-grey">
                    <h3>
                        Edit Email
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="body">
                            <div id="error-email" style="display: none;" class="alert alert-danger"></div>
                            <div id="success-email" style="display: none;" class="alert alert-success">Your email has been successfully changed!</div>
                            {{ csrf_field() }}
                            <label for="title">New Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="newEmail" class="form-control" required
                                        placeholder="Input new email">
                                </div>
                            </div>
                            <label for="description">Confirm New Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="confirmEmail" class="form-control" required
                                        placeholder="Input confirmation email">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect bg-amber change-email">Change
                    </button>
                    <button type="button" class="btn btn-danger waves-effect bg-red" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue-grey">
                    <h3>
                        Edit Password
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="body">
                            <div id="error-password" style="display: none;" class="alert alert-danger"></div>
                            <div id="success-password" style="display: none;" class="alert alert-success">Your password has been successfully changed!</div>
                            <label for="title">Old Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="oldPassword" class="form-control" required
                                        placeholder="Input old password">
                                </div>
                            </div>
                            <label for="description">New Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="newPassword" class="form-control" required
                                        placeholder="Input new password">
                                </div>
                            </div>
                            <label for="description">Confirmation Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="confirmNewPassword" class="form-control" required
                                        placeholder="Input confirmation password">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="utton" class="btn btn-success waves-effect bg-amber change-password">Change
                    </button>
                    <button type="button" class="btn btn-danger waves-effect bg-red" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue-grey">
                    <h3>
                        Add New User
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="body">
                            <div id="error-add-user" style="display: none;" class="alert alert-danger"></div>
                            <div id="success-add-user" style="display: none;" class="alert alert-success">New user added successfully!</div>
                            {{ csrf_field() }}
                            <label for="title">User's Fullname</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="userFullname" class="form-control" required
                                        placeholder="Input user's fullname">
                                </div>
                            </div>
			    <label for="title">User's Email</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="userEmail" class="form-control" required
                                        placeholder="Input user's email">
                                </div>
                            </div>

			    <label for="description">User's Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" id="userPassword" class="form-control" required
                                        placeholder="Input user's password">
                                </div>
			    </div>
			    <label for="role">User's Role</label>
			    <div class="form-group">
                            	<div class="form-line">
				    <select id="userRole" class="form-control show-tick" required>                                        				      		      <option value="admin">Administrator</option>
					<option value="user">User</option>
                                    </select>
                            	</div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect bg-amber add-user">Add
                    </button>
                    <button type="button" class="btn btn-danger waves-effect bg-red" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<!-- Jquery Core Js -->
<script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('vendors/bootstrap/js/bootstrap.js') }}"></script>

<!-- Select Plugin Js -->
{{-- <script src="{{ asset('vendors/bootstrap-select/js/bootstrap-select.js') }}"></script> --}}

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('vendors/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('vendors/node-waves/waves.js') }}"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="{{ asset('vendors/jquery-countto/jquery.countTo.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('scripts/admin.js') }}"></script>
{{--<script src="{{ asset('scripts/pages/index.js') }}"></script>--}}

<!-- Demo Js -->
<script src="{{ asset('scripts/demo.js') }}"></script>
<script src="{{ asset('scripts/material.min.js') }}"></script>
<script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
@stack('scripts')
<script type="module">
    $(document).ready(function() {
        let PORT = window.location.port
        let BASE_URL = window.location.protocol + '//' + window.location.hostname
        if (PORT != '')
            BASE_URL = BASE_URL + ':' + PORT
        let _token = $("input[name='_token']").val()
        console.log(BASE_URL)
        $("button.change-email").click(function() {
            let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            let newEmail = $('#newEmail').val()
            let confirmEmail = $('#confirmEmail').val()
            
            if (newEmail == '' || confirmEmail == '') {
                $('#error-email').text('Fields cannot be empty!')
                $('#error-email').show('blind')
            } else if (!re.test(String(newEmail).toLowerCase()) || !re.test(String(confirmEmail).toLowerCase())) {
                $('#error-email').text('Invalid email format! Please use standard email format!')
                $('#error-email').show('blind')
            } else {
                if (newEmail != confirmEmail) {
                    $('#error-email').html('<strong>New Email</strong> field and <strong>Confirm New Email</strong> field didn\'t match!')
                    $('#error-email').show('blind')
                } else {
                    $('#error-email').hide('blind')
                    $.ajax({
                        method: 'PUT',
                        data: {
                            email: newEmail,
                            _token: _token
                        },
                        dataType: 'json',
                        url: BASE_URL + '/user/change_email',
                        success: function(data) {
                            $('#success-email').show('blind')
                            window.setTimeout(function() {
                                window.location.reload()
                            }, 2000);
                        },
                        error: function(error) {
                            console.error(error)
                        }
                    })
                }
            }
        })

        $("button.change-password").click(function() {
            let oldPassword = $('#oldPassword').val()
            let newPassword = $('#newPassword').val()
            let confirmNewPassword = $('#confirmNewPassword').val()

            if (oldPassword == '' || newPassword == '' || confirmNewPassword == '') {
                $('#error-password').text('Fields cannot be empty!')
                $('#error-password').show('blind')
            } else if (newPassword != confirmNewPassword) {
                $('#error-password').html('<strong>New Password</strong> didn\'t match the <strong>Confirmation Password</strong>!')
                $('#error-password').show('blind')
            } else {
                $('#error-password').hide('blind')
                    $.ajax({
                        method: 'GET',
                        data: {
                            oldPassword: oldPassword,
                        },
                        dataType: 'json',
                        url: BASE_URL + '/user/check_old_password',
                        success: function(data) {
                            if (data == 'NOT_FOUND') {
                                $('#error-password').html('<strong>Old Password</strong> is wrong!')
                                $('#error-password').show('blind')
                            } else {
                                $('#error-password').hide('blind')
                                $.ajax({
                                    method: 'PUT',
                                    data: {
                                        _token: _token,
                                        newPassword: newPassword
                                    },
                                    dataType: 'json',
                                    url: BASE_URL + '/user/change_password',
                                    success: function(data) {
                                        $('#success-password').show('blind')
                                        window.setTimeout(function() {
                                            window.location.reload()
                                        }, 2000);
                                    },
                                    error: function(error) {
                                        console.error(error)
                                        $('#error-password').html('Unknown error occured!')
                                        $('#error-password').show('blind')
                                    }
                                })
                            }
                        },
                        error: function(error) {
                            console.error(error)
                        }
                    })
            }
	})

	$('button.add-user').click(function() {
	    let userFullname = $('#userFullname').val()
            let userEmail = $('#userEmail').val()
	    let userPassword = $('#userPassword').val()
	    let userRole = $('#userRole').find(':selected').val()
	    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	    if (!re.test(String(userEmail).toLowerCase())) {
		$('#error-add-user').text('Invalid email format!')
	    	$('#error-add-user').show('blind')
	    } else if (userFullname === '') {
		$('#error-add-user').text('Please fill the User\'s Fullname field!')
	    	$('#error-add-user').show('blind')
	    } else if (userEmail === '') {
		$('#error-add-user').text('User\'s Email field cannot be empty!')
	    	$('#error-add-user').show('blind')
	    } else if (userPassword === '') {
		$('#error-add-user').text('User\s Password field cannot be empty!')
	    	$('#error-add-user').show('blind')
	    } else {
		$('#error-add-user').hide('blind')
		    $.ajax({
                        method: 'GET',
                        data: {
                            email: userEmail,
                        },
                        dataType: 'json',
                        url: BASE_URL + '/user/check_email',
                        success: function(data) {
                            if (data == 'OK') {
                                $('#error-add-user').html('Email is already taken!')
                                $('#error-add-user').show('blind')
                            } else {
                                $.ajax({
                        	    method: 'POST',
                        		data: {
			   		    fullname: userFullname,
			    		    email: userEmail,
					    password: userPassword,
					    role: userRole,
			    		    _token: _token
                        		},
                        		dataType: 'json',
                        		url: BASE_URL + '/user/add_new_user',
                        		success: function(data) {
			    		    $('#success-add-user').show('blind')
					},
                        		error: function(error) {
                            		    console.error(error)
                        		}
	    	   		 })
                            }
                        },
                        error: function(error) {
                            console.error(error)
                        }
                    })   
		    
	    }

	})
    })
</script>
</body>
</html>
