<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin Utama [cite: 615, 624]
        User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Eksperimen Kategori (Minimal 3 Kategori) 
        $catIT = Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);

        $catDesign = Category::create([
            'name' => 'UI/UX Design',
            'slug' => 'ui-ux-design',
        ]);

        $catGame = Category::create([
            'name' => 'E-Sport',
            'slug' => 'e-sport',
        ]);

        // 3. Eksperimen Event (Minimal 6 Event Bervariasi) 
        
        // Kategori IT
        Event::create([
            'category_id' => $catIT->id,
            'title' => 'AI & FUTURE TECH SUMMIT 2026',
            'description' => 'Jelajahi tren terkini dalam kecerdasan buatan dan teknologi masa depan.',
            'date' => '2026-05-01 13:00:00',
            'location' => 'Cinema Unit 6',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-3.png',
        ]);

        Event::create([
            'category_id' => $catIT->id,
            'title' => 'Hackathon Unleash 2026',
            'description' => 'Ayo asah skill coding kamu dan ciptakan solusi inovatif!',
            'date' => '2026-05-05 10:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-2.png',
        ]);

        // Kategori Design
        Event::create([
            'category_id' => $catDesign->id,
            'title' => 'UI/UX Masterclass',
            'description' => 'Belajar mendesain antarmuka aplikasi yang modern dan user-friendly.',
            'date' => '2026-06-15 09:00:00',
            'location' => 'Lab ICT Amikom',
            'price' => 75000,
            'stock' => 40,
            'poster_path' => 'posters/uiux.png',
        ]);

        Event::create([
            'category_id' => $catDesign->id,
            'title' => 'Branding & Identity Workshop',
            'description' => 'Membangun identitas visual untuk bisnis digital.',
            'date' => '2026-06-20 13:00:00',
            'location' => 'Ruang Seminar Unit 5',
            'price' => 35000,
            'stock' => 50,
            'poster_path' => 'posters/branding.png',
        ]);

        // Kategori E-Sport
        Event::create([
            'category_id' => $catGame->id,
            'title' => 'E-Sport U-Champ 2026',
            'description' => 'Turnamen bergengsi Mobile Legends antar mahasiswa Yogyakarta.',
            'date' => '2026-07-10 10:00:00',
            'location' => 'Basement Unit 4',
            'price' => 150000,
            'stock' => 16,
            'poster_path' => 'posters/esport.png',
        ]);

        Event::create([
            'category_id' => $catGame->id,
            'title' => 'Jazz Night 2025 (Special Edition)',
            'description' => 'Nikmati malam yang indah dengan alunan musik jazz yang merdu.',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 75000,
            'stock' => 50,
            'poster_path' => 'posters/event-1.png',
        ]);

    } 
}