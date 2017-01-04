@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-header text-center">
            Dettagli Cliente
        </h1>
        <a href="{{ action('ClientiController@show', $cliente)}}" class="btn btn-default pull-left"><i class="fa fa-arrow-left"></i></a>
    
        <a class="btn btn-danger pull-right"><i class="fa fa-trash"></i></a>
        <a href="{{ action('ClientiController@edit', $cliente) }}" class="btn btn-success pull-right"><i class="fa fa-pencil"></i></a>
        <div class="col-md-offset-1 col-md-10">
            <!-- Mostra errori di validazione -->
            @include('common.errors')
    
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-id-card"></i>
                    &nbsp;
                    Dati anagrafici
                </div>

                <div class="panel-body">
                        
                    <div class="row">
                        
                        <!-- Nome Cliente -->
                        <strong class="col-md-2 form-control-static">Nome</strong>
                        <div class="col-md-4">
                            <p class="form-control-static">{{ $cliente->nome }}</p>
                        </div>
                        
                        <!-- Cognome Cliente -->
                        <strong class="col-md-2 form-control-static">Cognome</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->cognome }}</p>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <!-- Città di nascita Cliente -->
                        <strong class="col-md-2 form-control-static">Città di nascita</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->citta_nascita }}</p>
                        </div>
                        
                        <!-- Data di nascita Cliente -->
                        <strong class="col-md-2 form-control-static">Data di nascita</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->data_nascita }}</p>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <!-- Sesso Cliente -->    
                        <strong class="col-md-2 form-control-static">Sesso</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->enumSesso[$cliente->sesso] }}</p>
                        </div>

                        
                        <!-- Codice Fiscale Cliente -->
                        <strong class="col-md-2 form-control-static">Codice Fiscale</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->codice_fiscale }}</p>
                        </div>
                    </div>
                </div>
            </div>
                        
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-road"></i>
                    &nbsp;
                    Indirizzo residenza
                </div>

                <div class="panel-body">
                        
                    <div class="row">
                        <!-- Via Cliente -->
                        <strong class="col-md-2 form-control-static">Via</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->via }}</p>
                        </div>
                    
                        <!-- Città di residenza Cliente -->
                        <strong class="col-md-2 form-control-static">Città di residenza</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->citta_residenza }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Provincia Cliente -->
                        <strong class="col-md-2 form-control-static">Provincia</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->provincia }}</p>
                        </div>
                        
                        <!-- CAP Cliente -->
                        <strong class="col-md-2 form-control-static">CAP</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->cap }}</p>
                        </div>
                    </div>
                </div>
            </div>
           <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-phone"></i>
                    &nbsp;
                    Recapiti
                </div>
                <div class="panel-body">
                    <div class="row">
                        <!-- Cellulare Cliente -->
                        <strong class="col-md-2 form-control-static">Cellulare</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->cellulare }}</p>
                        </div>
                    
                        <!-- Telefono Cliente -->
                        <strong class="col-md-2 form-control-static">Telefono</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->telefono }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Email Cliente -->
                        <strong class="col-md-2 form-control-static">Email</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->email }}</p>
                        </div>
                    
                        <!-- FAX Cliente -->
                        <strong class="col-md-2 form-control-static">FAX</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->fax }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-info"></i>
                    &nbsp;
                    Documenti
                </div>
                <div class="panel-body">                            
                        
                    <div class="row">
                        <!-- P. IVA Cliente -->
                        <strong class="col-md-2 form-control-static">P. IVA</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->partita_iva }}</p>
                        </div>
                        
                        <!-- Stato civile Cliente -->
                        <strong class="col-md-2 form-control-static">Stato civile</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->enumStatoCivile[$cliente->stato_civile] }}</p>
                        </div>
                    
                        
                    </div>
                    
                    
                    <div class="row">
                        <!-- Tipo documento Cliente -->
                        <strong class="col-md-2 form-control-static">Tipo documento</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->enumTipoDocumento[$cliente->tipo_documento] }}</p>
                        </div>
                        
                        <!-- Numero documento Cliente -->
                        <strong class="col-md-2 form-control-static">N. documento</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->numero_documento }}</p>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <!-- Reddito Cliente -->
                        <strong class="col-md-2 form-control-static">Reddito</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->reddito }}</p>
                        </div>
                    
                        <!-- Numero Card Cliente -->
                        <strong class="col-md-2 form-control-static">Numero Card</strong>
                        <div class="col-md-4">
                            <p value="" class="form-control-static">{{ $cliente->numero_card }}</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <!-- Note Cliente -->
                        <strong class="col-md-2 form-control-static">Note</strong>
                        <div class="col-md-10">
                            <p value="" class="form-control-static">{{ $cliente->note }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection