<?php

namespace App\Http\Controllers;

use App\Imports\ImportService;
use App\Models\Service;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::all();
        return view('order',compact('service'));
    }

    public function searchRecord($column, $key){
        return Service::where($column, $key)->first();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        try{
            Excel::import(new ImportService, request()->file('file'));
            return back();
        }catch(QueryException $e){
            return redirect()->back()->withException($e);
        }
            
    
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
    public function show(Request $request)
    {   
        $id = $request['customer_id'];

        return response([
            'customer' => $request['customer_id']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if($request->input('delete')){
            return $this->destroy($request,$request['id']);
        }
        if(!$request->input('discount')){
            return back()->with('success', 'Order done');
        }
        
        $service = $this->searchRecord('customer_id',$request['id']);

        if(!$service){
            return back()->with('error','Not found');
        }
        if($service->customer->discount_remaining == 0){
            return back();
        }
        $service->customer->discount_remaining -= 1;
        $service->customer->save();
        return back()->with('success','Order success');
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {   
        //get user id from $request, and delete the records
        $service = Service::where('date', $request['date'])->first();
        if(!$service){
            return back()->with('error','Not found');
        }
        $service->customer->services -= 1;
        $service->customer->save();
        $service->delete();
        return back()->with('success', 'Record deleted');
    }
    
}
