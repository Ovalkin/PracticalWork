<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'role' => 'client',
            'name' => 'Тест',
            'surname' => 'Тестов',
            'lastname' => 'Тестович',
            'email' => 'test@test.ru',
            'phone' => '+79999999999',
            'password' => password_hash("12qw", PASSWORD_DEFAULT)
        ]);
        User::create([
            'role' => 'supplier',
            'name' => 'Поставщик',
            'surname' => 'Поставщиков',
            'lastname' => 'Поставщикович',
            'email' => 'supplier@supplier.ru',
            'phone' => '+79999999998',
            'password' => password_hash("12qw", PASSWORD_DEFAULT)
        ]);
        User::create([
            'role' => 'admin',
            'name' => 'Админ',
            'surname' => 'Админов',
            'lastname' => 'Админович',
            'email' => 'admin@admin.ru',
            'phone' => '+79999999991',
            'password' => password_hash("12qw", PASSWORD_DEFAULT)
        ]);

    }
}
