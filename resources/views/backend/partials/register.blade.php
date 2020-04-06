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
                            <li class="active" id="user-tab">
                            <a data-toggle="tab" href="#create-user">Users</a>
                            </li>
                            <!-- <li class="" id="role-tab">
                                <a data-toggle="tab" href="#role">Roles</a>
                            </li>
                            <li class="" id="permission-tab">
                                <a data-toggle="tab" href="#permission">Permission</a>
                            </li> -->
                        </ul>
                        </header>
                        <div class="panel-body">
                        <div class="tab-content">
                            {{-- create group --}}
                          <!--   <div id="create-group" class="tab-pane">
                                <div class="panel-body">
                                    <div class="alert" style="display:none"></div>
                                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                        @csrf

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
                            </div> -->
                            {{-- create user --}}
                            <div id="create-user" class="tab-pane active">
                                <div class="panel-body">
                                    <div class="alert" style="display:none"></div>
                                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                        @csrf

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
                                    </form>
                                </div>
                            </div>
                            
                           <!--  <div id="role" class="tab-pane">Roles</div>
                            <div id="permission" class="tab-pane">Permissions</div> -->
                        </div>
                        </div>
                    </section>
                    <!--tab nav end-->
                </section>
            </div>

            {{-- User table --}}
            <div class="col-sm-8 user-table-wrapper">
                <section class="panel user-defualt-table">
                    <header class="panel-heading">
                        User Table
                    </header>
                    <div class="table-responsive">
                        <table class="table table-striped table-advance table-hover" id="users-table">
                            <thead>
                                <tr>
                                    <td>
                                        <button type="submit" id="btn_delete_user" class="btn btn-danger btn-xs fa fa-trash-o"></button>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <input type="checkbox" value="" id="ckbCheckAll" name="user[]" />
                                    </th>
                                    <th>ID</th>
                                    <th id="display-name"><i class="icon_profile"></i> Name</th>
                                    <th id="display-email"><i class="icon_mail_alt"></i> Email</th>
                                    <th id="display-created_at"><i class="icon_calendar"></i> Created At</th>
                                    <th id="display-updated_at"><i class="icon_calendar"></i> Updated At</th>
                                    <th id="display-updated_at"><i class="icon_calendar"></i> Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </section>
            </div>

            <!-- {{-- Group table --}}
            <div class="col-sm-8 groups-table-wrapper">
                <section class="panel group-defualt-table">
                    <header class="panel-heading">
                        Group Table
                    </header>
                    <table class="table table-responsive table-striped table-advance table-hover" id="groups-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th id="display-name"><i class="icon_profile"></i> Group Name</th>
                                <th id="display-created_at"><i class="icon_calendar"></i> Created At</th>
                                <th id="display-updated_at"><i class="icon_calendar"></i> Updated At</th>
                                <th id="display-updated_at"><i class="icon_calendar"></i> Actions</th>
                            </tr>
                        </thead>
                    </table>
                </section>
            </div> -->
        </div>
    </section>
</section>
@endsection

