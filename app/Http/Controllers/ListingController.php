<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // 全ての求人を一覧で表示する
    public function index() {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    // 求人の詳細を表示する
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
