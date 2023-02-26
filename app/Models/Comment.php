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

    public function getComment(){

        $scores = User::query()
        ->find(Auth::user()->id)
        ->userScores()
        ->first();

        $data = array(
            1 => 80, //$scores -> eating,
            2 => 40,//$scores -> eating_habits,
            3 => 30,//$scores -> ability_to_act,
            4 => 20,//$scores -> physical_condition
        );
       
        //dd(array_keys($data,max($data)));

        if (max($data)>=80){
            $comment_id[]=array_keys($data,max($data))[0];
            $comment_id[]=array_keys($data,min($data))[0]+4;
        }else{
            $comment_id[]=array_keys($data,min($data))[0]+4;
            unset($data[$comment_id[0]-4]);
            $comment_id[]=array_keys($data,min($data))[0]+4;
        };
         
        $comments = Comment::query()
            ->whereIn('id',$comment_id)
            ->get();
    
        //dd($comments);
        foreach($comments as $comment){
            $comment_lis[]=$comment->comment;
        }

        $comment_lis[] = "目標に向かって改善していきましょう。";

        $result = join('。',$comment_lis);
        
        return $result;
    }
}
