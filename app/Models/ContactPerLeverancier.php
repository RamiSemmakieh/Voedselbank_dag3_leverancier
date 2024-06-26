<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerLeverancier extends Model
{
    use HasFactory;

    protected $table = 'contact_per_leverancier';

    protected $fillable = ['contact_id', 'leverancier_id'];
}
