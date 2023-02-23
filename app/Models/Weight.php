<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Weight extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function getWeightList():Array
    {
        $weights = User::query()
            ->find(Auth::user()->id)
            ->userWeights()
            ->orderByDesc('measure_at')
            ->get();

        //順番に配列に代入
        foreach($weights as $weight){
            $weight_lis[] = $weight -> weight;
            $date_lis[] = $weight -> measure_at;
        }

        $data = array(
            'data' => $weight_lis,
            'date' => $date_lis
        );

        return $data;
    }




}
