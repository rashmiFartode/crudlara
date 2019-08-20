<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class CustomerController extends Controller
{
    //checking user is login or not
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(5);
        return view('customer.index', compact('customers')) ->with('i', (request()->input('page', 1)- 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=> 'required|min:3',
            'email'=> 'required|email',
            'number'=> 'required|min:10|max:10|starts_with:7,8,9',
        ]);

        Customer::create($request->all());
        return redirect()->route('customer.index')->with('success','Inserted successfully');
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        request()->validate([
            'name'=> 'required|min:3',
            'email'=> 'required|email',
            'number'=> 'required|min:10|max:10|starts_with:7,8,9',
        ]);
        //find
        $customer= Customer::find($id);

        //set  data
        if(isset($request['name']))
        {
            $customer->name= $request['name'];
        }
        if(isset($request['email']))
        {
            $customer->email= $request['email'];
        }
        if(isset($request['number']))
        {
            $customer->number= $request['number'];
        }
        
        //update
        $customer->update();
        //redirect
        return redirect()->route('customer.index')
                        ->with('success','record updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        // delete
        // $customer = Customer::find($id);
        $customer->delete();

        // redirect
        return redirect()->route('customer.index')
                        ->with('success','record deleted successfully');
    }
}
