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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('pai');
            $table->string('mae');
            $table->string('identidade',14)->unique();
            $table->string('morada',50);
            $table->enum('genero',['F','M']);
            $table->enum('lingua',['Inglesh','Frances']);
            $table->string('nacionalidade')->default('Angolana');
            $table->string('foto');
            $table->string('naturalidade');
            $table->string('provincia');
            $table->string('municipio');
            $table->string('telefone')->unique();
            $table->date('data_nascimento');
            $table->unsignedBigInteger('usuario');
            $table->foreign('usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->smallInteger('idade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
