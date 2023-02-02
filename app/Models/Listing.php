<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'company',
    //     'location',
    //     'website',
    //     'email',
    //     'description',
    //     'tags'
    // ];

    public function scopeFilter($query, array $filters) {

        // タグをクリックすることで絞り込み検索をする
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        // 検索欄にタイトル or 詳細説明 or タグのキーワードを入れることで、絞り込み検索をする
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search'). '%')
                    ->orWhere('description', 'like', '%' . request('search'). '%')
                    ->orWhere('tags', 'like', '%' . request('search'). '%');
        }
    }

    // ユーザーテーブル（主テーブル）と紐づける
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
