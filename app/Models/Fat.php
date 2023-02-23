<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
                $date_lis[] = $fat -> measure_at;
        }

        $data = array(
            'data' => $data_lis,
            'date' => $date_lis
        );

        return $data;
    }

}
