public function up()
{
    Schema::table('drivers', function (Blueprint $table) {
        $table->string('username')->unique()->after('plat_nomor'); // misal: budi123
        $table->string('password')->after('username');
        $table->boolean('is_verified')->default(false)->after('password'); // Admin perlu verifikasi
    });
}