@extends('layouts.home')

@section('content')
 
  <header>
    <div class="header-content">
      <h1>ShopIT</h1>
      <p>faster than light<br>Millions of products are sold every day with ShopIT</p>
    </div>
  </header>
  <!--
    Par défaut
      ombre portée: 0 0 10px rgba(#000,.15);
      margin-bottom: 3em;
      padding: 1em;
      arriere-plan: #fff;

    À partir de 600px
      2 articles par ligne avec une goutière de 4%

    À partir de 768px
      3 articles par ligne avec une goutière de 4%

    À Partir de 1024px
      main a un padding de 2em sur la hauteur
      2 articles par ligne avec une goutière de 4%

    À partir de 1366px
      3 articles par ligne avec une goutière de 4%
  -->
 <main>
 <header>
    <div class="header-main">
      <h1>Products</h1>
    </div>
  </header> 
  @foreach($produits as $produit)
    <article>
    <form action="{{ route('achat') }}" method="Post">
    @csrf
    <input type="hidden" name="produit" id="produit" value="{{ $produit->id }}">
      <img src="{{ $produit->image}}" alt="">
      <h2>{{ $produit->titre}}</h2>
      <p>{{ $produit->description}}</p>
      <p>Quantité: <input type="number"  name="quantite" id="quantite" size="2" value="1" autocomplete="off" style="text-align: center ; max-width: 50px" ></p>
      <button type="submit">Acheter</button>
      <form>
    </article>

    @endforeach
    
  </main>


    <!--
      Aside
        Par défaut
          Aucun style

        À Partir de 1024px
          doit ête fixeé à gauche, prendre toute la hauteur de la fenêtre et
          une largeur de 30%
          arriere plan noir
          couleur des textes : #aaa;
          padding: 1em;

        À partir de 1366px
          largeur: 280px
    -->

  <aside>
    <figure><img src="" alt=""></figure>
    <h1>ShopIT</h1>
    <p class="bio">Description trop cool ::::))))</p>
    <h3>Categories</h3>
    <ul class="social">
      @foreach($categories as $categorie)
      <li><a href="http://twitter.com">{{ $categorie->titre}}</a></li>
      @endforeach
    </ul>
  </aside>
</div>
@endsection
