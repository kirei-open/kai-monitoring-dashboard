<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\DeviceLocationBroadcast;

class LocationController extends Controller
{
    // public function createLocation(Request $request){
    //     $serialNumber = $request->get('serial_number');

    //     $request->validate([
    //         'datetime' => ['required'],
    //         'longitude' => ['required', 'numeric'],
    //         'latitude' => ['required', 'numeric'],
    //     ]);

    //     $longitude = floatval($request->longitude);
    //     $latitude = floatval($request->latitude);

    //     $location = DB::raw("ST_GeomFromText('POINT({$latitude} {$longitude})')");

    //     $data = (object)[
    //         'device_id' => $serialNumber,
    //         'datetime' => $request->datetime,
    //         'longitude' => $longitude,
    //         'latitude' => $latitude
    //     ];

    //     Location::create([
    //         'device_id' => $serialNumber,
    //         'datetime' => $request->datetime,
    //         'point' => $location,
    //     ]);

    //     Device::where('serial_number', $serialNumber)->update([
    //         'last_location' => $location,
    //     ]);

    //     event(new DeviceLocationBroadcast($data));

    //     return response()->json(['message' => 'location data succesfully created']);
    // }

    // public function getLocation(){
    //     $data = Location::all();
    //     return response()->json(['message' => 'location data', 'data' => $data]);
    // }

    // public function getDetailLocation($id){
    //     $data = Location::where('device_id', $id)->first();
    //     return response()->json(['message' => 'location detail data', 'data' => $data]);
    // }

    // public function updateLocation(Request $request, $id){
    //     $request->validate([
    //         'datetime' => ['required'],
    //         'longitude' => ['required', 'numeric'],
    //         'latitude' => ['required', 'numeric'],
    //     ]);

    //     $longitude = floatval($request->longitude);
    //     $latitude = floatval($request->latitude);

    //     $location = DB::raw("ST_GeomFromText('POINT({$latitude} {$longitude})')");

    //     Location::where('device_id', $id)->update([
    //         'datetime' => $request->datetime,
    //         'point' => $location,
    //     ]);

    //     return response()->json(['message' => 'location data succesfully updated']);
    // }

    // public function deleteLocation($id){
    //     Location::where('device_id', $id)->delete();
    //     return response()->json(['message' => 'location data succesfully deleted']);
    // }

    // public function broadcastLocation(Request $request){
    //     $request->validate([
    //         'device_id' => ['required', 'string'],
    //         'datetime' => ['required'],
    //         'longitude' => ['required', 'numeric'],
    //         'latitude' => ['required', 'numeric'],
    //     ]);

    //     $longitude = floatval($request->longitude);
    //     $latitude = floatval($request->latitude);

    //     $location = DB::raw("ST_GeomFromText('POINT({$latitude} {$longitude})')");

    //     $data = (object)[
    //         'device_id' => $request->device_id,
    //         'datetime' => $request->datetime,
    //         'longitude' => $longitude,
    //         'latitude' => $latitude
    //     ];

    //     $check = Location::where('device_id', $request->device_id)->first();

    //     if(!$check){
    //         Location::create([
    //             'device_id' => $request->device_id,
    //             'datetime' => $request->datetime,
    //             'point' => $location,
    //         ]);
    //     }else{
    //         Location::where('device_id', $request->device_id)->update([
    //             'datetime' => $request->datetime,
    //             'point' => $location,
    //         ]);
    //     }

    //     event(new DeviceLocationBroadcast($data));

    //     return response()->json(['message' => 'location data succesfully broadcasted']);
    // }
}
