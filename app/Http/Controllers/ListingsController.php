<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
  // Show all listings
  public function index()
  {
    // @dd(request('tag'));
    return view('listings.index', [
      'heading' => 'Houses',
      'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
    ]);
  }

  // Show a single listing
  public function show(Listing $listing)
  {
    return view('listings.show', [
      'listing' => $listing
    ]);
  }
}
