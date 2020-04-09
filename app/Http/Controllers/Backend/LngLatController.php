<?php

namespace App\Http\Controllers\Backend;

use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Backend\LngLat;
use App\Models\Backend\Cell;
use DB;

class LngLatController extends Controller
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


    public function index(Request $request){
         $locations_in_radius = '';

         $latitude =  $request->lat ? $request->lat : 0;
         $longitude =  $request->lng ? $request->lng : 0;
         $radius = $request->radius ? $request->radius : 0;

         if(!empty($request->lat) && !empty($request->lng) && !empty($request->radius)){
            $locations_in_radius = Cell::select(DB::raw('*, ( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( lat ) ) ) ) AS distance'))
                ->having('distance', '<', $radius)
                ->orderBy('distance')
                ->get();

        }

     //    #get all record
    	// $locations = DB::table('tbCell')->select('id','bts','name','lat','lng')->distinct()->get();
              
     //    #get unique record, no duplucated record to array
     //    $unique_location = [];
     //    foreach($locations->unique('bts') as $location){
     //        $arr = [];
     //        array_push($arr, $location->bts);
     //        array_push($arr, $location->lat);
     //        array_push($arr, $location->lng);
     //        array_push($unique_location, $arr);
     //    }
      
        return view('backend.partials.lnglat', [
            'locations_in_radius' => $locations_in_radius,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'radius' =>  $radius
        ]);
    }

    public function store(Request $request){


            return response()->json(['success' => 'Success']);
       
    }

    // /**
    //  * Process datatables ajax request.
    //  *
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function getData(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $LngLat = LngLat::query();
            
    //         return Datatables::of($LngLat)  
    //             ->addColumn('action', function($model){
    //                 return '<a href="#" class="btn btn-xs btn-primary btn-edit" id="'.$model->id.'"><i class="icon_pencil-edit"></i></a>' . ' ' .
    //                         '<a href="#" class="btn btn-xs btn-danger" id="'.$model->id.'"><i class="icon_trash_alt"></i></a>' . ' ' . 
    //                         '<a href="#" class="btn btn-xs btn-default" id="'.$model->id.'"><i class="fa fa-eye"></i></a>';
    //             })
    //             ->make(true);
    //     }
    // }
}
