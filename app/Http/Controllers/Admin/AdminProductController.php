<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('product')->select('*');
        $product = $product->get();

        $pageName = 'List Product';

        return view('/admin/list_product', compact('product', 'pageName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('uploadimg')) {
            $product = new Product;
            $product->name_product = $request->name_product; 
            $product->trademark = $request->trademark;
            $product->price_product = $request->price_product;
            $product->description = $request->description;

            $file = $request->uploadimg;
            $filename = $file->getClientOriginalName('uploadimg');
            $file->move('img',$filename);

            $product->img=$filename;

            $product->save();
            return redirect()->action('Admin\AdminProductController@create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', '=', $id)->select('*')->first();
        return view('/admin/detail_product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $pageName = 'Update Product';
        return view('/admin/update_product', compact('product', 'pageName'));
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
        $product = Product::find($id);
        $product->name_product = $request->name_product; 
        $product->trademark = $request->trademark;
        $product->price_product = $request->price_product;
        $product->description = $request->description;

        $product->save();
        return redirect()->action('Admin\AdminProductController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect()->action('Admin\AdminProductController@index')->with('success','Dữ liệu xóa thành công.');
    }
}
