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
        Schema::create('declaracaos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',['com nota','frequência']);
            $table->unsignedBigInteger('aluno');
            $table->string('anoFrequencia');
            $table->string('pagamento');
            $table->foreign('aluno')->references('id')->on('alunos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaracaos');
    }
};
