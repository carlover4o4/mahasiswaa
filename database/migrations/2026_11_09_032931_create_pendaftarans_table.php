<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('prodi_id')->constrained();
            $table->string('namalengkap');
            $table->date('tgllahir');
            $table->enum('jk', ['wanita', 'pria']);
            $table->string('alamat');
            $table->enum('agama', ['islam', 'kristenprotestan', 'katolik', 'konghuchu', 'hindu', 'budha', 'lainnya']);
            $table->string('telpon');
            $table->year('lulusan');
            $table->enum('status', ['belumlunas', 'lunas'])->default('belumlunas');
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
        Schema::dropIfExists('pendaftarans');
    }
}
