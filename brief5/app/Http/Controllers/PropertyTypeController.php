<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::all();
        return view('property_types.index', compact('propertyTypes'));
    }

    public function show(PropertyType $propertyType)
    {
        return view('property_types.show', compact('propertyType'));
    }

    public function create()
    {
        return view('property_types.create');
    }

    public function store(Request $request)
    {
        PropertyType::create($request->all());
        return redirect()->route('property_types.index');
    }

    public function edit(PropertyType $propertyType)
    {
        return view('property_types.edit', compact('propertyType'));
    }

    public function update(Request $request, PropertyType $propertyType)
    {
        $propertyType->update($request->all());
        return redirect()->route('property_types.index');
    }

    public function destroy(PropertyType $propertyType)
    {
        $propertyType->delete();
        return redirect()->route('property_types.index');
    }
}
