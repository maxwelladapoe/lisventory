<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $orders = Order::where('team_id', $user->current_team_id)
            ->orWhere('user_id', $user->id)->latest()->paginate(50);

        return Inertia::render('Orders/Index', [
            'orders' => $orders,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => ['nullable'],
            'description' => ['nullable', 'string'],
            'order_items' => ['required', 'array', 'min:1'],
            "order_items.*.quantity" => ['required', 'string'],
            "order_items.*.inventory_item_id" => ['required', 'string'],
        ]);
$user = Auth::user();

        // add to the database
        $order = new Order();
        $order->description = $request->description;
        $order->customer_id = $request->customer_id;
        $order->user_id = $user->id;
        $order->team_id = $user->current_team_id;
        $order->status = 1;
        $order->payment_status = 1;
        $order->date = Carbon::now();
        if ($order->save()) {

            $orderTotalCost = 0;

            foreach ($request->order_items as $orderItem) {
                $inventoryItem = InventoryItem::find($orderItem['inventory_item_id']);
                $newOrderItem = new OrderItem();
                $newOrderItem->description = $inventoryItem->name;
                $newOrderItem->inventory_item_id = $inventoryItem->id;
                $newOrderItem->order_id = $order->id;
                $newOrderItem->quantity = $orderItem['quantity'];
                $newOrderItem->unit_price = $inventoryItem->resell_price;
                $amount = $inventoryItem->resell_price * $orderItem['quantity'];
                $newOrderItem->amount = $amount;
                $orderTotalCost += $amount;
                $newOrderItem->save();
                $inventoryItem->quantity = $inventoryItem->quantity - $orderItem['quantity'];
                $inventoryItem->save();
            }

            $order->total = $orderTotalCost;
            $order->save();

            return response()->json([
                'success' => true,
                'message' => 'Order saved successfully',
            ], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
        // reduce the quantities
        // create an invoice
        //send invoice
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }

    private function createCorrespondingOrder(order $order)
    {
    }
}
