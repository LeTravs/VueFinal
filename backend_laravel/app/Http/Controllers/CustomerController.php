<?php
namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }


    public function show(Customer $customer) {
        return response()->json([
            'status' => 'OK',
            'data' => $customer->load('sales'),
        ]);
    }

    public function destroy(Customer $customer)
    {
        try {
            $customer->sales()->delete();
            
            $customer->delete();

            return response()->json([
                'status' => 'OK',
                'message' => 'Customer deleted successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error deleting customer.',
            ], 500);
        }
    }
}
