<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produits extends Model
{
    use HasFactory;
    protected $fillable = [
        'codebarre',
        'designation',
        'prix_ht',
        'tva',
        'description',
        'image',
        'sous_famille_id',
        'marque_id',
        'unite_id',
    ];
    public function sousFamille()
    {
        return $this->belongsTo(sous_familles::class, 'sous_famille_id');
    }
    public function unite(){
        return $this->belongsTo(unites::class, 'unite_id');
    }
    public function detailsCommandes()
    {
        return $this->hasMany(DetailsCommande::class);
    }
}
