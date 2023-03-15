<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RedeemRecord;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RedeemRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $record = RedeemRecord::paginate(10);
        return view('recrods',compact('record'));
    }

    public function getSpecificRecord($columnName,$key){
        return RedeemRecord::where($columnName, $key)->first();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
           'name' => ['required', 'string'],
           'code' => ['required', 'string'],
           'phone' => ['required', 'numeric'],
           'username' => ['required', 'string']
        ]);
       
        $customer = Customer::where('Referral_code', $request['code'])->first();
        $record = $this->getSpecificRecord('username',$request['username']);
            if($customer && !$record){
                RedeemRecord::create([
                    'name' => $request['name'],
                    'username' => $request['username'],
                    'phone' => $request['phone'],
                    'referral_id' => $customer->id
                ]); 
                
                 $customer->Referral_times += 1;
                 
                 if($customer->Referral_times >= 2){
                    $customer->status = 1;
                    $customer->discount_remaining += 1;
                 }

                 $customer->save();

                 return back();
            }
            return redirect()->back()->withErrors('error');
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RedeemRecord $redeemRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RedeemRecord $redeemRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RedeemRecord $redeemRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RedeemRecord $redeemRecord)
    {
        //
    }
}
