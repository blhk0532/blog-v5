<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('company_name')->nullable()->after('title');
            $table->unsignedTinyInteger('rating')->nullable()->after('company_name');
            $table->string('location')->nullable()->after('rating');
            $table->enum('status', ['pending', 'resolved', 'closed'])->default('pending')->after('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['company_name', 'rating', 'location', 'status']);
        });
    }
};
