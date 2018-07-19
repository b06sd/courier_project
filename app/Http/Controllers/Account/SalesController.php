<?php

namespace App\Http\Controllers\Account;
use App\Sale;
use App\Courier;
use App\Consignee;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
  public function index()
  {
    $couriers = Courier::all(['id', 'name']);
    $consignees = Consignee::all(['id', 'name']);
    $products = Product::all(['id', 'name', 'price']);
    $sales = Sale::all(['id', 'quantity']);

    return view('sales.index', compact('couriers', 'consignees', 'products', 'sales'));
  }

  public function store(Request $request)
  {
    $this->validate(request(), [
      'consignee_id' => 'required',
      'courier_id' => 'required',
      'product_id' => 'required',
      'quantity' => 'required'
    ]);

    $sale = new Sale;

    $sale->consignee_id = request('consignee_id');
    $sale->courier_id = request('courier_id');
    $sale->product_id = request('product_id');
    $sale->quantity = request('quantity');

  }

  public function show(Sale $sale)
  {
    return response()->json($sale);
  }


  public function update(Request $request, Sale $sale)
  {
    $this->validate($request, [
      'consignee_id' => 'required',
      'courier_id'=>'required',
      'product_id' => 'required',
      'quantity' => 'required'
    ]);

    $update = Sale::where('id', $sale->id)->update([
      'consignee_id'=> $request->consignee_id,
      'courier_id'=> $request->courier_id,
      'product_id'=> $request->product_id,
      'quantity'=> $request->quantity
    ]);

    if($update){
      flash('Operation successful')->success();
      return redirect()->route('sales.index');

    }
    else{
      flash('Operation failed')->error();
      return redirect()->route('sales.index');
    }
  }


public function destroy(Sale $sale)
{
  $sale->delete();
  flash('Operation successful')->success();
  return response ()->json ();
}

public function allSales(){

  // Will look at you later
  // $sales = Sale::with('products')
  //         ->select(DB::raw('sales.*, products.name as product_name'))
  //         ->get();

  $sales = Sale::join('consignees', 'consignee_id', '=', 'consignees.id')
  ->join('products', 'product_id', '=', 'products.id')
  ->join('couriers', 'courier_id', '=', 'couriers.id')
  ->select(DB::raw(
    'consignees.name as consignee_name,
  products.name as product_name, products.price as product_price,
  couriers.name as courier_name, products.price * quantity as total, quantity'
  ))->get();

  return Datatables::of($sales)
  ->addColumn('action', function ($user) {
    if (Auth::user()->hasAnyPermission('Edit Sale') && !Auth::user()->hasAnyPermission('Delete Sale')){
      return '<a data-edit-sale="'.$user->id.'" class="btn btn-xs btn-primary edit_sale"><i
      class="glyphicon glyphicon-edit"></i> Edit</a>';
    }
    if (Auth::user()->hasAnyPermission('Delete Sale') && !Auth::user()->hasAnyPermission('Edit Sale')){
      return '<a  data-delete-sale="'.$user->id.'"  class="btn btn-xs btn-danger del_sale"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
    }
    if (Auth::user()->hasAnyPermission('Delete Sale') && Auth::user()->hasAnyPermission('Edit Sale')){
      return '<a data-edit-sale="'.$user->id.'" class="btn btn-xs btn-primary edit_sale"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
      '<a  data-delete-sale="'.$user->id.'"  class="btn btn-xs btn-danger del_sale"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
    }
  })
  ->make(true);
}
}
