<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return response()->json(Customer::all());
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required', 'email' => 'required|email']);
        $customer = Customer::create($validated);
        return response()->json($customer, 201);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $validated = $request->validate(['name' => 'required', 'email' => 'required|email']);
        $customer->update($validated);
        return response()->json($customer);
    }

    public function destroy($id)
    {
        Customer::destroy($id);
        return response()->json(null, 204);
    }
}

