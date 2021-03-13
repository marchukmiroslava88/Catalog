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
            $table->string('title');
            $table->text('short_description');
            $table->text('description');
            $table->string('slug');
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('onlinestore_catalog_products');
    }
}
