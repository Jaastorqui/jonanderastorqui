<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Province;
use App\Town;
use App\Gasoline;
use Illuminate\Http\Request;
use JavaScript;

class GasolineController extends Controller
{
    
    public function index($town)
    {

    	$gasolines = Gasoline::where("town_id" , $town)->get();
    	return Response()->json($gasolines);

    	$provinces = Province::all();

    	JavaScript::put([
	        'towns' => $towns 
	    ]);


    	return view('frontend.gasolines.index');
    }
}
