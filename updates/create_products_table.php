<?php namespace OnlineStore\Catalog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('onlinestore_catalog_products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('old_price', 15, 2)->nullable();
            $table->string('slug');
            $table->boolean('published')->default(false);
            $table->integer('category_id')->nullable()->unsigned();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('onlinestore_catalog_products');
    }
}
