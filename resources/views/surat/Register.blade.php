<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Putri Surat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold text-center text-indigo-700 mb-6">Daftar Akun Baru</h2>

            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-red-600 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-indigo-500">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-indigo-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-indigo-500">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-indigo-500">
                </div>

                <div>
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">Daftar</button>
                </div>
            </form>

            <p class="text-sm text-center text-gray-500 mt-6">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login di sini</a>
            </p>
        </div>
    </div>

</body>
</html>
