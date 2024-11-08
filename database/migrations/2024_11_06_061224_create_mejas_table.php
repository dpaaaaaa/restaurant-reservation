<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_mejas_table.php

public function up()
{
    Schema::create('mejas', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_meja')->unique();
        $table->integer('kapasitas');
        $table->boolean('status')->default(1); // 1 untuk tersedia, 0 untuk terisi
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mejas');
    }
};
