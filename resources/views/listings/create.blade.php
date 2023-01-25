<x-layout>

    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">新しい求人を作成する</h2>
            <p class="mb-4">求人を投稿して求職者と繋がりましょう！</p>
        </header>

        <form method="POST" action="/listings">
            @csrf
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">会社名</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" />

                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">職種名</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    placeholder="例: Laravel開発中級者" />
                
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">勤務地</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    placeholder="例: 神奈川県鎌倉市（リモート勤務あり） など" />
                
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">連絡先メールアドレス</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">会社ホームページ</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" />

                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">タグ (半角カンマで区切ってください)</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="例: Laravel, バックエンド, Postgres など" />
                
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">会社ロゴ</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
            </div> --}}

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">お仕事詳細</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" placeholder="具体的な業務内容やご要望、給与等を記入してください。"></textarea>

            @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">求人を作成する</button>

                <a href="/" class="text-black ml-4">戻る</a>
            </div>
        </form>
    </x-card>
</x-layout>
