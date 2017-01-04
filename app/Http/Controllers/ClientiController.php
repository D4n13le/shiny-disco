<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ClientiController extends Controller
{
    public function index(Request $request)
    {
        $clienti = \App\Cliente::all();
        return view('clienti.index', compact('clienti'));
    }
    
    public function show($id)
    {
        $cliente = \App\Cliente::find($id);
        return view('clienti.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = \App\Cliente::find($id);
        return view('clienti.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $city = \App\Cliente::find($id);
        $new_values = $request->all();
        
        $city->fill($new_values);
        $city->save();
        
        // TODO: mostrare messaggio nella view
        return redirect()->back()->with('success', 'Cliente salvato con successo!');
    }
}