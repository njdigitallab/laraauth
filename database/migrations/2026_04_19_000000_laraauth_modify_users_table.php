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
        $userClass = config('auth.providers.users.model');

        Schema::table(new $userClass()->getTable(), function (Blueprint $table) {
            $table->renameColumn('name', 'first_name');
            $table->after('first_name', function (Blueprint $table) {
                $table->string('last_name');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $userClass = config('auth.providers.users.model');

        Schema::table(new $userClass()->getTable(), function (Blueprint $table) {
            $table->renameColumn('first_name', 'name');
            $table->dropColumn('last_name');
        });
    }
};
