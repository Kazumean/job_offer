<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                ユーザー登録
            </h2>
            <p class="mb-4">求人を投稿するためのアカウントを登録してください。</p>
        </header>

        <form method="POST" action="/users">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    氏名
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1" >{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">メールアドレス</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" />
                
                @error('email')
                    <p class="text-red-500 text-xs mt-1" >{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    パスワード
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />

                @error('password')
                    <p class="text-red-500 text-xs mt-1" >{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">
                    確認用パスワード
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1" >{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    登録する
                </button>
            </div>

            <div class="mt-8">
                <p>
                    アカウントをお持ちの方はこちら
                    <a href="/login" class="text-laravel">ログイン</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
