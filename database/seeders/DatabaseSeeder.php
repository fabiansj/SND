<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Pengguna;
use Database\Seeders\Product;
use Database\Seeders\ProductDetail;
use Database\Seeders\ProductJenis;
use Database\Seeders\ProductStok;
use Database\Seeders\ProductWarna;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Pengguna;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            Pengguna::class,
            Productjenis::class,
            ProductWarna::class,
            Product::class,
            ProductStok::class,
            ProductDetail::class,
        ]);
    }
}
