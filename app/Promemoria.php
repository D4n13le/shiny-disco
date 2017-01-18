<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promemoria extends Model
{
    protected $table = 'promemoria';
    
    /**
     *  Ritorna la pratica relativa al promemoria
     */
    public function pratica()
    {
        return $this->belongsTo('\App\Pratica', 'pratica_id');
    }
    
    // Mutator quando
    public function setQuandoAttribute($value)
    {
        if (is_string($value) && $value !== '')
            $this->attributes['quando'] = \Carbon\Carbon::createFromFormat('d/m/Y', $value);
        else if ($value === '')
            $this->attributes['quando'] = null;
        else
            $this->attributes['quando'] = $value;
    }
    
    // Form Accessor quando
    public function formQuandoAttribute($value)
    {
        return format_date($value);
    }
    
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'chi', 'quando', 'cosa' ];
    protected $dates = ['quando'];

}