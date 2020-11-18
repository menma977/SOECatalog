<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('product_id')->index()->nullable();
      $table->decimal('item_total', 10, 2)->default(0.00);
      $table->decimal('total', 10, 2)->default(0.00);
      $table->bigInteger('promotion_id')->index()->nullable();
      $table->decimal('adjustment_total', 10, 2)->default(0.00);
      $table->bigInteger('user_id')->index()->nullable();
      $table->date('completed_at')->index()->nullable();
      $table->bigInteger('bill_address_id')->index()->nullable();
      $table->bigInteger('ship_address_id')->index()->nullable();
      $table->decimal('payment_total', 10, 2)->default(0.00);
      $table->string('shipment_state')->nullable();
      $table->string('payment_state')->nullable();
      $table->string('email')->nullable();
      $table->text('special_instructions')->nullable();
      $table->text('currency')->nullable();
      $table->string('last_ip_address')->nullable();
      $table->decimal('shipment_total', 10, 2)->default(0.00);
      $table->decimal('promo_total', 10, 2)->default(0.00)->nullable();
      $table->integer('item_count')->nullable()->default(0);
      $table->date('approved_at')->nullable();
      $table->boolean('confirmation_delivered')->default(FALSE);
      $table->date('canceled_at')->nullable();
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
    Schema::dropIfExists('orders');
  }
}
