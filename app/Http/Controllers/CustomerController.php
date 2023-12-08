<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        // if ($request->query('search')) {

        //     if ($user->current_team_id) {
        //         $customers = Customer::search($request->query('search'))->where('team_id', $user->current_team_id)->get();
        //     } else {
        //         $customers = Customer::search($request->query('search'))->where('user_id',  $user->id)->get();
        //     }

        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Customers items fetched',
        //         'customers' => $customers
        //     ]);
        // }
        $user = Auth::user();
        $customers = Customer::where('user_id', $user->id)->orWhere('team_id', $user->current_team_id)->latest()->paginate(25);

        return Inertia::render('Customers/Index', [
            'customers' => $customers
        ]);
    }

    public function create()
    {
        return Inertia::render('Customers/Create',);
    }


    public function show(Customer $customer)
    {
        $user = Auth::user();
        if ($customer->user_id !=  $user->id || $customer->team_id != $user->current_team_id) {
            return response()->json(['success' => false, 'message' => 'This resource does not belong to you'], 400);
        }
        return response()->json([
            'success' => true,
            'message' => 'Customer fetched',
            'customer' => $customer
        ], 200);
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['nullable', 'string'],
            'username' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string'],
            'mobile_no' => ['nullable', 'string'],
        ]);
        $user = Auth::user();
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->username = $request->username;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->status = 1;
        $customer->mobile_no = $request->mobile_no;
        $customer->user_id =  $user->id;
        $customer->team_id = $user->current_team_id;
        $customer->updated_by = $user->id;
        if ($customer->save()) {
        } else {
        }
    }



    public function edit(Request $request, Customer $customer)
    {
        $user = Auth::user();
        if ($customer->user_id !=  $user->id || $customer->team_id != $user->current_team_id) {
            dd("throw error");
        }

        return Inertia::render('Customers/Edit', [
            "customer" => $customer
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string'],
            'last_name' => ['nullable', 'string'],
            'username' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string'],
            'mobile_no' => ['nullable', 'string'],
        ]);

        $user = Auth::user();
        if ($customer->user_id !=  $user->id || $customer->team_id != $user->current_team_id) {
            return response()->json(['success' => false, 'message' => 'This resource does not belong to you'], 400);
        }

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->username = $request->username;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->mobile_no = $request->mobile_no;
        $customer->updated_by = Auth::user()->id;
        if ($customer->save()) {
        } else {
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //$customer = Customer::find($id);
        $user = Auth::user();

        if ($customer->user_id !=  $user->id || $customer->team_id != $user->current_team_id) {
            return response()->json(['success' => false, 'message' => 'This resource does not belong to you'], 400);
        }
        if ($customer->delete()) {
            return response()->json([
                'success' => true,
                'message' => "$customer->name has deleted successfully",
                'customer' => $customer
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }
}
