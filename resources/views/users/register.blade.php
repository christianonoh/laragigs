<x-layout>
  <div class="mx-4">
    <x-card class="mx-auto mt-24 max-w-lg p-10">
      <header class="text-center">
        <h2 class="mb-1 text-2xl font-bold uppercase">
          Create a Gig
        </h2>
        <p class="mb-4">Post a gig to find a developer</p>
      </header>

      <form method="POST" action="/register">
        @csrf
        <div class="mb-6">
          <label for="name" class="mb-2 inline-block text-lg"> Name </label>
          <input type="text" class="w-full rounded border border-gray-200 p-2" name="name"
            value="{{ old('name') }}" />

          @error('name')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="email" class="mb-2 inline-block text-lg">Email</label>
          <input type="email" class="w-full rounded border border-gray-200 p-2" name="email"
            value="{{ old('email') }}" />

          @error('email')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="password" class="mb-2 inline-block text-lg">
            Password
          </label>
          <input type="password" class="w-full rounded border border-gray-200 p-2" name="password"
            value="{{ old('password') }}" />

          @error('password')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="password2" class="mb-2 inline-block text-lg">
            Confirm Password
          </label>
          <input type="password" class="w-full rounded border border-gray-200 p-2" name="password_confirmation"
            value="{{ old('password_confirmation') }}" />

          @error('password_confirmation')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <button type="submit" class="rounded bg-laravel px-4 py-2 text-white hover:bg-black">
            Sign Up
          </button>
        </div>

        <div class="mt-8">
          <p>
            Already have an account?
            <a href="/login" class="text-laravel">Login</a>
          </p>
        </div>
      </form>
    </x-card>
  </div>

</x-layout>
