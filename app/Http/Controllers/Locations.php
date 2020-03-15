<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\item_location;

class Locations extends Controller
{
    //
    public function index(){
        $locations = DB::table('locations')->paginate(10);
        return view('maintain_location')->with('locations', $locations);
    }

    public function addLocation(Request $request){
        DB::table('locations')->insert(['location_name' => $request->location_name]);
        $location = DB::table('locations')->orderBy('id', 'DESC')->first();
        return response()->json($location);
    }
    public function editLocation(Request $request){
        DB::table('locations')->where('id',$request->id)
                              ->update(['location_name' => $request->location_name]);
        $location = DB::table('locations')->where('id',$request->id)->get();
        return $location;
    }
    public function deleteLocation(Request $request){
        DB::table('locations')->where('id',$request->id)->delete();
        return 0;
    }
}
