<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Measurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Events\DeviceMeasurementBroadcast;

class MeasurementController extends Controller
{
    public function createMeasurement(Request $request){
        $serialNumber = $request->get('serial_number');

        $request->validate([
            'datetime' => ['required'],
            'key' => ['required', 'string'],
            'value' => ['required', 'numeric'],
            'unit' => ['required', 'string']
        ]);

        $data = (object)[
            'device_id' => $serialNumber,
            'datetime' => $request->datetime,
            'key' => $request->key,
            'value' => $request->value,
            'unit' => $request->unit
        ];

        $measurementData = [
            'device_id' => $serialNumber,
            'datetime' => $request->datetime,
            'key' => $request->key,
            'value' => $request->value,
            'unit' => $request->unit
        ];

        Measurement::create($measurementData);

        Device::where('serial_number', $serialNumber)->update([
            'last_monitored_value' => json_encode($measurementData)
        ]);

        event(new DeviceMeasurementBroadcast($data));

        return response()->json(['message' => 'measurement data succesfully created']);
    }

    public function getMeasurement(){
        $data = Measurement::all();
        return response()->json(['message' => 'measurement data', 'data' => $data]);
    }

    public function getDetailMeasurement($device_id, Request $request){
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $data = Measurement::query();
        $data->where('device_id', $device_id);
        if($startDate && $endDate){
            $data->where('datetime', '>=', $startDate)->where('datetime', '<=', $endDate);
        }
        $data = $data->get();
        if(!$data) return response()->json(['message' => 'measurement detail data', 'device_id' => $device_id]);
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

    public function broadcastMeasurement(Request $request){
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

        $check = Measurement::where('device_id', $request->device_id)->first();

        if(!$check){
            Measurement::create([
                'device_id' => $request->device_id,
                'datetime' => $request->datetime,
                'key' => $request->key,
                'value' => $request->value,
                'unit' => $request->unit
            ]);
        }else{
            Measurement::where('device_id', $request->device_id)->update([
                'datetime' => $request->datetime,
                'key' => $request->key,
                'value' => $request->value,
                'unit' => $request->unit
            ]);
        }
        
        event(new DeviceMeasurementBroadcast($data));

        return response()->json(['message' => 'measurement data succesfully broadcasted']);
    }

}
