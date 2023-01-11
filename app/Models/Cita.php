<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "cita";

    public const estados= [
        1 => 'Activa',
        2 => 'Cancelada',
        3 => 'Finalizada'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fecha_cita',
        'start',
        'end',
        'id_cliente',
        'id_estado',
        'mascota'
    ];

    protected $attributes = [
        'id_estado' => 1
    ];

    public function estado(){
        return self::estados[$this->id_estado];
    }

    public function estados(){
        return self::estados;
    }

}
