<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Country;
use App\Models\City;
use App\Models\Position;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::with('positions')->get();
        return view('employees.index', compact('employees'));
    }


    public function create()
    {
        // Cargar todos los países, ciudades y cargos
        $countries = Country::all();
        $cities = City::all();
        $positions = Position::all();

        // Pasar las variables a la vista
        return view('employees.create', compact('countries', 'cities', 'positions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|string|unique:employees|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'country_id' => 'required|integer',
            'city_id' => 'required|integer',
            'positions' => 'required|array',
        ]);
    
        $employee = Employee::create($request->except('positions'));
        $employee->positions()->attach($request->positions);
    
        return redirect()->route('employees.index')->with('success', 'Empleado creado con éxito.');
    }
    


    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $countries = Country::all();
        $cities = City::where('country_id', $employee->country_id)->get();
        $positions = Position::all();
        
        return view('employees.edit', compact('employee', 'countries', 'cities', 'positions'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'identification' => 'required|string|unique:employees,identification,'.$id.'|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'country_id' => 'required|array',
            'city_id' => 'required|array',
        ]);
    
        $employee = Employee::findOrFail($id);
        $employee->update($request->except('positions'));
        $employee->positions()->sync($request->positions);
    
        return redirect()->route('employees.index')->with('success', 'Empleado actualizado con éxito.');
    }
    


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado con éxito.');
    }
}
