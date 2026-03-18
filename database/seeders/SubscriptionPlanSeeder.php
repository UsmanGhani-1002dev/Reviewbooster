<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPlan::insert([
            ['name' => 'basic', 'description' => '€10/month - Limited features', 'price' => 10.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'standard', 'description' => '€20/month - Most popular', 'price' => 20.00, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'premium', 'description' => '€30/month - All features', 'price' => 30.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
