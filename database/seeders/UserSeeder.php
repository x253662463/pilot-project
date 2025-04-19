<?php

namespace Database\Seeders;

use App\Http\Services\UserService;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = new UserService();
        $service->register('test', 'test@test.com', 'test123', 1);
        $service->register('test2', 'test2@test.com', 'test123', 2);
        $service->register('test3', 'test3@test.com', 'test123', 3);
        \App\Models\User::factory(100)->create();
    }
}
