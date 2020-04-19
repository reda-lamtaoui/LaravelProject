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
    public function addProduct(Request $req){
        try{
            $today=date("Y-m-d");
            $this->validate($req,[
                'fileToUpload' => 'required|image|mimes:jpeg,jpg,png,gif|max:5000'
            ]);
            $image=$req->file('fileToUpload');
            $new_name=$today.''.rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("uploads"),$new_name);
    
            $Prod=new produit;
            $Prod->titre=$req->libelle;
            $Prod->prix=$req->prix;
            $Prod->description=$req->description;
            $Prod->categorie_id=$req->type;
            $Prod->image=$new_name;
            $Prod->save();
            return view('GestionProducts');
        }catch(Exception $e){
            session::put("erreur",$e->getmessage());
                return view('erreur');
        }
    }
    public function updateProduct(Request $req){
            $edit=produit::where('id',$req->post('id'))->get();
        foreach($edit as $Prod){
            $Prod->prix=$req->prix;
            $Prod->description=$req->description;
            $Prod->save();
             }
             return view('GestionProducts');
    }
}
