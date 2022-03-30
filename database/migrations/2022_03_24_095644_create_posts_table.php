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
        Schema::create('posts', function (Blueprint $table) {
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
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('block_id')->nullable()->constrained('blocks')->nullOnDelete();
            $table->enum('type', ['main','about','contacts','news', 'service']);
            $table->unsignedSmallInteger('position')->nullable();
            $table->boolean('active')->default(true);
            $table->json('gallery')->nullable();
            $table->string('gallery_name')->nullable();
            $table->text('gallery_description')->nullable();
            $table->json('repeater')->nullable();
            $table->json('select')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
