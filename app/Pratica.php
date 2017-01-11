<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Pratica extends Model
{
    use FormAccessible;
    
    protected $table = 'pratiche';
    
    /**
     *  Ritorna le pratiche relative al cliente
     *
     */
    public function cliente()
    {
        return $this->belongsTo('\App\Cliente', 'cliente_id');
    }
    
    /**
     *  Ritorna i documenti relativi alla pratica
     */
    public function documenti()
    {
        return $this->hasMany('\App\Documento', 'pratica_id', 'id');
    }
    
    
    /**
     *  Ritorna gli assegni relativi alla pratica
     */
    public function assegni()
    {
        return $this->hasMany('\App\Assegno', 'pratica_id', 'id');
    }
    
    
    // Mutator data_apertura
    public function setDataAperturaAttribute($value)
    {
        if (is_string($value) && $value !== '')
            $this->attributes['data_apertura'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value);
        else if ($value === '')
            $this->attributes['data_apertura'] = null;
        else
            $this->attributes['data_apertura'] = $value;
    }

    // Mutator in_data
    public function setInDataAttribute($value)
    {
        if (is_string($value) && $value !== '')
            $this->attributes['in_data'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value);
        else if ($value === '')
            $this->attributes['in_data'] = null;
        else
            $this->attributes['in_data'] = $value;
    }

    // Mutator data_ultima_lettera
    public function setDataUltimaLetteraAttribute($value)
    {
        if (is_string($value) && $value !== '')
            $this->attributes['data_ultima_lettera'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value);
        else if ($value === '')
            $this->attributes['data_ultima_lettera'] = null;
        else
            $this->attributes['data_ultima_lettera'] = $value;
    }
    
    // Mutator data_chiusura
    public function setDataChiusuraAttribute($value)
    {
        if (is_string($value) && $value !== '')
            $this->attributes['data_chiusura'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value);
        else if ($value === '')
            $this->attributes['data_chiusura'] = null;
        else
            $this->attributes['data_chiusura'] = $value;
    }
    
    // Mutator data_sospeso
    public function setDataSospesoAttribute($value)
    {
        if (is_string($value) && $value !== '')
            $this->attributes['data_sospeso'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value);
        else if ($value === '')
            $this->attributes['data_sospeso'] = null;
        else
            $this->attributes['data_sospeso'] = $value;
    }
    
    // Mutator data_sinistro
    public function setDataSinistroAttribute($value)
    {
        if (is_string($value) && $value !== '')
            $this->attributes['data_sinistro'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value);
        else if ($value === '')
            $this->attributes['data_sinistro'] = null;
        else
            $this->attributes['data_sinistro'] = $value;
    }
    
    
    // Mutator data_ultima_lettera
    public function getDataUltimaLetteraHAttribute($value)
    {
        if ($this->data_ultima_lettera instanceof \Carbon\Carbon)
            return $this->data_ultima_lettera->format('m/d/Y');
        else '';
    }
    
    
    // Form Accessor data_apertura
    public function formDataAperturaAttribute($value)
    {
        return format_date($value);
    }
    
    // Form Accessor in_data
    public function formInDataAttribute($value)
    {
        return format_date($value);
    }
    
    // Form Accessor data_ultima_lettera
    public function formDataUltimaLetteraAttribute($value)
    {
        return format_date($value);
    }
    
    // Form Accessor data_chiusura
    public function formDataChiusuraAttribute($value)
    {
        return format_date($value);
    }
    
    // Form Accessor data_sospeso
    public function formDataSospesoAttribute($value)
    {
        return format_date($value);
    }
    
    // Form Accessor data_sospeso
    public function formDataSinistroAttribute($value)
    {
        return format_date($value);
    }
    
    
    protected $dates = [
        'data_apertura',
        'in_data',
        'data_ultima_lettera',
        'data_chiusura',
        'data_sospeso',
        'data_sinistro',
    ];
    
    
    public static $enumStatoPratica = [
		0 => 'Aperto',
		1 => 'Chiuso',
		2 => 'SS',
		3 => 'SS. Legale',
		4 => 'Aperto liq. pari', 
	];

    public static $enumTipoPratica = [
        0 => 'Sconosciuto',
		1 => 'RCT',
		2 => 'RCA lesioni',
		3 => 'RCA lesioni e cose',
		4 => 'RCA lesioni e cose indennizzo diretto', 
		5 => 'RCA persona',
		6 => 'RCA lesioni indennizzo diretto',
		7 => 'RCA persone e cose indennizzo diretto',
		8 => 'RCA cose indennizzo diretto',
		9 => 'RCA persone e cose', 
		10=> 'RCA persona indennizzo diretto',
		11 => 'RCA', 
		12 => 'RCT/RCG', 
		13 => 'INAIL',
		14 => 'Furto',
		15 => 'Malattia',
		16 => 'RCT/RCG', 
		17 => 'Infortuni', 
	];

    public static $enumMezzoLiquidabile = [	
 		0 => '',
		1 => 'Sì',
		2 => 'No'
	];
	
	public static $enumControllato = [
		0 => 'No',
		1 => 'Sì',
	];
    						
    public static $enumStatoAvanzamento = [
        0 => 'Sconosciuto',
		1 => 'Trattabile',
		2 => 'Attesa importo da direzione',
		3 => 'Attesa perizia di controparte',
		4 => 'Attesa importo da cliente',
		5 => 'Attesa certifizaione medici propri',
		6 => 'Attesa certificazione medico convenzione',
		7 => 'In gestione a terzi',
		8 => 'Attesa perizia di parte',
	];
    
    public static $enumRilievi = [
		0 => 'Rilievi non necessari', 
		1 => 'Rilievi presi',
		2 => 'Rilievi da prendere',
		3 => 'Rilievi portati da cliente',
	];
    						
    public static $enumAutorita = [
		0 => 'Sconosciuta',
		1 => 'Polizia',
		2 => 'Polizia stradale',
		3 => 'Carabinieri',
		4 => 'Vigili urbani',
	];
    
    public static $enumRivalsa = [
		0 => 'No rivalsa',
		1 => 'Da verificare',
		2 => 'Rivalsa INPS',
		3 => 'Rivalsa INAIL',
		4 => 'Rivalsa altre ass',
	];
    				
    public static $enumSoccorso = [
		0 => 'Da solo', 
		1 => 'Da terzi',
		2 => 'Ambulanza',
		3 => 'Da parenti',
		4 => 'Dal responsabile',
	];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numero_pratica',
        'numero_registrazione',
        'stato_pratica',
        'tipo_pratica',
        'data_apertura',
        
        'veicolo_parte',
        'targa_parte',
        'numero_polizza_parte',
        'assicurazione_parte',
        
        'conducente_controparte',
        'via_controparte',
        'citta_controparte',
        'telefono_controparte',
        'veicolo_controparte',
        'targa_controparte',
        'numero_polizza_controparte',
        'proprietario_mezzo_responsabile',
        'assicurazione_controparte',
        'medico_controparte',
        
        'legale',
        'in_data',
        'controllato',
        'data_ultima_lettera',
        'mezzo_liquidabile',
        'valore_mezzo_liquidabile',
        'rilievi',
        'data_chiusura',
        'importo_sospeso',
        'data_sospeso',
        'stato_avanzamento',
        
        'data_sinistro',
        'ora_sinistro',
        'luogo_sinistro',
        'autorita',
        'comando_autorita',
        'testimoni',
        'rivalsa',
        'soccorso',
        'tipologia_intervento',
        'danno_presunto',
        'numero_sinistro',
        
        'assicurazione_risarcente',
        'assicurazione_responsabile',
        'mezzo_visibile',
        'dinamica_sinistro',
        'note',
    ];
}
