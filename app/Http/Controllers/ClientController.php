<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $customer = new Customer([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'role'=> 0,
            'phonenumber'=>$request->get('phonenumber'),
            'address'=>$request->get('address'),
            'nationalid'=>$request->get('nationalid')
        ]);
        $customer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $customer = Customer::find($id);
        return $customer;
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
    public function update(Request $request, $id)
    {
        //
        $customer = Customer::find($id);
        $customer->name = $request->get('name');
        $customer->email = $request->get('email');
        $customer->phonenumber = $request->get('phonenumber');
        $customer->address = $request->get('address');
        $customer->nationalid = $request->get('nationalid');
        $customer->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer= Customer::find($id);
        $customer->delete();
    }
}
