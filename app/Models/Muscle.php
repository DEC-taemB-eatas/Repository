<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Muscle extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function getMuscleList():Array
    {
        $muscles = User::query()
            ->find(Auth::user()->id)
            ->userMuscles()
            ->orderBy('measure_at')
            ->get();

        //順番に配列に代入
        foreach($muscles as $muscle){
            $data_lis[] = $muscle -> muscle;
            $date_lis[] = $muscle -> measure_at;
        }

        $data = array(
            'data' => $data_lis,
            'date' => $date_lis
        );

        return $data;
    }
}
