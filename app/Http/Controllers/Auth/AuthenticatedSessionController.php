<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Scores;
use App\Models\Question;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        
        $scores = Scores::where('user_id', Auth::user()->id)->first();
        // scoresテーブルに自分のレコードを持っていないユーザーがloginしたら自分用のレコードを追加する処理
        if (!$scores){
        $scores = new Scores;
        $scores->user_id = Auth::user()->id;
        $scores->save();}

        $questions = Question::where('user_id', Auth::user()->id)->first();
        // scoresテーブルに自分のレコードを持っていないユーザーがlogin画面に来たら自分用のレコードを追加する処理
        if (!$questions)
        {
        $questions = new Question;
        $questions->user_id = Auth::user()->id;
        $questions->save();
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
