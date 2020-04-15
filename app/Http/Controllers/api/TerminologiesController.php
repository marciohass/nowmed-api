<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Terminologies;

class TerminologiesController extends Controller
{
    public function index()
    {
        return Terminologies::all();
    }

    public function store(Request $request)
    {
        Terminologies::create($request->all());
    }

    public function show($id)
    {
        return Terminologies::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $terminologies = Terminologies::findOrFail($id);
        $terminologies->update($request->all());
    }

    public function destroy($id)
    {
        $terminologies = Terminologies::findOrFail($id);
        $terminologies->delete();
    }
}
