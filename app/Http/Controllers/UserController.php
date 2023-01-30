<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // パスワードをハッシュ化する
        $formFields['password'] = bcrypt($formFields['password']);
    }
}
