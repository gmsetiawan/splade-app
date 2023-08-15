<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Models\State;
use App\Tables\Employees;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\FormBuilder\Date;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.employees.index', [
            "employees" => Employees::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $form = SpladeForm::make()
            ->action(route('admin.employees.store'))
            ->fields([
                Input::make('first_name')->label('First Name'),
                Input::make('middle_name')->label('Middle Name'),
                Input::make('last_name')->label('Last Name'),
                Input::make('zip_code')->label('Zip Code'),
                Select::make('department_id')->label('Choose a Department')->options(Department::pluck('name', 'id')->toArray()),
                Select::make('city_id')->label('Choose a City')->options(City::pluck('name', 'id')->toArray()),
                Date::make('birth_date')->label('Birthdate'),
                Date::make('date_hired')->label('Date Hired'),
                Submit::make()->label('Save')
            ])
            ->class('p-4 bg-white rounded flex flex-col gap-2');

        return view('admin.employees.create', [
            'form' => $form
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $city = City::findOrFail($request->city_id);
        Employee::create(array_merge($request->validated(), [
            'country_id' => $city->state->country_id,
            'state_id' => $city->state_id
        ]));
        Splade::toast('Employee created')->autoDismiss(3);

        return to_route('admin.employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $form = SpladeForm::make()
            ->action(route('admin.employees.update', $employee))
            ->method('PUT')
            ->fields([
                Input::make('first_name')->label('First Name'),
                Input::make('middle_name')->label('Middle Name'),
                Input::make('last_name')->label('Last Name'),
                Input::make('zip_code')->label('Zip Code'),
                Select::make('department_id')->label('Choose a Department')->options(Department::pluck('name', 'id')->toArray()),
                Select::make('city_id')->label('Choose a City')->options(City::pluck('name', 'id')->toArray()),
                Date::make('birth_date')->label('Birthdate'),
                Date::make('date_hired')->label('Date Hired'),
                Submit::make()->label('Save')
            ])
            ->fill($employee)
            ->class('p-4 bg-white rounded flex flex-col gap-2');

        return view('admin.employees.edit', [
            'form' => $form
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $city = City::findOrFail($request->city_id);
        $employee->update(array_merge($request->validated(), [
            'country_id' => $city->state->country_id,
            'state_id' => $city->state_id
        ]));
        Splade::toast('Employee updated')->autoDismiss(3);

        return to_route('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        Splade::toast('Employee deleted')->autoDismiss(3);

        return back();
    }
}
