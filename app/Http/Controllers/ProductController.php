<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Product::with('category')->get();

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($product){

                        return '<a href="'. route('product.edit',  ['id' => $product->id]).'"
                         class="edit btn btn-primary btn-sm">Edytuj </a>';

                    })

                    ->addColumn('delete', function($product){
                        $c = csrf_field();
                        $m = method_field('DELETE');

                        return '<form action="'. route('product.destroy',  ['id' => $product->id]).'" method="POST">
                        '.$c.'
                        '.$m.'
                        <button class="btn btn-danger destroy-button btn-sm">Usuń</button>';

                    })

                    ->rawColumns(['delete' => 'delete', 'action' => 'action'])

                    ->make(true);

        }
       
        return view('product.index');
    }

       /**
     * Redirect to view
     *
     */
    public function create()
    {
        $categories = Category::get();

        return view('product.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product(
            [
            'name' => $request->input('name'),
            'count' => $request->input('count'),
            'unit_price' => $request->input('unit_price'),
            'category_id' => $request->input('category_id')
            ]
            );

        $product->save();

        return redirect('/product');
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
     * Edit the specified resource in storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::get();
        $edit = true;


        return view('product.form', compact('product', 'categories', 'edit'));
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
        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->count = $request->input('count');
        $product->unit_price = $request->input('unit_price');

        $product->save();

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/product');
    }
}
