<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commandes extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'regle',
        'mode_reglements_id',
        'etat_id',
        'user_id',
    ];


    public function detailsCommandes()
    {
        return $this->hasMany(DetailsCommande::class);
    }
}
