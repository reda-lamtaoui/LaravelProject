<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\produit;
use App\categorie;
use Auth;
use Session;

class HomeController extends Controller
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
    public function index()
    {
        $categorie=categorie::all();
        $produit=produit::paginate(6);
        return view('index',[
            "categories"=>$categorie,
            "produits"=>$produit
            ]);
    }
}