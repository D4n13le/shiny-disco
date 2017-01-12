<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ClientiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if ($request->user()->isAdmin())
            $clienti = \App\Cliente::filter($request->all())->get();
        else
            $clienti = \App\Cliente::where('filiale_id', $request->user()->filiale->id)
                                     ->filter($request->all())->get();
        
        $filiali = \App\Filiale::pluck('nome', 'id');
        
        return view('clienti.index', compact('clienti', 'filiali'));
    }

    public function show(Request $request, $id)
    {
        $cliente = \App\Cliente::findOrFail($id);
        
        if ($request->user()->cannot('visualizzare-cliente', $cliente)) {
            // L'utente sta cercando di accedere ad un cliente che non gli appartiene
            abort(403);
        }
        
        $pratiche = $cliente->pratiche()->latest('data_apertura')->get();
        
        return view('clienti.show', compact('cliente', 'pratiche'));
    }

    public function edit(Request $request, $id)
    {
        $cliente = \App\Cliente::findOrFail($id);
        
        if ($request->user()->cannot('modificare-cliente', $cliente)) {
            // L'utente sta cercando di accedere ad un cliente che non gli appartiene
            abort(403);
        }
        
        $professioni = \App\Professione::pluck('nome', 'id');
        
        
        return view('clienti.edit', compact('cliente', 'professioni'));
    }

    public function update(Request $request, $id)
    {
        $cliente = \App\Cliente::findOrFail($id);
        
        if ($request->user()->cannot('modificare-cliente', $cliente)) {
            // L'utente sta cercando di accedere ad un cliente che non gli appartiene
            abort(403);
        }
        
        $this->validateInput($request);

        $new_values = $request->all();
        $cliente->fill($new_values);
        
        if ($request->professione_id) {
            $professione = \App\Professione::findOrFail($request->professione_id);
            $cliente->professione()->associate($professione);
        } else {
            $cliente->professione()->dissociate();
        }
            
        $cliente->save();
        
        // TODO: mostrare messaggio nella view
        return redirect()->action('ClientiController@show', $cliente)->with('success', 'Cliente salvato con successo!');
    }
    
    public function create()
    {
        $professioni = \App\Professione::pluck('nome', 'id');
        return view('clienti.create', compact('professioni'));
    }
    
    public function store(Request $request)
    {
        $this->validateInput($request);
        
        $cliente = new \App\Cliente;
        $new_values = $request->all();
        
        $filiale = $request->user()->filiale;
        
        $cliente->fill($new_values);
        $cliente->filiale()->associate($filiale);
        
        $professione = \App\Professione::findOrFail($request->professione_id);
        $cliente->professione()->associate($professione);
        
        
        $cliente->save();
        
        // TODO: mostrare messaggio nella view
        return redirect()->action('ClientiController@show', $cliente)->with('success', 'Cliente salvato con successo!');
    }
    
    public function destroy(Request $request, $cliente_id)
    {
        $cliente = \App\Cliente::findOrFail($cliente_id);
        
        if ($request->user()->cannot('eliminare-cliente', $cliente)) {
            // L'utente sta cercando di eliminare un cliente che non gli appartiene
            abort(403);
        }
        
        $cliente->delete();
        
        // TODO: mostrare messaggio nella view
        return redirect()->action('ClientiController@index')->with('success', 'Cliente eliminato con successo!');
    }
    
    public function filter(Request $request)
    {
        $params = [];
        foreach($request->all() as $k => $v)
        {
            if ($k[0] != '_' && $v != '')
                $params[$k] = $v;
        }
        
        $query = http_build_query($params);
        return redirect()->action('ClientiController@index', $query);
    }
    
    private function validateInput(Request $request)
    {
        $this->validate($request, [
            'cognome'                   => 'required|max:255',
            'nome'                      => 'required|max:255',
            'citta_nascita'             => 'max:255',
            'data_nascita'              => 'date_format:d/m/Y|before:today',
            'sesso'                     => 'numeric|in:' . implode(',', array_keys(\App\Cliente::$enumSesso)),
            'codice_fiscale'            => 'regex:/^[a-z]{6}[0-9]{2}[a-z][0-9]{2}[a-z][0-9]{3}[a-z]$/i',
            'via'                       => 'max:255',
            'citta_residenza'           => 'max:255',
            'provincia'                 => 'alpha|max:2',
            'cap'                       => 'regex:/^[0-9]{5}$/',
            'cellulare'                 => 'max:255',
            'telefono'                  => 'max:255',
            'email'                     => 'email',
            'fax'                       => 'max:255',
            'partita_iva'               => 'regex:/^[0-9]{11}$/',
            'tipo_documento'            => 'numeric|in:' . implode(',', array_keys(\App\Cliente::$enumTipoDocumento)),
            'numero_documento'          => 'max:255',
            'stato_civile'              => 'numeric|in:' . implode(',', array_keys(\App\Cliente::$enumStatoCivile)),
            'reddito'                   => 'numeric|max:100000000',
            'numero_card'               => 'max:255'
        ]);
    }
}
