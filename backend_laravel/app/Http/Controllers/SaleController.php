<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        return Sale::all();
    }

    public function show(Sale $sale)
    {
        return response()->json([
            'status' => 'OK',
            'data' => $sale,
        ]);
    }

    public function destroy(Sale $sale)
    {
        try {
            $sale->delete();

            return response()->json([
                'status' => 'OK',
                'message' => 'Sale deleted successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error deleting sale.',
            ], 500);
        }
    }
}
