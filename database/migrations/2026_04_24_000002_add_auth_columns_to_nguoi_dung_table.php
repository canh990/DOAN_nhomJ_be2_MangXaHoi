<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('nguoi_dung')) {
            return;
        }

        Schema::table('nguoi_dung', function (Blueprint $table) {
            if (! Schema::hasColumn('nguoi_dung', 'remember_token')) {
                $table->rememberToken()->after('id_oauth');
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('nguoi_dung') || ! Schema::hasColumn('nguoi_dung', 'remember_token')) {
            return;
        }

        Schema::table('nguoi_dung', function (Blueprint $table) {
            $table->dropColumn('remember_token');
        });
    }
};
