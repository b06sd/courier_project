<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courier;
use App\Consignee;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courier = Courier::all();
        $consignees = Consignee::all(['id', 'name']);
        $products = Product::all(['id', 'name', 'price']);
        return view('courier.index', compact('courier', 'consignees', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $couriers = Courier::all();
        $consignees = Consignee::all(['id', 'name']);
        $products = Product::all(['id', 'name', 'price']);
        return view('courier.create', compact('couriers', 'consignees', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|max:100',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'product_id.*' => 'required',
            'quantity.*' => 'required',
            'description' => 'required',
            'received_by' => 'required',
            'consignee_id' => 'required',
            'pickup_date' => 'required',
            'dispatch_date' => 'required',
            'delivery_date' => 'required',
            'payment_mode' => 'required',
            'amount' => 'required'
        ]);



        $total_amount = 0;
        foreach (array_unique($request->product_id) as $key => $product) {
            //Fetch the price of each product from the products table
            $getProductPrice = Product::select('price')->where('id', '=', $product)->first();
            //Multiply the price of the product from the quantity entered by the user
            $total_amount += $getProductPrice->price * $request->quantity[$key];
        }

        $request->amount = $total_amount;

        $courier = Courier::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'description' => $request->description,
            'received_by' => $request->received_by,
            'consignee_id' => $request->consignee_id,
            'pickup_date' => $request->pickup_date,
            'dispatch_date' => $request->dispatch_date,
            'delivery_date' => $request->delivery_date,
            'payment_mode' => $request->payment_mode,
            'amount' => $request->amount
        ]);


        if($request->product_id <> ''){
            foreach (array_unique($request->product_id) as $key => $product) {
                $courier->product()->attach($product, ['quantity' => $request->quantity[$key]]);
            }
        }
        flash('Operation successful')->success();
        return redirect()->route('courier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        return response()->json($courier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        $consignees = Consignee::pluck('name', 'id')->all();
        $prod = $courier->product()->get();
        return view('courier.edit', compact('courier', 'consignees', 'prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courier $courier)
    {
        $this->validate($request, [
            'name' => 'bail|required|max:50',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'product_id.*' => 'required',
            'quantity.*' => 'required',
            'description' => 'required',
            'received_by' => 'required',
            'consignee_id' => 'required',
            'pickup_date' => 'required',
            'dispatch_date' => 'required',
            'delivery_date' => 'required',
            'payment_mode' => 'required',
            'amount' => 'required'
        ]);

        $input = $request->except(['product_id','quantity', 'amount']);

        $courier->fill($input)->save();
        if($request->product_id <> ''){
            $total_amount = 0;
            //Loop through the product and update and insert into courier table
            foreach (array_unique($request->product_id) as $key => $userRole) {
                $getAllPivot = DB::table('courier_product')->select('courier_id', 'product_id')->where([['courier_id', '=', $courier->id],['product_id', '=', $userRole]])->first();
                if($getAllPivot){
                    $courier->product()->updateExistingPivot($userRole, ['quantity' => $request->quantity[$key]]);
                }
                else{
                    $courier->product()->attach($userRole, ['quantity' => $request->quantity[$key]]);
                }
                //Fetch the price of each product from the products table
                $getProductPrice = Product::select('price')->where('id', '=', $userRole)->first();
                //Multiply the price of the product from the quantity entered by the user
                $total_amount += $getProductPrice->price * $request->quantity[$key];
            }

            //Update the total courier price here
            $update = Courier::where('id', $courier->id)->update([
                'amount'=> $total_amount
            ]);

            flash('Operation successful')->success();
            return redirect()->route('courier.index');

        }
        else{
            flash('Operation failed')->danger();
            return redirect()->route('courier.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        $courier->delete();
        flash('Courier Deleted')->success();
        return response ()->json ();
    }

    public function allCouriers()
    {
        $couriers =  Courier::with('consignee:id,name')->orderByRaw('couriers.id DESC')->get();

        return Datatables::of($couriers)
        ->addColumn('action', function ($courier) {
            if (Auth::user()->hasAnyPermission('Edit Courier') && !Auth::user()->hasAnyPermission('Delete Courier')){
                return '<a href="courier/'.$courier->id.'/edit" class="btn btn-flat btn-info edit_courier1"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            }
            if (Auth::user()->hasAnyPermission('Delete Courier') && !Auth::user()->hasAnyPermission('Edit Courier')){
                return '<a href="'.$courier->id.'"  class="btn btn-flat btn-danger  del_courier1"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            }
            if (Auth::user()->hasAnyPermission('Delete Courier') && Auth::user()->hasAnyPermission('Edit Courier')){
                return '<a href="courier/'.$courier->id.'/edit" class="btn btn-flat btn-info edit_courier1"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                '<a href="'.$courier->id.'"  class="btn btn-flat btn-danger  del_courier1"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            }
        })
        ->make(true);
    }

    public function sales(){
        return view('courier.sales');
    }

    public function allSales(){

        $sales = Courier::join('consignees', 'consignee_id', '=', 'consignees.id')
                ->join('courier_product', 'couriers.id', '=', 'courier_product.courier_id')
                ->select(DB::raw('consignees.name as consignee_name, couriers.amount as total_amount,
                        couriers.name as courier_name, COUNT(courier_product.quantity) as qty'))
                ->groupBy('couriers.id')
                ->get();

        return Datatables::of($sales)
            ->make(true);
    }

}
