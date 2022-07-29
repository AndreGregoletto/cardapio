<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\RequestCreate;
use App\Http\Requests\Product\RequestUpdate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 'active')->get();

        return view('admin.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RequestCreate  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreate $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $filename = str::slug($data['name'],'_').'.'.$data['photo']->extension();
            
            $data['photo'] = $request->photo->storeAS('products',$filename,'public');
        }
        
        Product::create($data);

        return back();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::where('status', 'active')->get();

        return view('admin.product.edit', ['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RequestUpdate  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUpdate $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($product->photo);
            
            $filename = str::slug($data['name'],'_').'.'.$data['photo']->extension();
            $data['photo'] = $request->photo->storeAS('products',$filename,'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back();
    }
}
