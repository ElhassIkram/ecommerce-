<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Familles; 

class sous_familles extends Model
{
    use HasFactory;

    protected $fillable = ['libelle', 'image', 'famille_id'];
    public function produits()
    {
        return $this->hasMany(Produits::class, 'sous_famille_id');
    }
    // Relation inverse avec Familles (sous_familles appartient à une Famille)
    public function famille()
    {
        return $this->belongsTo(Familles::class, 'famille_id');
    }

}
