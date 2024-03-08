@if (session()->has('message'))
  <div x-data="{ open: true }" x-init="setTimeout(() => open = false, 3000)" x-show="open" class="fixed left-1/2 top-0 -translate-x-1/2 bg-laravel px-12 py-3 text-white">
    <p>{{ session('message') }}</p>
  </div>
@endif
