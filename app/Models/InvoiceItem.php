<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $with = ['inventoryItem'];


    public function inventoryItem()
    {
        return $this->belongsTo(InventoryItem::class);
    }
}
