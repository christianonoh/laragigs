<x-layout>
  <div class="mx-4">
    <x-card>
      <header>
        <h1 class="my-6 text-center text-3xl font-bold uppercase">
          Manage Gigs
        </h1>
      </header>

      <table class="w-full table-auto rounded-sm">
        <tbody>
          @unless ($listings->count() < 0)
            @foreach ($listings as $listing)
              <tr class="border-gray-300">
                <td class="border-b border-t border-gray-300 px-4 py-8 text-lg">
                  <a href="show.html">
                    {{ $listing->title }}
                  </a>
                </td>
                <td class="border-b border-t border-gray-300 px-4 py-8 text-lg">
                  <a href="/listings/{{ $listing->id }}/edit" class="rounded-xl px-6 py-2 text-blue-400"><i
                      class="fa-solid fa-pen-to-square"></i>
                    Edit</a>
                </td>
                <td class="border-b border-t border-gray-300 px-4 py-8 text-lg">
                  <form action="/listings/{{ $listing->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">
                      <i class="fa-solid fa-trash-can"></i>
                      Delete
                    </button>
                  </form>
                </td>
            @endforeach
          @else
            <tr>
              <td class="border-b border-t border-gray-300 px-4 py-8 text-lg">
                No listings found
              </td>
            </tr>

          @endunless
        </tbody>
      </table>
    </x-card>
  </div>
</x-layout>
