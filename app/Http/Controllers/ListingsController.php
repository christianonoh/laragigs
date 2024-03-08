<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class ListingsController extends Controller
{
  // Show all listings
  public function index()
  {
    // @dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(4));
    return view('listings.index', [
      'heading' => 'Houses',
      'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
    ]);
  }

  // Show a single listing
  public function show(Listing $listing)
  {
    return view('listings.show', [
      'listing' => $listing
    ]);
  }

  // Show the form to create a new listing
  public function create()
  {
    return view('listings.create');
  }

  // Store a new listing
  public function store(Request $request)
  {
    // @dd('Hi');
    // Validate the form
    $formFields = $request->validate([
      'title' => 'required',
      'tags' => 'required',
      'company' => ['required', ValidationRule::unique('listings', 'company')],
      'location' => 'required',
      'email' => ['required', 'email'],
      'website' => 'required',
      'description' => 'required'
    ]);

    // Create a new listing
    Listing::create($formFields);

    // Redirect to the homepage
    return redirect('/')->with('message', 'Your listing has been created successfully.');
  }
}
