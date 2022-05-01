<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'iva',
        'cf',
        'email',
        'results',
        'id_promo',
        'section_id'
    ];
}
