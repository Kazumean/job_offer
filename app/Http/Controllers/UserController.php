<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // ユーザー登録フォーム画面を表示する
    public function create() {
        return view('users.register');
    }
}
