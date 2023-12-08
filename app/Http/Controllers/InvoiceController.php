<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDiscount;
use App\Models\InvoiceItem;
use App\Models\InvoiceTax;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::where('team_id', $this->userTeamId)
            ->orWhere('user_id', $this->userId)->latest()->paginate(50);
        return response()->json([
            'success' => true,
            'message' => 'Invoices fetched',
            'invoices' => $invoices
        ]);
    }

    public function view(Request $request)
    {
        $invoice = Invoice::where('team_id', $this->userTeamId)
            ->orWhere('user_id', $this->userId)->latest()->where('id', $request->id)->paginate(50);
        return response()->json([
            'success' => true,
            'message' => 'Invoice fetched',
            'invoice' => $invoice
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => ['required', 'integer'],
            'description' => ['nullable', 'string'],
            'invoice_date' => ['required', 'date'],
            'invoice_number' => ['required', 'string'],
            'payment_due_date' => ['nullable', 'date'],
            'invoice_items' => ['required', 'array', 'min:1'],
            "invoice_items.*.description" => ['required', 'string'],
            "invoice_items.*.quantity" => ['required', 'string'],
            "invoice_items.*.unit_price" => ['required', 'string'],
            "invoice_items.*.inventory_item_id" => ['required', 'string'],
        ]);



        $invoice = new Invoice();
        $invoice->description = $request->description;
        $invoice->customer_id = $request->customer_id;
        $invoice->user_id = $this->userId;
        $invoice->team_id = $this->userTeamId;
        $invoice->status = 1;
        $invoice->invoice_no = $request->invoice_number;
        $invoice->date = $request->invoice_date;
        $invoice->due_date = $request->payment_due_date;
        if ($invoice->save()) {
            //save the items

            foreach ($request->invoice_items as $invoiceItem) {
                $newInvoiceItem = new InvoiceItem();
                $newInvoiceItem->description = $invoiceItem['description'];
                $newInvoiceItem->inventory_item_id = $invoiceItem['inventory_item_id'];
                $newInvoiceItem->invoice_id = $invoice->id;
                $newInvoiceItem->quantity = $invoiceItem['quantity'];
                $newInvoiceItem->unit_price = $invoiceItem['unit_price'];
                $newInvoiceItem->amount = $invoiceItem['unit_price'] * $invoiceItem['quantity'];
                $newInvoiceItem->save();
            }

            if ($request->discount) {
                foreach ($request->discount as $discount) {
                    $newDiscount = new InvoiceDiscount();
                    $newDiscount->name = $discount['name'];
                    $newDiscount->invoice_id = $invoice->id;
                    $newDiscount->percentage = $discount['percentage'];
                    $newDiscount->save();
                }
            }

            if ($request->taxes) {
                foreach ($request->taxes as $tax) {
                    $newTax = new InvoiceTax();
                    $newTax->name = $tax['name'];
                    $newTax->invoice_id = $invoice->id;
                    $newTax->percentage = $tax['percentage'];
                    $newDiscount->save();
                }
            }



            return response()->json([
                'success' => true,
                'message' => 'invoice saved successfully',
            ], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //

        return response()->json([
            'success' => true,
            'message' => 'Invoice fetched',
            'invoice' => $invoice->loadMissing(['invoiceItems'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
