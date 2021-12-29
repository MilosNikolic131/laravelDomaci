<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Podrska_drugog_nivoa extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'podrska_drugog_nivoa';
    public $timestamps = false;
    protected $fillable = [
        'ime',
        'prezime',
        'korisnickoIme',
        'password'
    ];
    public function obradjuje()
    {
        return $this->hasMany(Zalbe::class, foreignKey: 'id_drugog_nivoa', localKey: 'id');
    }
    public function nadgleda()
    {
        return $this->hasMany(Podrska_prvog_nivoa::class, foreignKey: 'id_nadredjenog', localKey: 'id');
    }
}
