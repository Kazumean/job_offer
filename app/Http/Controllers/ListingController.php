<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // 全ての求人を一覧で表示する
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // 求人の詳細を表示する
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // 求人の新規登録画面を表示する
    public function create() {
        return view('listings.create');
    }

    // 入力された求人を追加登録する
    public function store(Request $request) {

        // バリデーション
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        // 画像データがあれば、public/logosに保存する
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // 送信されたデータをデータベースに保存する
        Listing::create($formFields);

        // 登録完了時にフラッシュメッセージを表示する
        // Session::flash('message', '求人が追加されました。');

        return redirect('/')->with('message', '求人が追加されました。');
    }

    // 求人情報編集画面を表示する
    public function edit(Listing $listing) {
        return view('listings.edit', [
            'listing' => $listing
        ]);
    }
}
