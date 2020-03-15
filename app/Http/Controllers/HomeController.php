<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\item_location;
use App\Partial_delivery;
use JavaScript;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getItem(){
        return $items = item_location::orderBy('ModifiedOn', 'desc')->paginate(25);
    }
    public function index()
    {
        $items = $this->getItem();
        DB::statement(DB::raw('set @raw:=0'));
        $amount_items = item_location::select(DB::raw('@row:=@row+1 as rowNumber'))->get();
        $partial_deliveries = DB::table('partial_deliveries')
                                ->join('locations','partial_deliveries.locations_id', 'locations.id')
                                ->join('item_locations', 'partial_deliveries.item_locations_id','item_locations.id')
                                ->select('partial_deliveries.*', 'locations.location_name','item_locations.*')
                                ->get();
        // dd($partial_deliveries); die();
        return view('home')->with('items',$items)->with('amount_items',count($amount_items))->with('partial_deliveries', $partial_deliveries)->with('message','');
    }
    public function viewdetail($id){
        $items = DB::table('item_locations')->where('id', $id)->get();
        $partial_deliveries = DB::table('partial_deliveries')
                                ->where('item_locations_id', $id)
                                ->join('locations','partial_deliveries.locations_id', 'locations.id')
                                ->join('item_locations', 'partial_deliveries.item_locations_id','item_locations.id')
                                ->select('partial_deliveries.*', 'locations.location_name')
                                ->orderBy('date','desc')
                                ->get();
        $locations = DB::table('locations')->get();

        JavaScript::put([
            'locations' => $locations,
        ]);
        return view('viewdetail')->with('items', $items)->with('partial_deliveries', $partial_deliveries)->with('locations', $locations);
    }

    public function editTable(Request $request){
        if($request->type == 'add'){
            DB::table('partial_deliveries')->insert(['item_locations_id' => $request->item_location_id,
                                                     'locations_id' => $request->locations_id,
                                                     'qty' => $request->qty,
                                                     'date' => $request->date,
                                                     'note' => $request->note]);
        }
        elseif($request->type == 'edit'){
            DB::table('partial_deliveries')->where('id', $request->id)
                                           ->update(['item_locations_id' => $request->item_location_id,
                                           'locations_id' => $request->locations_id,
                                           'qty' => $request->qty,
                                           'date' => $request->date,
                                           'note' => $request->note
                                           ]);
        } 
        return 0;
    }

    public function deleteTable(Request $request){
        DB::table('partial_deliveries')->where('id', $request->id)
                                       ->delete();
        return 0;
    }
}

