@extends('layouts.app')

@section('content')
<div class="table-wrapper">
    <div class="table-filter">
        <div class="row">
            <div class="col-sm-2">
                <button type="button" id="print_btn" class="btn btn-outline-dark" style="width:70px!important; float:left!important;"><i class="fa fa-print"></i></button>
            </div>
            <div class="col-sm-10">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    <div class="filter-group">
                        {{-- <label>Name</label> --}}
                        <input type="text" class="form-control" name="text">
                    </div>
                    <div class="filter-group">
                        {{-- <label>Field</label> --}}
                        <select class="form-control input-medium" name="field">
                            <option>Job# or Po#</option>
                            <option>Product Description</option>
                            <option>Job Name or Job Description</option>
                            <option>Salesperson</option>
                            <option>Purchaser</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="modify">ModifiedOn : </label>
                        <input type="date" class="form-control" name="date"/>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @if(isset($items))
        <table class="table table-striped table-hover table-bordered" id="sample1">
            <thead>
                <tr>
                    <th><input type="checkbox" id="ckbCheckAll"  style="width:15px; height:15px ;"/></th>
                    <th>Sub_Number </th>
                    <th>
                        Sub_Id
                    </th>
                    <th>
                        Modified On
                    </th>
                    <th>
                        Job Number
                    </th>
                    <th>
                        Job Name
                    </th>
                    <th>
                        Job Description
                    </th>
                    <th >
                        Product Description
                    </th>
                    <th>
                        Salesperson
                    </th>
                    <th>
                        Buyer
                    </th>
                    <th>
                        Posubitemline
                    </th>
                    <th>
                        Warehouse Location
                    </th>
                    <th>
                        Vendor
                    </th>
                    <th>
                        Shipped Via
                    </th>
                    <th>
                        Amount of Order
                    </th>
                    <th>
                        Unit of Measure
                    </th>
                    <th>
                        Reference
                    </th>
                    <th>
                        Est Delivery Date
                    </th>
                    <th>
                        Wharehouse Notes
                    </th>
                    <th>
                        Ship to Wharehouse
                    </th>
                    <th>
                        Complete Received(Date)
                    </th>
                    <th>
                        Complete Received(QTY)
                    </th>
                    <th>
                        Email Address
                    </th>
                    <th>
                        Project Manager
                    </th>
                    <th>
                        Project Manager Email
                    </th>
                    <th>
                        SSMA_TimeStamp
                    </th>
                    <th class="fixed-side">Action</th>
                </tr>
            </thead>
            <tbody id="editable">                               

                    @foreach($items as $item)
                    <tr>
                        <td val="{{ $item->id }}">
                                <input type="checkbox" class="case" name="username" value="{{ $item->id }}" style="width:15px; height:15px ;"/>
                        </td>
                        <td>
                                {{ $item->po_sub_no }}
                        </td>
                        <td>
                                {{ $item->po_sub_id }}
                        </td>
                        <td>
                                {{ $item->ModifiedOn }}
                        </td>
                        <td>
                                {{ $item->JobNumber }}
                        </td>
                        <td>
                                {{ $item->JobName }}
                        </td>
                        <td>
                                {{ $item->JobDescription }}
                        </td>
                        <td>
                                {{ $item->ProductDescription }}
                        </td>
                        <td>
                                {{ $item->Salesperson }}
                        </td>
                        <td>
                                {{ $item->Buyer }}
                        </td>
                        <td>
                                {{ $item->posubitemline }}
                        </td>
                        <td>
                                {{ $item->WarehouseLocation }}
                        </td>
                        <td>
                                {{ $item->Vendor }}
                        </td>
                        <td>
                                {{ $item->ShippedVia }}
                        </td>
                        <td>
                                {{ $item->AmountonOrder }}
                        </td>
                        <td>
                                {{ $item->UnitofMeasure }}
                        </td>
                        <td>
                                {{ $item->Reference }}
                        </td>
                        <td>
                                {{ $item->EstDeliveryDate }}
                        </td>
                        <td>
                                {{ $item->WarehouseNotes }}
                        </td>
                        <td>
                                {{ $item->ShiptoWarehouse }}
                        </td>
                        <td>
                                {{ $item->CompleteReceived_Date }}
                        </td>
                        <td>
                                {{ $item->CompleteReceived_QTY }}
                        </td>
                        <td>
                                {{ $item->EmailAddress }}
                        </td>
                        <td>
                                {{ $item->ProjectManager }}
                        </td>
                        <td>
                                {{ $item->ProjectManagerEmail }}
                        </td>
                        <td>
                                {{ $item->SSMA_TimeStamp }}
                        </td>
                        <td class="fixed-side"><a href="{{ url('home/viewdetail/').'/'.$item->id }}" type="button" class="btn" title="View Details" data-toggle="tooltip">Maintain</a></td>
                            @foreach($partial_deliveries as $partial_delivery)
                                @if($partial_delivery->item_locations_id ==$item->id)
                                <td class="hidden">{{ $partial_delivery->date}}</td>
                                <td class="hidden">{{ $partial_delivery->qty }}</td>
                                @endif
                            @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="clearfix" style="margin-top:20px;">
        <div class="hint-text">Showing from <b id="hint_from"></b> to <b id="hint_to"></b> out of <b>{{ $amount_items }}</b> entries</div>
        <div class="row"  >
                {{ $items->render() }}
                @else 
                <div class="col-md-4"></div>
                <div class="col-md-4" style="text-align:center;"><h4><b>{{ $message }}</b></h4></div>
                <div class="col-md-4"> <a href="/home" class="btn btn-close" style="background-color:#dcdbdb!important;">Back</a></div>
                @endif
        </div>
    </div>
</div>
<script src="../../assets/custom/jquery-barcode.js"></script>
<script src="../../assets/custom/print.js"></script>
@endsection
 