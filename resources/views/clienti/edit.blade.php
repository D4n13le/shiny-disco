@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Mostra pulsanti navigazione -->
        <div class="page-header">
            <h1 class="text-center">
                Modifica Cliente
            </h1>
            <div>
                <div class="pull-left">
                </div>
                <div class="pull-right">
                </div>
            </div>
        </div>

        <div>
            <!-- Mostra errori di validazione -->
            @include('common.errors')
    
            @include('partials._form_cliente')
        </div>
    </div>
@endsection
