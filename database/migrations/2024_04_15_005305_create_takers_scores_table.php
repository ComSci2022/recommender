<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up()
    {
        if (!Schema::hasTable('Taker\'s Scores')) {
            Schema::create('Taker\'s Scores', function (Blueprint $table) {
                 $table->integer('Taker ID')->primary();
                 $table->string('Last Name');
                 $table->string('First Name');
                 $table->string('Middle Initial');
                 $table->integer('Linguistics');
                 $table->integer('Mathematics');
                 $table->integer('Science');
                 $table->integer('Aptitude');
                 $table->integer('Total Score');
                 $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('takers_scores');
    }
};
