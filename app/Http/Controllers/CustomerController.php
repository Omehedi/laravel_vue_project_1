<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->only(['name', 'email']));
        return response()->json($customer, 201);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->only(['name', 'email']));
        return response()->json($customer);
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return response()->json(null, 204);
    }
}
