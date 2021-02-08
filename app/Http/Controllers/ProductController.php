<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

            $data = Product::get();

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){

                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edytuj </a>';
                        return $btn;

                    })

                    ->editColumn('delete', function($row){

                        $btn2 = '<a href="javascript:void(0)" class="edit btn btn-danger btn-sm ">Usuń</a>';
                        return $btn2;

                    })

                    ->rawColumns(['delete' => 'delete', 'action' => 'action'])

                    ->make(true);

        }
       
        return view('product.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
