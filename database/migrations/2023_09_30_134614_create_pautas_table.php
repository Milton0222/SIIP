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
        Schema::create('pautas', function (Blueprint $table) {
            $table->decimal('valor', 10, 2, true);
            $table->string('classificacao');
            $table->unsignedBigInteger('aluno');
            $table->foreign('aluno')->references('id')->on('alunos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('disciplina');
            $table->foreign('disciplina')->references('id')->on('disciplinas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('turma');
            $table->foreign('turma')->references('id')->on('turmas')
                ->onUpdate('cascade');
            $table->primary('aluno','disciplina');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pautas');
    }
};
