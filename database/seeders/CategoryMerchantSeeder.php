<?php

namespace Database\Seeders;

use App\Models\CategorieMerchant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryMerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Supermarket
        CategorieMerchant::create([
            'categoryMerchant' => 'Supermarket',
            'type' => 'Supermarket'
        ]);

        // Mini Market
        CategorieMerchant::create([
            'categoryMerchant' => 'Mini Market',
            'type' => 'Mini Market'
        ]);

        // Toko Kelontong
        CategorieMerchant::create([
            'categoryMerchant' => 'Toko Kelontong',
            'type' => 'Toko Kelontong'
        ]);

        // Butik
        CategorieMerchant::create([
            'categoryMerchant' => 'Fashion Boutique',
            'type' => 'Butik'
        ]);

        // Toko Elektronik
        CategorieMerchant::create([
            'categoryMerchant' => 'ElectroGadget',
            'type' => 'Toko Elektronik'
        ]);

        // Toko Buku
        CategorieMerchant::create([
            'categoryMerchant' => 'Book Haven',
            'type' => 'Toko Buku'
        ]);

        // Toko Sepatu
        CategorieMerchant::create([
            'categoryMerchant' => 'Shoe Paradise',
            'type' => 'Toko Sepatu'
        ]);

        // Toko Peralatan Olahraga
        CategorieMerchant::create([
            'categoryMerchant' => 'Sports Gear',
            'type' => 'Toko Peralatan Olahraga'
        ]);

        // Toko Hewan Peliharaan
        CategorieMerchant::create([
            'categoryMerchant' => 'Pet World',
            'type' => 'Toko Hewan Peliharaan'
        ]);

        // Toko Perhiasan
        CategorieMerchant::create([
            'categoryMerchant' => 'Jewelry Gems',
            'type' => 'Toko Perhiasan'
        ]);

        // Apotek
        CategorieMerchant::create([
            'categoryMerchant' => 'Healthy Pharmacy',
            'type' => 'Apotek'
        ]);

        // Toko Mainan
        CategorieMerchant::create([
            'categoryMerchant' => 'Toy Land',
            'type' => 'Toko Mainan'
        ]);

        // Toko Peralatan Rumah Tangga
        CategorieMerchant::create([
            'categoryMerchant' => 'Home Essentials',
            'type' => 'Toko Peralatan Rumah Tangga'
        ]);

        // Toko Pakaian
        CategorieMerchant::create([
            'categoryMerchant' => 'Fashion Junction',
            'type' => 'Toko Pakaian'
        ]);

        // Toko Kertas dan Alat Tulis
        CategorieMerchant::create([
            'categoryMerchant' => 'Stationery World',
            'type' => 'Toko Kertas dan Alat Tulis'
        ]);
        // Jasa
        CategorieMerchant::create([
            'categoryMerchant' => 'Services',
            'type' => 'Jasa'
        ]);
    }
}
