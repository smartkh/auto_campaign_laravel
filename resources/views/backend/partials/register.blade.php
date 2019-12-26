@extends('backend.layouts.master')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <!--overview start-->
            <h3 class="page-header"><i class="fa fa-user"></i> User Management</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="{{ url('admin') }}">Home</a></li>
                <li><i class="fa fa-user"></i>User Management</li>
            </ol>
        </div>
        <div class="row">
            {{-- User Action/control --}}
            <div class="col-sm-4">
                <section class="panel">
                    <header class="panel-heading">
                        User Control
                    </header>
                    <!--tab nav start-->
                    <section class="panel">
                        <header class="panel-heading tab-bg-primary ">
                        <ul class="nav nav-tabs">
                            <li class="" id="group-tab">
                                <a data-toggle="tab" href="#create-group">Groups</a>
                            </li>
                            <li class="active" id="user-tab">
                            <a data-toggle="tab" href="#create-user">Users</a>
                            </li>
                            <li class="" id="role-tab">
                                <a data-toggle="tab" href="#role">Roles</a>
                            </li>
                            <li class="" id="permission-tab">
                                <a data-toggle="tab" href="#permission">Permission</a>
                            </li>
                        </ul>
                        </header>
                        <div class="panel-body">
                        <div class="tab-content">
                            {{-- create group --}}
                            <div id="create-group" class="tab-pane">
                                <div class="panel-body">
                                    <div class="alert" style="display:none"></div>
                                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('group-name') ? ' has-error' : '' }}">
                                            <label for="group-name" class="col-md-4 control-label">Group Name</label>

                                            <div class="col-md-6">
                                                <input id="group-name" type="text" class="form-control" name="group-name" value="{{ old('group-name') }}" required autofocus>

                                                @if ($errors->has('group-name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary" name="form-group" id="ajaxGroup">
                                                    Create
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{-- create user --}}
                            <div id="create-user" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="alert" style="display:none"></div>
                                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary" name="form-user" id="ajaxUser">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                            <div id="role" class="tab-pane">Roles</div>
                            <div id="permission" class="tab-pane">Permissions</div>
                        </div>
                        </div>
                    </section>
                    <!--tab nav end-->
                </section>
            </div>

            {{-- User table --}}
            <div class="col-sm-8">
                <section class="panel user-defualt-table">
                    <header class="panel-heading">
                        User Table
                    </header>
                    <table class="table table-responsive table-striped table-advance table-hover" id="users-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th id="display-name"><i class="icon_profile"></i> Name</th>
                                <th id="display-email"><i class="icon_mail_alt"></i> Email</th>
                                <th id="display-created_at"><i class="icon_calendar"></i> Created At</th>
                                <th id="display-updated_at"><i class="icon_calendar"></i> Updated At</th>
                            </tr>
                        </thead>
                    </table>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection

@push('scripts')
<script>
$(function() {
    // default/global display user datatable
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatable.user.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ],
        order: [ [0, 'desc'] ],//set default sort of id as desc (big to small)
    });

    // click event on submit to create a user with Ajax
    $('#ajaxUser').click(function(e){
        e.preventDefault();

        var name = $("input[name=name]").val();
        var password = $("input[name=password]").val();
        var email = $("input[name=email]").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.user.register') }}",
            data: {
                name: name,
                password: password,
                email: email,
            },
            success: function(result){
                // append message for creating successfully
                $('.alert').show();
                $('.alert').addClass('alert-success');
                $('.alert').removeClass('alert-danger');
                $('.alert').html(result.success);

                // reload datatable if new data is created successfully
                $('#users-table').DataTable().ajax.reload(null, false );
            },
            error: function(result){
                $('.alert').show();
                $('.alert').addClass('alert-danger');
                $('.alert').removeClass('alert-success');
                $('.alert').html('Duplicated User! This user already created.');
            }
        });
       
    });

    // click event on submit to create a group with Ajax
    $('#ajaxGroup').click(function(e){
        e.preventDefault();

        var name = $("input[name=group-name]").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.group.create') }}",
            data: {
                name: name,
            },
            success: function(result){
                // append message for creating successfully
                $('.alert').show();
                $('.alert').addClass('alert-success');
                $('.alert').removeClass('alert-danger');
                $('.alert').html(result.success);

                // reload datatable if new data is created successfully
                $('#users-table').DataTable().ajax.reload(null, false );
            },
            error: function(result){
                $('.alert').show();
                $('.alert').addClass('alert-danger');
                $('.alert').removeClass('alert-success');
                $('.alert').html('Duplicated group! This group already created.');
            }
        });
       
    });

    //click event for flexible to display different datatable
    $('#user-tab').click(function(){
        $('#users-table').DataTable().clear().destroy();
        $('#display-email').show();
        $('#display-name').html('<i class="icon_profile"></i> Name');

        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatable.user.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' }
            ],
            order: [ [0, 'desc'] ],//set default sort of id as desc (big to small)
        });

    })

    $('#group-tab').click(function(){
        $('#users-table').DataTable().clear().destroy();
        $('#display-email').hide();
        $('#display-name').html('<i class="icon_profile"></i> Group Name');
    
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.group.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' }
            ],
            order: [ [0, 'desc'] ],//set default sort of id as desc (big to small)
        });
    })
});
</script>
@endpush


