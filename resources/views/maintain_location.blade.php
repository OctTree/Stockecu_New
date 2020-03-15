@extends('layouts.app')

@section('content')
    <div class="modal fade" id="addmodal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Add Location</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-5">
                        <label class="pull-right" for="location_name" style="margin-top:10px;">Location Name : </label>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control " id="location_add_text" type="text" placeholder="Enter New Location Name" style="width: 300px;" />
                    </div>
                    <div class="col-m-1"></div>
                </div>
            </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="add_location" data-dismiss="modal">Save</button>
            </div>
            
        </div>
        </div>
    </div>
    <div class="modal fade" id="editmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Edit Location</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <label class="pull-right" for="location_name" style="margin-top:10px;">Location Name : </label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control " id="location_edit_text" type="text" placeholder="Enter New Location Name" style="width: 300px;" />
                        </div>
                        <div class="col-m-1 hidden_edit"></div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="edit_location_btn" data-dismiss="modal">Save</button>
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
                        <th style="width:10%">No</th>
                        <th>Location Name</th>
                        <th style="width:15%">Action</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td id="{{ $location->id }}">{{ $location->location_name }}</td>
                        <td> 
                            <button class="btn btn-primary" id="delete_location_btn">Delete</button>
                            <button class="btn btn-primary edit_btn" data-toggle="modal" data-target="#editmodal" val="{{ $location->id }}">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $locations->render() }}
        </div>
    </div>
    <script src="../../assets/custom/location.js"></script>
@endsection