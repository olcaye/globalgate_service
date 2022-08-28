<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Country, State, City};
class CountryStateCityController extends Controller
{
    public function index()
    {
        $data['countries'] = Country::get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function singleState(Request $request)
    {
        $data['states'] = State::where("id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}
