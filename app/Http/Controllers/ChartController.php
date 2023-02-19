<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Fat;
use App\Models\Muscle;
use App\Models\Weight;
use App\Models\User;
use App\Models\Question;
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
    

        //データ更新処理
        $back = Question::where('user_id', $id);
        $back ->update($request->except('_token'));
        
        
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
