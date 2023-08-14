<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use App\Models\State;
use App\Tables\Cities;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cities.index', [
            'cities' => Cities::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $form = SpladeForm::make()
            ->action(route('admin.cities.store'))
            ->fields([
                Input::make('name')->label('Name'),
                Select::make('state_id')->label('Choose a State')->options(State::pluck('name', 'id')->toArray()),
                Submit::make()->label('Save')
            ])
            ->class('p-4 bg-white rounded flex flex-col gap-2');

        return view('admin.cities.create', [
            'form' => $form
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        City::create($request->validated());
        Splade::toast('City created')->autoDismiss(3);

        return to_route('admin.cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $form = SpladeForm::make()
            ->action(route('admin.cities.update', $city))
            ->method('PUT')
            ->fields([
                Input::make('name')->label('Name'),
                Select::make('state_id')->label('Choose a State')->options(State::pluck('name', 'id')->toArray()),
                Submit::make()->label('Update')
            ])
            ->fill($city)
            ->class('p-4 bg-white rounded flex flex-col gap-2');

        return view('admin.cities.edit', [
            'form' => $form,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());
        Splade::toast('City updated')->autoDismiss(3);

        return to_route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        Splade::toast('City deleted')->autoDismiss(3);

        return back();
    }
}
