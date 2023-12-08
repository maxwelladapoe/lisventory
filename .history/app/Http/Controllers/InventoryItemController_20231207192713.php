<?php

namespace App\Http\Controllers;

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


        // if ($request->query('search')) {
        //     if ($this->userTeamId) {
        //         $inventoryItems = InventoryItem::search($request->query('search'))
        //             ->where('team_id', $this->userTeamId)->paginate(25);
        //     } else {
        //         $inventoryItems = InventoryItem::search($request->query('search'))
        //             ->where('user_id', $this->userId)->paginate(25);
        //     }

        //     return response()->json([
        //         'success' => true,
        //         'message' => 'inventory items fetched',
        //         'inventory_items' => $inventoryItems
        //     ]);
        // }


        $user = Auth::user();

        $inventoryItems = InventoryItem::where('user_id', $user->id)->latest()->paginate(50);


        return Inertia::render('Inventory/Index', [
            'inventory' => $inventoryItems
        ]);
    }

    public function create()
    {
        $user = Auth::user();

        $categories  =Category::where('user_id', $user->id)->latest()->get()

        return Inertia::render('Inventory/CreateInventory');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'purchase_price' => ['required', 'integer'],
            'resell_price' => ['required', 'integer'],
            'description' => ['nullable', 'string'],
            'currency' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
            'category_id' => ['nullable', 'integer'],
            'files' => ['nullable', 'array']
        ]);
        $inventoryItem = new InventoryItem();
        $inventoryItem->name = $request->name;
        $inventoryItem->description = $request->description;
        $inventoryItem->currency = $request->currency;
        $inventoryItem->purchase_price = $request->purchase_price;
        $inventoryItem->resell_price = $request->resell_price;
        $inventoryItem->quantity = $request->quantity;
        $inventoryItem->category_id = $request->category_id;
        $inventoryItem->user_id = Auth::user()->id;
        $inventoryItem->team_id = Auth::user()->team_id;



        if ($inventoryItem->save()) {



            if ($request['files']) {
                foreach ($request['files'] as $file) {
                    $inventoryItem->addMedia($file)->toMediaCollection('inventory_images');
                }
            }
            return response()->json([
                'success' => true,
                'message' => 'Your item has been added successfully',
                'inventory_item' => $inventoryItem
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'purchase_price' => ['required', 'integer'],
            'resell_price' => ['required', 'integer'],
            'description' => ['nullable', 'string'],
            'currency' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
            'category_id' => ['nullable', 'integer'],

        ]);

        $inventoryItem = InventoryItem::find($id);
        $itemName = $inventoryItem->getOriginal("name");
        $inventoryItem->name = $request->name;
        $inventoryItem->description = $request->description;
        $inventoryItem->currency = $request->currency;
        $inventoryItem->purchase_price = $request->purchase_price;
        $inventoryItem->resell_price = $request->resell_price;
        $inventoryItem->quantity = $request->quantity;
        $inventoryItem->category_id = $request->category_id;
        $inventoryItem->user_id = Auth::user()->id;
        if ($inventoryItem->save()) {
            return response()->json([
                'success' => true,
                'message' => "$itemName been updated successfully",
                'inventory_item' => $inventoryItem
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }

    public function destroy($id)
    {
        $inventoryItem = InventoryItem::find($id);
        if (!$inventoryItem->user_id == Auth::user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'You do not have an inventory item with this ID'
            ], 400);
        }
        if ($inventoryItem->delete()) {
            return response()->json([
                'success' => true,
                'message' => "$inventoryItem->name has deleted successfully",
                'inventory_item' => $inventoryItem
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }
}
