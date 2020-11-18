<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //default user
    $profile = new Profile();
    $profile->first_name = "Putra";
    $profile->last_name = "Dewa";
    $profile->address = "JL. Terate No 75 Madiun Jawa Timur Indoneisa";
    $profile->save();

    $user = new User();
    $user->role_id = 1;
    $user->profile_id = $profile->id;
    $user->email = "com.owl.minerva@gmail.com";
    $user->username = "menma977";
    $user->password = Hash::make("admin");
    $user->phone = "081211610807";
    $user->save();

    $profile = new Profile();
    $profile->first_name = "Ika";
    $profile->last_name = "Nurfallah";
    $profile->address = "JL. Terate No 75 Madiun Jawa Timur Indoneisa";
    $profile->save();

    $user = new User();
    $user->role_id = 2;
    $user->profile_id = $profile->id;
    $user->email = "ikanurfallah.use@gmail.com";
    $user->username = "ika";
    $user->password = Hash::make("admin");
    $user->phone = "081211610807";
    $user->save();
  }
}
