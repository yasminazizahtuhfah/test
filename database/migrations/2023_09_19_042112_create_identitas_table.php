<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('identitas', function (Blueprint $table) {
            $table->string('id');
            $table->unique('id');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');  
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('status');
            $table->string('pas_foto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identitas');
    }
};
