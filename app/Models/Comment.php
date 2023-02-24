<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function getComment(){

        $type = 1;//これは質問の点数で判定

        $comment = Comment::query()
            ->find($type)
            ->first();

        return $comment;
    }
}
