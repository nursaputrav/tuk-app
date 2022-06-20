<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email')->unique();
            $table->string('no_telp')->nullable()->unique();

            $table->foreignId('sekolah_id')->nullable();
            $table->foreignId('program_keahlian_id')->nullable();
            $table->foreignId('kelas_id')->nullable();
            // $table->foreignId('project_id')->nullable();

            $table->enum('status_siswa', ['bekerja','belum_bekerja'])->nullable();
            $table->enum('jenis_kelamin', ['laki-laki','perempuan'])->nullable();
            $table->enum('level', ['user','admin'])->default('user')->nullable();
            $table->string('foto_profile')->nullable();

            $table->string('tahun_ajaran')->nullable();
            $table->text('alamat')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
