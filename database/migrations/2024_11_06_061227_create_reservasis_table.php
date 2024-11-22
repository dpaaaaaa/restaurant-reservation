<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_reservasis_table.php

public function up()
{
    Schema::create('reservasis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pelanggan_id')->constrained()->onDelete('cascade');
        $table->foreignId('meja_id')->constrained()->onDelete('cascade');
        $table->dateTime('tanggal_reservasi');
        $table->integer('jumlah_orang');
        $table->string('status')->default('pending'); // status: pending, confirmed, cancelled
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};
