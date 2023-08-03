<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function store(Request $request)
    {
        $customer = new Customer;

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->contact_number = $request->contact_number;
        // add other fields here

        $customer->save();

        return response()->json([
            'message' => 'Customer created successfully',
            'data' => $customer
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->contact_number = $request->input('contact_number');
        // update other fields here

        $customer->save();

        return response()->json([
            'message' => 'Customer updated successfully',
            'data' => $customer
        ], 200);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return response()->json([
            'message' => 'Customer deleted successfully'
        ], 200);
    }
}
