<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas_vicidials', function (Blueprint $table) {

            //telemarketing sales table structure
            $table->comment('In this table all sales made by TMK in vicidial will be recorded');
            $table->id()->unsigned()
             ->comment('unique identifier of the affiliate');
            $table -> string ('sponsor','50')
             -> comment('sponsor name');
            $table-> string ('vendor_lead_code','60')
             ->comment('unique customer identifier provided by the sponsor');
            $table-> dateTimeTz ('call_date')
             ->comment('sale date');
            $table-> text ('campaign_id','15')
             ->comment('tmk campaign identifier number');
            $table-> text ('user_id','50')
             ->comment('tmk user identification number');
            $table-> text ('user_name','10')
             -> comment('user assigned to tmk advisor');
            $table-> string ('phone_number','10')
             ->comment('telephone number assigned to contact affiliate');
            $table-> string ('status_name','50')
             ->comment('classification or status of the sale');
            $table-> string ('first_name varchar')
             ->comment('members first name');
            $table-> string ('middle_name varchar')
            -> comment ('affiliates middle name');
            $table-> string ('last_name')
            ->comment('paternal and maternal surnames of the member');
            $table->string ('lead_id','50')
            ->comment('comments added by tmk advisor');
            $table-> text ('comments')
            ->comment('Comments assigned by user in tmk management');
            $table-> text ('server_location')
            ->comment('path of the server on which the call was made');
            $table->timestamps();

        });







    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_vicidials');
    }
};
