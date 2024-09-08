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
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filiais', 30);
            $table->timestamps();
        });

        Schema::create('produtos_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->float('preco_venda', 8, 2)->default(0.1);
            $table->integer('estoque_minino')->default(1);
            $table->integer('estoque_maximo')->default(1);

            //foreign keys
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
            
            $table->timestamps();
        });

        //removendo colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque_minino', 'estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->float('preco_venda', 8, 2)->default(0.1);
            $table->integer('estoque_minino')->default(1);
            $table->integer('estoque_maximo')->default(1);
        });

        Schema::dropIfExists('produtos_filiais');
        Schema::dropIfExists('filiais');
    }
};
