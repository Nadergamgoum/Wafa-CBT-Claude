<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seeds the bilingual starter content. It never creates user accounts —
     * administrators are created with `php artisan wafa:admin` or the web installer.
     * Existing content is left untouched (the seeder only runs on an empty site).
     */
    public function run(): void
    {
        if (Page::query()->exists()) {
            $this->command?->warn('Content already exists — skipping starter content.');

            return;
        }
        $this->call(ContentSeeder::class);
    }
}
