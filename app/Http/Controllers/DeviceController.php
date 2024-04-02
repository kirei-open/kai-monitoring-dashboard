<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    public function createDevice(Request $request){
        $request->validate([
            'serial_number' => ['required', 'string'],
            'name' => ['required', 'string'],
            'code' => ['required', 'string'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'last_monitored_value' => ['required', 'array'],
        ]);

        $longitude = floatval($request->longitude);
        $latitude = floatval($request->latitude);

        $lastLocation = DB::raw("ST_GeomFromText('POINT({$latitude} {$longitude})')");

        Device::create([
            'serial_number' => $request->serial_number,
            'name' => $request->name,
            'code' => $request->code,
            'last_location' => $lastLocation,
            'last_monitored_value' => json_encode($request->last_monitored_value)
        ]);

        return response()->json(['Succesfully create a new device']);
    }

    public function getDevice(){
        $data = Device::all();
        return response()->json(['message' => 'Device data', 'data' => $data]);
    }

    public function getDetailDevice($serial_number){
        $data = Device::where('serial_number', $serial_number)->first();
        return response()->json(['message' => 'Device data', 'data' => $data]);
    }

    public function updateDevice(Request $request, $serial_number){
        $request->validate([
            'name' => ['required', 'string'],
            'code' => ['required', 'string'],
            'longitude' => ['required', 'numeric'],
            'latitude' => ['required', 'numeric'],
            'last_monitored_value' => ['required', 'array'],
        ]);

        $longitude = floatval($request->longitude);
        $latitude = floatval($request->latitude);

        $lastLocation = DB::raw("ST_GeomFromText('POINT({$latitude} {$longitude})')");

        Device::where('serial_number', $serial_number)->update([
            'name' => $request->name,
            'code' => $request->code,
            'last_location' => $lastLocation,
            'last_monitored_value' => json_encode($request->last_monitored_value)
        ]);

        return response()->json(['message' => 'data succesfully updated']);
    }

    public function deleteDevice($serial_number){
        Device::where('serial_number', $serial_number)->delete();
        return response()->json(['message' => 'device data deleted']);
    }
}
