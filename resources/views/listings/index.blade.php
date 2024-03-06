@extends('layout')

@section('content')

  <!-- Hero -->
  @include('partials._hero')

  {{-- Search  --}}
  @include('partials._searchbar')

  <main>
    @if (count($listings) == 0)
      :
      <p> There are no listings available. </p>
    @else
      <div class="mx-4 grid gap-4 lg:grid-cols-2">
        @foreach ($listings as $listing)
          <x-listing-card :listing=$listing />
        @endforeach
      </div>
    @endif
  </main>
@endsection
