<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function 
            (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('product_code', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->decimal('amount', 15 , 2)->nullable()->default(0);
            $table->boolean('is_highlight')->nullable()->default(false);
            $table->integer('quantity')->unsigned()->nullable()->default(0);
            $table->string('avatar', 100)->nullable();
            $table->text('detail')->nullable();
            $table->string('description')->nullable();
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
}
