<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sous_familles extends Model
{
    use HasFactory;
    protected $fillable = ['libelle', 'image', 'famille_id'];
    public function produits()
    {
        return $this->hasMany(Produits::class, 'sous_famille_id');
    }
}
