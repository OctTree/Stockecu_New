<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_location extends Model
{
    //
    protected $fillable = [
        'po_sub_no','po_sub_id','posubitemline','WarehouseLocation','ModifiedOn','JobDescription','Vendor',
        'ShippedVia','AmountonOrder','UnitofMeasure','Salesperson','Reference','Buyer','JobNumber','ProductDescription',
        'EstDeliveryDate','WarehouseNotes','ShiptoWarehouse','JobName','CompleteReceived_Date','CompleteReceived_QTY',
        'EmailAddress','ProjectManager','ProjectManagerEmail','SSMA_TimeStamp',
    ];
}
