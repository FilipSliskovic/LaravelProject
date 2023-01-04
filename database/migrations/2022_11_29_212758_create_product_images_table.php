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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('product_id')->constrained();
//            $table->foreignId('image_id')->constrained();
            $table->foreignIdFor(\App\Models\Product::class);
            $table->foreignIdFor(\App\Models\Image::class);
            $table->timestamps();
//
//            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
//            $table->foreign('image_id')->references('id')->on('images')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_images');
    }
};
