@extends('layouts.app')

@section('content')
<div class="modal fade" id="addmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Add User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="pull-right" for="" style="margin-top:10px;">User Name : </label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control " id="user_add_name" type="text" placeholder="Enter New User Name" style="width: 300px;" />
                        </div>
                        <div class="col-m-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="pull-right" for="" style="margin-top:10px;">Email : </label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control " id="user_add_email" type="text" placeholder="Enter New Email Address" style="width: 300px;" />
                        </div>
                        <div class="col-m-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="pull-right" for="pass" style="margin-top:10px;">Password : </label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control " id="user_add_password" type="password" placeholder="Enter New Password" style="width: 300px;" />
                        </div>
                        <div class="col-m-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="pull-right" for="location_name" style="margin-top:10px;">Role : </label>
                        </div>
                        <div class="col-md-6">
                            <select name="" id="roleName_add" class="form-control" style="width: 300px;">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-m-2"></div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="add_user" data-dismiss="modal">Save</button>
            </div>
            
        </div>
    </div>
</div>
<div class="modal fade" id="editmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Add User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="pull-right" for="" style="margin-top:10px;">User Name : </label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control " id="user_edit_name" type="text" placeholder="Enter New User Name" style="width: 300px;" />
                        </div>
                        <div class="col-m-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="pull-right" for="" style="margin-top:10px;">Email : </label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control " id="user_edit_email" type="text" placeholder="Enter New Email Address" style="width: 300px;" />
                        </div>
                        <div class="col-m-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="pull-right" for="pass" style="margin-top:10px;">Password : </label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control " id="user_edit_password" type="password" placeholder="Enter New Password" style="width: 300px;" />
                        </div>
                        <div class="col-m-2"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="pull-right" for="" style="margin-top:10px;">Role : </label>
                        </div>
                        <div class="col-md-6">
                            <select name="" id="roleName_edit" class="form-control" style="width: 300px;">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-m-2"></div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="edit_user" data-dismiss="modal">Save</button>
            </div>
            
        </div>
    </div>
</div>

<div class="table-wrapper">
    <div class="table-responsive">
        
        <table class="table table-striped table-hover table-bordered" id="">
            <div class="btn-group">
                <button  class="btn green" data-toggle="modal" data-target="#addmodal" style="background-color:green!important;">
                Add New <i class="fa fa-plus"></i>
                </button>
            </div>
            <hr>
            <thead>
                <tr>
                    <th style="width:5%">No</th>
                    <th style="width:15%">User Name</th>
                    <th style="width:15%">Email</th>
                    <th>Password</th>
                    <th style="width:10%">Role</th>
                    <th style="width:15%">Action</th>
                </tr>
            </thead>
            <tbody> 
                <?php $num = 1;?>
                @foreach($users as $user)
                <tr>
                    <td>{{ $num }}</td>
                    <td id="{{ $user->id }}">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td val="{{ $user->role_id }}">
                        @foreach($roles as $role)
                        @if($role->id == $user->role_id)
                            {{ $role->role_name }}
                        @endif
                        @endforeach
                    </td>
                    <td> 
                        <button class="btn btn-primary" id="delete_user_btn">Delete</button>
                        <button class="btn btn-primary edit_btn" id="edit_user_btn" data-toggle="modal" data-target="#editmodal" val="{{ $user->id }}">Edit</button>
                    </td>
                </tr>
                <?php $num++;?>
                @endforeach
            </tbody>
        </table>
    </div>
</div> 
<script src="../../assets/custom/user_manage.js"></script>
@endsection