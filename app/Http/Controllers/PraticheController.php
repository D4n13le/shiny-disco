<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PraticheController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function indexAll(Request $request)
    {
        $pratiche = \App\Pratica::whereHas('cliente', function($query) {
            $query->where('filiale_id', $this->filialeUtente()->id);
        })->get();
        
        return view('pratiche.index', compact('pratiche'));
    }
    
    public function show($cliente_id, $pratica_id)
    {
        $pratica = \App\Pratica::find($pratica_id);
        
        if($pratica->cliente->filiale != $this->filialeUtente()) {
            // L'utente non ha il permesso di vedere questa pratica
            abort(403);
        }
        
        $documenti = $pratica->documenti()->get();
        return view('pratiche.show', compact('pratica', 'documenti'));
    }

    public function edit($cliente_id, $pratica_id)
    {
        $pratica = \App\Pratica::find($pratica_id);
        
        if($pratica->cliente->filiale != $this->filialeUtente()) {
            // L'utente non ha il permesso di vedere questa pratica
            abort(403);
        }
        
        return view('pratiche.edit', compact('pratica'));
    }

    public function update(Request $request, $cliente_id, $pratica_id)
    {
        $pratica = \App\Pratica::find($pratica_id);
        
        if($pratica->cliente->filiale != $this->filialeUtente()) {
            // L'utente non ha il permesso di vedere questa pratica
            abort(403);
        }
        
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
        
        if($cliente->filiale != $this->filialeUtente()) {
            // L'utente non ha il permesso di aggiungere pratiche a clienti di altre filiali
            abort(403);
        }
        
        return view('pratiche.create', compact('cliente'));
    }
    
    public function store(Request $request, $cliente_id)
    {
        $cliente = \App\Cliente::find($cliente_id);
        
        if($cliente->filiale != $this->filialeUtente()) {
            // L'utente non ha il permesso di aggiungere pratiche a clienti di altre filiali
            abort(403);
        }
        
        $pratica = new \App\Pratica;
        $new_values = $request->all();
        
        $pratica->fill($new_values);
        
        $pratica->cliente()->associate($cliente);
        $pratica->save();
        
        // TODO: mostrare messaggio nella view
        return redirect()->action('PraticheController@show', ['cliente' => $pratica->cliente, 'pratica' => $pratica])
                    ->with('success', 'Pratica salvato con successo!');
    }
    
    //Questa funzione è presente anche su ClientiController, un giorno mi ringrazierai Dani.
    private function filialeUtente()
    {
        $user = Auth::user();
        return $user->filiale;
    }
}
