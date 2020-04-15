<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InstitutionTypes;

class InstitutionTypesController extends Controller
{
    public function index()
    {
        return InstitutionTypes::all();
    }

    public function store(Request $request)
    {
        InstitutionTypes::create($request->all());
    }

    public function show($id)
    {
        return InstitutionTypes::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $institution_type = InstitutionTypes::findOrFail($id);
        $institution_type->update($request->all());
    }

    public function destroy($id)
    {
        $institution_type = InstitutionTypes::findOrFail($id);
        $institution_type->delete();
    }
}
