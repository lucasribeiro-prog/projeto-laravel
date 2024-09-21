<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //criando a coluna motivo_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato_id');
        });

        //copiando os dados da coluna motivo_contato para motivo_contato_id
        DB::statement('update site_contatos set motivo_contato_id = motivo_contato');

        //criando a fk
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropForeign('site_contatos_motivo_contato_id_foreign');
        });

        DB::statement('update site_contatos set motivo_contato = motivo_contato_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contato_id');
        });
    }
};
