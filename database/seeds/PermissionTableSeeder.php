<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Kullanıcı İşlemleri
            [
                'name' => 'user-list',
                'display_name' => 'Kullanıcıları Listeleme',
                'description' => 'Kullanıcıları Listeleyebilir'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Yeni Kullanıcı Oluşturabilir',
                'description' => 'Yeni Kullanıcı Oluşturabilir'
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Kullanıcı Düzenle',
                'description' => 'Kullanıcıyı Düzenleyebilir'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Kullanıcı Silme',
                'description' => 'Kullanıcıyı Silebilir'
            ],

            // Proje İşlemleri
            [
                'name' => 'project-list',
                'display_name' => 'Projeleri Listeleme',
                'description' => 'Projeleri Listeleyebilir'
            ],
            [
                'name' => 'project-create',
                'display_name' => 'Yeni Proje Oluşturabilir',
                'description' => 'Yeni Proje Oluşturabilir'
            ],
            [
                'name' => 'project-edit',
                'display_name' => 'Proje Düzenleme',
                'description' => 'Proje Düzenleyebilir'
            ],
            [
                'name' => 'project-delete',
                'display_name' => 'Proje Silme',
                'description' => 'Proje Silebilir'
            ]
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
}
