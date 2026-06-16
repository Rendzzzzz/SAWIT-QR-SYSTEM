public function up()
{
    Schema::create('drivers', function (Blueprint $table) {
        $table->id();
        $table->string('nama_driver');
        $table->string('plat_nomor')->unique();
        $table->string('no_hp');
        $table->integer('muatan_kg'); // Berat muatan sawit yang diangkut
        $table->string('qr_code_token')->unique(); // Token unik untuk QR
        $table->timestamps();
    });
}