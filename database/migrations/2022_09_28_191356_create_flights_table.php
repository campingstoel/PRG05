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
        Schema::create('laravel.users', function (Blueprint $table) {
            $table->increments('id');
            $table ->string('name');
            $table ->string('email')->unique();
            $table ->string('password');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table ->unsignedInteger('account_id');
            $table ->foreign('account_id') -> references('id') -> on('laravel.users') -> onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('productdetails', function (Blueprint $table) {
            $table->increments('id');
            $table ->unsignedInteger('product_id');
            $table ->string('date');
            $table ->text('description');
            $table ->foreign('product_id') -> references('id') -> on('products') -> onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
