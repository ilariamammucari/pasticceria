<?php

namespace App\Http\Controllers;

use App\Models\Dessert;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $desserts = Dessert::all();

        if( $desserts ){
            $data = [
                'desserts' => $desserts
            ];
        }
        return view('guest.welcome')->with($data);
    }
}
