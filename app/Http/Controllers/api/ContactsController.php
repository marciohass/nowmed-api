<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contacts;

class ContactsController extends Controller
{
    public function index()
    {
        return Contacts::all();
    }


    public function store(Request $request)
    {
        Contacts::create($request->all());
    }

    public function show($id)
    {
        return Contacts::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $contact = Contacts::findOrFail($id);
        $contact->update($request->all());
    }

    public function destroy($id)
    {
        $contact = Ajuda::findOrFail($id);
        $contact->delete();
    }
}
