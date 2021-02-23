<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistanceValue extends Model {

    use HasFactory;

    protected $fillable = [
        'unit', 'value',
    ];
}
