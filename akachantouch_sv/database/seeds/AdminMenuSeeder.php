<?php

use Illuminate\Database\Seeder;

class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuItems = [
            ['id' => 1, 'parent_id' => 0, 'order' => 1, 'title' => 'Dashboard', 'icon' => 'fa-dashboard', 'uri' => '/'],
            ['id' => 2, 'parent_id' => 0, 'order' => 3, 'title' => 'Admin', 'icon' => 'fa-gear', 'uri' => NULL,],
            ['id' => 3, 'parent_id' => 2, 'order' => 4, 'title' => 'Users', 'icon' => 'fa-users', 'uri' => 'auth/users'],
            ['id' => 4, 'parent_id' => 2, 'order' => 5, 'title' => 'Roles', 'icon' => 'fa-user', 'uri' => 'auth/roles'],
            ['id' => 5, 'parent_id' => 2, 'order' => 6, 'title' => 'Permission', 'icon' => 'fa-ban', 'uri' => 'auth/permissions'],
            ['id' => 6, 'parent_id' => 2, 'order' => 7, 'title' => 'Menu', 'icon' => 'fa-bars', 'uri' => 'auth/menu'],
            ['id' => 7, 'parent_id' => 2, 'order' => 8, 'title' => 'Operation log', 'icon' => 'fa-history', 'uri' => 'auth/logs'],
            ['id' => 8, 'parent_id' => 0, 'order' => 2, 'title' => 'Users', 'icon' => 'fa-users', 'uri' => 'user'],
        ];

        DB::statement("TRUNCATE TABLE admin_menu");
        DB::table('admin_menu')->insert($menuItems);
    }
}
