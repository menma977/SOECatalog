<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
      $table->id();
      $table->string('name');
      $table->text('description')->nullable();
      $table->text('meta_title')->nullable();
      $table->text('meta_description')->nullable();
      $table->date('available_on')->index()->nullable();
      $table->date('discontinue_on')->index()->nullable();
      $table->string('slug')->index()->nullable();
      $table->string('meta_keywords')->index()->nullable();
      $table->integer('category_id')->index()->nullable();
      $table->timestamps();
      $table->softDeletes();
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
