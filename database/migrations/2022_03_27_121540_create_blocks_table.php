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
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('preview')->nullable();
            $table->json('gallery')->nullable();
            $table->longText('content')->nullable();
            $table->longText('content2')->nullable();
            $table->enum('type', ['about','logo','factors','experience', 'production', 'map_production', 'map', 'strategy', 'stages', 'team_full', 'team_short', 'products', 'files', 'form_first', 'form_second']);
            $table->json('repeater')->nullable();
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
        Schema::dropIfExists('blocks');
    }
};
