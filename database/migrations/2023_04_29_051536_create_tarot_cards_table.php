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
        Schema::create('tarot_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('alt_name')->nullable();
            $table->string('meanings')->nullable();
            $table->string('keywords_1')->nullable();
            $table->string('keywords_2')->nullable();
            $table->string('mystic_mirror')->nullable();
            $table->string('numerology')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('tarot_cards');
    }
};
