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

public function getTotalAttribute()
{
    return $this->detailsCommandes->sum(function ($d) {
        $ht = $d->quantite * $d->prix_ht;
        return $ht + ($ht * $d->tva / 100);
    });
}


public function detailsCommandes()
{
    return $this->hasMany(details_commandes::class, 'commande_id');
}
    public function user()
{
    return $this->belongsTo(User::class);
}

public function modeReglement()
{
    return $this->belongsTo(mode_reglements::class, 'mode_reglements_id');
}
public function etat()
{
    return $this->belongsTo(etats::class);
}
}
