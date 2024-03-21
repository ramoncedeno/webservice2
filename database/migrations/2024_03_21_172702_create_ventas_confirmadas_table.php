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
        Schema::create('ventas_verificadas', function (Blueprint $table) {

            $table->comment(' This table will be used for sales that approved the quality process');
            $table->id()->unsigned();
            $table-> bigInteger ('id_vicidial',)->unsigned();
            $table-> string ( 'sponsor','60');
            $table-> string ( 'status_name','60');
            $table-> string ( 'phone_number','10');
            $table-> string ( 'first_name',);
            $table-> string ( 'middle_name',);
            $table-> string ( 'last_name',);
            $table-> text ( 'comments',);
            $table->foreign('id_vicidial')->references('id')->on('ventas_vicidials');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_confirmadas');
    }
};
