<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUIDs;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use UUIDs;
    use HasFactory;
    use Searchable;

    public function authorize()
    {
        $order = Order::find($this->route('order'));
        return $order::where('team_id', Auth::user()->team_id)
            ->orWhere('user_id', Auth::user()->id);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize the data array...

        return $array;
    }
}
