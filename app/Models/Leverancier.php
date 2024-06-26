<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    use HasFactory;

    protected $fillable = ['naam', 'contactpersoon', 'leverancier_nummer', 'leverancier_type'];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contact_per_leverancier');
    }
}
