<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropForeign(['session_id']);
        });

        Schema::table('materials', function (Blueprint $table) {
            $table->foreignId('session_id')
                ->nullable(false)
                ->change();

            $table->json('content')
                ->nullable()
                ->change();
        });

        Schema::table('materials', function (Blueprint $table) {
            $table->foreign('session_id')
                ->references('id')
                ->on('sessions')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropForeign(['session_id']);
        });

        Schema::table('materials', function (Blueprint $table) {
            $table->foreignId('session_id')
                ->nullable()
                ->change();

            $table->text('content')
                ->nullable()
                ->change();
        });

        Schema::table('materials', function (Blueprint $table) {
            $table->foreign('session_id')
                ->references('id')
                ->on('sessions')
                ->cascadeOnDelete();
        });
    }
};