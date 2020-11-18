<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('payments', function (Blueprint $table) {
      $table->id();
      $table->decimal('amount', 10, 2);
      $table->bigInteger('order_id')->nullable();
      $table->integer('payment_method_id')->index()->nullable();
      $table->string('state')->nullable();
      $table->string('response_code')->nullable();
      $table->string('avs_response')->nullable();
      $table->string('cvv_response_code')->nullable();
      $table->string('cvv_response_message')->nullable();
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
    Schema::dropIfExists('payments');
  }
}
