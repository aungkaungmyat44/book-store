<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContentOwner;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ContentOwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $faker = Faker::create();
        $payloads = [
            [
                'id' => 1,
                'name' => $faker->name,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'id' => 2,
                'name' => $faker->name,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'id' => 3,
                'name' => $faker->name,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'id' => 4,
                'name' => $faker->name,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'id' => 5,
                'name' => $faker->name,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'id' => 6,
                'name' => $faker->name,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'id' => 7,
                'name' => $faker->name,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'id' => 8,
                'name' => $faker->name,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'id' => 9,
                'name' => $faker->name,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'id' => 10,
                'name' => $faker->name,
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
        ];

        $contentOwners = [];
        foreach ($payloads as $payload) {
            if (!ContentOwner::where('name', $payload['name'])->exists()) {
                $contentOwners[] = $payload;
            }
        }

        ContentOwner::insert($contentOwners);
    }
}
