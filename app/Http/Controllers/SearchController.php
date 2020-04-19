<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;
use Illuminate\Database\Query;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
      *
     * @return \Illuminate\Http\Response
     */

    public function searchProduit(Request $req)
    {
        $output="";
        $prods=DB::table('Produits')->where('titre','like','%'.$req->search.'%')->orWhere('description','like','%'.$req->search.'%')->get();
        if($prods){
            foreach($prods as $prod){
                        $output.='<tr>
                                <td>'.$prod->titre.'</td>'.
                                '<td><input type="text" name="description" value="'.$prod->description.'"></td>'.
                                '<td><input type="text" name="prix" value="'.$prod->prix.'"></td>'.
                                '<td style="width:200px;">
                                <input type="hidden" name="id"  value="'.$prod->id.'">
                                <button style="background-color:green;width:90px;" type="submit" class="btn btn-info pull-right">Update</button>

                                <div style="cursor: pointer;" data-toggle="modal"  data-target="#exampleModal" class="show"
                         data-prix="'.$prod->prix.'" data-id="'.$prod->id.'"  data-designation="'.$prod->titre.'"
                         data-desc="'.$prod->description.'" data-img="'.$prod->image.'">
                         
                         <a href="/deleteProduit/'.$prod->id.'" style="background-color:red;width:90px;" class="btn btn-info pull-right" style="background-color: red">Delete</a>'.
                                    '</div></td><tr>';
                    }
        return Response($output);
        }
        
       
    }
    public function searchUser(Request $req)
    {
        $output="";
        $users=DB::table('users')->where('administrateur', '=', '0')->where('name','like','%'.$req->search.'%')->orWhere('email','like','%'.$req->search.'%')->where('administrateur', '=', '0')->get();
        if($users){
            foreach($users as $user){
                        $output.='<tr>
                                <td>'.$user->name.'</td>'.
                                '<td>'.$user->email.'</td>'.
                                '<td>'.$user->created_at.'</td>'.
                                '<td style="width:200px;">
                         <a href="/deleteUser/'.$user->id.'" style="background-color:red;width:90px;" class="btn btn-info pull-right" style="background-color: red">Delete</a>'.
                                    '</div></td><tr>';
                    }
        return Response($output);
        }
        
       
    }
}
