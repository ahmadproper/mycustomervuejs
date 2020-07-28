<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;//customer model

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "All Customers";
        $customer = Customer::all();

        return response()->json([
            'message' => "List All Customer",
            'data' => $customer
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'user_id' => 'required',  
           'name' => 'required',  
           'email' => 'required',  
           'telephone' => 'required',  
           'address' => 'required',             

        ]);

        $customer = Customer::create($data);//data dari MOdel Customer

        return response()->json([
            'message' =>  "Customer was Added Successfully",
            'data' => $customer,  // data customer dalam format json 
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return response()->json([
            'message' => "Show Customer",
            'date'=> $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Customer $customer)
    {
        $data = $request->validate([
            'user_id'   => 'required',  
            'name'      => 'required',  
            'email'     => 'required',  
            'telephone' => 'required',  
            'address'   => 'required',             
 
         ]);
 
         $customer->update($data);//data dari MOdel Customer

         return response()->json([
            'message' =>  "Customer was Updated Successfully",
            'data' => $customer,  // data customer dalam format json 
        ],200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            'message' => 'Customer was Deleted Successfully',
        ],200);
    }
}