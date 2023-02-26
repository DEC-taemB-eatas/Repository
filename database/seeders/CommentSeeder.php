<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("コメントデータの作成を開始します...");

        $json = file_get_contents(__DIR__ . '/data/comment.json');
        $comments = json_decode($json, true);

        foreach ($comments['comments'] as $comment) {
            Comment::create($comment);
        }

        $this->command->info("コメントデータを作成しました。");
    }
}
