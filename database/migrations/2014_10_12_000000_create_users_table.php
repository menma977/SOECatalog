<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('role_id')->default(3)->index();
      $table->string('email')->unique()->index();
      $table->string('username')->unique()->index();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->text('avatar')->nullable();
      $table->text('phone');
      $table->bigInteger('profile_id');
      $table->boolean('suspended')->default(FALSE);
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
}
