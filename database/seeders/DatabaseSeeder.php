<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Weight;
use App\Models\Fat;
use App\Models\Muscle;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // Create weight records
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                $weight = new Weight();
                $weight->user_id = $i;
                $weight->measure_at = '2023-01-' . str_pad($j, 2, '0', STR_PAD_LEFT);
                $weight->weight = rand(60, 80) + ($i * 0.5);
                $weight->save();
            }
        }

        // Create body fat records
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                $bodyFat = new Fat();
                $bodyFat->user_id = $i;
                $bodyFat->measure_at = '2023-01-' . str_pad($j, 2, '0', STR_PAD_LEFT);
                $bodyFat->fat = rand(15, 25) + ($i * 0.1);
                $bodyFat->save();
            }
        }

        // Create muscle mass records
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                $muscleMass = new Muscle();
                $muscleMass->user_id = $i;
                $muscleMass->measure_at = '2023-01-' . str_pad($j, 2, '0', STR_PAD_LEFT);
                $muscleMass->muscle = rand(40, 60) + ($i * 1);
                $muscleMass->save();
            }
        }


    }
}
