<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('device_sessions', function (Blueprint $table) {
            $table->json('metadata')
                ->nullable()
                ->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('device_sessions', function (Blueprint $table) {
            $table->dropColumn('metadata');
        });
    }
};
