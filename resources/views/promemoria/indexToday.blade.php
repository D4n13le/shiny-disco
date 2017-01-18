@extends('layouts.app')

@section('content')
    @include('common._modal_elimina',
       ['resource' => 'compagnia',
        'message' => 'Sei sicuro di voler eliminare la compagnia? Questa operazione non potrà essere annullata.'])
    
    <div class="container">
        <h1 class="page-header text-center">Agenda di oggi</h1>
        <div>
            @include('common._barra_filiale')
            <div class="panel panel-default">
                <!-- Lista promemoria da completare -->
                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Chi</th>
                            <th>Quando</th>
                            <th>Cosa</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </thead>
                        @if (count($promemoria) > 0)
                            <tbody>
                                @foreach ($promemoria as $p)
                                    <tr>
                                        <td class="table-text col-md-2"><div>{{ $p->chi }}</div></td>
                                        <td class="table-text col-md-2"><div>{{ date_diff_days($p->quando) }}</div></td>
                                        <td class="table-text col-md-6"><div>{{ $p->cosa }}</div></td>
                                        <td class="col-md-1">
                                            <a class="btn btn-default" href="{{ action('PraticheController@show', 
                                                ['cliente' => $p->pratica->cliente, 'pratica' => $p->pratica])}}">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                        </td>
                                        <td class="col-md-1">
                                            {!! Form::open(['action' => ['PromemoriaController@destroy', 'cliente' => $p->pratica->cliente,
                                                'pratica' => $p->pratica, 'promemoria' => $p], 'method' => 'delete']) !!}
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-fw fa-check"></i>
                                                </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                    @if (count($promemoria) == 0)
                        <p class="text-center">Non sono presenti promemoria da completare per oggi</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection