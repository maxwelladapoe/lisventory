<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        // if($request->query('search')){

        //     if ($this->userTeamId) {
        //         $suppliers = Supplier::search($request->query('search'))->where('team_id', $this->userTeamId)->paginate(25);
        //     } else {
        //         $suppliers = Supplier::search($request->query('search'))->where('user_id', $this->userId)->paginate(25);
        //     }

        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Suppliers items fetched',
        //         'suppliers' => $suppliers
        //     ]);
        // }

        $user = Auth::user();
        $suppliers = Supplier::where('user_id', $user->id)->orWhere('team_id', $user->current_team_id)->latest()->paginate(50);
        return Inertia::render('Suppliers/Index', [
            'suppliers' => $suppliers
        ]);
    }

    public function create()
    {
        return Inertia::render('Suppliers/Create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'email' => ['nullable', 'string'],
            'mobile_no' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
        ]);


        $user = Auth::user();
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->location = $request->location;
        $supplier->address = $request->address;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->status = 1;
        $supplier->user_id = $user->id;
        $supplier->team_id = $user->current_team_id;
        $supplier->updated_by = $user->id;
        //TODO: add logo

        if ($supplier->save()) {
            return response()->json([
                'success' => true,
                'message' => 'The supplier has been added successfully',
                'supplier' => $supplier
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }


    public function show(Supplier $supplier)
    {
        if ($supplier) {
            return response()->json([
                'success' => true,
                'message' => 'Supplier fetched',
                'supplier' => $supplier
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }


    public function edit(Supplier $supplier)
    {
        return Inertia::render('Suppliers/Edit', [
            'supplier' => $supplier
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'email' => ['nullable', 'string'],
            'mobile_no' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
        ]);
        $user = Auth::user();
        $itemName = $supplier->getOriginal("name");
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->location = $request->location;
        $supplier->address = $request->address;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->updated_by = $user->id;
        //TODO: add logo

        if ($supplier->save()) {
            return response()->json([
                'success' => true,
                'message' => "$itemName been updated successfully",
                'supplier' => $supplier
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {

        $user = Auth::user();

        if (!$supplier->user_id === $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'You do not have an inventory item with this ID'
            ], 400);
        }
        if ($supplier->delete()) {
            return response()->json([
                'success' => true,
                'message' => "$supplier->name has deleted successfully",
                'supplier' => $supplier
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }
}
