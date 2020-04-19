<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\produit;
use App\categorie;
use App\pannier;
use App\user;
use Auth;
use Session;

class PannierController extends Controller
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
    public function delete($id)
    {
        $delete=Pannier::where('pannier_id',$id)->delete();
    return redirect(route('pannier'));
    }
    public function deleteUser($id)
    {
    $delete=user::where('id',$id)->delete();
    return redirect(route('GestionUsers'));
    }
    public function deleteProduit($id)
    {
        $delete=Produit::where('id',$id)->delete();
    return redirect(route('GestionProducts'));
    }
    public function update(Request $request)
    {
        $edit=Pannier::where('pannier_id',$request->post('id'))->get();
        foreach($edit as $t){
                 $t->quantite=$request->post('quantite');
                 $t->somme=$request->post('quantite') * $request->post('prix');
                 $t->save();
             }
        return redirect(route('pannier'));
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
