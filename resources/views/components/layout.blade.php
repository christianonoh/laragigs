<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laragigs</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//unpkg.com/alpinejs" defer></script>
  @vite('resources/css/app.css')
  <link rel="icon" href="{{ @asset('images/favicon.ico') }}" />
</head>

<body class="mb-48">
  <nav class="mb-4 flex items-center justify-between">
    <a href="/"><img class="w-24" src="{{ @asset('images/logo.png') }}" alt="" class="logo" /></a>
    <ul class="mr-6 flex space-x-6 text-lg">
      @auth
        <li class="font-semibold">
          Welcome {{ auth()->user()->name }}!
        </li>
        <li>
          <a href="/manage-listings">
            <i class="fa-solid fa-gear"></i> Manage Listings</a>
        </li>
        <li>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="hover:text-laravel"><i class="fa-solid fa-sign-out"></i> Logout</button>
          </form>
        @else
        <li>
          <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
        </li>
        <li>
          <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
            Login</a>
        </li>
      @endauth
    </ul>
  </nav>

  {{ $slot }}
  <footer
    class="fixed bottom-0 left-0 mt-24 flex h-24 w-full items-center justify-start bg-laravel font-bold text-white opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    <a href="/listings/create" class="absolute right-10 top-1/3 bg-black px-5 py-2 text-white">Post Job</a>
  </footer>
  <x-flash-message />
</body>

</html>
