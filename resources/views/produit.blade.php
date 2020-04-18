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
  @foreach($produits as $produit)
    <article>
    <form action="{{ route('achat') }}" method="Post">
    @csrf
    <input type="hidden" name="produit" id="produit" value="{{ $produit->id }}">
    <input type="hidden" name="prix" id="prix" value="{{ $produit->prix }}">
      <img src="{{ $produit->image}}" alt="">
      <h2>{{ $produit->titre}}</h2>
      <p>{{ $produit->description}}</p>
      <p>Quantité: <input type="number"  name="quantite" id="quantite" size="2" value="1" autocomplete="off" style="text-align: center ; max-width: 50px" ></p>
      <button type="submit">Ajouter au panier</button>
      <form>
    </article>

    @endforeach
    
  </main>
  @include('layouts.aside')
</div>
@endsection
