<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $role = new Role();
    $role->name = "OWNER";
    $role->save();

    $role = new Role();
    $role->name = "ADMIN";
    $role->save();

    $role = new Role();
    $role->name = "MEMBER";
    $role->save();
  }
}
