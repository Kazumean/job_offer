<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                ログイン
            </h2>
            <p class="mb-4">求人を投稿するためにログインしてください。</p>
        </header>

        <form method="POST" action="/users/authenticate">
            @csrf

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">メールアドレス</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ old('email') }}"/>
                
                @error('email')
                    <p class="text-red-500 text-xs mt-1" >{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    パスワード
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value="{{ old('password') }}"/>

                @error('password')
                    <p class="text-red-500 text-xs mt-1" >{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    ログインする
                </button>
            </div>

            <div class="mt-8">
                <p>
                    アカウントをお持ちでない方はこちら
                    <a href="/register" class="text-laravel">ユーザー登録</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
