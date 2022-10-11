<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Enums\ProductStatusEnum;
use \Illuminate\Validation\Validator;
use App\Models\User;





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
        $products =  Products::where('status', '=', 1)->get();
        return view('/products', ['assets' => $products]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:20',
            'description' => 'required|min:5|max:300',
            'price' => 'required|numeric',
            'Category' => 'required|in:Jackets,Shoes,Suits,Hats',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $products =  Products::where('status', 'active');

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
    public function search(Request $request)
    {

        if ($request->isMethod('get')) {
            $name = $request->get('name');
            $category = $request->get('Category');
            if ($category != "Category") {
                $data =  Products::select("*")
                ->where([
                    ['name', 'LIKE', '%' . $name . '%'],['status', '=', 1],
                    ['category', '=', $category]
                ])->orWhere([['description', 'LIKE', '%' . $name . '%'],['status', '=', 1],['category', '=', $category]])->paginate(5);
             
            } else {
                $data =  Products::select("*")
                ->where([
                    ['name', 'LIKE', '%' . $name . '%'],['status', '=', 1]
                ])->orWhere([['description', 'LIKE', '%' . $name . '%'],['status', '=', 1]])->paginate(12);
            }

            return view('products', ['assets' => $data]);
        }
    }

    public function details($id)
    {
        $user= DB::table('users')->where('id', Auth::id())->first();
        $details = Products::find($id);
        return view('productdetails', ['details' => $details],['user' => $user]);
    }

    public function edit($id)
    {
        $productfield = Products::find($id);
        if (Auth::user()->id !== $productfield['account_id']) {
            return redirect('/products');
        } else {

            return view('edit', ['data' => $productfield]);
        }
    }
    public function editstore(Request $request)
    {
        $products =  Products::all();

        $validated = $request->validate([
            'name' => 'required|min:5|max:20',
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

    public function admin()
    {
        $products =  Products::all();
        return view('admin/profile', ['assets' => $products]);
    }

    public function changeStatus(Request $request)
    {
        $body = json_decode($request->getContent(), true);
        $product_id = $body["product_id"];
        $status = $body["status"];
        $product = Products::where('id', $product_id)->first();

        $product->status = $status;
        $product->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
    public function deleteItem(Request $request)
    {
        $products =  Products::all();

        $product_id = $request['product_id'];
        $query = DB::delete("delete from products where id = ?", [$product_id]);
        return view("admin/profile", ['assets' => $products]);
    }
}
