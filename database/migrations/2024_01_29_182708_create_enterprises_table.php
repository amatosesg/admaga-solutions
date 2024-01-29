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
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bbdd_name')->unique();
            $table->boolean('bbdd_status')->default(false);
            $table->string('url_name')->unique();
            $table->boolean('url_status')->default(false);
            $table->bigInteger('order_id')->unsigned(); 
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enterprises');
    }
};
