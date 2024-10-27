<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);
        $role3 = Role::create(['name' => 'Writer']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$role1, $role3]);

        Permission::create(['name' => 'users.manage.index'])->assignRole($role1);
        Permission::create(['name' => 'users.manage.create'])->assignRole($role1);
        Permission::create(['name' => 'users.manage.store'])->assignRole($role1);
        Permission::create(['name' => 'users.manage.edit'])->assignRole($role1);
        Permission::create(['name' => 'users.manage.update'])->assignRole($role1);
        Permission::create(['name' => 'users.manage.destroy'])->assignRole($role1);

        Permission::create(['name' => 'tags.manage.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'tags.manage.create'])->assignRole($role1);
        Permission::create(['name' => 'tags.manage.store'])->assignRole($role1);
        Permission::create(['name' => 'tags.manage.edit'])->assignRole($role1);
        Permission::create(['name' => 'tags.manage.update'])->assignRole($role1);
        Permission::create(['name' => 'tags.manage.destroy'])->assignRole($role1);

        Permission::create(['name' => 'categories.manage.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'categories.manage.create'])->assignRole($role1);
        Permission::create(['name' => 'categories.manage.store'])->assignRole($role1);
        Permission::create(['name' => 'categories.manage.edit'])->assignRole($role1);
        Permission::create(['name' => 'categories.manage.update'])->assignRole($role1);
        Permission::create(['name' => 'categories.manage.destroy'])->assignRole($role1);

        Permission::create(['name' => 'posts.manage.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'posts.manage.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'posts.manage.store'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'posts.manage.edit'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'posts.manage.update'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'posts.manage.destroy'])->assignRole($role1);
    }
}
