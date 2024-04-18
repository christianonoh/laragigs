<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $user = \App\Models\User::factory()->create(
      [
        'name' => 'Test User',
        'email' => 'test@example.com',
      ]
    );

    \App\Models\Listing::factory(5)->create(
      [
        'user_id' => $user->id,
      ]
    );

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
  }
}
