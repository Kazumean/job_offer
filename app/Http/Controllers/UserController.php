<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // ユーザー登録フォーム画面を表示する
    public function create() {
        return view('users.register');
    }

    // ユーザー情報を新規登録する
    public function store(Request $request) {

        // バリデーション
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required| confirmed| min:6',
        ]);

        // パスワードをハッシュ化する
        $formFields['password'] = bcrypt($formFields['password']);

        // ユーザーを作成・登録する
        $user = User::create($formFields);

        // ログインする
        auth()->login($user);

        return redirect('/')->with('message', 'ユーザーの新規登録およびログインが完了しました。');
    }

    // ログインフォームを表示する
    public function login() {
        return view('users.login');
    }

    // ログインする
    public function authenticate(Request $request) {

        // バリデーション
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        // ユーザー情報があれば、sessionを作成する
        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'ログインしました。');
        }

        return back()->withErrors(['email' => 'ユーザーが存在しません。'])->onlyInput('email');
    }

    // ログアウトする
    public function logout(Request $request) {

        // ログアウトする
        auth()->logout();

        // セッションをクリアし、セッションIDを再発行する
        $request->session()->invalidate();

        // トークンを再作成する
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'ログアウトしました。');
    }
}
