<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class UsersAndRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Rolleri Oluştur
        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'User Administrator';
        $admin->description = 'Site Üst Kullanıcı Yetkisi';
        $admin->save();

        $owner = new Role();
        $owner->name = 'owner';
        $owner->display_name = 'Project Owner';
        $owner->description = 'Proje Sorumlusu'; // optional
        $owner->save();

        // Rolleri Bağla
        // ------Permissionları admin rolüne bağla-------
        $userPermisions = Permission::Where('name', 'like', 'user-%')->get(); // Kullanıcı İşlemleri için
        foreach ($userPermisions as $per) {
            $admin->attachPermission($per);
        }
        $projectPermisions = Permission::Where('name', 'like', 'project-%')->get(); // Proje İşlemleri için
        foreach ($projectPermisions as $per) {
            $admin->attachPermission($per);
        }

        // ------Proje Permissionlarını proje rolüne bağla-------
        foreach ($projectPermisions as $per) {
            $owner->attachPermission($per);
        }

        // role attach alias
        $user = new User();
        $user->name = 'Turgay Karataş';
        $user->email = 'turgayk7@gmail.com';
        $user->password = bcrypt('123qwe');
        $user->save();

        $user->attachRole($admin);
    }
}
