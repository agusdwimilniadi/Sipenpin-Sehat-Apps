<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Superadmin']);
        Role::create(['name' => 'Admin Kesehatan']);
        Role::create(['name' => 'Admin Kader']);
        Role::create(['name' => 'User']);

        $superAdmin = User::create([
            'name' => 'Superadmin Sipenpin Sehat',
            'email' => 'superadmin@admin.com',
            'password' => bcrypt('superadmin123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($superAdmin));
        $superAdmin->assignRole('Superadmin');

        $adminKesehatan = User::create([
            'name' => 'Admin Kesehatan Sipenpin Sehat',
            'email' => 'adminkesehatan@admin.com',
            'password' => bcrypt('adminkesehatan123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($adminKesehatan));
        $adminKesehatan->assignRole('Admin Kesehatan');

        $adminKader = User::create([
            'name' => 'Admin Kader Sipenpin Sehat',
            'email' => 'adminkader@admin.com',
            'password' => bcrypt('adminkader123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($adminKader));
        $adminKader->assignRole('Admin Kader');

        $user = User::create([
            'name' => 'User Sipenpin Sehat',
            'email' => 'usersipenpin@user.com',
            'password' => bcrypt('user123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($user));
        $user->assignRole('User');
    }
}
