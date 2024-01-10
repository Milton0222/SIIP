<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\curso::create([
            'nome'=>'Lic. Ciência da Computação'
        ]);
        \App\Models\curso::create([
            'nome'=>'Eng. Mecânica'
        ]);
        \App\Models\curso::create([
            'nome'=>'Lic. Logistica e Transporte'
        ]);

        \App\Models\User::factory()->create([
         'name' => 'Raquel Pedro',
         'email' => 'raquel2023@gmail.com',
         'password'=>Hash::make(1234567892024)
        ])->givePermissionTo('RSA');
    }
}
