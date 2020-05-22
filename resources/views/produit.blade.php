@extends('layouts.home')

@section('content')
 <main>
 <header>
 <div class="header-main">
    @foreach($title as $t)
      <h1>{{ $t->titre }}</h1>
      @endforeach
    </div>
  </header> 
  <hr class="new5">
  
  <main>
    @foreach($produits as $produit)
    <article>
    <form action="{{ route('achat') }}" method="Post">
      {{ csrf_field() }}
    <input type="hidden" name="produit" id="produit" value="{{ $produit->id }}">
    <input type="hidden" name="prix" id="prix" value="{{ $produit->prix }}">
    <img src="{{asset('uploads/').'/'.$produit->image}}">
      
      <h2>{{ $produit->titre}}</h2>
      <p>{{ $produit->description}}</p>
      <p>Quantity: <input type="number"  name="quantite" id="quantite" size="2" value="1" autocomplete="off" style="text-align: center ; max-width: 50px" ></p>
      <button type="submit">Add to cart</button>
      </form>
    </article>

    @endforeach
    
  </main>
  @include('layouts.aside')
</div>
@endsection


