@if (session()->has('message'))
  <div class="fixed left-1/2 top-0 -translate-x-1/2 bg-laravel px-12 py-3 text-white">
    <p>{{ session('message') }}</p>
  </div>
@endif
