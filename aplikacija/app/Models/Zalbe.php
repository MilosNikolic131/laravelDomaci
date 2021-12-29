<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class Zalbe extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'zalbe';
    public $timestamps = false;
    protected $fillable = [
        'tip_problema',
        'opis',
        'status',
        'id_prvog_nivoa',
        'id_drugog_nivoa'
    ];
    public function obradjivanPrviNivo()
    {
        return $this->belongsTo(Podrska_prvog_nivoa::class,foreignKey:'id_prvog_nivoa',ownerKey:'id');
    }

    public function obradjivanDrugiNivo()
    {
        return $this->belongsTo(Podrska_drugog_nivoa::class,foreignKey:'id_drugog_nivoa',ownerKey:'id');
    }

    
}