@push('scripts')
    <script>
        // JQUERY IS READY NOW
        $(function() {
            //####### START DEFAULT/GLOBAL DISPLAY DATATABLE

            // on page load, hide user group datatable
            // $('.groups-table-wrapper').hide();
            
            // retrieve user
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatable.user.data') !!}',
                columns: [
                    { data: 'select', name: 'select', orderable:false, searchable: false },
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name:'action', orderable:false, searchable: false},
                ],
                order: [ [1, 'desc'] ],//set default sort of id as desc (big to small)
            });
            // retrieve user group
            // $('#groups-table').DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: '{!! route('admin.group.data') !!}',
            //     columns: [
            //         { data: 'id', name: 'id' },
            //         { data: 'name', name: 'name' },
            //         { data: 'created_at', name: 'created_at' },
            //         { data: 'updated_at', name: 'updated_at' },
            //         {data: 'action',name:'action'},
            //     ],
            //     order: [ [0, 'desc'] ],//set default sort of id as desc (big to small)
            // });
            //####### END DEFAULT/GLOBAL DISPLAY DATATABLE

            //####### START CLICK EVENT
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
                        // clear all input data
                        $(".input").val("");

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

            // Ajax click event on submit to create a group with Ajax
            // $('#ajaxGroup').click(function(e){
            //     e.preventDefault();

            //     var name = $("input[name=group-name]").val();

            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $.ajax({
            //         type: 'POST',
            //         url: "{{ route('admin.group.create') }}",
            //         data: {
            //             name: name,
            //         },
            //         success: function(result){
            //             // clear all input data
            //             $(".input").val("");

            //             // append message for creating successfully
            //             $('.alert').show();
            //             $('.alert').addClass('alert-success');
            //             $('.alert').removeClass('alert-danger');
            //             $('.alert').html(result.success);

            //             // reload datatable if new data is created successfully
            //             $('#groups-table').DataTable().ajax.reload(null, false );
            //         },
            //         error: function(result){
            //             $('.alert').show();
            //             $('.alert').addClass('alert-danger');
            //             $('.alert').removeClass('alert-success');
            //             $('.alert').html('Duplicated group! This group already created.');
            //         }
            //     });
            
            // });

            //click event for open user tab
            $('#user-tab').click(function(){
               // $('.groups-table-wrapper').hide();
                $('.user-table-wrapper').show();
            })

            // click event for open group tab
            // $('#group-tab').click(function(){
            //     $('.user-table-wrapper').hide();
            //     $('.groups-table-wrapper').show();

            // })

            // Ajax click event for deleting single record of user table
            $('body').on('click', '.btn_delete', function(e){
                // console.log('do delete event');
                e.preventDefault();
                var user_id = $(this).data('id');
                if(user_id !== undefined){
                    if(confirm("Are You sure want to delete !")){
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "DELETE",
                            url: "user/"+ $(this).data('id'),
                            success: function (data) {
                                console.log('success:', data);
                                // reload datatable if new data is created successfully
                                $('#users-table').DataTable().ajax.reload(null, false );
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                }
            })

            // Ajax click event for delete multi record of user table
            $("#btn_delete_user").on('click', function () {
                var id = [];
                // get each checked value of checkbox and push to an array variable
                $(".user:checked").each(function(){
                    id.push($(this).val());
                });
                // do if there is at least one row/record
                if(id.length > 0)
                {   // do Ajax deletion if confirm OK
                    if(confirm("Are you sure you want to Delete this data?"))
                    {   // excute the Ajax
                        $.ajax({
                            url:"{{ route('admin.multi.user.delete')}}",
                            method: "GET",
                            data:{ id:id },
                            success:function(data)
                            {
                                // reload datatable instead of reload page
                                $('#users-table').DataTable().ajax.reload();
                            },
                            error: function(data){
                                // alert error sentence if Ajax not success
                                alert(data);
                            }
                        });
                    }
                }
                else
                {   // alert message to check the checkbox at least one, so it can delete the record
                    alert("Please select at least one checkbox");
                }
            });

            // click event to check/uncheck all checkbox
            $("#ckbCheckAll").click(function () {
                $(".checkBoxClass").prop('checked', $(this).prop('checked'));
            });

            // click event to edit inline table
            $(document).on('click', '.btn-edit', function(){
                var current_row = $(this).closest("tr");
                var user_id = $(this).attr('id');
                var name = current_row.find("td:nth-child(3)").text();
                var email = current_row.find("td:nth-child(4)").text();
                var created_at = current_row.find("td:nth-child(5)").text()
                var updated_at = current_row.find("td:nth-child(6)").text()

                var column_checkbox = "<td><input type='checkbox' disabled /></td>";
                var column_id = "<td>" + user_id + "</td> ";
                var column_name = "<td><input type='text' name='new_name' class='form-control' style='font-size: 13px' value='"+ name +"'/></td>";
                var column_email = "<td><input type='email' name='new_email' class='form-control' style='font-size: 13px' value='"+ email +"'/></td>";
                var column_created_at = "<td>" + created_at + "</td>";
                var column_udated_at = "<td>" + updated_at + "</td>";
                
                var column_action_edit = "<a href='javascript:void(0)' class='btn btn-xs btn-success btn-update' id='"+ user_id +"'><i class='fa fa-check-square'></i></a> ";
                var column_action_delete = "<a href='javascript:void(0)' class='btn btn-xs btn-danger' disabled id='#'><i class='icon_trash_alt'></i></a> ";
                var column_action_view = "<a href='javascript:void(0)' class='btn btn-xs btn-default' disabled id='#'><i class='fa fa-eye'></i></a>";
                var column_action = "<td>" + column_action_edit + column_action_delete + column_action_view + "</td>";
 
                var edit_row_form = "<tr> " + column_checkbox + column_id + column_name + column_email + column_created_at + column_udated_at + column_action + "</tr>";
                
                current_row.replaceWith(edit_row_form);

                //make div editable
                current_row.attr('contenteditable', 'true');

                //add bg css
                current_row.attr('style', 'color: lightseagreen');

                $(this).focus();

                $('.btn-update').addClass('check-square');
            })

            // click event for switch to original edit button
            $('body').on('click', '.check-square', function(e){
                e.preventDefault();

                var user_id = $(this).attr('id');
                var name = $("input[name=new_name]").val();
                var email = $("input[name=new_email]").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('admin.user.update') }}",
                    type: 'POST',
                    data: {
                        id: user_id,
                        name: name,
                        email: email,
                    },
                    success: function(result){
                        // reload datatable if new data is created successfully
                        $('#users-table').DataTable().ajax.reload(null, false );

                        bootbox.alert({
                            title: 'Updated successfully',
                            message: "Congratulation! You have updated record. Thanks",
                            size: 'small',
                            className: 'rubberBand animated'
                        });
                    },
                    error: function(result){
                        bootbox.alert({
                            title: 'Updated unsuccessfully',
                            message: "Error: name or email is empty. Please try again. Thanks",
                            size: 'small'
                        });
                    }
                });
            })

            //####### END CLICK EVENT
        });
    </script>
@endpush


