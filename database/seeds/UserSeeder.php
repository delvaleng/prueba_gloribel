<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
          'name'              => 'Gloribel Delgado',
          'email'             => 'delgadogloribelv@gmail.com',
          'email_verified_at' => Carbon::now(),
          'password'          => bcrypt('21255894')
      ]);
      
      factory(User::class, 5)->create();

    }
}
