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
        Schema::create('profile_tuk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tuk');
            $table->string('alamat_tuk');
            $table->string('telp_tuk');
            $table->string('ketua_tuk');
            $table->string('admin_tuk');
            $table->string('foto_tuk');
            $table->string('foto_lsp');
            $table->string('foto_bnsp');
            $table->string('mou_tuk');
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
        Schema::dropIfExists('profile_tuk');
    }
};
