<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\item_location;
class SearchController extends Controller
{
    //
    public function index(){
        $text = Input::get('text');
        $field = Input::get('field');
        $date = Input::get('date');
        switch($field){
            case "Job# or Po#":
                $field = 'Job# or Po#';
            break;
            case "Product Description":
                $field = 'ProductDescription';
            break;
            case "Job Name or Job Description":
                $field = 'Job Name or Job Description';
            break;
            case "Salesperson":
                $field = 'Salesperson';
            break;
            case "Purchaser":
                $field = 'Buyer';
            break;
        }
        
        if($date){
            if($text ==''){
                $items = item_location::where('ModifiedOn', 'LIKE', '%'.$date.'%')->orderBy('ModifiedOn', 'desc')->paginate('25');
                $items1 = item_location::where('ModifiedOn', 'LIKE', '%'.$date.'%')->get();
                $partial_deliveries = DB::table('partial_deliveries')
                                        ->join('locations','partial_deliveries.locations_id', 'locations.id')
                                        ->join('item_locations', 'partial_deliveries.item_locations_id','item_locations.id')
                                        ->select('partial_deliveries.*', 'locations.location_name','item_locations.*')
                                        ->get();
                $items->appends(array(
                    'text' => Input::get('text'),
                    'field' => Input::get('field'),
                    'date' => Input::get('date'),
                ));
                if (count($items) > 0){
                    return view('home')->with('items',$items)->with('amount_items', count($items1))->with('partial_deliveries', $partial_deliveries);
                }
                return view('home')->withMessage("No result found!");
            }
            elseif($text != '' && $field =='Job# or Po#'){
                $items = item_location::where('po_sub_no', 'LIKE', '%'.$text.'%' )
                                      ->where('JobNumber', 'LIKE', '%'.$text.'%')
                                      ->where('ModifiedOn', 'LIKE', '%'.$date.'%')
                                      ->orderBy('ModifiedOn', 'desc')
                                      ->paginate(25)
                                      ->setpath('');
                $partial_deliveries = DB::table('partial_deliveries')
                                        ->join('locations','partial_deliveries.locations_id', 'locations.id')
                                        ->join('item_locations', 'partial_deliveries.item_locations_id','item_locations.id')
                                        ->select('partial_deliveries.*', 'locations.location_name','item_locations.*')
                                        ->get();
                $items1 = item_location::where('po_sub_no', 'LIKE', '%'.$text.'%' )
                                        ->where('JobNumber', 'LIKE', '%'.$text.'%')
                                        ->where('ModifiedOn', 'LIKE', '%'.$date.'%')
                                        ->get();
                $items->appends(array(
                    'text' => Input::get('text'),
                    'field' => Input::get('field'),
                    'date' => Input::get('date'),
                ));
                if (count($items) > 0){
                    return view('home')->with('items',$items)->with('amount_items', count($items1))->with('partial_deliveries', $partial_deliveries);
                }
                return view('home')->withMessage("No result found!");
            }
            elseif($text != '' && $field =='Job Name or Job Description'){
                $items = item_location::where('JobName', 'LIKE', '%'.$text.'%' )
                                      ->where('JobDescription', 'LIKE', '%'.$text.'%')
                                      ->where('ModifiedOn', 'LIKE', '%'.$date.'%')
                                      ->orderBy('ModifiedOn', 'desc')
                                      ->paginate(25)
                                      ->setpath('');
                $partial_deliveries = DB::table('partial_deliveries')
                                        ->join('locations','partial_deliveries.locations_id', 'locations.id')
                                        ->join('item_locations', 'partial_deliveries.item_locations_id','item_locations.id')
                                        ->select('partial_deliveries.*', 'locations.location_name','item_locations.*')
                                        ->get();
                $items1 = item_location::where('JobName', 'LIKE', '%'.$text.'%' )
                                        ->where('JobDescription', 'LIKE', '%'.$text.'%')
                                        ->where('ModifiedOn', 'LIKE', '%'.$date.'%')->get();
                $items->appends(array(
                    'text' => Input::get('text'),
                    'field' => Input::get('field'),
                    'date' => Input::get('date'),
                ));
    
                if (count($items) > 0){
                    return view('home')->with('items',$items)->with('amount_items', count($items1))->with('partial_deliveries', $partial_deliveries);
                }
                return view('home')->withMessage("No result found!");
    
            }
            else{
                $items = item_location::where($field, 'LIKE', '%'.$text.'%' )
                                      ->where('ModifiedOn', 'LIKE', '%'.$date.'%')
                                      ->orderBy('ModifiedOn', 'desc')
                                      ->paginate(25)
                                      ->setpath('');
                $partial_deliveries = DB::table('partial_deliveries')
                                        ->join('locations','partial_deliveries.locations_id', 'locations.id')
                                        ->join('item_locations', 'partial_deliveries.item_locations_id','item_locations.id')
                                        ->select('partial_deliveries.*', 'locations.location_name','item_locations.*')
                                        ->get();
                $items1 = item_location::where($field, 'LIKE', '%'.$text.'%' )
                                      ->where('ModifiedOn', 'LIKE', '%'.$date.'%')
                                      ->get();
                $items->appends(array(
                    'text' => Input::get('text'),
                    'field' => Input::get('field')
                ));
                if (count($items) > 0){
                    return view('home')->with('items',$items)->with('amount_items', count($items1))->with('partial_deliveries', $partial_deliveries);
                }
                return view('home')->withMessage("No result found!");
    
            }

        }

        else{

        }
        if($text ==''){
            $items = item_location::orderBy('ModifiedOn', 'desc')->paginate('25');
            $partial_deliveries = DB::table('partial_deliveries')
                                    ->join('locations','partial_deliveries.locations_id', 'locations.id')
                                    ->join('item_locations', 'partial_deliveries.item_locations_id','item_locations.id')
                                    ->select('partial_deliveries.*', 'locations.location_name','item_locations.*')
                                    ->get();
            $items1 = item_location::get();
            $items->appends(array(
                'text' => Input::get('text'),
                'field' => Input::get('field')
            ));
            if (count($items) > 0){
                return view('home')->with('items',$items)->with('amount_items', count($items1))->with('partial_deliveries', $partial_deliveries);
            }
            return view('home')->withMessage("No result found!");
        }
        elseif($text != '' && $field =='Job# or Po#'){
            $items = item_location::where('po_sub_no', 'LIKE', '%'.$text.'%' )
                                  ->where('JobNumber', 'LIKE', '%'.$text.'%')
                                  ->orderBy('ModifiedOn', 'desc')
                                  ->paginate(25)
                                  ->setpath('');
            $partial_deliveries = DB::table('partial_deliveries')
                                    ->join('locations','partial_deliveries.locations_id', 'locations.id')
                                    ->join('item_locations', 'partial_deliveries.item_locations_id','item_locations.id')
                                    ->select('partial_deliveries.*', 'locations.location_name','item_locations.*')
                                    ->get();
            $items1 = item_location::where('po_sub_no', 'LIKE', '%'.$text.'%' )
                                    ->where('JobNumber', 'LIKE', '%'.$text.'%')
                                    ->get();
            $items->appends(array(
                'text' => Input::get('text'),
                'field' => Input::get('field')
            ));
            if (count($items) > 0){
                return view('home')->with('items',$items)->with('amount_items', count($items1))->with('partial_deliveries', $partial_deliveries);
            }
            return view('home')->withMessage("No result found!");
        }
        elseif($text != '' && $field =='Job Name or Job Description'){
            $items = item_location::where('JobName', 'LIKE', '%'.$text.'%' )
                                  ->where('JobDescription', 'LIKE', '%'.$text.'%')
                                  ->orderBy('ModifiedOn', 'desc')
                                  ->paginate(25)
                                  ->setpath('');
            $partial_deliveries = DB::table('partial_deliveries')
                                    ->join('locations','partial_deliveries.locations_id', 'locations.id')
                                    ->join('item_locations', 'partial_deliveries.item_locations_id','item_locations.id')
                                    ->select('partial_deliveries.*', 'locations.location_name','item_locations.*')
                                    ->get();
            $items1 = item_location::where('JobName', 'LIKE', '%'.$text.'%' )
                                    ->where('JobDescription', 'LIKE', '%'.$text.'%')->get();
            $items->appends(array(
                'text' => Input::get('text'),
                'field' => Input::get('field')
            ));

            if (count($items) > 0){
                return view('home')->with('items',$items)->with('amount_items', count($items1))->with('partial_deliveries', $partial_deliveries);
            }
            return view('home')->withMessage("No result found!");

        }
        else{
            $items = item_location::where($field, 'LIKE', '%'.$text.'%' )
                                  ->orderBy('ModifiedOn', 'desc')
                                  ->paginate(25)
                                  ->setpath('');
            $partial_deliveries = DB::table('partial_deliveries')
                                    ->join('locations','partial_deliveries.locations_id', 'locations.id')
                                    ->join('item_locations', 'partial_deliveries.item_locations_id','item_locations.id')
                                    ->select('partial_deliveries.*', 'locations.location_name','item_locations.*')
                                    ->get();
            $items1 = item_location::where($field, 'LIKE', '%'.$text.'%' )->get();
            $items->appends(array(
                'text' => Input::get('text'),
                'field' => Input::get('field')
            ));
            if (count($items) > 0){
                return view('home')->with('items',$items)->with('amount_items', count($items1))->with('partial_deliveries', $partial_deliveries);
            }
            return view('home')->withMessage("No result found!");

        }


    }
}
