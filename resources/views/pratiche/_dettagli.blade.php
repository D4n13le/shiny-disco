<!-- Dettagli pratica -->
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-file-text"></i>
        &nbsp;
        Dati Pratica
    </div>

    <div class="panel-body">

        <div class="row">

            <!-- Numero pratica -->
            <strong class="col-md-2 form-control-static">Numero pratica</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->numero_pratica }}</p>
            </div>

            <!-- Numero registrazione -->
            <strong class="col-md-2 form-control-static">Numero registrazione</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->numero_registrazione }}</p>
            </div>
        </div>


        <div class="row">
            <!-- Data apertura -->
            <strong class="col-md-2 form-control-static">Data apertura</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_date($pratica->data_apertura) }}</p>
            </div>

            <!-- Stato pratica -->
            <strong class="col-md-2 form-control-static">Stato pratica</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ isset(\App\Pratica::$enumStatoPratica[$pratica->stato_pratica]) ? \App\Pratica::$enumStatoPratica[$pratica->stato_pratica] : '' }}</p>
            </div>
        </div>


        <div class="row">
            <!-- Tipo pratica -->
            <strong class="col-md-2 form-control-static">Tipo pratica</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ isset(\App\Pratica::$enumTipoPratica[$pratica->tipo_pratica]) ? \App\Pratica::$enumTipoPratica[$pratica->tipo_pratica] : '' }}</p>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        <i class="fa fa-user"></i>
        &nbsp;
        Dettagli parte
    </div>

    <div class="panel-body">

        <div class="row">
            <!-- Veicolo di parte -->
            <strong class="col-md-2 form-control-static">Veicolo di parte</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->veicolo_parte }}</p>
            </div>

            <!-- Targa di parte -->
            <strong class="col-md-2 form-control-static">Targa di parte</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->targa_parte }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Numero polizza di parte -->
            <strong class="col-md-2 form-control-static">Numero polizza di parte</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->numero_polizza_parte }}</p>
            </div>

            <!-- Assicurazione di parte -->
            <strong class="col-md-2 form-control-static">Assicurazione di parte</strong>
            <div class="col-md-4">
               <p class="form-control-static">{{ $pratica->assicurazione_parte }}</p>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-danger">
    <div class="panel-heading">
        <i class="fa fa-user-secret"></i>
        &nbsp;
        Dettagli controparte
    </div>

    <div class="panel-body">

        <div class="row">
            <!-- Conducente controparte -->
            <strong class="col-md-2 form-control-static">Conducente controparte</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->conducente_controparte }}</p>
            </div>

            <!-- Via controparte -->
            <strong class="col-md-2 form-control-static">Via controparte</strong>
            <div class="col-md-4">
               <p class="form-control-static">{{ $pratica->via_controparte }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Città controparte -->
            <strong class="col-md-2 form-control-static">Città controparte</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->citta_controparte }}</p>
            </div>

            <!-- Telefono controparte -->
            <strong class="col-md-2 form-control-static">Telefono controparte</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->telefono_controparte }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Veicolo controparte -->
            <strong class="col-md-2 form-control-static">Veicolo controparte</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->veicolo_controparte }}</p>
            </div>

            <!-- Targa controparte -->
            <strong class="col-md-2 form-control-static">Targa controparte</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->targa_controparte }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Numero polizza controparte -->
            <strong class="col-md-2 form-control-static">Numero polizza controparte</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->numero_polizza_controparte }}</p>
            </div>

            <!-- Proprietario mezzo responsabile -->
            <strong class="col-md-2 form-control-static">Proprietario mezzo reponsabile</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->proprietario_mezzo_responsabile }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Assicurazione controparte -->
            <strong class="col-md-2 form-control-static">Assicurazione controparte</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->assicurazione_controparte }}</p>
            </div>

            <!-- Parcella presunta -->
            <strong class="col-md-2 form-control-static">Parcella presunta</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_money($pratica->parcella_presunta) }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Medico controparte -->
            <strong class="col-md-1 form-control-static">Medico controparte</strong>
            <div class="col-md-3">
                <p class="form-control-static">{{ $pratica->medico_controparte }}</p>
            </div>

            <!-- Luogo medico controparte -->
            <strong class="col-md-1 form-control-static">Luogo medico</strong>
            <div class="col-md-3">
                <p class="form-control-static">{{ $pratica->luogo_medico_controparte }}</p>
            </div>

            <!-- Data medico controparte -->
            <strong class="col-md-1 form-control-static">Data medico</strong>
            <div class="col-md-3">
                <p class="form-control-static">{{ $pratica->data_medico_controparte }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Liquidatore -->
            <strong class="col-md-2 form-control-static">Liquidatore</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->liquidatore }}</p>
            </div>

            <!-- Reperibilità liquidatore -->
            <strong class="col-md-2 form-control-static">Reperibilità liquidatore</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->reperibilita_liquidatore }}</p>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-folder-open"></i>
        &nbsp;
        Dettagli pratica
    </div>

    <div class="panel-body">

        <div class="row">
            <!-- Legale -->
            <strong class="col-md-2 form-control-static">Legale</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->legale }}</p>
            </div>

            <!-- In data -->
            <strong class="col-md-2 form-control-static">In data</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_date($pratica->in_data) }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Controllato -->
            <strong class="col-md-2 form-control-static">Controllato</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ isset(\App\Pratica::$enumControllato[$pratica->controllato]) ? \App\Pratica::$enumControllato[$pratica->controllato] : '' }}</p>
            </div>

            <!-- Data ultima lettera -->
            <strong class="col-md-2 form-control-static">Data ultima lettera</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_date($pratica->data_ultima_lettera) }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Mezzo Liquidato -->
            <strong class="col-md-2 form-control-static">Mezzo liquidato</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_date($pratica->mezzo_liquidato) }}</p>
            </div>

            <!-- Valore mezzo liquidato -->
            <strong class="col-md-2 form-control-static">Valore mezzo liquidato</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_money($pratica->valore_mezzo_liquidato) }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Rilievi -->
            <strong class="col-md-2 form-control-static">Rilievi</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ isset(\App\Pratica::$enumRilievi[$pratica->rilievi]) ? \App\Pratica::$enumRilievi[$pratica->rilievi] : '' }}</p>
            </div>

            <!-- Data chiusura -->
            <strong class="col-md-2 form-control-static">Data chiusura</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_date($pratica->data_chiusura) }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Importo sospeso -->
            <strong class="col-md-2 form-control-static">Importo sospeso</strong>
            <div class="col-md-4">
               <p class="form-control-static">{{ format_money($pratica->importo_sospeso) }}</p>
            </div>

            <!-- Data sospeso -->
            <strong class="col-md-2 form-control-static">Data sospeso</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_date($pratica->data_sospeso) }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Onorari -->
            <strong class="col-md-2 form-control-static">Onorari</strong>
            <div class="col-md-4">
               <p class="form-control-static">{{ format_money($pratica->onorari) }}</p>
            </div>

            <!-- Liquidato omnia -->
            <strong class="col-md-2 form-control-static">Liquidato omnia</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_money($pratica->liquidato_omnia) }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Data prescrizione -->
            <strong class="col-md-2 form-control-static">Data prescrizione</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_date($pratica->data_prescrizione) }}</p>
            </div>

            <!-- Data prossima udienza -->
            <strong class="col-md-2 form-control-static">Data prossima udienza</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_date($pratica->data_prossima_udienza) }}</p>
            </div>
        </div>
        
        <div class="row">
            <!-- Segnalato da -->
            <strong class="col-md-2 form-control-static">Segnalato da</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->segnalato_da }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Stato avanzamento pratica -->
            <strong class="col-md-2 form-control-static">Stato avanzamento pratica</strong>
            <div class="col-md-10">
                <p class="form-control-static">{{ $pratica->stato_avanzamento }}</p>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-handshake-o"></i>
        &nbsp;
        Informazioni sinistro
    </div>

    <div class="panel-body">

        <div class="row">
            <!-- Data sinistro -->
            <strong class="col-md-2 form-control-static">Data sinistro</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_date($pratica->data_sinistro) }}</p>
            </div>

            <!-- Orario sinistro -->
            <strong class="col-md-2 form-control-static">Orario sinistro</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->ora_sinistro }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Luogo sinistro -->
            <strong class="col-md-2 form-control-static">Luogo sinistro</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->luogo_sinistro }}</p>
            </div>

            <!-- Testimoni -->
            <strong class="col-md-2 form-control-static">Testimoni</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->testimoni }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Autorità -->
            <strong class="col-md-2 form-control-static">Autorità</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->autorita ? $pratica->autorita->nome : '' }}</p>
            </div>

            <!-- Comando di -->
            <strong class="col-md-2 form-control-static">Comando di</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->comando_autorita }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Rivalsa -->
            <strong class="col-md-2 form-control-static">Rivalsa</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ isset(\App\Pratica::$enumRivalsa[$pratica->rivalsa]) ? \App\Pratica::$enumRivalsa[$pratica->rivalsa] : '' }}</p>
            </div>

            <!-- Soccorso -->
            <strong class="col-md-2 form-control-static">Soccorso</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ isset(\App\Pratica::$enumSoccorso[$pratica->soccorso]) ? \App\Pratica::$enumSoccorso[$pratica->soccorso] : '' }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Tipologia intervento -->
            <strong class="col-md-2 form-control-static">Tipologia intervento</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->tipologia_intervento }}</p>
            </div>

            <!-- Danno presunto -->
            <strong class="col-md-2 form-control-static">Danno presunto</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ format_money($pratica->danno_presunto) }}</p>

            </div>
        </div>

        <div class="row">
            <!-- Assicurazione responsabile -->
            <strong class="col-md-2 form-control-static">Assicurazione responsabile</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->assicurazione_responsabile }}</p>
            </div>

            <!-- Assicurazione risarcente -->
            <strong class="col-md-2 form-control-static">Assicurazione risarcente</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->assicurazione_risarcente }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Numero sinistro -->
            <strong class="col-md-2 form-control-static">Numero sinistro</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->numero_sinistro }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Mezzo visibile -->
            <strong class="col-md-2 form-control-static">Mezzo visibile</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->mezzo_visibile }}</p>
            </div>

            <!-- Dinamica -->
            <strong class="col-md-2 form-control-static">Dinamica</strong>
            <div class="col-md-4">
                <p class="form-control-static">{{ $pratica->dinamica_sinistro }}</p>
            </div>
        </div>

        <div class="row">
            <!-- Scheda Pratica (Note) -->
            <strong class="col-md-2 form-control-static text-danger">Scheda Pratica</strong>
            <div class="col-md-10">
               <p class="form-control-static text-newlines">{!! formatta_testo($pratica->scheda_pratica) !!}</p>
            </div>
        </div>
    </div>
</div>
