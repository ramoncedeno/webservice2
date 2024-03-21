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
        Schema::create('ventas_auditorias', function (Blueprint $table) {

            //structure of the sales table that goes to the audit and quality process
            $table->comment(' In this table the quality validation process and confirmation of the sale will be carried out');
            $table->id()->unsigned()
            ->comment('unique identifier of the affiliate in the audit process');;
            $table-> bigInteger ('id_vicidial')-> unsigned()
            ->comment; // foreing key
            $table-> string ('sponsor','50')
            ->comment('sponsor name');
            $table-> text ('status_name','50')
            ->comment('classification or status of the sale');
            $table-> string ('phone_number','10')
            ->comment('telephone number assigned to contact affiliate');
            $table-> string ('first_name')
            ->comment('members first name');
            $table-> string ('middle_name')
            ->comment ('affiliates middle name');
            $table-> string ('last_name')
            ->comment('paternal and maternal surnames of the member');
            $table-> text ('comments')
            ->comment ('Comment added by the auditor regarding the quality of the sale');
            $table-> timestamps ();

            //In this attribute the foreign key of the sales table is established
            $table->foreign('id_vicidial')->references('id')->on('ventas_vicidials');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proceso_auditorias');
    }
};
