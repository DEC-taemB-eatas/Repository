<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function getComment()
    {

        $scores = User::query()
            ->find(Auth::user()->id)
            ->userScores()
            ->first();

        $data = array(
            1 => $scores->eating,
            2 => $scores->eating_habits,
            3 => $scores->ability_to_act,
            4 => $scores->physical_condition
        );

        //dd(array_keys($data,max($data)));

        if (max($data) >= 80) {
            $comment_id[] = array_keys($data, max($data))[0];
            $comment_id[] = 9;
            $comment_id[] = array_keys($data, min($data))[0] + 4;
        } else {
            $comment_id[] = array_keys($data, min($data))[0] + 4;
            unset($data[$comment_id[0] - 4]);
            $comment_id[] = 10;
            $comment_id[] = array_keys($data, min($data))[0] + 4;
        };

        $comment_id[] = 11;

        foreach ($comment_id as $comment_id) {
            $comments = Comment::query()
                ->whereId($comment_id)
                ->first();

            $comment_lis[] = $comments->comment;
        }


        $result = join(' ', $comment_lis);

        return $result;
    }
}
