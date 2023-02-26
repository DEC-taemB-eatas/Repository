<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;//日付計算ライブラリ

class Fat extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function getFatList():Array
        {
            $fats = User::query()
                ->find(Auth::user()->id)
                ->userFats()
                ->orderBy('measure_at')
                ->get();

        //順番に配列に代入
            foreach($fats as $fat){
                $data_lis[] = $fat -> fat;
                $date_lis[] =new Carbon($fat -> measure_at);//日付計算を行うため、Carbon形式で配列に入れる
            }

            foreach($date_lis as $date){
                $date_lis_diff[] = $date -> diffInDays($date_lis[0]);//測定開始日との差分を計算する
            }
            
        $data_lis_new[] = $data_lis[0];
        $date_lis_new[] = $date_lis_diff[0];

        for ($i = 1; $i < count($data_lis); $i++){
            $date_diff = $date_lis_diff[$i] - $date_lis_diff[$i - 1];
            $data_diff = $data_lis[$i] - $data_lis[$i - 1];
            $date_diff_lis[]=$date_diff;
            if($date_diff != 1){
                for ($j = 1;$j <= $date_diff ; $j++){
                    $date_lis_new[] = $date_lis_diff[$i - 1] + $j;
                    $data_lis_new[] = $data_lis[$i - 1] + ($data_diff * $j / $date_diff);
                }
            }else{
                $data_lis_new[] = $data_lis[$i];
                $date_lis_new[] = $date_lis_diff[$i];
                }
            }

        $data = array(
            'data' => $data_lis_new,
            'date' => $date_lis_new,
            'min'=> $mins
        );

            return $data;
    }

}
