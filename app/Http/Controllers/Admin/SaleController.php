<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Phone;
use App\Models\Sale;
use App\Models\SaleDescription;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('admin.sales.index')->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('admin.sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = Sale::create([
            'seller_id' => 1,
            'amount' => $request->amount,
            'status' => 'APPROVED'
        ]);

        $descriptionArray = [];
        foreach ($request->descriptions as $descriptionRequest) {            
            $descriptionArray[]= [
                'sale_id'   => $sale->id,
                'product_id' => $descriptionRequest['product']['id'],
                'subtotal'  => $descriptionRequest['subtotal'],
                'quantity'  => $descriptionRequest['quantity'],
                'amount'    => $descriptionRequest['amount'],
            ];
        }
        SaleDescription::insert($descriptionArray);
        
        $sale->load('saleDescriptions');
        return response()->json($sale);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::find($id);
        return view('admin.sales.show')->with('sale', $sale);
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
    }

    public function addCustomer ($id)
    {
        $sale = Sale::find($id);
        return view('admin.sales.add-customer')->with('sale', $sale);
    }

    public function linkCustomer(Request $request, $id)
    {
        $sale = Sale::find($id);
        
        if(!$request->customer_id) {
            $requestArray = $request->all();
            $customer = Customer::create($requestArray);

            if($request->add_address) {
                $requestArray['customer_id'] = $customer->id;
                $address = Address::create($requestArray);
                $customer->default_address_id = $address->id;
            }

            if(isset($request->address['number'])) {
                $request->address['customer_id'] = $customer->id;
                $phone = Phone::create($request->address);
                $customer->phone_id = $phone->id;
            }

            $customer->save();
            $sale->customer_id = $customer->id;
            
        } else {
            $sale->customer_id = $request->customer_id;
        }

        $sale->save();
        $sale->load('customer');

        return response()->json($sale);
    }
}
