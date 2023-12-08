<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
   use Laravel\Scout\Searchable;
class Profile extends Model
{
    use HasFactory;
  use Searchable;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize the data array...

        return $array;
    }

}
