<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Address::get();

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($address){

                        return '<a href="'. route('address.edit',  ['id' => $address->id]).'"
                         class="edit btn btn-primary btn-sm">Edytuj </a>';

                    })

                    ->addColumn('delete', function($address){
                        $c = csrf_field();
                        $m = method_field('DELETE');

                        return '<form action="'. route('address.destroy',  ['id' => $address->id]).'" method="POST">
                        '.$c.'
                        '.$m.'
                        <button class="btn btn-danger destroy-button btn-sm">Usuń</button>';
                        

                    })

                    ->rawColumns(['delete' => 'delete', 'action' => 'action'])

                    ->make(true);

        }
       
        return view('address.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addressess = Address::get()->unique('country');
        return view('address.form', compact('addressess'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddressRequest $request)
    {

        $address = new Address(
            [
            'country' => $request->input('country'),
            'voivodeship' => $request->input('voivodeship'),
            'county' => $request->input('county'),
            'community' => $request->input('community'),
            'street' => $request->input('street'),
            'house_number' => $request->input('house_number'),
            'apartment_number' => $request->input('apartment_number'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code')
            ]
            );

        $address->save();

        return redirect('/address');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::findOrFail($id);

        return view('address.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::findOrFail($id);
        $addressess = Address::get()->unique('country');
        $edit = true;


        return view('address.form', compact('address', 'addressess', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAddressRequest $request, $id)
    {
        $address = Address::findOrFail($id);

        $address->country = $request->input('country');
        $address->voivodeship = $request->input('voivodeship');
        $address->county = $request->input('county');
        $address->community = $request->input('community');
        $address->street = $request->input('street');
        $address->house_number = $request->input('house_number');
        $address->apartment_number = $request->input('apartment_number');
        $address->city = $request->input('city');
        $address->postal_code = $request->input('postal_code');

        $address->save();

        return redirect('/address');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);

        $address->delete();

        return redirect('/address');
    }
}
