<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermssionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole=Role::create(['name'=>'admin']);
        $keeperRole=Role::create(['name'=>'keeper']);
        $donorRole=Role::create(['name'=>'donor']);
        $spAdRole=Role::create(['name'=>'spAd']);

        $permissions =[
            'All_permission'
        ];

        foreach ($permissions as $permission){
            permission::findOrCreate($permission,'web');
        }
        $adminRole->syncPermissions($permissions);
        $keeperRole->givePermissionTo($permissions);
        $donorRole->givePermissionTo($permissions);
        $spAdRole->givePermissionTo($permissions);

        $adminUser =User::factory()->create([
            'name'=>'Admin name',
            'email'=>'AdminName@Admin.com',
            'password'=>bcrypt('password'),
        ]);
        $adminUser->assignRole($adminRole);
        $permissions=$adminRole->permissions()->pluck('name')->toArray();
        $adminUser->givePermissionTo($permissions);


    }
}
