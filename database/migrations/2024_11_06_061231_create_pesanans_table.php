<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_pesanans_table.php

public function up()
{
    Schema::create('pesanans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pelanggan_id')->constrained()->onDelete('restrict');
        $table->foreignId('menu_id')->constrained()->onDelete('cascade');
        $table->integer('jumlah');
        $table->decimal('total_harga', 10, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
