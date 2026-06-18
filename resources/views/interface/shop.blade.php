@extends('layouts.interface')
@section('section')

<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_product_img">
                    <img src="{{ asset('storage/' . $produit->image) }}" class="img-fluid" alt="{{ $produit->designation }}">
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $produit->designation }}</h3>
                    <h2>{{ $produit->prix_ht }}.00 DH</h2>
                    <ul class="list">
                        <li><a class="active" href="#"><span>Category</span> : {{ $produit->categorie }}</a></li>
                        <li><a href="#"> <span>Availability</span> : In Stock</a></li>
                    </ul>
                    <p>{{ $produit->description }}</p>
                    
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $produit->id }}">
                        <div class="product_count">
                            <label for="qty">Quantity:</label>
                            <input type="number" name="qty" id="sst" value="1" min="1" class="input-text qty">
                        </div>
                        <div class="card_area">
                            <button type="submit" class="main_btn">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection