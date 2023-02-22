<?php

namespace Database\Seeders;

use App\Models\Target;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("目標データの作成を開始します...");

        $json = file_get_contents(__DIR__ . '/data/target.json');
        $targets = json_decode($json, true);

        foreach ($targets['targets'] as $target) {
            Target::create($target);
        }

        $this->command->info("目標データを作成しました。");
    }
}
