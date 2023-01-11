<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dessert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DessertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desserts = Dessert::all();
        $data = [
            'desserts' => $desserts
        ];
        return view('admin.home')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Dessert $dessert)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|digits_between:1,99999999999999'
            ]);
            $dessert->user_id = Auth::id();
            $dessert->name = $data['name'];
            $dessert->price = $data['price'];
            $dessert->fill($data);
            $dessert->save();

            return redirect()->route('admin.home');
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
    public function edit(Dessert $dessert)
    {
        if($dessert){
            $data = [
                'dessert' => $dessert,
            ];
            return view('admin.edit', $data);
        }
        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dessert $dessert)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|digits_between:1,99999999999999'
            ]);

        if( $data['name'] != $dessert->name ){
            $data['name'] = $data['name'];
        }

        if( $request->has('price') ) {
            $data['price'] = $data['price'];
        }

        $dessert->update($data);
        return redirect()->route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dessert $dessert)
    {
        // $dessert->ingredients()->sync([]);
        $dessert->delete();
        return redirect()->route('admin.home');
    }
}
