<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentasConfirmadas extends Model
{
    use HasFactory;


    public $fillable = [

        'sponsor',
        'status_name',
        'phone_number',
        'first_name',
        'middle_name',
        'last_name',
        'comments',
    ];

    public $protected =[

        'phone_number',
        'first_name',
        'middle_name',
        'last_name',
    ];


    protected $casts = [
        'date'=> 'timestamp',
        'phone_number'=> 'Encrypted',
        'first_name'=>'Encrypted' ,
        'middle_name'=>'Encrypted',
        'last_name'=>'Encrypted',
    ];
}
