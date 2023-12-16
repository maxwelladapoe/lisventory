<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInventoryItemRequest;
use App\Http\Requests\DeleteInventoryItemRequest;
use App\Http\Requests\UpdateInventoryItemRequest;
use App\Models\Category;
use App\Models\InventoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;


class InventoryItemController extends Controller
{
    //

    public function index(Request $request)
    {

        $user = Auth::user();
        $search = strtolower(trim($request->search));
        $inventoryItems = InventoryItem::where('user_id', $user->id)->orWhere('team_id', $user->current_team_id)->when($search, function ($query, $search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })->latest()->paginate(25);


        return Inertia::render('Inventory/Index', [
            'inventory' => $inventoryItems->withQueryString()
        ]);
    }

    public function create()
    {
        $user = Auth::user();

        $categories = Category::where('user_id', $user->id)->orWhere('team_id', $user->current_team_id)->latest()->get();

        return Inertia::render('Inventory/Create', [
            'categories' => $categories
        ]);
    }

    public function store(CreateInventoryItemRequest $request)
    {
        $inventoryItem = new InventoryItem();
        $inventoryItem->name = $request->name;
        $inventoryItem->description = $request->description;
        $inventoryItem->currency = $request->currency;
        $inventoryItem->purchase_price = $request->purchase_price;
        $inventoryItem->resell_price = $request->resell_price;
        $inventoryItem->quantity = $request->quantity;
        $inventoryItem->category_id = $request->category_id;
        $inventoryItem->user_id = Auth::user()->id;
        $inventoryItem->team_id = Auth::user()->current_team_id;

        if ($inventoryItem->save()) {
            if ($request['files']) {
                foreach ($request['files'] as $file) {
                    $inventoryItem->addMedia($file)->toMediaCollection('inventory_images');
                }
            }
            return redirect()->route('inventory.index')->with('success', 'Inventory item Created Successfully');
        }
    }


    public function edit(InventoryItem $inventory)
    {
        $user = Auth::user();

        $categories = Category::where('user_id', $user->id)->orWhere('team_id', $user->current_team_id)->latest()->get();

        return Inertia::render('Inventory/Edit', [
            'inventory' => $inventory,
            'categories' => $categories
        ]);
    }


    public function update(InventoryItem $inventory, UpdateInventoryItemRequest $request)
    {
        $itemName = $inventory->getOriginal("name");
        $inventory->name = $request->name;
        $inventory->description = $request->description;
        $inventory->currency = $request->currency;
        $inventory->purchase_price = $request->purchase_price;
        $inventory->resell_price = $request->resell_price;
        $inventory->quantity = $request->quantity;
        $inventory->category_id = $request->category_id;
        $inventory->user_id = Auth::user()->id;
        if ($inventory->save()) {
            return back()->with('success', $itemName . ' updated successfully');
        }
    }

    public function destroy(DeleteInventoryItemRequest $request)
    {
        $inventory = InventoryItem::find($request->id);

        $itemName = $inventory->getOriginal("name");

        if ($inventory->delete()) {
            return back()->with('success', $itemName . ' deleted successfully');
        }
    }
}
