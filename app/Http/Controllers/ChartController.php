<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Fat;
use App\Models\Muscle;
use App\Models\Weight;
use App\Models\User;
use App\Models\Question;
use App\Models\Scores;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // 質問事項の編集画面
    public function edit(Request $request)
    {
        $user = Auth::user();
        $id = $user -> id;
        $questions = Question::where('user_id', $id)->first();
        
        // chartテーブルに自分のレコードを持っていないユーザーがedit画面に来たら自分用のレコードを追加する処理
        if (!$questions)
        {
        $questions = new Question;
        $questions->user_id = $id;
        $questions->save();
        }
        return view('chart.edit',compact('user','id','questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $id = $user -> id;

        //questionsデータ更新処理
        $back = Question::where('user_id', $id);
        $back ->update($request->except('_token'));

        //scoresデータ更新処理
        $eating_score = 0;
        $eating_habits_score = 0;
        $ability_to_act_score = 0;
        $physical_condition = 0;
        
        if($request->q1 == 0){$eating_habits_score += 6;}
        if($request->q2 == 0){$eating_habits_score += 7;}
        if($request->q3 == 0){$eating_habits_score += 7;}
        if($request->q4 == 0){$eating_score += 6;}
        if($request->q5 == 0){$eating_score += 6;}
        if($request->q6 == 1){$eating_score += 6;}
        if($request->q7 == 1){$eating_score += 6;}
        if($request->q8 == 1){$eating_score += 6;}
        if($request->q9_1 == 1){$eating_score += 5;}
        else{
            $count = 0;
            for($i = 2; $i <= 4; $i++){if($request->{"q9_" . $i} == 1){$count += 1;}}
            if($count == 1){$eating_score += 3;}
            elseif($count == 2){$eating_score += 2;}
        }
        if($request->q10 == 1){$eating_score += 5;}
        if($request->q12 == 0){$ability_to_act_score += 5;}
        if($request->q14 == 0){$ability_to_act_score += 5;}

        if($request->q17 == 0){$physical_condition += 0;}
        elseif($request->q17 == 1){$physical_condition += 2;}
        elseif($request->q17 == 2){$physical_condition += 4;}
        elseif($request->q17 == 3){$physical_condition += 7;}
        else{$physical_condition += 7;}

        if($request->q19 == 0){$physical_condition += 6;}
        elseif($request->q19 == 1){$physical_condition += 3;}
        else{$physical_condition += 0;}

        if($request->q20 == 0){$ability_to_act_score += 0;}
        elseif($request->q20 == 1){$ability_to_act_score += 2;}
        elseif($request->q20 == 2){$ability_to_act_score += 3;}
        elseif($request->q20 == 3){$ability_to_act_score += 4;}
        else{$ability_to_act_score += 5;}

        if($request->q22_1 == 1){$physical_condition += 7;}
        else{
            $count = 0;
            for($i = 2; $i <= 11; $i++){if($request->{"q22_" . $i} == 1){$count += 1;}}
            if($count == 1){$physical_condition += 5;}
            elseif($count >= 2 and $count <= 3){$physical_condition += 4;}
        
        }

        if($request->q24_1 == 1){$ability_to_act_score += 0;}
        else{
            $count = 0;
            for($i = 2; $i <= 10; $i++){if($request->{"q24_" . $i} == 1){$count += 1;}}
            if($count == 1){$ability_to_act_score += 2;}
            elseif($count >= 3){$ability_to_act_score += 5;}
        
        }

        

        $scores = Scores::where('user_id', $id)->first();
        $scores->eating = $eating_score;
        $scores->eating_habits = $eating_habits_score;
        $scores->ability_to_act = $ability_to_act_score;
        $scores->physical_condition = $physical_condition;
        $scores->save();
        
        
        
        return redirect()->route('body.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
