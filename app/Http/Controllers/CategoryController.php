<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        /*return view('category.index', compact('categories'));
        */
        if ($request->ajax()) {

            $data = Category::get();

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($category){

                        return '<a href="'. route('category.edit',  ['id' => $category->id]).'"
                         class="edit btn btn-primary btn-sm">Edytuj </a>';

                    })

                    ->addColumn('delete', function($category){
                        $c = csrf_field();
                        $m = method_field('DELETE');

                        return '<form action="'. route('category.destroy',  ['id' => $category->id]).'" method="POST">
                        '.$c.'
                        '.$m.'
                        <button class="btn btn-danger destroy-button btn-sm">Usuń</button>';
                        

                    })

                    ->rawColumns(['delete' => 'delete', 'action' => 'action'])

                    ->make(true);

        }
       
        return view('category.index');

    }

      /**
     * Redirect to view
     *
     */
    public function create()
    {
        return view('category.form');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category(
            [
            'name' => $request->input('name')
            ]
            );

        $category->save();

        return redirect('/category');
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
        $category = Category::findOrFail($id);
        $edit = true;


        return view('category.form', compact('category', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->input('name');

        $category->save();

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect('/category');
    }
}