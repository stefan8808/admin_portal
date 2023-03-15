<?php

namespace App\Http\Controllers;

use App\Imports\ImportCustomer;
use App\Models\Customer;
use Maatwebsite\Excel\Facades\Excel;
use SebastianBergmann\Type\FalseType;
use Illuminate\Support\Str;
class CustomerController extends Controller
{
    public function getCustomerByColumnName($columnName, $key){
        return Customer::where($columnName, $key)->first();
    }   

    public function import(){
        try{
            Excel::import(new ImportCustomer(),request()->file('file'));
            return back();
        }catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['e'=>'Errors']);
        }
    }

    public function index(){
        $customer = Customer::paginate(10);
        return view('Home',compact('customer'));
    }

    public function update(){
        
    }

}
