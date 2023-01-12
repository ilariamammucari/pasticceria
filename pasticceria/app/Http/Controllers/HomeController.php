<?php

namespace App\Http\Controllers;

use App\Models\Dessert;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $sconto = [];
        
        foreach ($desserts as $dessert) {
            $diff = abs(Carbon::now()->timestamp - strtotime($dessert->created_at));
            $anni = floor($diff / (365*60*60*24));
            $mesi = floor(($diff - $anni * 365*60*60*24) / (30*60*60*24));
            $giorni = floor(($diff - $anni * 365*60*60*24 - $mesi*30*60*60*24)/ (60*60*24));

            if ( $giorni != 0 && $giorni >= 2 && $giorni <= 2.9 ) {
                $sconto[$dessert->id] = 80;
            }elseif ( $giorni != 0 && $giorni == 3 ) {
                $sconto[$dessert->id] = 20;
            }elseif( $giorni != 0 && $giorni > 3 ){
                $sconto[$dessert->id]= 100;
            }
        }

        if( $desserts ){
            $data = [
                'desserts' => $desserts,
                'sconto'   => $sconto
            ];
        }
        return view('guest.welcome')->with($data);
    }
}
