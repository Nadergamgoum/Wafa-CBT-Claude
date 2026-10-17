<?php

namespace Tests;

use Database\Seeders\ContentSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Storage;

abstract class TestCase extends BaseTestCase
{
    protected function seedContent(): void
    {
        Storage::fake('media');
        $this->seed(ContentSeeder::class);
    }
}
