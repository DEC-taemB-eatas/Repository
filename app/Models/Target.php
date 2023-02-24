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

    public function getTargetList():Array
    {
        function getType($age,$initial_bmi){
            if ($age>=50){
                if($initial_bmi<22){
                    return 0;
                }elseif($initial_bmi<25){
                    return 1;
                }else{
                    return 2;
                }
            }elseif($age>=35){
                if($initial_bmi<22){
                    return 3;
                }elseif($initial_bmi<25){
                    return 4;
                }else{
                    return 5;
                }
            }else{
                if($initial_bmi<25){
                    return 7;
                }else{
                    return 8;
                }
            }
        }
        //体重を取得
        $weights = User::query()
            ->find(Auth::user()->id)
            ->userWeights()
            ->orderBy('measure_at')
            ->first();
        $initial_weight = $weights -> weight;
        
        //身長を取得
        $questions = User::query()
            ->find(Auth::user()->id)
            ->userQuestions()
            ->first();
        $height = $questions -> height;
        $height2 = $height*$height/10000;//身長の二乗（単位はm）
        $initial_bmi = $initial_weight/$height2;
        
        //$age=$weights -> age;
        $age=40;//本来はデータベースから取得
        $type=getType($age,$initial_bmi);
        

         //目標を取得
        $targets = Target::query()
            ->whereType($type)//本当はここにタイプの変数が入る
            ->orderBy('term')
            ->get();
        
        //順番に配列に代入
        foreach($targets as $target){
            $bmi = $target -> bmi;//bmiだけ取り出す
            $weight = round($bmi * $height2 + $initial_weight,2) ;//身長の二乗を掛けて体重に変換後、最初の体重を足す
            //配列に代入
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
