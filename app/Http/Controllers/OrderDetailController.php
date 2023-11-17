<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
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
        $orderDetail= new OrderDetail([
            'orderid'=>$request->get('orderid'),
            'productid'=>$request->get('productid'),
            'quantity'=>$request->get('quantity'),
            'price'=>$request->get('price')
        ]);
        $orderDetail->save();
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
        $orderDetail= OrderDetail::find($id);
        return $orderDetail;
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
        $orderDetail= OrderDetail::find($id);
        $orderDetail->orderid=$request->get('orderid');
        $orderDetail->productid=$request->get('productid');
        $orderDetail->quantity=$request->get('quantity');
        $orderDetail->price=$request->get('price');
        $orderDetail->save();
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
        $orderDetail= OrderDetail::find($id);
        $orderDetail->delete();
    }

    public function getOrderDetail($orderid)
    {
        $Details= OrderDetail::where('orderid',$orderid)->get();
        return $Details;
    }

    public function MakeOrder(Request $request, $clientid)
    {
        $data = $request->all();
        $OrderPrice=0;
        foreach ($data as $key => $value) {
            $OrderPrice += $value['price'];
        }
        if($OrderPrice >= 500)
        {
            foreach ($data as $key => $value) {
                $this->store($value);
            }
            $neworderRequest = new Request();
            $neworderRequest->merge(['clientid' => $clientid, 'totalprice' => $OrderPrice, 'status'=>False]);
            $OrderController = new OrderController();
            $OrderController->store($neworderRequest);
        }
    }
}
