<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Fat;
use App\Models\Muscle;
use App\Models\Weight;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BodyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fats = User::query()
            ->find(Auth::user()->id)
            ->userFats()
            ->orderByDesc('measure_at')
            ->paginate(5);

        $weights = User::query()
            ->find(Auth::user()->id)
            ->userWeights()
            ->orderByDesc('measure_at')
            ->paginate(5);

        $muscles = User::query()
            ->find(Auth::user()->id)
            ->userMuscles()
            ->orderByDesc('measure_at')
            ->paginate(5);

        //ddd($fats);

        return view('body.index', compact('weights', 'muscles', 'fats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('body.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $rules = [
            'weight' => 'numeric | between:0,150',
            'fat' => 'numeric | between:0,100',
            'muscle' => 'numeric | min:0',
            'measured_at' => 'date',
        ];

        $message = [
            'weight.numeric' => '数字で入力してください',
            'weight.between' => '0~150で入力してください',
            'fat.numeric' => '数字で入力してください',
            'fat.between' => '0~100で入力してください',
            'muscle.numeric' => '数字で入力してください',
            'muscle.min' => '0~で入力してください',
            'measured_at.date' => '日付を入力してください',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect('body/create')
                ->withErrors($validator)
                ->withInput();
        }
        // create()は最初から用意されている関数

        $data = $request->merge(['user_id' => Auth::user()->id])->all();

        $fat_result = Fat::create($request->all());
        $weight_result = Weight::create($request->all());
        $muscle_result = Muscle::create($request->all());

        // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('dashboard');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
