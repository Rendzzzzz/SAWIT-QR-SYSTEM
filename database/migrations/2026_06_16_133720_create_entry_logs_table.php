public function up()
{
    Schema::create('entry_logs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('driver_id')->constrained();
        $table->dateTime('waktu_masuk');
        $table->timestamps();
    });
}