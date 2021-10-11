<?php

use Illuminate\Database\Seeder;
use App\Models\Authors;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Authors::class, 5)->create();
    }
}
