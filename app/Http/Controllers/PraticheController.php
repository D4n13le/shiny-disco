<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class PraticheController extends Controller
{
    public function indexAll(Request $request)
    {
        $pratiche = \App\Pratica::all();
        return view('pratiche.index', compact('pratiche'));
    }
    
    public function show($cliente_id, $pratica_id)
    {
        $pratica = \App\Pratica::find($pratica_id);
        return view('pratiche.show', compact('pratica'));
    }

    public function edit($cliente_id, $pratica_id)
    {
        $pratica = \App\Pratica::find($pratica_id);
        return view('pratiche.edit', compact('pratica'));
    }

    public function update(Request $request, $cliente_id, $pratica_id)
    {
        $pratica = \App\Pratica::find($pratica_id);
        $new_values = $request->all();
        
        $pratica->fill($new_values);
        $pratica->save();
        
        // TODO: mostrare messaggio nella view
        return redirect()->action('PraticheController@show', ['cliente' => $pratica->cliente, 'pratica' => $pratica])
                    ->with('success', 'Pratica salvato con successo!');
    }
    
    public function create(Request $request, $id)
    {
        $cliente = \App\Cliente::find($id);
        return view('pratiche.create', compact('cliente'));
    }
    
    public function store(Request $request, $cliente_id)
    {
        $pratica = new \App\Pratica;
        $new_values = $request->all();
        
        $pratica->fill($new_values);
        
        $cliente = \App\Cliente::find($cliente_id);
        $pratica->cliente()->associate($cliente);
        $pratica->save();
        
        // TODO: mostrare messaggio nella view
        return redirect()->action('PraticheController@show', ['cliente' => $pratica->cliente, 'pratica' => $pratica])
                    ->with('success', 'Pratica salvato con successo!');
    }
}
