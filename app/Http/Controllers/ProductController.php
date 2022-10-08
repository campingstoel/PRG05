<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use Illuminate\Support\Facades\Auth; 


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $products =  Products::all();
        return view('/products', ['assets' => $products]);

    }
   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:30',
            'description' => 'required|min:5|max:300',
            'price' => 'required|numeric',
            'Category' => 'required|in:Jackets,Shoes,Suits,Hats',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $products =  Products::all();

        $product = new Products();
        
        $product->name = $validated['name'];
        $product->account_id = request('account_id');
        $product->description = $validated['description'];
        $product->category = $validated['Category'];
        $product->price = $validated['price'];
        $product->image = $validated['image']->store('public/images');
        $product->save();
        return redirect()->route('products', ['assets' => $products]);
    }

    public function details($id){
        $details= Products::find($id);
        return view ('productdetails', ['details'=> $details]);

    }

    public function edit($id){
        $productfield= Products::find($id);
        if (Auth::user()->id !== $productfield['account_id']){
            return redirect('/products');
          } else {
          
        return view ('edit', ['data'=> $productfield]);
          }
    }
    public function editstore(Request $request){
        $products =  Products::all();

        $validated = $request->validate([
            'name' => 'required|min:5|max:30',
            'description' => 'required|min:5|max:300',
            'price' => 'required|numeric',
            'Category' => 'required|in:Jackets,Shoes,Suits,Hats',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        Products::where('id', request('id'))
       ->update([
           'name' => $validated['name'],
           'description' => $validated['description'],
           'price' => $validated['price'],
           'category' => $validated['Category'],
           'image' => $validated['image']->store('public/images'),
        ]);
        
        return redirect()->route('products', ['assets' => $products]);

    }
 
}