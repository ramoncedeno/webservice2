<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentasVicidial extends Model
{
    use HasFactory;

        // these are the fillable attributes of the sales table

        public $fillable = [


            'sponsor',
            'vendor_lead_code', // < sensitive
            'call_date',
            'campaign_id',
            'user_id',
            'user_name',
            'phone_number',
            'status_name',
            'first_name',
            'middle_name',
            'last_name',
            'lead_id',
            'comments',
            'server_location', // < sensitive

        ];

        //these are the protected attributes of the sales table

        public $protected =[

            'vendor_lead_code',
            'phone_number',
            'first_name',
            'middle_name',
            'last_name',
            'server_location',

        ];


        // These are the hidden and encrypted attributes of the sales table

        public $cast =[

            'call_date'=>'timestamps', //< date format
            'vendor_lead_code'=>'hashed',
            'phone_number'=>'hashed',
            'first_name'=>'encrypted',
            'middle_name'=>'encrypted',
            'last_name'=>'encrypted',

        ];





}
