<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


class FattureController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
        $this->middleware('conferma-promemoria');
    }
    
    public function create(Request $request, $cliente_id, $pratica_id)
    {
        $pratica = \App\Pratica::findOrFail($pratica_id);
        
        if ($pratica->cliente->id != $cliente_id) {
            // Il cliente nell'url non corrisponde al cliente della pratica
            abort(404);
        }
        
        if($request->user()->cannot('generare-fatture')) {
            // L'utente non può generare fatture
            abort(403);
        }
        
        $fattura = new \App\Fattura;
        $fattura->data_emissione = \Carbon\Carbon::today();
        
        return view('fatture.create', compact('pratica', 'fattura'));
    }
    
    public function store(Request $request, $cliente_id, $pratica_id)
    {
        $pratica = \App\Pratica::findOrFail($pratica_id);
        
        if ($pratica->cliente->id != $cliente_id) {
            // Il cliente nell'url non corrisponde al cliente della pratica
            abort(404);
        }
        
        if($request->user()->cannot('generare-fatture')) {
            // L'utente non può generare fatture
            abort(403);
        }
        
        $this->validate($request, ['appartenenza' => 'required|numeric|max:3|min:1']);
        $this->validateInput($request);
        
        
        $year = \Carbon\Carbon::createFromFormat('d/m/Y', $request->data_emissione)->year;
        if (\App\Fattura::where('appartenenza', $request->appartenenza)
                        ->where('numero', $request->numero)
                        ->whereRaw('YEAR(data_emissione) = ?', [$year])
                        ->first())
        {
            // Esiste già una fattura per la solita "appartenenza" e il solito anno con il numero specificato
            return redirect()->back()->withInput()->withErrors(['message' => 'Numero fattura: esiste già una fattura con il numero specificato per questo anno.']);
        }
        
        $fattura = new \App\Fattura;
        $fattura->fill($request->all());
        
        $fattura->pratica()->associate($pratica);
        
        if (!$request->numero) {
            $fattura->numero = 
                \App\Fattura::where('appartenenza', $request->appartenenza)
                ->whereRaw('YEAR(data_emissione) = ?', [$year])
                ->max('numero') + 1;
        }
        
        $fattura->save();
        
        return redirect()->action('PraticheController@show', ['cliente' => $pratica->cliente, 'pratica' => $pratica])
            ->with('success', 'La fattura è stata salvata con successo.');
    }
    
    public function edit(Request $request, $cliente_id, $pratica_id, $fattura_id)
    {
        $fattura = \App\Fattura::findOrFail($fattura_id);
        
        if ($fattura->pratica->id != $pratica_id) {
            // La pratica nell'url non corrisponde alla pratica della prestazione
            abort(404);
        }
        
        if ($fattura->pratica->cliente->id != $cliente_id) {
            // Il cliente nell'url non corrisponde al cliente della pratica
            abort(404);
        }
        
        if($request->user()->cannot('generare-fatture', $fattura->pratica)) {
            // L'utente non può modificare fatture di altre filiali
            abort(403);
        }
        
        return view('fatture.edit', compact('fattura'));
    }
    
    public function update(Request $request, $cliente_id, $pratica_id, $fattura_id)
    {
        $fattura = \App\Fattura::findOrFail($fattura_id);
        
        if ($fattura->pratica->id != $pratica_id) {
            // La pratica nell'url non corrisponde alla pratica della prestazione
            abort(404);
        }
        
        if ($fattura->pratica->cliente->id != $cliente_id) {
            // Il cliente nell'url non corrisponde al cliente della pratica
            abort(404);
        }
        
        if($request->user()->cannot('generare-fatture', $fattura->pratica)) {
            // L'utente non può modificare fatture di altre filiali
            abort(403);
        }
        
        $this->validateInput($request);
        
        $year = \Carbon\Carbon::createFromFormat('d/m/Y', $request->data_emissione)->year;
        if (\App\Fattura::where('id', '<>', $fattura->id)
                        ->where('appartenenza', $fattura->appartenenza)
                        ->where('numero', $request->numero)
                        ->whereRaw('YEAR(data_emissione) = ?', [$year])->first())
        {
            // Esiste già una fattura per la solita "appartenenza" ed anno con il numero specificato,
            // che pero' non e' la fattura stessa
            return redirect()->back()->withInput()->withErrors(['message' => 'Numero fattura: esiste già una fattura con il numero specificato.']);
        }
        
        $fattura->numero = $request->numero;
        $fattura->dettaglio_prestazione = $request->dettaglio_prestazione;
        $fattura->data_emissione = $request->data_emissione;
        $fattura->importo_netto = $request->importo_netto;
        $fattura->importo_esente = $request->importo_esente;
        
        $fattura->save();
        
        return redirect()->action('PraticheController@show', ['cliente' => $fattura->pratica->cliente, 'pratica' => $fattura->pratica])
            ->with('success', 'La fattura è stata modificata con successo.');
    }
    
    public function show(Request $request, $cliente_id, $pratica_id, $fattura_id)
    {
        $fattura = \App\Fattura::findOrFail($fattura_id);
        
        if ($fattura->pratica->cliente->id != $cliente_id) {
            // Il cliente nell'url non corrisponde al cliente della pratica
            abort(404);
        }
        
        if ($fattura->pratica->id != $pratica_id) {
            // La pratica nell'url non corrisponde alla pratica della fattura
            abort(404);
        }
        
        if($request->user()->cannot('generare-fatture')) {
            // L'utente non può generare fatture
            abort(403);
        }
        
        $generator = new \App\Lettere\FatturaGenerator;
        $data = ['cliente' => $fattura->pratica->cliente->toArray(),
                 'pratica' => $fattura->pratica->toArray(),
                 'fattura' => $fattura->toArray()];
        $lettera = $generator->generate($data);
        return $lettera;
    }
    
    public function destroy(Request $request, $cliente_id, $pratica_id, $fattura_id)
    {
        $fattura = \App\Fattura::findOrFail($fattura_id);
        
        if ($fattura->pratica->cliente->id != $cliente_id) {
            // Il cliente nell'url non corrisponde al cliente della pratica
            abort(404);
        }
        
        if ($fattura->pratica->id != $pratica_id) {
            // La pratica nell'url non corrisponde alla pratica della fattura
            abort(404);
        }
        
        if($request->user()->cannot('cancellare-fatture')) {
            // L'utente non può cancellare fatture
            abort(403);
        }

        $fattura->delete();
        return redirect()->back()->with('success', 'La fattura é stata eliminata con successo!');
    }
    
    private function validateInput(Request $request)
    {
        $this->validate($request, [
            'dettaglio_prestazione'       => 'required|max:255',
            'numero'                      => 'numeric|max:100000000|min:1',
            'importo_netto'               => 'required|numeric|max:100000000|min:0',
            'importo_esente'              => 'required|numeric|max:100000000|min:0',
        ]);
    }
}
