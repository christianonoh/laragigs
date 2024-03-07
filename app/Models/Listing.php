<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        // $query->when($filters['search'] ?? false, function ($query, $search) {
        //     $query
        //         ->where('title', 'like', '%' . $search . '%')
        //         ->orWhere('description', 'like', '%' . $search . '%');
        // });
      if($filters['tag'] ?? false) 
      {
        $query->where('tags', 'like', '%' . request('tag') . '%');
      }
    }
}
