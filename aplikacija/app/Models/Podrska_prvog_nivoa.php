<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class Podrska_prvog_nivoa extends Model
{
    use HasFactory,HasApiTokens;
    protected $table = 'podrska_prvog_nivoa';
    public $timestamps = false;
    protected $fillable = [
        'ime',
        'prezime',
        'korisnickoIme',
        'password',
        'id_nadredjenog'
    ];
    public function obradjujeZalbu()
    {
        return $this->hasMany(Zalbe::class,foreignKey:'id_prvog_nivoa',localKey:'id');
    }

    public function nadgledan()
    {
        return $this->belongsTo(Podrska_drugog_nivoa::class,foreignKey:'id_nadredjenog',ownerKey:'id');
    }
}
