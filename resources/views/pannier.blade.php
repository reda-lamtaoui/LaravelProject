@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width:1100px;max-width:1300px;right:200px">
                <div class="card-header">paniers</div>
    
                <table>
          <thead>
            <tr>
              <th>Designation</th>
              <th>Description</th>
              <th>Quantité</th>
              <th>Prix</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          
          <tbody>
          @foreach($panniers as $pannier)
              <tr>
              <td>{{ $pannier->titre }}</td>
              <td>{{ $pannier->description }}</td>
              <form action="{{ route('update') }}" method="Post">
                @csrf
              <td><input type="number"  name="quantite" id="quantite" size="2" value="{{ $pannier->quantite }}" 
              autocomplete="off" style="text-align: center ; max-width: 50px" >
             </td>
              <td>{{ $pannier->somme }}</td>
              <td>
                <input type="hidden" name="id" value="{{ $pannier->pannier_id }}">
                <input type="hidden" name="prix" value="{{ $pannier->prix }}">
                <input type="submit" value="Modifier" class="button" style="background-color: #4CAF50">
              </form>
             </td>
              <td>
              <a href='/delete/{{ $pannier->pannier_id }}' class="button" style="background-color: red">Supprimer</a>
              </td>
              </tr>

           @endforeach
            

          </tbody>
          
        </table>
      
      </tbody>
      </table>
            </div>
        </div>
    </div>
</div>
@include('layouts.aside')
@endsection
