<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $table = "cliente";

    protected $primaryKey = 'documento';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'documento',
        'nombre',
        'apellidos'
    ];

}
