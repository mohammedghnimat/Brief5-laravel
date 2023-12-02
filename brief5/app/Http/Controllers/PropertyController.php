<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Location;
class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }

    public function create()
    {
        $propertyTypes = PropertyType::all();
        $locations = Location::all();
        return view('properties.create', compact('propertyTypes', 'locations'));
    }

    public function store(Request $request)
    {
        Property::create($request->all());
        return redirect()->route('properties.index');
    }

    public function edit(Property $property)
    {
        $propertyTypes = PropertyType::all();
        $locations = Location::all();
        return view('properties.edit', compact('property', 'propertyTypes', 'locations'));
    }

    public function update(Request $request, Property $property)
    {
        $property->update($request->all());
        return redirect()->route('properties.index');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index');
    }
}
