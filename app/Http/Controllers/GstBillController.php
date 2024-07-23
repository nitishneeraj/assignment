<?php

namespace App\Http\Controllers;

use App\Models\GstBill;
use App\Models\Party;
use Illuminate\Http\Request;

class GstBillController extends Controller
{
    //Function to load gst bills
    public function index()
    {
        $bills = GstBill::where('is_deleted', 0)->with('party')->orderBy('created_at', 'desc')->paginate(3);
        // dd($bills);
        return view('gst-bill.index', compact('bills'));
    }
    //Function to load add gst bill view
    public function addGstBill()
    {
        $data['parties'] = Party::where('party_type', 'client')->orderBy('full_name')->get();
        // dd($data);
        return view('gst-bill.add', $data);
    }

    //Function to load print gst bill view
    public function print($id)
    {
        $data['bill'] = GstBill::where('id', $id)->with('party')->first();
        return view('gst-bill.print', $data);
    }

    public function creategstBill(Request $request)
    {
        //Validation
        $request->validate([
            'party_id' => 'required|integer|exists:parties,id',
            'invoice_date' => 'required|date',
            'item_description' => 'required|string|max:120',
            'invoice_no' => 'required|string|max:120',
            'total_amount' => 'required|numeric|min:0',
            'cgst_rate' => 'nullable|numeric|min:0',
            'cgst_amount' => 'numeric|min:0',
            'sgst_rate' => 'nullable|numeric|min:0',
            'sgst_amount' => 'numeric|min:0',
            'igst_rate' => 'nullable|numeric|min:0',
            'igst_amount' => 'numeric|min:0',
            'tax_amount' => 'numeric|min:0',
            'net_amount' => 'numeric|min:0',
            'declaration' => 'required|max:255',
        ]);
        $gst_Bill = $request->all();
        //Remove token from post data before inserting
        unset($gst_Bill['_token']);
        // Party::create([
        //     'full_name' => $request->full_name,
        //     'phone_no' => $request->phone_no,
        // ]);
        GstBill::create($gst_Bill);

        return redirect()->route('manage-gst-bills')->with('success', 'Bill Created successfully');
    }
}