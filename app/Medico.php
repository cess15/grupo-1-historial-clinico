<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario_id', 'especialidad_id'
    ];

    public $timestamps = false;

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'especialidad_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function cita()
    {
        return $this->hasOne(Cita::class, 'medico_id');
    }

    public function consulta()
    {
        return $this->hasOne(Consulta::class, 'medico_id');
    }
}
