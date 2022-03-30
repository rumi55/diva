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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('seo_title', 60)->nullable();
            $table->string('seo_description', 160)->nullable();
            $table->string('slug')->unique();
            $table->string('preview')->nullable();
            $table->string('background')->nullable();
            $table->longText('content')->nullable();
            $table->longText('content2')->nullable();
            $table->longText('content3')->nullable();
            $table->boolean('is_visible')->default(false);
            $table->boolean('active')->default(true);
            $table->unsignedSmallInteger('position')->default(0)->nullable();
            $table->json('gallery')->nullable();
            $table->json('repeater')->nullable();
            $table->json('select')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->cascadeOnDelete();
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
        Schema::dropIfExists('categories');
    }
};
