<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Device;
use App\Models\Station;
use Livewire\Component;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\DeviceLocationBroadcast;

class Dashboard extends Component
{
    public function render()
    {
        $stations = Station::selectRaw('*, ST_X(point::geometry) AS longitude, ST_Y(point::geometry) AS latitude')->get();

        $devices = Device::selectRaw('*, ST_X(last_location::geometry) AS longitude, ST_Y(last_location::geometry) AS latitude')->get();

        return view('livewire.pages.dashboard.dashboard', [
            "stations" => $stations,
            "devices" => $devices,
        ]);
    }

    // public function createDevice(Request $request)
    // {
    //     $request->validate([
    //         'serial_number' => ['required', 'string'],
    //         'name' => ['required', 'string'],
    //         'code' => ['required', 'string'],
    //         'longitude' => ['required', 'numeric'],
    //         'latitude' => ['required', 'numeric'],
    //         'last_monitored_value' => ['required', 'array'],
    //     ]);

    //     $longitude = floatval($request->longitude);
    //     $latitude = floatval($request->latitude);

    //     $lastLocation = DB::raw("ST_GeomFromText('POINT({$longitude} {$latitude})')");

    //     Device::create([
    //         'serial_number' => $request->serial_number,
    //         'name' => $request->name,
    //         'code' => $request->code,
    //         'last_location' => $lastLocation,
    //         'last_monitored_value' => json_encode($request->last_monitored_value)
    //     ]);

    //     return response()->json(['Succesfully create a new device']);
    // }

    // public function getDevice()
    // {
    //     $data = Device::all();
    //     return response()->json(['message' => 'Device data', 'data' => $data]);
    // }

    // public function getDetailDevice($serial_number)
    // {
    //     $data = Device::where('serial_number', $serial_number)->first();
    //     return response()->json(['message' => 'Device data', 'data' => $data]);
    // }

    // public function updateDevice(Request $request, $serial_number)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string'],
    //         'code' => ['required', 'string'],
    //         'longitude' => ['required', 'numeric'],
    //         'latitude' => ['required', 'numeric'],
    //         'last_monitored_value' => ['required', 'array'],
    //     ]);

    //     $longitude = floatval($request->longitude);
    //     $latitude = floatval($request->latitude);

    //     $lastLocation = DB::raw("ST_GeomFromText('POINT({$longitude} {$latitude})')");

    //     Device::where('serial_number', $serial_number)->update([
    //         'name' => $request->name,
    //         'code' => $request->code,
    //         'last_location' => $lastLocation,
    //         'last_monitored_value' => json_encode($request->last_monitored_value)
    //     ]);

    //     return response()->json(['message' => 'data succesfully updated']);
    // }

    // public function deleteDevice($serial_number)
    // {
    //     Device::where('serial_number', $serial_number)->delete();
    //     return response()->json(['message' => 'device data deleted']);
    // }


    // public function createStation(Request $request)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string'],
    //         'code' => ['required', 'string'],
    //         'altitude' => ['required', 'string'],
    //         'longitude' => ['required', 'numeric'],
    //         'latitude' => ['required', 'numeric']
    //     ]);

    //     $longitude = floatval($request->longitude);
    //     $latitude = floatval($request->latitude);

    //     $point = DB::raw("ST_GeomFromText('POINT({$longitude} {$latitude})')");

    //     Station::create([
    //         'name' => $request->name,
    //         'code' => $request->code,
    //         'altitude' => $request->altitude,
    //         'point' => $point,
    //     ]);

    //     return response()->json(['message' => 'Station data succesfully added']);
    // }

    // public function getStation()
    // {
    //     $data = Station::all();
    //     return response()->json(['message' => 'Station data', 'data' => $data]);
    // }

    // public function getDetailStation($id)
    // {
    //     $data = Station::where('id', $id)->first();
    //     return response()->json(['message' => 'Detail station data', 'data' => $data]);
    // }

    // public function updateStation(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => ['required', 'string'],
    //         'code' => ['required', 'string'],
    //         'altitude' => ['required', 'string'],
    //         'longitude' => ['required', 'numeric'],
    //         'latitude' => ['required', 'numeric']
    //     ]);

    //     $longitude = floatval($request->longitude);
    //     $latitude = floatval($request->latitude);

    //     $point = DB::raw("ST_GeomFromText('POINT({$latitude} {$longitude})')");

    //     station::where('id', $id)->update([
    //         'name' => $request->name,
    //         'code' => $request->code,
    //         'altitude' => $request->altitude,
    //         'point' => $point,
    //     ]);

    //     return response()->json(['message' => 'Station data succesfully updated']);
    // }

    // public function deleteStation($id)
    // {
    //     Station::where('id', $id)->delete();

    //     return response()->json(['message' => 'Station data sunccesfully deleted']);
    // }

    // public function createLocation(Request $request)
    // {
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

    // public function getLocation()
    // {
    //     $data = Location::all();
    //     return response()->json(['message' => 'location data', 'data' => $data]);
    // }

    // public function getDetailLocation($id)
    // {
    //     $data = Location::where('device_id', $id)->first();
    //     return response()->json(['message' => 'location detail data', 'data' => $data]);
    // }

    // public function updateLocation(Request $request, $id)
    // {
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

    // public function deleteLocation($id)
    // {
    //     Location::where('device_id', $id)->delete();
    //     return response()->json(['message' => 'location data succesfully deleted']);
    // }

    // public function broadcastLocation(Request $request)
    // {
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

    //     if (!$check) {
    //         Location::create([
    //             'device_id' => $request->device_id,
    //             'datetime' => $request->datetime,
    //             'point' => $location,
    //         ]);
    //     } else {
    //         Location::where('device_id', $request->device_id)->update([
    //             'datetime' => $request->datetime,
    //             'point' => $location,
    //         ]);
    //     }

    //     event(new DeviceLocationBroadcast($data));

    //     return response()->json(['message' => 'location data succesfully broadcasted']);
    // }
}
