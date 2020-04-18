<aside>
    <figure><img src="" alt=""></figure>
    <h1>ShopIT</h1>
    <p class="bio">Description trop cool ::::))))</p>
    <h3><a href="{{ route('pannier') }}"> panier<img src="images/cart.png" alt="" style="width:30px;height:30px"></a></h3>
    <h3>Categories</h3>
    <ul class="social">
      @foreach($categories as $categorie)
      <li><a href="/produit/{{ $categorie->id}}">{{ $categorie->titre}}</a></li>
      @endforeach
    </ul>
  </aside>