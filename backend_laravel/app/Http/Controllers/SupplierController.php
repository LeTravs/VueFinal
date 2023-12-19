<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Purchase;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function index()
    {
        return Supplier::all();
    }
    public function show(Supplier $supplier) {
        return response()->json([
            'status' => 'OK',
            'data' => $supplier->load('purchases'),
        ]);
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->sales()->delete();
            
            $supplier->delete();

            return response()->json([
                'status' => 'OK',
                'message' => 'Supplier deleted successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error deleting supplier.',
            ], 500);
        }
    }
}
