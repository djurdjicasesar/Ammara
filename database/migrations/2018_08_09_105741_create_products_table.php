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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
			$table->string('naziv_proizvoda');
			$table->string('slug');
			$table->integer('kategorija_proizvoda');
			$table->float('cijena_proizvoda');
			$table->text('opis_proizvoda');
			$table->text('sastav_proizvoda');
			$table->string('slika_proizvoda');
			$table->text('product_keywords');
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
