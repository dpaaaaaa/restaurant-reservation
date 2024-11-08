<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_pembayarans_table.php

public function up()
{
    Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pesanan_id')->constrained()->onDelete('cascade');
        $table->decimal('total_bayar', 10, 2);
        $table->date('tanggal_bayar');
        $table->string('metode_pembayaran'); // Misal: cash, debit, atau kartu kredit
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
