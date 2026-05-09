<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->foreignId('session_id')
                ->nullable()
                ->after('course_id')
                ->constrained()
                ->cascadeOnDelete();
        });

        Schema::table('assignments', function (Blueprint $table) {
            $table->foreignId('session_id')
                ->nullable()
                ->after('course_id')
                ->constrained()
                ->cascadeOnDelete();
        });

        Schema::table('quizzes', function (Blueprint $table) {
            $table->foreignId('session_id')
                ->nullable()
                ->after('course_id')
                ->constrained()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropConstrainedForeignId('session_id');
        });

        Schema::table('assignments', function (Blueprint $table) {
            $table->dropConstrainedForeignId('session_id');
        });

        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropConstrainedForeignId('session_id');
        });
    }
};
