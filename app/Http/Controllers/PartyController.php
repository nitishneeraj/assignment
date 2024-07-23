<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    //Function to load parties
    public function index()
    {
        // $party = Party::all();
        // dd($party);
        return view('party.index', ['parties' => Party::latest()->paginate(4)]);
    }

    //Function to load add party view
    public function addParty()
    {
        return view('party.add');
    }


    //Function to store/create party
    public function createParty(Request $request)
    {

        //Validation
        $request->validate([
            'party_type' => 'required',
            'address' => 'required|max:255',
            'full_name' => 'required|regex:/^[A-Za-z\s]+$/|min:2|max:20',
            'phone_no' => 'required|digits:10',
            'account_holder_name' => 'required|max:255',
            'account_no' => 'required|regex:/^[0-9]+$/|max:255',
            'bank_name' => 'required|regex:/^[A-Za-z\s]+$/|min:2|max:20',
            'ifsc_code' => 'required|regex:/^[A-Za-z0-9]{11}$/',
            'branch_address' => 'required|max:255',
        ]);


        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        $party = $request->all();

        //Remove token from post data before inserting
        unset($party['_token']);
        // Party::create([
        //     'full_name' => $request->full_name,
        //     'phone_no' => $request->phone_no,
        // ]);
        Party::create($party);

        return redirect()->route('add-party')->with('success', 'Party added successfully');
    }

    //Function to Update parties
    public  function updateParty(Request $request, $party_id)
    {
        //Validation
        $request->validate([
            'party_type' => 'required',
            'address' => 'required|max:255',
            'full_name' => 'required|regex:/^[A-Za-z\s]+$/|min:2|max:20',
            'phone_no' => 'required|digits:10',
            'account_holder_name' => 'required|max:255',
            'account_no' => 'required|regex:/^[0-9]+$/|max:255',
            'bank_name' => 'required|regex:/^[A-Za-z\s]+$/|min:2|max:20',
            'ifsc_code' => 'required|regex:/^[A-Za-z0-9]{11}$/',
            'branch_address' => 'required|max:255',
        ]);
        $party = Party::where('id', $party_id)->first();
        //dd($party);
        $party->party_type = $request->party_type;
        $party->address = $request->address;
        $party->full_name = $request->full_name;
        $party->phone_no = $request->phone_no;
        $party->account_holder_name = $request->account_holder_name;
        $party->account_no = $request->account_no;
        $party->bank_name = $request->bank_name;
        $party->ifsc_code = $request->ifsc_code;
        $party->branch_address = $request->branch_address;
        $party->save();
        return redirect()->route('manage-parties')->with('success', 'Party Updated successfully !!!!');
    }
    public function editParty($party_id)
    {
        //$party = Party::where('id', $party_id)->get();
        $party = Party::find($party_id);
        // dd($party);
        return view('party.edit', compact('party'));
    }
    public function destroyParty($party_id)
    {

        //dd($party_id);
        $party = Party::where('id', $party_id)->first();
        if (!$party) {
            return redirect()->route('manage-parties')->with('error', 'Party not  found !!!!');
        }
        $party->delete();
        return redirect()->route('manage-parties')->with('success', 'Party deleted successfully !!!!');
    }
}