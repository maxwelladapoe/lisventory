<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

        //     if ($this->userTeamId) {
        //         $customers = Customer::search($request->query('search'))->where('team_id', $this->userTeamId)->get();
        //     } else {
        //         $customers = Customer::search($request->query('search'))->where('user_id', $this->userId)->get();
        //     }

        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Customers items fetched',
        //         'customers' => $customers
        //     ]);
        // }
        $user = Auth::user();
        $customers = Customer::where('team_id', $this->userTeamId)->latest()->paginate(25);
        return response()->json([
            'success' => true,
            'message' => 'Customers items fetched',
            'customers' => $customers
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        if ($customer) {

            if ($customer->user_id != $this->userId || $customer->team_id != $this->userTeamId) {
                return response()->json(['success' => false, 'message' => 'This resource does not belong to you'], 400);
            }
            return response()->json([
                'success' => true,
                'message' => 'Customer fetched',
                'customer' => $customer
            ], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
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
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->username = $request->username;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->status = 1;
        $customer->mobile_no = $request->mobile_no;
        $customer->user_id = $this->userId;
        $customer->team_id = $this->userTeamId;
        $customer->updated_by = Auth::user()->id;
        if ($customer->save()) {
            return response()->json([
                'success' => true,
                'message' => 'The customer has been added successfully',
                'customer' => $customer
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
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

        if ($customer->user_id != $this->userId || $customer->team_id != $this->userTeamId) {
            return response()->json(['success' => false, 'message' => 'This resource does not belong to you'], 400);
        }

        //$customer = Customer::find($id);
        $itemName = $customer->getOriginal("first_name")." ". $customer->getOriginal("last_name");
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->username = $request->username;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->mobile_no = $request->mobile_no;
        $customer->updated_by = Auth::user()->id;
        if ($customer->save()) {
            return response()->json([
                'success' => true,
                'message' => "$itemName been updated successfully",
                'customer' => $customer
            ], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'oops something went wrong'], 500);
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

        if ($customer->user_id != $this->userId || $customer->team_id != $this->userTeamId) {
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
