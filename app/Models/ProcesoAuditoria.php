<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesoAuditoria extends Model
{
    use HasFactory;

        // These are the fillable attributes of the audit table

    public $fillable = [

        'id_vicidial',
        'sponsor',
        'status_name',
        'phone_number', // sensitive
        'first_name', // sensitive
        'middle_name', // sensitive
        'last_name', // sensitive

    ] ;

        // These are the protected attributes of the audit table
    public $protected = [

        'phone_number',
        'first_name',
        'middle_name',
        'last_name',

    ] ;
        // These are the encrypted attributes of the audit table
    public $cast = [

        'phone_number'=> 'hashed',
        'first_name'=> 'Encrypted',
        'middle_name'=> 'Encrypted',
        'last_name'=> 'Encrypted',

    ] ;
}
