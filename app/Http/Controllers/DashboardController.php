<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\InventoryItem;
use App\Models\Order;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Inertia\Inertia;
use App\Traits\IncreaseOrDecreasePercentageStats;

class DashboardController extends Controller
{
    public function index()
    {

        $inventoryItemCount = InventoryItem::count();
        $orderCount = Order::count();
        $customerCount = Customer::count();
        $supplierCount = Supplier::count();



        return Inertia::render('Dashboard',
            [
                'stats' => [
                    "order" => [
                        "count" => $orderCount,
                        "desc" => IncreaseOrDecreasePercentageStats::checkPercentageCountIncreaseOrDecrease(Order::class),
                    ],
                    "inventory" => [
                        "count" => $inventoryItemCount,
                        "desc" => IncreaseOrDecreasePercentageStats::checkPercentageCountIncreaseOrDecrease(InventoryItem::class),
                    ],
                    "customer" => [
                        "count" => $customerCount,
                        "desc" => IncreaseOrDecreasePercentageStats::checkPercentageCountIncreaseOrDecrease(Customer::class),
                    ],
                    "supplier" => [
                        "count" => $supplierCount,
                        "desc" => IncreaseOrDecreasePercentageStats::checkPercentageCountIncreaseOrDecrease(Supplier::class),
                    ],
                ]
            ]
        );

    }
}
