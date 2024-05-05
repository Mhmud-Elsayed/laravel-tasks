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
        Schema::create('_products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->float("price",10,2,true);
            $table->integer("quantity");
            $table->string("image");
            $table->unsignedBigInteger("catogry_id");
            
            $table->foreign('catogry_id')->references('id')->on('catogries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_products');
    }
};
