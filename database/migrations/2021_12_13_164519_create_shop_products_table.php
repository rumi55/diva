<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('preview')->nullable();
            $table->string('background')->nullable();
            $table->longText('content')->nullable();
            $table->longText('content2')->nullable();
            $table->longText('content3')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('is_visible')->default(true);
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->json('attachment')->nullable();
            $table->longText('gallery')->nullable();
            $table->unsignedSmallInteger('position')->nullable();
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
        Schema::dropIfExists('shop_products');
    }
};
