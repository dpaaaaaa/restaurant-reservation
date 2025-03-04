    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        // database/migrations/xxxx_xx_xx_create_menus_table.php

        public function up()
        {
            Schema::create('menus', function (Blueprint $table) {
                $table->id();
                $table->string('nama_menu');
                $table->text('deskripsi')->nullable();
                $table->decimal('harga', 10, 2);
                $table->string('image')->nullable(); // Tambahkan kolom untuk gambar
                $table->timestamps();
            });
        }


        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('menus');
        }
    };
