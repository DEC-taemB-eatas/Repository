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
        $weights = User::query()
            ->find(Auth::user()->id)
            ->userMuscles()
            ->orderByDesc('measure_at')
            ->get();

        //順番に配列に代入
        foreach($muscles as $muscle){
            $muscle_lis[] = $muscle -> muscle;
        }

        return $muscle_lis;
    }
}
