<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = User::get();

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($user){

                        return '<a href="'. route('user.edit',  ['id' => $user->id]).'"
                         class="edit btn btn-primary btn-sm">Edytuj </a>';

                    })

                    ->editColumn('address_id', function($user){

                        return '<a href="'. route('address.show',  ['id' =>$user->address_id]).'"
                        style="text-decoration:none;">'. $user->address_id .'</a>';

                    })

                    ->addColumn('delete', function($user){
                        $c = csrf_field();
                        $m = method_field('DELETE');

                        return '<form action="'. route('user.destroy',  ['id' => $user->id]).'" method="POST">
                        '.$c.'
                        '.$m.'
                        <button class="btn btn-danger destroy-button btn-sm">Usuń</button>';
                        

                    })

                    ->rawColumns(['delete' => 'delete', 'action' => 'action', 'address_id' => 'address_id'])

                    ->make(true);

        }
       
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addressess = Address::get()->sortBy('country');
        $user = User::get();
        return view('user.form', compact('user', 'addressess'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User(
            [
            'name' => $request->input('name'),
            'second_name' => $request->input('second_name'),
            'surname' => $request->input('surname'),
            'address_id' => $request->input('address_id'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'PESEL' => $request->input('PESEL'),
            'NIP' => $request->input('NIP')
            ]
            );

        $user->save();

        return redirect('/user');
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $addressess = Address::get();
        $edit = true;


        return view('user.form', compact('user', 'addressess', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, $id)
    {
        $user = user::findOrFail($id);

        $user->name = $request->input('name');
        $user->second_name = $request->input('second_name');
        $user->surname = $request->input('surname');
        $user->address_id = $request->input('address_id');
        $user->phone_number = $request->input('phone_number');
        $user->email = $request->input('email');
        $user->PESEL = $request->input('PESEL');
        $user->NIP = $request->input('NIP');

        $user->save();

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('/user');
    }
}
