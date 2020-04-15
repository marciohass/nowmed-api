<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exams;

class ExamsController extends Controller
{

    public function index()
    {
        return Exams::all();
    }


    public function store(Request $request)
    {
        Exams::create($request->all());
    }

    public function show($id)
    {
        return Exams::findOrfail($id);
    }


    public function update(Request $request, $id)
    {
        $exam = Exams::findORFail($id);
        $exam->update($request->all());
    }

    public function destroy($id)
    {
        $exam = Exams::findOrFail($id);
        $exam->delete();
    }
}
