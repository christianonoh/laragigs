<x-layout>
  @include('partials._searchbar')

  <a href="/" class="mb-4 ml-4 inline-block text-black"><i class="fa-solid fa-arrow-left"></i> Back
  </a>

  <div class="mx-4">
    <x-card class="p-10">
      <div class="flex flex-col items-center justify-center text-center">
        <img class="mb-6 mr-6 w-48"
          src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}" alt="" />

        <h3 class="mb-2 text-2xl">{{ $listing->title }}</h3>
        <div class="mb-4 text-xl font-bold">{{ $listing->company }}</div>
        <x-tags :tags="$listing->tags" />
        <div class="my-4 text-lg">
          <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
        </div>
        <div class="mb-6 w-full border border-gray-200"></div>
        <div>
          <h3 class="mb-4 text-3xl font-bold">
            Job Description
          </h3>
          <div class="space-y-6 text-lg">
            <p>
              {{ $listing->description }}
            </p>

            <a href="mailto:{{ $listing->email }}"
              class="mt-6 block rounded-xl bg-laravel py-2 text-white hover:opacity-80"><i
                class="fa-solid fa-envelope"></i>
              Contact Employer</a>

            <a href={{ $listing->website }} target="_blank"
              class="block rounded-xl bg-black py-2 text-white hover:opacity-80"><i class="fa-solid fa-globe"></i> Visit
              Website</a>
          </div>
        </div>
    </x-card>
    <x-card class="mt-8">
      <div class="flex justify-between">
        <a href="/listings/{{ $listing->id }}/edit" class="rounded bg-laravel px-4 py-2 text-white hover:bg-black">
          Edit Gig
        </a>

        <form action="/listings/{{ $listing->id }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600">
            Delete Gig
          </button>
        </form>
      </div>
    </x-card>
  </div>
  </div>
</x-layout>
