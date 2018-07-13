<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Events\NewUser;

class ProductController extends Controller
{
    public function index(){
        return view('products.index');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price'=>'required'
        ]);

        $product = Product::create(['name'=>$request->name, 'price'=>$request->price]);

        if($product){
            flash('Operation successful')->success();
            return redirect()->route('products.index');
        }else{
            flash('Operation failed')->error()->important();
            return redirect()->route('products.index');
        }
    }

    public function show(Product $product){
        return response()->json($product);
    }

    public function update(Request $request, Product $product){
        $this->validate($request, [
            'name' => 'required',
            'price'=>'required'
        ]);

        $update = Product::where('id', $product->id)->update([
            'name'=> $request->name,
            'price'=> $request->price
        ]);

        if($update){
            flash('Operation successful')->success();
            return redirect()->route('products.index');

        }
        else{
            flash('Operation failed')->error();
            return redirect()->route('products.index');
        }
    }

    public function destroy(Product $product){
        $product->delete();
        flash('Operation successful')->success();
        return response ()->json ();
    }

    public function allProducts(){
        $products = Product::all();

        return Datatables::of($products)
            ->addColumn('action', function ($user) {
                if (Auth::user()->hasAnyPermission('Edit Product') && !Auth::user()->hasAnyPermission('Delete Product')){
                    return '<a data-edit-product="'.$user->id.'" class="btn btn-xs btn-primary edit_product"><i 
                    class="glyphicon glyphicon-edit"></i> Edit</a>';
                }
                if (Auth::user()->hasAnyPermission('Delete Product') && !Auth::user()->hasAnyPermission('Edit Product')){
                    return '<a  data-delete-product="'.$user->id.'"  class="btn btn-xs btn-danger del_product"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
                }
                if (Auth::user()->hasAnyPermission('Delete Product') && Auth::user()->hasAnyPermission('Edit Product')){
                    return '<a data-edit-product="'.$user->id.'" class="btn btn-xs btn-primary edit_product"><i class="glyphicon glyphicon-edit"></i> Edit</a>'.
                    '<a  data-delete-product="'.$user->id.'"  class="btn btn-xs btn-danger del_product"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
                }
            })
            ->make(true);
    }
}
