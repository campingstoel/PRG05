<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request)
    {
        $products =  Products::all();
        return view('products', ['assets'=> $products]);
   
        $data = DB::table('products');
        if( $request->input('search')){
            $data = $data->where('name', 'LIKE', "%" . $request->search . "%");
        }
        $data = $data->paginate(10);
        return view('products', compact('data'));
    }
   
    public function store()
    {
        $product = new Products();
        
        $product->name = request('name');
        $product->account_id = request('account_id');
        $product->category = request('Category');
        $product->price = request('price');
        $product->image = request()->file('image')->store('public/images');
        $product->save();
        return view('products');
    }
 
}