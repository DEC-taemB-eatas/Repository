<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Scores extends Model
{
    use HasFactory;

    public function getScore():Array
    {
        $scores = User::query()
        ->find(Auth::user()->id)
        ->userScores()
        ->first();

        $data = array(
            'eating' => $scores -> eating,
            'eating_habits' => $scores -> eating_habits,
            'ability_to_act' => $scores -> ability_to_act,
            'physical_condition' => $scores -> physical_condition
        );

        return $data;



    }
}
