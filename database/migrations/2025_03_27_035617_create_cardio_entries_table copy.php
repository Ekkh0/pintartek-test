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
        Schema::create('CardioEntries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->unsigned();
            $table->date('date');
            $table->foreignId('type_id')->unsigned()->nullable();
            $table->integer('duration');
            $table->decimal('distance', 8, 2);
        });

        Schema::table('CardioEntries', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('CardioTypes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CardioEntries');
    }
};
