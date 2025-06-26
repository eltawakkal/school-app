<?php

namespace Database\Seeders;

use App\Models\DataItemBuilding;
use App\Models\DataParent;
use App\Models\DataStudent;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin Panel',
            'email' => 'admin@admin.com',
            'password' => 'admin'
        ]);

        DataParent::create([
            'name' => 'Fulan Ali Jaber',
            'gender' => 1,
            'phone' => '09126378123',
        ]);

        DataStudent::insert([
            [
                'data_parent_id' => 1,
                'name' => 'Ardiansyah Rampangan',
                'gender' => 1,
            ],
            [
                'data_parent_id' => 1,
                'name' => 'Viliani Saputri',
                'gender' => 2,
            ],
        ]);

        DataItemBuilding::insert([
            [
                'name' => 'GH 1 VVIP'
            ],
            [
                'name' => 'GH 2 VIP'
            ],
            [
                'name' => 'GH 3 Umum'
            ],
            [
                'name' => 'GH 4 Umum'
            ],
        ]);
    }
}
