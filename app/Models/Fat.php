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
            
            $data = array(
                'data' => $data_lis,
                'date' => $date_lis_diff
            );

            return $data;
    }

}
