<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\produit;
use App\categorie;
use App\pannier;
use Auth;
use Session;

class redirectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function CheckProducts()
    {
        return view('GestionProducts');
    }
    public function AddProducts(Request $request)
    {
        $categorie=categorie::all();
        return view('AddProducts',[
            "categories"=>$categorie
            ]);
    }
    public function CheckUsers()
    {

        return view('users');
    }
    
}
