<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Target extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'bmi',
        'type',
        'term',
        'created_at',
        'updated_at',
    ];

    public function getTargetList($type):Array
    {
        function convertToWeight($n,$height){
            return($n*$height*$height);
        }

        $targets = Target::query()
            ->whereType($type)//本当はここにタイプの変数が入る
            ->orderBy('term')
            ->get();

        //身長を取得
        $questions = User::query()
            ->find(Auth::user()->id)
            ->userQuestions()
            ->first();        

        $height = $questions -> height;
        $height2 = $height*$height/10000;//身長の二乗（単位はm）

        //順番に配列に代入
        foreach($targets as $target){
            $bmi = $target -> bmi;//bmiだけ取り出す
            $weight = $bmi*$height2;//身長の二乗を掛けて体重に変換
            $data_lis[] =  $weight;
            $date_lis[] = $target -> term;
        }

        $data = array(
            'data' => $data_lis,
            'date' => $date_lis
        );

        return $data;
    }
}
