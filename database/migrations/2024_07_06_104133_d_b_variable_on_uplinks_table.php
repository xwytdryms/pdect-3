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
        Schema::table('uplinks', function (Blueprint $table) {
            $table->float('dbmin')->nullable();
            $table->float('dba')->nullable();
            $table->float('dbmax')->nullable();
            $table->float('arc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('uplinks', function (Blueprint $table) {
            $table->dropColumn('dbmin');
            $table->dropColumn('dba');
            $table->dropColumn('dbmax');
            $table->dropColumn('arc');
        });
    }
};
