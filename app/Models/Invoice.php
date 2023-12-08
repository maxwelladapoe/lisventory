<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUIDs;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class Invoice extends Model
{
    use UUIDs;
    use HasFactory;
    use Searchable;

    public function authorize()
    {
        $invoice = Invoice::find($this->route('invoice'));
        return $invoice::where('team_id', Auth::user()->team_id)
            ->orWhere('user_id', Auth::user()->id);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize the data array...

        return $array;
    }

    protected $with = ['customer', 'taxes', 'discounts'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
    public function taxes()
    {
        return $this->hasMany(InvoiceTax::class);
    }
    public function discounts()
    {
        return $this->hasMany(InvoiceDiscount::class);
    }
}
