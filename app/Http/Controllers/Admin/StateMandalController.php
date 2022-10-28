<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\{Country, State, District,Mandal, Village};
class StateMandalController extends Controller
{
    public function index()
    {
        $data['states'] = State::where("country_id",1)->get(["name", "id"]);
        return response()->json($data);
        // return view('welcome', $data);
    }
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",1)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchDistrict(Request $request)
    {
        $data['districts'] = District::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchMandal(Request $request)
    {
        // return $request;
        $data['mandals'] = Mandal::where("district_id",$request->district_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchVillage(Request $request)
    {
        // return $request;
        $data['villages'] = Village::where("mandal_id",$request->mandal_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function show(Request $request)
    {
        // return $request;
        // if (! Gate::allows('village_view')) {
        //     return abort(401);
        // }
        
        // $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        // $expenses = \App\Expense::where('village_id', $id)->get();

        // $village = Village::findOrFail($request->id);
        $data['village'] = Village::where("id",$request->id)->first(["name", "id"]);
        
        return response()->json($data);

        // return view('admin.villages.show', compact('village', 'expenses'));
    }
}
