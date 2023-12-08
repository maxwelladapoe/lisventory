<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\InventoryItem;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $inventoryItemCount = InventoryItem::count();
        $categoryCount = Category::count();
        $customerCount = Customer::count();
        $supplierCount = Supplier::count();

        return response()->json([
            'success' => true,
            'stats' => [
                "category_stats" => [
                    "count" => $categoryCount,
                    "desc" => $this->checkPercentageCountIncreaseOrDecrease(Category::class),
                ],
                "inventory_item_stats" => [
                    "count" => $inventoryItemCount,
                    "desc" => $this->checkPercentageCountIncreaseOrDecrease(InventoryItem::class),
                ],
                "customer_stats" => [
                    "count" => $customerCount,
                    "desc" => $this->checkPercentageCountIncreaseOrDecrease(Customer::class),
                ],
                "supplier_stats" => [
                    "count" => $supplierCount,
                    "desc" => $this->checkPercentageCountIncreaseOrDecrease(Supplier::class),
                ],
            ]
        ]);
    }
}
