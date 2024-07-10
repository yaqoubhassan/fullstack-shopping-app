<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('items.product')->get();
        return response()->json($invoices);
    }

    public function show($id)
    {
        $invoice = Invoice::with('items.product')->find($id);
        return response()->json($invoice);
    }
}
