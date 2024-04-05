<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use Illuminate\Http\Request;
use App\Events\DeviceMeasurementBroadcast;

class MeasurementController extends Controller
{
    public function createMeasurement(Request $request){
        $request->validate([
            'device_id' => ['required', 'string'],
            'datetime' => ['required'],
            'key' => ['required', 'string'],
            'value' => ['required', 'numeric'],
            'unit' => ['required', 'string']
        ]);

        $data = (object)[
            'device_id' => $request->device_id,
            'datetime' => $request->datetime,
            'key' => $request->key,
            'value' => $request->value,
            'unit' => $request->unit
        ];

        Measurement::create([
            'device_id' => $request->device_id,
            'datetime' => $request->datetime,
            'key' => $request->key,
            'value' => $request->value,
            'unit' => $request->unit
        ]);

        event(new DeviceMeasurementBroadcast($data));

        return response()->json(['message' => 'measurement data succesfully added']);
    }

    public function getMeasurement(){
        $data = Measurement::all();
        return response()->json(['message' => 'measurement data', 'data' => $data]);
    }

    public function getDetailMeasurement($id){
        $data = Measurement::where('device_id', $id)->first();
        return response()->json(['message' => 'measurement detail data', 'data' => $data]);
    }

    public function updateMeasurement(Request $request, $id){
        $request->validate([
            'datetime' => ['required'],
            'key' => ['required', 'string'],
            'value' => ['required', 'numeric'],
            'unit' => ['required', 'string']
        ]);

        Measurement::where('device_id', $id)->update([
            'datetime' => $request->datetime,
            'key' => $request->key,
            'value' => $request->value,
            'unit' => $request->unit
        ]);

        return response()->json(['Message' => 'measurement data succesfully updated']);
    }

    public function deleteMeasurement($id){
        Measurement::where('device_id', $id)->delete();
        return response()->json(['message' => 'measurement data succesfully deleted']);
    }
}
