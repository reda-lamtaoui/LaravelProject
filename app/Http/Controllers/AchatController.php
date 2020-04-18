<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\produit;
use App\categorie;
use App\pannier;
use Auth;
use Session;

class AchatController extends Controller
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
    public function produit($id)
    {
        $categorie=categorie::all();
        $title=categorie::where('id',$id)->get();
        $produit=produit::where('categorie_id',$id)->get();
        return view('produit',[
            "categories"=>$categorie,
            "produits"=>$produit,
            "title"=>$title
            ]);
    }
    public function Achat(Request $request)
    {
        $pannier=new pannier();
        $pannier->produit_id=$request->post('produit');
        $pannier->quantite=$request->post('quantite');
        $pannier->somme=$request->post('prix') * $request->post('quantite');
        $pannier->user_id=Auth::id();
        $pannier->save();
        $categorie=categorie::all();
        $produit=produit::paginate(6);
        return view('index',[
            "categories"=>$categorie,
            "produits"=>$produit
            ]);
    }
    public function pannier(){
        $pan=\DB::table('panniers')->join('produits', 'produits.id', '=', 'panniers.produit_id')->where('panniers.user_id', '=', Auth::id())->get();
        $categorie=categorie::all();
        return view('pannier',[
            "panniers"=>$pan,
            "categories"=>$categorie
            ]);
    }
}
