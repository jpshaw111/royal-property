<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Offer;
use App\Models\Showing;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowingController extends Controller
{
    public function index(Request $request) {
        $showing_map = $request->input('offers_map','offers');
        $showings = Showing::with('unit','user')->get();
        $offers = Offer::all();
        $events = Event::where('event_date', '>=', now()->format('Y-m-d'))->get();
        $offers_array = array();
        if($showing_map == "offers") {
            foreach($offers as $offer) {
            array_push($offers_array,  
            array(

                "title" => "<img src='{{ URL::asset('admin') }}/images/showings/unitsmap.svg'> 20 Units",
                "lat" => $offer->lat,
                "lng" => $offer->lng,
                "description"   => $offer->location
            ));
            
        }

        }
        else {
           foreach($showings as $showing) {
            array_push($offers_array,  
            array(

                "title" => "<img src='{{ URL::asset('admin') }}/images/showings/unitsmap.svg'> 20 Units",
                "lat" => $showing->unit->lat,
                "lng" => $showing->unit->lng,
                "description"   => $showing->unit->location
            ));
            
        } 
        }
        
        $off_array = json_encode($offers_array);
        return view('showings.index', compact('showings', 'offers', 'off_array', 'events'));
    }

    public function ajaxShowing(Request $request) {
        $array = array();
       
        $result = Showing::findOrFail($request->showing_id);
        if(!empty($result)) {
            $array = array(
                "unit"          => $result->unit->name,
                "unit_location" => $result->unit->location,
                "unit_id"       => $result->unit->id,
                "showing_id"    => $request->showing_id,
                "showing_date"  => date("d/m/Y", strtotime($result->showing_date)),
                "showing_time"  => date("H:i A", strtotime($result->showing_time))
            );
        }

        echo json_encode($array);

    }


    public function updateShowing(Request $request) {
        $showing_status = $request->showing_status;
        if($showing_status == "rescheduled") {
          
            $dateObject = DateTime::createFromFormat('d/m/Y', $request->showing_date);
            $formattedDate = $dateObject->format('Y-m-d');



            DB::table('showings')
                    ->where('id', '=', $request->showing_id)
                    ->where('unit_id', '=', $request->unit_id)
                    ->update([
                        'showing_date'      => $formattedDate, 
                        'showing_time'      => date("H:i:s", strtotime($request->showing_time)), 
                        'showing_status'    => $request->showing_status,
                        'updated_at'        => date("Y-m-d H:i:s")
                    
                    ]);

        }

        else if($showing_status == "confirmed") {
          
            DB::table('showings')
                    ->where('id', '=', $request->showing_id)
                    ->where('unit_id', '=', $request->unit_id)
                    ->update([                
                       
                        'showing_status'    => $request->showing_status,
                        'updated_at'        => date("Y-m-d H:i:s")
                    
                    ]);

        }

        return back()->with('success', 'Showing updated successfully.');


    }

    public function cancelShowing(Request $request) {
         DB::table('showings')
                    ->where('id', '=', $request->showing_id)
                    ->update([                
                       
                        'showing_status'    => 'cancelled',
                        'updated_at'        => date("Y-m-d H:i:s")
                    
                    ]);

     return back()->with('success', 'Showing updated successfully.');
    }
}
