@extends('layouts.home')

@section('content')
 
  <header>
    <div class="header-content">
      <h1>ShopIT</h1>
      <p>faster than light<br>Millions of products are sold every day with ShopIT</p>
    </div>
  </header>
 <main>
 <header>
    <div class="header-main">
      <h1>TOP Products</h1>
    </div>
  </header> 
  @foreach($produits as $produit)
  <form action="{{ route('achat') }}" method="Post">
    @csrf
    <article>
  
    <input type="hidden" name="produit" id="produit" value="{{ $produit->id }}">
    <input type="hidden" name="prix" id="prix" value="{{ $produit->prix }}">
    <img src="uploads/{{ $produit->image}}" alt="">
      
      <h2>{{ $produit->titre}}</h2>
      <p>{{ $produit->description}}</p>
      <p>Quantité: <input type="number"  name="quantite" id="quantite" size="2" value="1" autocomplete="off" style="text-align: center ; max-width: 50px" ></p>
      <button type="submit">Add to cart</button>
      
    </article>
    <form>
      @endforeach
    
  </main>
  @include('layouts.aside')
</div>
@endsection
