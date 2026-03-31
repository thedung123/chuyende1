<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->search;

        $products = Product::when($search,function($query) use ($search){

            return $query->where('name','like',"%$search%");

        })->paginate(5);

        return view('products.index',compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {

        $request->validate([

            'name'=>'required',

            'price'=>'required|numeric',

            'quantity'=>'required|integer',

            'category'=>'required'

        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
        ->with('success','Thêm sản phẩm thành công');

    }


    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }


    public function update(Request $request, Product $product)
    {

        $request->validate([

            'name'=>'required',

            'price'=>'required|numeric',

            'quantity'=>'required|integer',

            'category'=>'required'

        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
        ->with('success','Cập nhật thành công');

    }


    public function destroy(Product $product)
    {

        $product->delete();

        return redirect()->route('products.index')
        ->with('success','Xóa thành công');

    }

}