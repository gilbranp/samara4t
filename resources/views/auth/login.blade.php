<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Samara</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Tailwind CSS 2.2.19 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100">

  <main>
    <div class="min-h-screen flex items-center justify-center bg-green-600">
      <!-- Atur lebar yang lebih besar untuk layar yang lebih luas dengan `lg:max-w-xl` -->
      <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md lg:max-w-xl">
          <h2 class="text-3xl font-bold text-center text-green-700 mb-6">LOGIN SAMARA</h2>
  
          <!-- Alert untuk notifikasi sukses -->
          @if (session('success'))
              <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg" role="alert">
                  {{ session('success') }}
              </div>
          @endif

          <!-- Alert untuk notifikasi kesalahan -->
          @if ($errors->any())
              <div class="mb-4 p-4 text-red-700 bg-red-100 rounded-lg" role="alert">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
  
          <!-- Form -->
          <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="mb-4">
                  <label for="email" class="block text-green-700 font-semibold mb-2">Username</label>
                  <input type="text" id="email" name="username" class="w-full p-3 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan username anda" required>
              </div>
              <div class="mb-4">
                  <label for="password" class="block text-green-700 font-semibold mb-2">Password</label>
                  <input minlength="8" type="password" id="password" name="password" class="w-full p-3 border border-green-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan password anda" required>
              </div>
  
              <!-- Button Login -->
              <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-lg font-semibold transition duration-300 shadow-lg">
                  Login
              </button>
          </form>
  
          <!-- Link Registrasi dan Lupa Password -->
          <div class="mt-6 text-center">
              <a href="/register" class="text-yellow-500 hover:underline">Belum punya akun? Daftar sekarang</a>
          </div>
          {{-- <div class="mt-2 text-center">
              <a href="/forgot-password" class="text-yellow-500 hover:underline">Lupa password?</a>
          </div> --}}
      </div>
    </div>
  </main>

</body>

</html>
