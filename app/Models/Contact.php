<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['straat', 'huisnummer', 'toevoeging', 'postcode', 'woonplaats', 'email', 'mobiel'];

    public function leveranciers()
    {
        return $this->belongsToMany(Leverancier::class, 'contact_per_leverancier');
    }
}
