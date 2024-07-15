<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StationController extends Controller
{
    // public function createStation(Request $request){
    //     $request->validate([
    //         'name'=> ['required', 'string'],
    //         'code' => ['required', 'string'],
    //         'altitude' => ['required', 'string'],
    //         'longitude' => ['required', 'numeric'],
    //         'latitude' => ['required', 'numeric']
    //     ]);

    //     $longitude = floatval($request->longitude);
    //     $latitude = floatval($request->latitude);

    //     $point = DB::raw("ST_GeomFromText('POINT({$latitude} {$longitude})')");

    //     Station::create([
    //         'name'=> $request->name,
    //         'code' => $request->code,
    //         'altitude' => $request->altitude,
    //         'point' => $point,
    //     ]);

    //     return response()->json(['message' => 'Station data succesfully added']);
    // }

    // public function getStation(){
    //     $data = Station::all();
    //     return response()->json(['message' => 'Station data', 'data' => $data]);
    // }

    // public function getDetailStation($id){
    //     $data = Station::where('id', $id)->first();
    //     return response()->json(['message' => 'Detail station data', 'data' => $data]);
    // }

    // public function updateStation(Request $request, $id){
    //     $request->validate([
    //         'name'=> ['required', 'string'],
    //         'code' => ['required', 'string'],
    //         'altitude' => ['required', 'string'],
    //         'longitude' => ['required', 'numeric'],
    //         'latitude' => ['required', 'numeric']
    //     ]);

    //     $longitude = floatval($request->longitude);
    //     $latitude = floatval($request->latitude);

    //     $point = DB::raw("ST_GeomFromText('POINT({$latitude} {$longitude})')");

    //     station::where('id', $id)->update([
    //         'name'=> $request->name,
    //         'code' => $request->code,
    //         'altitude' => $request->altitude,
    //         'point' => $point,
    //     ]);

    //     return response()->json(['message' => 'Station data succesfully updated']);
    // }

    // public function deleteStation($id){
    //     Station::where('id', $id)->delete();

    //     return response()->json(['message' => 'Station data sunccesfully deleted']);
    // }
}
