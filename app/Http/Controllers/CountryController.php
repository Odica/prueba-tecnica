<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function index()
    {
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }
    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:countries|max:255',
        ]);

        Country::create($request->all());

        return redirect()->route('countries.index');
    }

    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required|unique:countries,name,' . $country->id . '|max:255',
        ]);

        $country->update($request->all());

        return redirect()->route('countries.index');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index');
    }
}
