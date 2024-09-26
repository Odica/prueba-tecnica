<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::with('country')->get();
        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('cities.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        City::create($request->all());

        return redirect()->route('cities.index');
    }

    public function edit(City $city)
    {
        $countries = Country::all();
        return view('cities.edit', compact('city', 'countries'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|max:255',
            'country_id' => 'required|exists:countries,id',
        ]);

        $city->update($request->all());

        return redirect()->route('cities.index');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index');
    }

    public function getCitiesByCountry($countryId)
    {
        $cities = City::where('country_id', $countryId)->get();
    
        return response()->json($cities);
    }
    
    
}
