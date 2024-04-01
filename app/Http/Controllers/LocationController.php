<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function createLocation(Request $request){
        $request->validate([
            'device_id' => ['required', 'string'],
            'datetime' => ['required'],
            'location' => function ($attribute, $value, $fail) {
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

        Location::create([
            'device_id' => $request->deivce_id,
            'datetime' => $request->datetime,
            'location' => [$request->longitude, $request->latitude],
        ]);

        return response()->json(['message' => 'location data succesfully created']);
    }

    public function getLocation(){
        $data = Location::all();
        return response()->json(['message' => 'location data', 'data' => $data]);
    }

    public function getDetailLocation($id){
        $data = Location::where('id', $id)->first();
        return response()->json(['message' => 'location detail data', 'data' => $data]);
    }

    public function updateLocation(Request $request, $id){
        $request->validate([
            'datetime' => ['required'],
            'location' => function ($attribute, $value, $fail) {
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

        Location::where('device_id', $id)->update([
            'datetime' => $request->datetime,
            'location' => [$request->longitude, $request->latitude],
        ]);

        return response()->json(['message' => 'location data succesfully updated']);
    }

    public function deleteLocation($id){
        Location::where('id', $id)->delete();
        return response()->json(['message' => 'location data succesfully deleted']);
    }
}
