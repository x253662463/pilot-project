<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [
                'name' => 'super admin',
                'description' => 'all permission',
                'permission_level' => 10,
            ],
            [
                'name' => 'admin',
                'description' => 'most permission',
                'permission_level' => 8,
            ],
            [
                'name' => 'editor',
                'description' => 'edit',
                'permission_level' => 6,
            ],
            [
                'name' => 'register user',
                'description' => 'normal',
                'permission_level' => 2,
            ],
            [
                'name' => 'guest',
                'description' => 'guest',
                'permission_level' => 1,
            ],
        ];

        foreach ($groups as $group) {
            UserGroup::create($group);
        }
    }
}
