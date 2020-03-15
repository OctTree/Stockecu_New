@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <a href="/home" class="btn btn-primary pull-right">Back</a>
    </div>
    <div class="row">
        <div class="viewdetail">
                <div class="row" style="margin:5px;">
                    <div class="col-md-4">
                        <b>Last modified  :  </b> <span>{{ $items[0]->ModifiedOn }}</span>
                    </div>
                    <div class="col-md-4">
                        <b>Estimated Delivery  :  </b> <span>{{ $items[0]->EstDeliveryDate }}</span>
                    </div>
                    <div class="col-md-4">
                        <b>Buyer  :  </b> <span>{{ $items[0]->Buyer }}</span>
                    </div>
                </div>
                <div class="row" style="margin:5px;">
                    <div class="col-md-4">
                        <b>Job Number  :  </b> <span>{{ $items[0]->JobNumber }}</span>
                    </div>
                    <div class="col-md-4">
                        <b>Ship to Warehouse  :  </b> <span>{{ $items[0]->ShiptoWarehouse }}</span>
                    </div>
                    <div class="col-md-4">
                        <b>Shipped Via  :  </b> <span>{{ $items[0]->ShippedVia }}</span>
                    </div>
                </div>
                <div class="row" style="margin:5px;">
                    <div class="col-md-4">
                        <b>Job Name  :  </b> <span>{{ $items[0]->JobName }}</span>
                    </div>
                    <div class="col-md-4">
                        <b>Amount on Order  :  </b> <span>{{ $items[0]->AmountonOrder }}</span>
                    </div>
                    <div class="col-md-4">
                        <b>Project Manager  :  </b> <span>{{ $items[0]->ProjectManager }}</span>
                    </div>
                </div>
                <div class="row" style="margin:5px;">
                    <div class="col-md-4">
                        <b>Job Description  :  </b> <span>{{ $items[0]->JobDescription }}</span>
                    </div>
                    <div class="col-md-4">
                        <b>Salesperson  :  </b> <span>{{ $items[0]->Salesperson }}</span>
                    </div>
                    <div class="col-md-4">
                        <b>Item Description  :  </b> <span>{{ $items[0]->ProductDescription }}</span>
                    </div>
                </div>
                <div class="row" style="margin:5px;">
                    <div class="col-md-4">
                        <b>PO Number  :  </b> <span>{{ $items[0]->po_sub_no }}</span>
                    </div>
                    <div class="col-md-4">
                        <b>Vendor  :  </b> <span>{{ $items[0]->Vendor }}</span>
                    </div>
                    <div class="col-md-4">
                        <input type="hidden" id="item_id" value="{{ $items[0]->id }}">
                    </div>
                </div>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button id="sample_editable_1_new" class="btn green">
                                    Add New <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                            <tr>
                                <th style="width:15%;">
                                    Date
                                </th>
                                <th>
                                    QTY
                                </th>
                                <th>
                                    Location
                                </th>
                                <th>
                                    Notes
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partial_deliveries as $partial_delivery)
                        
                                    <tr>
                                        <td val="{{ $partial_delivery->id }}">{{ $partial_delivery->date }}</td>
                                        <td>{{ $partial_delivery->qty }}</td>
                                        <td>{{ $partial_delivery->location_name }}</td>
                                        <td>{{ $partial_delivery->note }}</td>
                                        <td><a class="edit" href="javascript:;">Edit </a></td>
                                        <td><a class="delete" href="javascript:;">Delete </a></td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {   
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
        TableEditable.init();
        ComponentsDropdowns.init();
    });

</script>
@endsection
