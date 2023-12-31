<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('start_date');
                $table->string('end_date')->nullable();
                $table->string('image')->nullable();
                $table->integer('status')->nullable();
                $table->integer('discount');
                $table->string('month')->nullable();
                $table->integer('year')->nullable();
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
};
