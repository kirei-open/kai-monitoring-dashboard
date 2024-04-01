<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function createDevice(Request $request){
        $request->validate([
            'serial_number' => ['required', 'string'],
            'name' => ['required', 'string'],
            'code' => ['required', 'string'],
            'last_location' => function ($attribute, $value, $fail) {
                if (!is_array($value) || count($value) !== 2) {
                    $fail('The :attribute must be a valid point with longitude and latitude.');
                }
    
                $longitude = $value[0];
                $latitude = $value[1];
    
                if (!is_numeric($longitude) || !is_numeric($latitude)) {
                    $fail('The :attribute must be a valid point with longitude and latitude.');
                }
            },
            'last_monitored_value' => ['required', 'json'],
        ]);

        Device::create([
            'serial_number' => $request->serial_number,
            'name' => $request->name,
            'code' => $request->code,
            'last_location' => [$request->longitude, $request->latitude],
            'last_monitored_value' => $request->last_monitored_value,
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
            'last_location' => function ($attribute, $value, $fail) {
                if (!is_array($value) || count($value) !== 2) {
                    $fail('The :attribute must be a valid point with longitude and latitude.');
                }
    
                $longitude = $value[0];
                $latitude = $value[1];
    
                if (!is_numeric($longitude) || !is_numeric($latitude)) {
                    $fail('The :attribute must be a valid point with longitude and latitude.');
                }
            },
            'last_monitored_value' => ['required', 'json'],
        ]);

        Device::where('serial_number', $serial_number)->update([
            'name' => $request->name,
            'code' => $request->code,
            'last_location' => [$request->longitude, $request->latitude],
            'last_monitored_value' => $request->last_monitored_value,
        ]);

        return response()->json(['message' => 'data succesfully updated']);
    }

    public function deleteDevice($serial_number){
        Device::where('serial_number', $serial_number)->delete();
        return response()->json(['message' => 'device data deleted']);
    }
}
