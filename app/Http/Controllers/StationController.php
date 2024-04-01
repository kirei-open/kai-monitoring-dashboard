<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StationController extends Controller
{
    public function createStation(Request $request){
        $request->validate([
            'name'=> ['required', 'string'],
            'code' => ['required', 'string'],
            'altitude' => ['required', 'string'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric']
        ]);

        $longitude = floatval($request->longitude);
        $latitude = floatval($request->latitude);

        $point = "POINT({$longitude} {$latitude})";
        // dd($point);

        Station::create([
            'name'=> $request->name,
            'code' => $request->code,
            'altitude' => $request->altitude,
            'point' => $point,
        ]);

        return response()->json(['message' => 'Station data succesfully added']);
    }

    public function getStation(){
        $data = Station::all();
        return response()->json(['message' => 'Station data', 'data' => $data]);
    }

    public function getDetailStation($id){
        $data = Station::where('id', $id)->first();
        return response()->json(['message' => 'Detail station data', 'data' => $data]);
    }

    public function updateStation(Request $request, $id){
        $request->validate([
            'name'=> ['required', 'string'],
            'code' => ['required', 'string'],
            'altitude' => ['required', 'string'],
            'last_location' => function ($attribute, $value, $fail) {
                if (!is_array($value) || count($value) !== 2) {
                    $fail('The :attribute must be a valid point with longitude and latitude.');
                }
    
                $longitude = $value[0];
                $latitude = $value[1];
    
                if (!is_numeric($longitude) || !is_numeric($latitude)) {
                    $fail('The :attribute must be a valid point with longitude and latitude.');
                }
            }
        ]);

        station::where('id', $id)->update([
            'name'=> $request->name,
            'code' => $request->code,
            'altitude' => $request->altitude,
            'last_location' => [$request->longitude, $request->latitude],
        ]);

        return response()->json(['message' => 'Station data succesfully updated']);
    }

    public function deleteStation($id){
        Station::where('id', $id)->delete();

        return response()->json(['message' => 'Station data sunccesfully deleted']);
    }
}
