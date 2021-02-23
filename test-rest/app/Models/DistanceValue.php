<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

class DistanceValue extends Model {

    use HasFactory;

    protected $fillable = [
        'unit', 'value',
    ];
}
