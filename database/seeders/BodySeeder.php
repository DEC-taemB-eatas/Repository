<?php

namespace Database\Seeders;

use App\Models\Weight;
use App\Models\Fat;
use App\Models\Muscle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("体組成データの作成を開始します...");

        $json = file_get_contents(__DIR__ . '/data/body.json');
        $bodys = json_decode($json, true);

        foreach ($bodys['weights'] as $weight) {
            Weight::create($weight);
        }
        foreach ($bodys['fats'] as $fat) {
            fat::create($fat);
        }
        foreach ($bodys['muscles'] as $muscle) {
            Muscle::create($muscle);
        }

        $this->command->info("体組成データを作成しました。");
    }
}
