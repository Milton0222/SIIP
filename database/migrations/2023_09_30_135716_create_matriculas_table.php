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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('anoLetivo');
            $table->unsignedBigInteger('turma');
            $table->foreign('turma')->references('id')->on('turmas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('aluno');
            $table->foreign('aluno')->references('id')->on('alunos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('curso'); 
            $table->foreign('curso')->references('id')->on('cursos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
