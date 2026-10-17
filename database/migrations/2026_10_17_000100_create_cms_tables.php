<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Core CMS schema. Translatable columns are JSON objects keyed by locale
 * ({"en": "...", "ar": "..."}); flexible page sections are stored as an
 * ordered JSON array of {type, data} blocks.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key', 100)->unique();
            $table->json('value')->nullable();
            $table->timestamps();
        });

        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('disk', 30)->default('media');
            $table->string('path');
            $table->string('title')->nullable();
            $table->string('original_name')->nullable();
            $table->string('mime', 100)->nullable();
            $table->unsignedBigInteger('size')->default(0);
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->json('alt')->nullable();
            $table->json('caption')->nullable();
            $table->string('focal_point', 20)->default('50% 50%');
            $table->json('variants')->nullable();
            $table->string('folder', 60)->nullable()->index();
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('key', 50)->nullable()->unique();
            $table->string('slug', 150)->unique();
            $table->string('template', 40)->default('generic');
            $table->json('title');
            $table->json('intro')->nullable();
            $table->foreignId('hero_image_id')->nullable()->constrained('media')->nullOnDelete();
            $table->json('sections')->nullable();
            $table->json('seo')->nullable();
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
        });

        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('key', 40)->unique();
            $table->string('slug', 120)->unique();
            $table->json('title');
            $table->json('nav_title')->nullable();
            $table->json('summary')->nullable();
            $table->json('hero')->nullable();
            $table->foreignId('image_id')->nullable()->constrained('media')->nullOnDelete();
            $table->json('sections')->nullable();
            $table->json('seo')->nullable();
            $table->unsignedInteger('sort')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_category_id')->constrained()->cascadeOnDelete();
            $table->string('family', 40);
            $table->string('slug', 120);
            $table->json('title');
            $table->json('nav_title')->nullable();
            $table->json('summary')->nullable();
            $table->json('hero')->nullable();
            $table->string('hero_variant', 40)->default('split');
            $table->foreignId('hero_image_id')->nullable()->constrained('media')->nullOnDelete();
            $table->foreignId('secondary_image_id')->nullable()->constrained('media')->nullOnDelete();
            $table->foreignId('card_image_id')->nullable()->constrained('media')->nullOnDelete();
            $table->string('illustration', 60)->nullable();
            $table->string('accent', 20)->nullable();
            $table->string('icon', 40)->nullable();
            $table->json('sections')->nullable();
            $table->json('seo')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
            $table->unique(['service_category_id', 'slug']);
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->string('topic', 40)->nullable()->index();
            $table->json('question');
            $table->json('answer');
            $table->boolean('show_on_home')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
        });

        Schema::create('program_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 120)->unique();
            $table->json('name');
            $table->json('description')->nullable();
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
        });

        Schema::create('training_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('slug', 150)->unique();
            $table->json('title');
            $table->json('summary')->nullable();
            $table->json('description')->nullable();
            $table->foreignId('image_id')->nullable()->constrained('media')->nullOnDelete();
            $table->json('trainer')->nullable();
            $table->date('starts_at')->nullable();
            $table->date('ends_at')->nullable();
            $table->json('duration')->nullable();
            $table->string('delivery_mode', 30)->nullable();
            $table->json('location')->nullable();
            $table->string('online_link')->nullable();
            $table->string('registration_status', 30)->default('on_request');
            $table->string('registration_url')->nullable();
            $table->boolean('has_certificate')->nullable();
            $table->json('audience')->nullable();
            $table->json('outcomes')->nullable();
            $table->json('requirements')->nullable();
            $table->json('agenda')->nullable();
            $table->json('faqs')->nullable();
            $table->json('seo')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
        });

        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('role')->nullable();
            $table->json('bio')->nullable();
            $table->foreignId('photo_id')->nullable()->constrained('media')->nullOnDelete();
            $table->string('linkedin_url')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
        });

        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 120)->unique();
            $table->json('name');
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('author_id')->nullable()->constrained('team_members')->nullOnDelete();
            $table->json('author_name')->nullable();
            $table->string('slug', 160)->unique();
            $table->json('title');
            $table->json('excerpt')->nullable();
            $table->json('body')->nullable();
            $table->foreignId('image_id')->nullable()->constrained('media')->nullOnDelete();
            $table->json('tags')->nullable();
            $table->timestamp('published_at')->nullable()->index();
            $table->json('seo')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->json('quote');
            $table->string('author_name');
            $table->json('author_role')->nullable();
            $table->string('company')->nullable();
            $table->boolean('is_published')->default(false);
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('location', 40)->unique();
            $table->string('name');
            $table->json('items')->nullable();
            $table->timestamps();
        });

        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('type', 30)->default('contact')->index();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('email');
            $table->string('phone', 40)->nullable();
            $table->string('service')->nullable();
            $table->text('message')->nullable();
            $table->boolean('consent')->default(false);
            $table->string('locale', 5)->default('en');
            $table->string('page_url', 500)->nullable();
            $table->string('referrer', 500)->nullable();
            $table->json('utm')->nullable();
            $table->string('ip_hash', 64)->nullable();
            $table->string('user_agent', 300)->nullable();
            $table->string('status', 20)->default('new')->index();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('redirects', function (Blueprint $table) {
            $table->id();
            $table->string('from_path', 300)->unique();
            $table->string('to_url', 500)->nullable(); // empty for 410 Gone
            $table->unsignedSmallInteger('status_code')->default(301);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('hits')->default(0);
            $table->timestamp('last_hit_at')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });

        Schema::create('engagements', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 160)->unique();
            $table->json('title');
            $table->date('event_date')->nullable();
            $table->json('summary')->nullable();
            $table->json('body')->nullable();
            $table->json('highlights')->nullable();
            $table->foreignId('image_id')->nullable()->constrained('media')->nullOnDelete();
            $table->json('gallery')->nullable();
            $table->json('client_name')->nullable();
            $table->boolean('client_approved')->default(false);
            $table->json('cta_label')->nullable();
            $table->string('cta_link', 500)->nullable();
            $table->json('seo')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(false)->index();
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();
        });

        Schema::create('analytics_events', function (Blueprint $table) {
            $table->id();
            $table->string('type', 20)->index();
            $table->string('name', 60)->nullable()->index();
            $table->string('path', 300);
            $table->string('locale', 5)->nullable();
            $table->string('device', 10)->nullable();
            $table->string('referrer_host', 150)->nullable();
            $table->string('visitor_hash', 64)->nullable()->index();
            $table->timestamp('created_at')->useCurrent()->index();
        });
    }

    public function down(): void
    {
        foreach (['analytics_events', 'engagements', 'redirects', 'leads', 'menus', 'testimonials', 'posts', 'post_categories',
            'team_members', 'training_programs', 'program_categories', 'faqs', 'services', 'service_categories',
            'pages', 'media', 'settings'] as $table) {
            Schema::dropIfExists($table);
        }
    }
};
