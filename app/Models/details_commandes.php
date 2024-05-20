<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class details_commandes extends Model
{
    use HasFactory;
    protected $fillable = ['commande_id', 'produit_id', 'quantite', 'prix_ht', 'tva'];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produits::class);
    }
}
