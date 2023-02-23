<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $targets = Target::query()
            ->whereType($type)//本当はここにタイプの変数が入る
            ->orderBy('term')
            ->get();

        //順番に配列に代入
        foreach($targets as $target){
            $data_lis[] = $target -> bmi;
            $date_lis[] = $target -> term;
        }

        $data = array(
            'data' => $data_lis,
            'date' => $date_lis
        );

        return $data;
    }
}
